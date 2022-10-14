<?php

namespace App\Traits;

use App\Models\Item;
use App\Models\Setting;
use App\Models\PromoCode;
use App\Models\TrackOrder;
use Illuminate\Support\Str;
use App\Helpers\EmailHelper;
use App\Helpers\PriceHelper;
use App\Models\Notification;
use App\Models\ShippingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Exception\MissingParameterException;

trait PaystackCheckout
{
    public function paystackSubmit($data)
    {
        $user = Auth::user();
        $setting = Setting::first();
        $cart = Session::get('cart');

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

        $order_data['cart']               = json_encode($cart, true);
        $order_data['discount']           = json_encode($discount, true);
        $order_data['shipping']           = json_encode($shipping, true);
        $order_data['tax']                = $total_tax;
        $order_data['shipping_info']      = json_encode(Session::get('shipping_address'), true);
        $order_data['billing_info']       = json_encode(Session::get('billing_address'), true);
        $order_data['payment_method']     = 'Paystack';
        $order_data['user_id']            = $user->id;
        $order_data['transaction_number'] = Str::random(10);
        $order_data['currency_sign']      = PriceHelper::setCurrencySign();
        $order_data['currency_value']     = PriceHelper::setCurrencyValue();
        $order_data['order_status']       = 'Pending';

        try {
            $order_data['txnid'] = $data['ref_id'];
            $order_data['payment_status'] = 'Paid';

            $order = $user->orders()->create($order_data);

            PriceHelper::transaction($order->id, $order->transaction_number, $user->email, PriceHelper::orderTotal($order));
            PriceHelper::licenseQtyDecrease($cart);

            if (Session::has('copon')) {
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

            $email_data = [
                'to'                 => $user->email,
                'type'               => 'Order',
                'user_name'          => $user->displayName(),
                'order_cost'         => $total_amount,
                'transaction_number' => $order->transaction_number,
                'site_title'         => Setting::first()->title,
            ];

            $email = new EmailHelper();
            $email->sendTemplateMail($email_data);

            foreach (json_decode($order->cart, true) as $id => $product) {
                $vendor_id[] = $user = Item::findOrFail($id)->user->id;
            }

            if ($discount) {
                $coupon_id = $discount['code']['id'];
                $get_coupon = PromoCode::findOrFail($coupon_id);
                $get_coupon->no_of_times -= 1;
                $get_coupon->update();
            }

            Session::put('order_id', $order->id);
            Session::forget('cart');
            Session::forget('discount');
            return [
                'status' => true
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        } catch (CardErrorException $e) {
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        } catch (MissingParameterException $e) {
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
