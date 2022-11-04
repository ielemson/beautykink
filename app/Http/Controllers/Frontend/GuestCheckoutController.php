<?php

namespace App\Http\Controllers\frontend;

use App\Helpers\SmsHelper;
use App\Http\Controllers\Controller;
;
use App\Traits\BankCheckout;
use Illuminate\Http\Request;
use App\Traits\MollieCheckout;
use App\Traits\PaypalCheckout;
use App\Traits\StripeCheckout;
use App\Models\PaymentSetting;
use App\Models\ShippingService;
use App\Traits\PaystackCheckout;
use App\Traits\CashOnDeliveryCheckout;
use App\Http\Requests\PaymentRequest;
use App\Models\City;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class GuestCheckoutController extends Controller
{

    use StripeCheckout {
        StripeCheckout::__construct  as private __stripeConstruct;
    }

    use PaypalCheckout {
        PaypalCheckout::__construct  as private __paypalConstruct;
    }

    use MollieCheckout {
        MollieCheckout::__construct  as private __mollieConstruct;
    }

    use BankCheckout;
    use PaystackCheckout;
    use CashOnDeliveryCheckout;

    public function __construct()
    {
        // $this->middleware('auth');
        $this->__stripeConstruct();
        $this->__paypalConstruct();
        $this->__mollieConstruct();
    }
    

    // guest shiping address 
    public function ShippingAddress(Request $request)

    {
        // Session::forget('shipping_id');
        
        if (!Cart::count()) {
            return redirect()->route('frontend.cart');
        }

        // $data['user'] = Auth::user();
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
        return view('frontend.guest.checkout.billing', $data);
    }

    public function shippingStore(Request $request)
    {
        // dd($request->all());
        Session::forget('shipping_address');

        Session::put('shipping_address', $request->all());
        // dd(Session::get('shipping_address'));
        return redirect()->route('frontend.guest.checkout.payment');
    }

 public function billingStore(Request $request)
    {
        // dd($request->all());
        // Session::forget('shipping_address');
        Session::put('billing_address', $request->all());
        // dd(Session::get('shipping_address'));
        // if ($request->same_ship_address) {
            // Session::put('billing_address', $request->all());
                $shipping = [
                    'ship_first_name' => $request->bill_first_name,
                    'ship_last_name'  => $request->bill_last_name,
                    'ship_email'      => $request->bill_email,
                    'ship_phone'      => $request->bill_phone,
                    'ship_company'    => $request->bill_company,
                    'ship_address1'   => $request->bill_address1,
                    'ship_address2'   => $request->bill_address2,
                    'ship_zip'        => $request->bill_zip,
                    'ship_city'       => $request->bill_city,
                    'ship_country'     => $request->bill_country
                ];
            
            Session::put('shipping_address', $shipping);
        // } else {
        //     Session::forget('shipping_address');
        // }
        // dd(Session::get('shipping_address'));
        if (Session::has('shipping_address')) {
            return redirect()->route('frontend.guest.checkout.payment');
        } else {
            return redirect()->route('frontend.guest.checkout.shipping');
        }
    }
    public function getShippingInfo($id)
    {
        if ($id != 0) {
            $shipping = ShippingService::where('id', $id)->first();

            Session::put('shipping_price', $shipping->price);
            Session::put('shipping_id', $shipping->id);
        }
        $total = 0;
        $attribute_price = 0;
        foreach (Cart::content() as $key => $product) {
            $total += $product->price * $product->qty;
            $total += +$attribute_price;
        }

        $coupon = Session::has('coupon') ? round(Session::get('coupon')['discount'], 2) : 0;
        $shippingPrice = Session::has('shipping_price') ? Session::get('shipping_price') : 0;
        $cart_total = ($total - $coupon) + $shippingPrice;
        return response()->json(['shippPrice' => $shippingPrice, 'cartTotal' => $cart_total], 200);
    }

    public function shipping()
    {
        if (!Cart::count()) {
            return redirect()->route('frontend.cart');
        }

        if (Session::has('shipping_address')) {
            return redirect()->route('frontend.checkout.payment');
        }


        // $data['user'] = Auth::user();
        $cart = Cart::content();
        // $cart = Session::get('cart');

        // $total_tax = 0;
        // $cart_total = 0;
        // $total = 0;
        // $option_price = 0;
        // foreach ($cart as $key => $item) {
        //     $total += $item['main_price'] * $item['qty'];
        //     $option_price += $item['attribute_price'];
        //     $cart_total = $total + $option_price;
        //     $item = Item::findOrFail($key);
        //     if ($item->tax) {
        //         $total_tax += $item->taxCalculate($item);
        //     }
        // }

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
        return view('frontend.guest.checkout.shipping', $data);
    }

    public function payment()
    {
        if (!Cart::count() > 0) {
            return redirect()->route('frontend.cart');
        }

        if (!Session::has('billing_address')) {
            return redirect()->route('frontend.checkout.billing');
        }

        if (!Session::has('shipping_address')) {
            return redirect()->route('frontend.checkout.shipping');
        }

        // $data['user'] = Auth::user();
        $cart = Cart::content();
        // $cart = Session::get('cart');

        // $total_tax = 0;
        // $cart_total = 0;
        // $total = 0;
        // $option_price = 0;
        // foreach ($cart as $key => $item) {
        //     $total += $item['main_price'] * $item['qty'];
        //     $option_price += $item['attribute_price'];
        //     $cart_total = $total + $option_price;
        //     $item = Item::findOrFail($key);
        //     if ($item->tax) {
        //         $total_tax += $item->taxCalculate($item);
        //     }
        // }


        $shipping = [];
        // if (ShippingService::whereStatus(1)->exists()) {
        //     $shipping = ShippingService::whereStatus(1)->first();
        // }
        $shipping = ShippingService::whereStatus(1)->get();

        $discount = [];
        if (Session::has('coupon')) {
            $discount = Session::get('coupon');
        }
        // $grand_total = ($cart_total + ($shipping ? $shipping->price : 0)) + $total_tax;
        // $grand_total = $grand_total - ($discount ? $discount['discount'] : 0);
        // $total_amount = $grand_total;

        // $data['cart'] = $cart;
        // $data['cart_total'] = $cart_total;
        // $data['grand_total'] = $total_amount;
        $data['discount'] = $discount;
        $data['shipping'] = $shipping;
        // $data['tax'] = $total_tax;
        $data['cart'] = $cart;
        $data['cart_total'] = Cart::total();
        $data['cart_count'] = Cart::count();
        $data['grand_total'] = Cart::subtotal();

        $data['payments'] = PaymentSetting::whereStatus(1)->get();
        return view('frontend.guest.checkout.payment', $data);
    }

    public function checkout(PaymentRequest $request)
    {
       
        $input = $request->all();

        $checkout         = false;
        $payment_redirect = false;
        $payment          = null;

        // if (Session::has('currency')) {
        //     $currency = Currency::findOrFail(Session::get('currency'));
        // } else {
        //     $currency = Currency::where('is_default', 1)->first();
        // }

        // Use currency check
        // $usd_supported = [ 'USD', 'EUR' ];
        // $paystack_supported = [ 'NGN' ];
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
                if($payment['status']){
                    return redirect()->route('frontend.guest.checkout.success');
                }else{
                    Session::put('message',$payment['message']);
                    return redirect()->route('frontend.checkout.cancel');
                }
            }
        } else {
            return redirect()->route('frontend.checkout.cancel');
        }
    }


    public function paymentSuccess()
    {
        if (Session::has('order_id')) {
            $order_id = Session::get('order_id');
            $order = Order::findOrFail($order_id);
            $cart = json_decode($order->cart, true);
            $setting = Setting::first();

            if ($setting->is_twilio == 1) {
                // Send message
                $sms = new SmsHelper();
                $user_number = $order->user->phone;
                if ($user_number) {
                    $sms->sendSms($user_number, "'purchase'");
                }
            }
            return view('frontend.checkout.success', compact('order', 'cart'));
        }
        return redirect()->route('frontend.index');
    }

    public function fetchShippingLocation(Request $request){

        $shippingLocation = ShippingService::where('state_id',$request->state_id)->get();
        return response()->json(['locations'=>$shippingLocation]);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
