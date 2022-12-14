<?php

namespace App\Http\Controllers\Payment;

use App\Models\Item;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\PromoCode;
use App\Models\TrackOrder;
use Illuminate\Support\Str;
use App\Helpers\EmailHelper;
use App\Helpers\PriceHelper;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;
use App\Models\ShippingService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use net\authorize\api\contract\v1\OrderType;
use net\authorize\api\contract\v1\PaymentType;
use net\authorize\api\constants\ANetEnvironment;
use net\authorize\api\contract\v1\CreditCardType;
use net\authorize\api\contract\v1\TransactionRequestType;
use net\authorize\api\contract\v1\CreateTransactionRequest;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\controller\CreateTransactionController;

class AuthorizeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card'  => 'required',
            'cvc'   => 'required',
            'month' => 'required',
            'year'  => 'required',
        ]);

        if ($validator->passes()) {
            $input = $request->all();

            if (Session::has('currency')) {
                $currency = Currency::findOrFail(Session::get('currency'));
            } else {
                $currency = Currency::where('is_default', 1)->first();
            }

            $supported = [ 'USD' ];
            if (!in_array($currency->name, $supported)) {
                return redirect()->back()->withError(__('Currency Not Supported'));
            }

            $data = PaymentSetting::whereUniqueKeyword('authorize')->first();
            $paydata = $data->convertJsonData();

            $user = Auth::user();
            $cart = Session::get('cart');
            $setting = Setting::first();

            $total_tax = 0;
            $cart_total = 0;
            $total = 0;
            $option_price = 0;
            foreach ($cart as $key => $item) {
                $total += $item['main_price'] * $item['qty'];
                $option_price += $item['attribute_price'];
                $cart_total = $total + $option_price;
                $item = Item::findOrFail($key);
                if ($item->tax) {
                    $total_tax += $item->taxCalculate($item);
                }
            }

            $shipping = [];
            if (ShippingService::whereStatus(1)->exists()) {
                $shipping = ShippingService::whereStatus(1)->first();
            }

            $discount = [];
            if (Session::has('coupon')) {
                $discount = Session::get('coupon');
            }
            $grand_total = ($cart_total + ($shipping ? $shipping->price : 0)) + $total_tax;
            $grand_total = $grand_total - ($discount ? $discount['discount'] : 0);
            $total_amount = PriceHelper::setConvertPrice($grand_total);

            $item_name = $setting->title . ' - Order';

            $merchantAuthentication = new MerchantAuthenticationType();
            $merchantAuthentication->setName($paydata['login_id']);
            $merchantAuthentication->setTransactionKey($paydata['txn_key']);

            // set the  transaction's refId
            $refId = 'ref' . time();

            // create the payment data for credit cart
            $creditCard = new CreditCardType();
            $creditCard->setCardNumber(str_replace(' ','',$request->card));
            $year = $request->year;
            $month = $request->month;
            $creditCard->setExpirationDate($year . '-' . $month);
            $creditCard->setCardCode($request->cvc);

            // Add the payment data to a paymentType object;
            $paymentOne = new PaymentType();
            $paymentOne->setCreditCard($creditCard);

            // Create order information
            $orderr = new OrderType();
            $orderr->setInvoiceNumber(Str::random(8));
            $orderr->setDescription($item_name);

            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new TransactionRequestType();
            $transactionRequestType->setTransactionType('authCaptureTransaction');
            $transactionRequestType->setAmount($total_amount);
            $transactionRequestType->setOrder($orderr);
            $transactionRequestType->setPayment($paymentOne);

            // Assemble the complete transaction request
            $requestt = new CreateTransactionRequest();
            $requestt->setMerchantAuthentication($merchantAuthentication);
            $requestt->setRefId($refId);
            $requestt->setTransactionRequest($transactionRequestType);

            // Create the controller and get the response
            $controller = new CreateTransactionController($requestt);
            if($paydata['check_sandbox'] == 1){
                $response = $controller->executeWithApiResponse(ANetEnvironment::SANDBOX);
            }
            else {
                $response = $controller->executeWithApiResponse(ANetEnvironment::PRODUCTION);
            }

            if ($response != null) {

                if ($response->getMessages()->getResultCode() == "Ok") {

                    $tresponse = $response->getTransactionResponse();

                    if ($tresponse != null && $tresponse->getMessages() != null) {

                            $orderData['cart'] = json_encode($cart,true);
                            $orderData['discount'] = json_encode($discount,true);
                            $orderData['shipping'] = json_encode($shipping,true);
                            $orderData['tax'] = $total_tax;
                            $orderData['shipping_info'] = json_encode(Session::get('shipping_address'),true);
                            $orderData['billing_info'] = json_encode(Session::get('billing_address'),true);
                            $orderData['payment_method'] = 'Authorize.Net';
                            $orderData['txnid'] = $tresponse->getTransId();
                            $orderData['user_id'] = $user->id;
                            $orderData['payment_status'] = 'Paid';
                            $orderData['order_status'] = 'Pending';
                            $orderData['transaction_number'] = Str::random(10);
                            $orderData['currency_sign'] = PriceHelper::setCurrencySign();
                            $orderData['currency_value'] = PriceHelper::setCurrencyValue();
                            $order = $user->orders()->create($orderData);

                            PriceHelper::Transaction($order->id,$order->transaction_number,$user->email,PriceHelper::OrderTotal($order));
                            PriceHelper::LicenseQtyDecrese($cart);

                            if(Session::has('copon')){
                                $code = PromoCode::find(Session::get('copon')['code']['id']);
                                $code->no_of_times--;
                                $code->update();
                            }
                            TrackOrder::create([
                                'title' => 'Pending',
                                'order_id' => $order->id,
                            ]);


                            Notification::create([
                                'order_id' => $order->id
                            ]);


                        $emailData = [
                            'to' => $user->email,
                            'type' => "Order",
                            'user_name' => $user->displayName(),
                            'order_cost' => $total_amount,
                            'transaction_number' => $order->transaction_number,
                            'site_title' => Setting::first()->title,
                        ];

                        $email = new EmailHelper();
                        $email->sendTemplateMail($emailData);

                        foreach(json_decode($order->cart,true) as $id => $product){
                            $vendor_id[] = $user = Item::findOrFail($id)->user->id;
                        }

                        if($discount){
                            $coupon_id = $discount['code']['id'];
                            $get_coupon = PromoCode::findOrFail($coupon_id);
                            $get_coupon->no_of_times -= 1;
                            $get_coupon->update();
                        }

                        Session::put('order_id',$order->id);
                        Session::forget('cart');
                        Session::forget('discount');
                        return redirect(route('frontend.checkout.success'));


                    } else {
                        return back()->with('error', __('Payment Failed.'));
                    }

                } else {
                    return back()->with('error', __('Payment Failed.'));
                }
            } else {
                return back()->with('error', __('Payment Failed.'));
            }
        }
        return back()->with('error', __('Invalid Payment Details.'));
    }
}
