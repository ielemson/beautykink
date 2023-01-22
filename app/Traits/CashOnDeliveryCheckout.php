<?php

namespace App\Traits;

use App\Models\Item;
use App\Models\Order;
use App\Models\Setting;
use App\Models\PromoCode;
use App\Models\TrackOrder;
use Illuminate\Support\Str;
use App\Helpers\EmailHelper;
use App\Helpers\PriceHelper;
use App\Models\FreeShipping;
use App\Models\GeoZone;
use App\Models\Notification;
use App\Models\ShippingMethod;
use App\Models\ShippingService;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait CashOnDeliveryCheckout
{
    public function cashOnDeliverySubmit($data)
    {
       
        $user = Auth::user();
        $ship = Session::get('shipping_address');
        if(!$user){

        // $ship = Session::get('shipping_address');
        // dd($ship);
        $guestEmail = $ship['ship_email'];
        $guestUser = User::where('email',$guestEmail)->first();
        if(!$guestUser){

         $user = User::create([

                'first_name' => $ship['ship_first_name'], 
                'last_name' =>  $ship['ship_last_name'], 
                'phone' =>  $ship['ship_phone'], 
                'email' =>  $ship['ship_email'], 
                'password' => encrypt('12345'),
                // Shipp info
                'ship_address1'   =>$ship['ship_address1'],
                'ship_zip'        => $ship['ship_zip'],
                'ship_state'       => $ship['ship_state'],
                'ship_county'     => 'Nigeria'
            ]);
            
        }
        else{
            $user = $guestUser;
          $input =  [
                
                'first_name' => $ship['ship_first_name'], 
                'last_name' =>  $ship['ship_last_name'], 
                'phone' =>  $ship['ship_phone'], 
                // 'email' =>  $ship['ship_email'], 
                'password' => encrypt('12345'),
                // Shipp info
                'ship_address1'   =>$ship['ship_address1'],
                'ship_zip'        => $ship['ship_zip'],
                'ship_state'       => $ship['ship_state'],
                'ship_county'     => 'Nigeria'
            ];  

            $guestUser->update($input);
            

        }

        }

        $setting = Setting::first();
        $cart = Cart::content();
        $cartArr = [];
        
        foreach ($cart as $key => $item) {
          
                 
            array_push($cartArr, ['id'=>$item->id,'name'=>$item->name,'price'=>$item->price,'main_price'=>$item->price,'attribute_price'=>$item->options->attribute_price,'attribute_name'=>$item->options->attribute_name,'attribute_type'=>$item->options->attribute_type,'qty'=>$item->qty,'photo'=>$item->options->image,'slug'=>$item->options->slug]);
        }

        $shipping = [];
        
        // $shipping_id = Session::has('shipping_method_id') ? Session::get('shipping_method_id'): 0;
        
        // if ($shipping = ShippingMethod::where('id',$shipping_id)->exists()) {
        //     $shipping = ShippingMethod::where('id',$shipping_id)->first();
        //     $shipping['price'] = $shipping->price;
        //     $shipping['shipping_state_id'] = Session::get('shipping_state_id');
        // }

        $shipping = [];

        if(Session::has('free_shipping_id')){
            $shipping = FreeShipping::where('id',Session::get('free_shipping_id'))->first();
            $shipping['price'] = 0;
            $shipping['state_id'] = Session::get('free_shipping_state_id');

        }else{

             $shipping_id = Session::has('shipping_method_id') ? Session::get('shipping_method_id'): 0;
        
        if ($shipping = ShippingMethod::where('id',$shipping_id)->exists()) {
            $shipping = ShippingMethod::where('id',$shipping_id)->first();
            $shipping['price'] = $shipping->price;
            $shipping['shipping_state_id'] = Session::get('shipping_state_id');
        }

        }
        $total = 0;

        foreach ($cart as $key => $product) {
          $total += $product->price * $product->qty;
        //   $total += $product->options->attribute_price * $product->qty;
      }

        $discount = [];
        if (Session::has('coupon')) {
            $discount = Session::get('coupon');
        }
        // $data['cart_total'] = 
        // $data['cart_count'] = Cart::count();
        // $data['grand_total'] = Cart::subtotal();
        $grand_total = Cart::total();
        // $grand_total = $grand_total - ($discount ? $discount['discount'] : 0);
        $total_amount = $grand_total;

        $order_data['cart']               = json_encode($cartArr, true);
        $order_data['discount']           = json_encode($discount, true);
        $order_data['shipping']           = json_encode($shipping, true);
        $order_data['tax']                = 0;
        $order_data['shipping_info']      = json_encode(Session::get('shipping_address'), true);
        $order_data['billing_info']       = json_encode(Session::get('billing_address'), true);
        $order_data['payment_method']     = 'Bank Transfer';
        $order_data['user_id']            = $user->id;
        $order_data['transaction_number'] = Str::random(10);
        $order_data['currency_sign']      = PriceHelper::setCurrencySign();
        $order_data['currency_value']     = PriceHelper::setCurrencyValue();
        $order_data['payment_status']     = 'Unpaid';
        // $order_data['txnid']              = $data['txn_id'];
        $order_data['order_status']       = 'Pending';
        $order_data['shipping_type']     = Session::has('free_shipping_id') ? 'Free': 'Paid';
        $order                            = Order::create($order_data);
        TrackOrder::create([
            'title'    => 'Pending',
            'order_id' => $order->id
        ]);

        PriceHelper::transaction($order->id, $order->transaction_number, $user->email, $total_amount);

        Notification::create([
            'order_id' => $order->id
        ]);

        // $email_data = [
        //     'to'                 => $user->email,
        //     'type'               => 'Order',
        //     'user_name'          => $user->displayName(),
        //     'order_cost'         => $total_amount,
        //     'transaction_number' => 'transaction_number',
        //     'site_title'         => $setting->title,
        // ];

        // $email = new EmailHelper();
        // $email->sendTemplateMail($email_data);
        $invoice = [
            'order_id'=>$order->id,
            'payment_method'=>$order->payment_method,
            'payment_status'=>$order->payment_status,
            'order_date'=>$order->created_at,
        ];

        $email_data = [
            'to'                 => $user->email,
            'type'               => 'Order',
            'user_name'          => $user->displayName(),
            'shipping_address'   => $ship['ship_address1'],
            'order_cost'         => $total_amount,
            'transaction_number' => $order->transaction_number,
            'site_title'         => $setting->title,
            'cart'               => $cartArr,
            'shipping'           => $shipping,
            'shipping_info'      => Session::get('shipping_address'),
            'grand_total'        => $total,
            'invoice'           => $invoice
        ];

        $email = new EmailHelper();
        $email->sendTemplateMailOrder($email_data);
        if ($discount) {
            $coupon_id = $discount['code']['id'];
            $get_coupon = PromoCode::findOrFail($coupon_id);
            $get_coupon->no_of_times -= 1;
            $get_coupon->update();
        }

        Session::put('order_id', $order->id);
        Session::forget('cart');
        Session::forget('discount');
        Session::forget('coupon');
        Session::forget('shipping_id');
        Session::forget('shipping_state_id');
        Session::forget('shipping_price');
        Session::forget('shipping_address');
        Session::forget('billing_address');
        Session::forget('free_shipping');
        Session::forget('free_shipping_state');
        Session::forget('free_shipping_id');
        return [
            'status' => true
        ];
    }
}
