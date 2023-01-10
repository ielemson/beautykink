<?php

namespace App\Http\Controllers\Frontend;

// use App\Models\Item;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Currency;
use App\Helpers\SmsHelper;
// use App\Helpers\PriceHelper;
use App\Traits\BankCheckout;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;
// use App\Traits\MollieCheckout;
// use App\Traits\PaypalCheckout;
// use App\Traits\StripeCheckout;
use App\Models\ShippingService;
use App\Traits\PaystackCheckout;
use Mollie\Laravel\Facades\Mollie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use App\Models\Item;
use App\Models\ShippingMethod;
use App\Traits\CashOnDeliveryCheckout;
use Exception;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{

    use BankCheckout;
    use PaystackCheckout;
    use CashOnDeliveryCheckout;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show page to colelct addresseses.
     *
     * @return \Illuminate\Http\Response
     */
    public function shippingAddress()

    {

        if (!Cart::count()) {
            return redirect()->route('frontend.cart');
        }

        $prodId = [];
        foreach (Cart::content() as $cart) {
            $prodId[] = $cart->id;

            $check = Item::where('id', $cart->id)->first();

            if ($cart->qty > $check->stock) {
                return redirect()->route('frontend.cart')->withError(__('Total quantity has exceeded available stock.'));
            }
        }

        $data['user'] = Auth::user();
        $cart = Cart::content();
        $shipping = [];
        $shipping = ShippingService::whereStatus(1)->get();
        $discount = [];
        if (Session::has('coupon')) {
            $discount = Session::get('coupon');
        }

        $data['cart'] = $cart;
        $data['cart_total'] = Cart::total();
        $data['cart_count'] = Cart::count();
        $data['grand_total'] = Cart::subtotal();
        $data['discount'] = $discount;
        $data['shipping'] = $shipping;
        // $data['tax'] = $total_tax;
        $data['payments'] = PaymentSetting::whereStatus(1)->get();
        return view('frontend.checkout.billing', $data);
    }

    /**
     * Store billing information into session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function billingStore(Request $request)
    {
        $request->validate([
            'bill_first_name' => 'required',
            'bill_last_name' => 'required',
            'bill_email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'bill_phone' => 'required|digits:11',
            'bill_city' => 'required',
            'bill_zip' => 'required',
            'bill_address1' => 'required',
            'bill_country' => 'required',

        ], [
            'bill_first_name.required' => 'First name is required',
            'bill_last_name.required' => 'Last name is required',
            'bill_email.required' => 'Email is required',
            'bill_email.email' => 'Invalid email',
            'bill_email.regex' => 'Invalid email',
            'bill_phone.required' => 'Phone number is required',
            'bill_phone.digits' => 'Phone number must be 11 digits',
            'bill_city.required' => 'State is required',
            'bill_zip.required' => 'Zip Code is required',
            'bill_address1.required' => 'Address is required',
            'bill_country.required' => 'Country is required',
        ]);

        // dd($request->all());
        // $shippingMethods = ShippingMethod::where("id",$request->shipping_method)->first();
        // if(!$shippingMethods || !Session::get('free_shipping_state')){
        //     return redirect()->back()->withError(__('Invalid shipping method selected'));
        // }
        Session::put('billing_address', $request->all());

        $shipping = [
            'ship_first_name' => $request->bill_first_name,
            'ship_last_name'  => $request->bill_last_name,
            'ship_email'      => $request->bill_email,
            'ship_phone'      => $request->bill_phone,
            'ship_company'    => $request->bill_company,
            'ship_address1'   => $request->bill_address1,
            'ship_address2'   => $request->bill_address2,
            'ship_zip'        => $request->bill_zip,
            'ship_state'      => $request->bill_state,
            'ship_zone'       => $request->bill_zone,
            'ship_county'              => $request->bill_country,
            'terms_and_conditions'     => $request->terms_and_conditions,
            'shipping_method'          => $request->shipping_method
        ];

        Session::put('shipping_address', $shipping);
        // dd($shipping);

        if (Session::has('shipping_address')) {
            return redirect()->route('frontend.checkout.payment');
        } else {
            return redirect()->route('frontend.checkout.shipping');
        }
    }

    /**
     * Show page to collect shipping iformation.
     *
     * @return \Illuminate\Http\Response
     */
    public function shipping()
    {
        if (!Cart::count()) {
            return redirect()->route('frontend.cart');
        }

        if (Session::has('shipping_address')) {
            return redirect()->route('frontend.checkout.payment');
        }

        $data['user'] = Auth::user();
        $cart = Cart::content();

        $shipping = [];

        $shipping = ShippingService::whereStatus(1)->get();
        $discount = [];
        if (Session::has('coupon')) {
            $discount = Session::get('coupon');
        }

        $data['discount'] = $discount;
        $data['shipping'] = $shipping;
        // $data['tax'] = $total_tax;

        $data['cart'] = $cart;
        $data['cart_total'] = Cart::total();
        $data['cart_count'] = Cart::count();
        $data['grand_total'] = Cart::subtotal();

        $data['payments'] = PaymentSetting::whereStatus(1)->get();
        return view('frontend.checkout.shipping', $data);
    }

    /**
     * Store shipping information into session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function shippingStore(Request $request)
    {
        dd($request->all());
        Session::forget('shipping_address');

        Session::put('shipping_address', $request->all());
        // dd(Session::get('shipping_address'));
        return redirect()->route('frontend.checkout.payment');
    }

    /**
     * Show page to collect payment iformation.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {

        if (!Session::has('billing_address')) {
            return redirect()->route('frontend.checkout.billing');
        }

        if (!Session::has('shipping_address')) {
            return redirect()->route('frontend.checkout.shipping');
        }

        if (!Cart::count() > 0) {
            return redirect()->route('frontend.cart');
        }

        $data['user'] = Auth::user();
        $cart = Cart::content();

        $shipping = [];

        $shipping = ShippingService::whereStatus(1)->get();

        $discount = [];
        if (Session::has('coupon')) {
            $discount = Session::get('coupon');
        }

        $data['discount'] = $discount;
        $data['shipping'] = $shipping;
        // $data['tax'] = $total_tax;
        $data['cart'] = $cart;
        $data['cart_total'] = Cart::total();
        $data['cart_count'] = Cart::count();
        $data['grand_total'] = Cart::subtotal();
        $data['payments'] = PaymentSetting::whereStatus(1)->get();
        return view('frontend.checkout.payment', $data);
    }

    /**
     * Checkout
     *
     * @param \App\Http\Requests\PaymentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(PaymentRequest $request)
    {
        $input = $request->all();

        // dd($request->all());

        $checkout         = false;
        $payment_redirect = false;
        $payment          = null;

        if (Session::has('currency')) {
            $currency = Currency::findOrFail(Session::get('currency'));
        } else {
            $currency = Currency::where('is_default', 1)->first();
        }

        // Use currency check
        $usd_supported = ['USD', 'EUR'];
        $paystack_supported = ['NGN'];
        switch ($input['payment_method']) {

                // case 'Paystack':
                //     if (!in_array($currency->name, $paystack_supported)) {
                //         return redirect()->back()->withError(__('Currency Not Supported.'));
                //     }
                //     $checkout = true;
                //     $payment = $this->paystackSubmit($input);
                //     break;

            case 'Bank':
                $checkout = true;
                $payment = $this->bankSubmit($input);
                break;

            case 'Cash On Delivery':
                $checkout = true;
                $payment = $this->cashOnDeliverySubmit($input);
                break;
        }

        if ($checkout) {
            if ($payment_redirect) {
                if ($payment['status']) {
                    return redirect()->away($payment['link']);
                } else {
                    Session::put('message', $payment['message']);
                    return redirect()->route('frontend.checkout.cancel');
                }
            } else {
                if ($payment['status']) {

                    return redirect()->route('frontend.checkout.success');
                } else {
                    Session::put('message', $payment['message']);
                    return redirect()->route('frontend.checkout.cancel');
                }
            }
        } else {
            return redirect()->route('frontend.checkout.cancel');
        }
    }

    /**
     * Payemtn redirect
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function paymentRedirect(Request $request)
    {
        $responseData = $request->all();
        if (Session::has('order_payment_id')) {
            $payment = $this->paypalNotify($responseData);
            if ($payment['status']) {
                return redirect()->route('frontend.checkout.success');
            } else {
                Session::put('message', $payment['message']);
                return redirect()->route('frontend.checkout.cancel');
            }
        } else {
            return redirect()->route('frontend.checkout.cancel');
        }
    }

    /**
     * Mollie redirect
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function mollieRedirect(Request $request)
    {
        $responseData = $request->all();
        // set api key for mollie
        $data = PaymentSetting::whereUniqueKeyword('mollie')->first();
        $payment_data = $data->convertJsonData();
        Mollie::api()->setApiKey($payment_data['key']);
        $payment = Mollie::api()->payments()->get(Session::get('payment_id'));
        $responseData['payment_id'] = $payment->id;
        if ($payment->status == 'paid') {
            $payment = $this->mollieNotify($responseData);
            if ($payment['status']) {
                return redirect()->route('frontend.checkout.success');
            } else {
                Session::put('message', $payment['message']);
                return redirect()->route('frontend.checkout.cancel');
            }
        } else {
            return redirect()->route('frontend.checkout.cancel');
        }
    }

    public function fetchShippingMethod(Request $request)
    {

        try {
            // Get the shpping info
            $data = ShippingService::where("state_id", $request->state_id)->where('status', 1)->first();
            // decode the state ids from the shipping info
            $methodIds =  json_decode($data['shipping_method_id']);


            $shippingMethods = ShippingMethod::whereIn("id", $methodIds)->get();
        } catch (Exception $e) {

            // $message = $e->getMessage();
            // var_dump('Exception Message: '. $message);

            // $code = $e->getCode();       
            // var_dump('Exception Code: '. $code);

            // $string = $e->__toString();       
            // var_dump('Exception String: '. $string);
            return response()->json(['error' => 'error'], 200);
            exit;
        }

        return response()->json([
            'datas' => $shippingMethods
        ], 200);
    }


    // CUSTOM METHODS :::::::::::::::::::::::::::::::::::::

}
