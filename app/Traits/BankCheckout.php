<?php

namespace App\Traits;

use App\Helpers\EmailHelper;
use App\Models\Item;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Helpers\PriceHelper;
use App\Models\Notification;
use App\Models\Order;
use App\Models\PromoCode;
use App\Models\ShippingService;
use App\Models\TrackOrder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
trait BankCheckout
{
    public function bankSubmit($data)
    {
        $user = Auth::user();
        if(!$user){

        $ship = Session::get('shipping_address');
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
                'ship_city'       => $ship['ship_city'],
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
                'ship_city'       => $ship['ship_city'],
                'ship_county'     => 'Nigeria'
            ];  

            $guestUser->update($input);
            

        }

        }

        $setting = Setting::first();
        $cart = Cart::content();
        $cartArr = [];
        // dd($cart);
        // $total_tax = 0;
        // $cart_total = 0;
        // $total = 0;
        // $option_price = 0;
      
        foreach ($cart as $key => $item) {
            // $total += $item['main_price'] * $item['qty'];
            // $option_price += $item['attribute_price'];
            // $cart_total = $total + $option_price;
            // $item = Item::findOrFail($key);
            // if ($item->tax) {
            //     $total_tax += $item->taxCalculate($item);
            // }
            array_push($cartArr, ['id'=>$item->id,'name'=>$item->name,'price'=>$item->price,'main_price'=>$item->price,'attribute_price'=>0,'attribute_name'=>$item->options->attribute_name,'attribute_color'=>$item->options->attribute_color,'qty'=>$item->qty,'photo'=>$item->options->image,'slug'=>$item->options->slug]);
        }

        // dd($cart);
        $shipping = [];
        
        $shipping_id = Session::has('shipping_id') ? Session::get('shipping_id'): 0;
        
        if ($shipping = ShippingService::where('id',$shipping_id)->exists()) {
            $shipping = ShippingService::where('id',$shipping_id)->first();
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
        $order                            = Order::create($order_data);
        TrackOrder::create([
            'title'    => 'Pending',
            'order_id' => $order->id
        ]);

        PriceHelper::transaction($order->id, $order->transaction_number, $user->email, $total_amount);

        Notification::create([
            'order_id' => $order->id
        ]);

        $email_data = [
            'to'                 => $user->email,
            'type'               => 'Order',
            'user_name'          => $user->displayName(),
            'order_cost'         => $total_amount,
            'transaction_number' => 'transaction_number',
            'site_title'         => $setting->title,
        ];

        $email = new EmailHelper();
        $email->sendTemplateMail($email_data);

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
        Session::forget('shipping_address');
        Session::forget('billing_address');
        return [
            'status' => true
        ];
    }
}
