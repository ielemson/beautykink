<?php

namespace App\Http\Controllers\Backend;

// use App\Helpers\SmsHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Mail\CustomerRestockMail;
use App\Mail\OrderProgressEmail;
use App\Models\EmailTemplate;
use App\Models\Item;
use App\Models\Notification;
use App\Models\Order;
use App\Models\PromoCode;
use App\Models\TrackOrder;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if ($request->type) {
            if ($request->start_date && $request->end_date) {
                $datas = $start_date = Carbon::parse($request->start_date);
                $end_date = Carbon::parse($request->end_date);
                $datas = Order::latest('id')->whereOrderStatus($request->type)->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
            } else {
                $datas = Order::latest('id')->whereOrderStatus($request->type)->get();
            }
        } else {
            if ($request->start_date && $request->end_date) {
                $datas = $start_date = Carbon::parse($request->start_date);
                $end_date = Carbon::parse($request->end_date);
                $datas = Order::latest('id')->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
            } else {
                $datas = Order::latest('id')->get();
            }
        }
        return view('backend.order.index', compact('datas'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $cart = json_decode($order->cart, true);
        return view('backend.order.invoice', compact('order', 'cart'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function printOrder($id)
    {
        $order = Order::findOrFail($id);
        $cart = json_decode($order->cart, true);
        // dd($cart);
        return view('backend.order.print', compact('order', 'cart'));
    }

    /**
     * Change the status for editing the specified resource.
     *
     * @param int $id
     * @param string $field
     * @param string $value
     * @return \Illuminate\Http\Response
    */
    public function status($id, $field, $value)
    {
        $order = Order::findOrFail($id);
        $user =  User::where('id',$order->user_id)->first();
        // dd($order->user_id);
// dd($id.' '.$field.' '.$value);

// if ($field == 'payment_status') {
//     if ($order['payment_status'] == 'Paid') {
//         return redirect()->route('backend.order.index')->withError(__('Order is already Paid.'));
//     }
// }

    if ($field == 'order_status') {
    
    if ($value == 'In Progress' && $order['payment_status'] === 'Unpaid') { 
    return redirect()->route('backend.order.index')->withError(__('Approve payment first'));
    }
    if ($value == 'Verified' && $order['payment_status'] === 'Unpaid') { 
    return redirect()->route('backend.order.index')->withError(__('Approve payment first'));
    }
    // if ($value == 'Shipped' && $order['payment_status'] === 'Unpaid') { 
    // return redirect()->route('backend.order.index')->withError(__('Approve payment first'));
    // }
    // if ($value == 'Delivered' && $order['payment_status'] === 'Unpaid') { 
    // return redirect()->route('backend.order.index')->withError(__('Approve payment first'));
    // }

    }

        $order->update([ $field => $value ]);

        if ($order->payment_status == 'Paid') {
            $this->setPromoCode($order);
            $this->deDuctFromStock($order);

        }
        $this->setTrackOrder($order);

        // $sms = new SmsHelper();
        // $user_number = $order->user->phone;
        // if ($user_number) {
        //     $sms->sendSms($user_number, "'order_status'");
        // }
      
        if ($value == 'In Progress') {
            
            $template = EmailTemplate::whereType('Order_In_Progress')->first();
            $emailData = [
                'email'      => $user->email,
                'subject'    => $template->subject,
                'body'       => preg_replace("/{order_id}/", $id, $template->body),
    
            ];
        Mail::to($user->email)->send(new OrderProgressEmail($emailData));

        }
        if ($value == 'Verified') {

            $template = EmailTemplate::whereType('Order_Verified')->first();
            $emailData = [
                'email'      => $user->email,
                'subject'    => $template->subject,
                'body'       => preg_replace("/{order_id}/", $id, $template->body),
    
            ];
        Mail::to($user->email)->send(new OrderProgressEmail($emailData));

        }
        


        return redirect()->route('backend.order.index')->withSuccess(__('Status Updated Successfully'));
    }


    public function status_update(Request $request){

        $order = Order::findOrFail($request->id);
        $user =  User::where('id',$order->user_id)->first();
        // dd($order->user_id);
// dd($id.' '.$field.' '.$value);

// if ($request->field == 'payment_status') {
//     if ($order['payment_status'] == 'Paid') {
//         // return redirect()->route('backend.order.index')->withError(__('Order is already Paid.'));
//         return response()->json(['message'=>'Order is already Paid.']);
//     }
// }

    if ($request->field == 'order_status') {
    
    // if ($request->value == 'In Progress' && $order['payment_status'] === 'Unpaid') { 
    // return redirect()->route('backend.order.index')->withError(__('Approve payment first'));
    // }
    if ($request->value == 'Verified' && $order['payment_status'] === 'Unpaid') { 
        return response()->json(['message'=>'Approve payment first.','type'=>'error']);
    }
    if ($request->value == 'Shipped' && $order['payment_status'] === 'Unpaid') { 
    // return redirect()->route('backend.order.index')->withError(__('Approve payment first'));
    return response()->json(['message'=>'Approve payment first.','type'=>'error']);
    }
    if ($request->value == 'Delivered' && $order['payment_status'] === 'Unpaid') { 
    // return redirect()->route('backend.order.index')->withError(__('Approve payment first'));
    return response()->json(['message'=>'Approve payment first.','type'=>'error']);
    }

    }

        $order->update([ $request->field=> $request->value ]);

        if ($order->payment_status == 'Paid') {
            $this->setPromoCode($order);
        }
        $this->setTrackOrder($order);

       
        // if ($request->value == "Verified" ||) {
            
            // $template = EmailTemplate::whereType('Order_In_Progress')->first();
            $emailData = [
                'email'      => $user->email,
                'subject'    => $request->sub,
                'body'       => $request->msg
    
            ];
        // }
        Mail::to($user->email)->send(new OrderProgressEmail($emailData));

        // return redirect()->route('backend.order.index')->withSuccess(__('Status Updated Successfully'));
        return response()->json(['message'=>'Status Updated Successfully.','type'=>'success']);
    }
    /**
     * Set order status in track order
     *
     * @param \App\Models\Order $order
     * @return void
    */
    public function setTrackOrder($order)
    {
        if ($order->order_status == 'In Progress') {
            if (!TrackOrder::whereOrderId($order->id)->whereTitle('In Progress')->exists()) {
                TrackOrder::create([
                    'title'    => 'In Progress',
                    'order_id' => $order->id
                ]);
            }
        }

        if ($order->order_status == 'Canceled') {
            if (!TrackOrder::whereOrderId($order->id)->whereTitle('Canceled')->exists()) {

                if (!TrackOrder::whereOrderId($order->id)->whereTitle('In Progress')->exists()) {
                    TrackOrder::create([
                        'title'    => 'In Progress',
                        'order_id' => $order->id
                    ]);
                }

                if (!TrackOrder::whereOrderId($order->id)->whereTitle('Delivered')->exists()) {
                    TrackOrder::create([
                        'title'    => 'Delivered',
                        'order_id' => $order->id
                    ]);
                }

                if (!TrackOrder::whereOrderId($order->id)->whereTitle('Canceled')->exists()) {
                    TrackOrder::create([
                        'title'    => 'Canceled',
                        'order_id' => $order->id
                    ]);
                }
            }
        }

        if ($order->order_status == 'Delivered') {

            if (!TrackOrder::whereOrderId($order->id)->whereTitle('In Progress')->exists()) {
                TrackOrder::create([
                    'title'    => 'In Progress',
                    'order_id' => $order->id
                ]);
            }

            if (!TrackOrder::whereOrderId($order->id)->whereTitle('Delivered')->exists()) {
                TrackOrder::create([
                    'title'    => 'Delivered',
                    'order_id' => $order->id
                ]);
            }
        }
    }

    /**
     * Update promo code usage quantity.
     *
     * @param \App\Models\Order $order
     * @return void
    */
    public function setPromoCode($order)
    {
        $discount = json_decode($order->discount, true);
        if ($discount != null) {
            $code = PromoCode::find($discount['code']['id']);
            $code->no_of_times--;
            $code->update();
        }
    }

    public function deDuctFromStock($order)
    {
        $cart = json_decode($order->cart, true);
        // dd($cart);
        if ($cart != null) {
            foreach ($cart as $key => $prod) {
               $product = Item::find($prod['id']);
               $newStock = ($product->stock-$prod['qty']);
               $product->stock = $newStock;
               $product->save();
            }
            // $product = PromoCode::find($discount['code']['id']);
          
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
    */
    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->transaction->delete();

        if (Notification::where('order_id', $id)->exists()) {
            Notification::where('order_id', $id)->delete();
        }

        if (count($order->tracks_data) > 0) {
            foreach ($order->tracks_data as $track) {
                $track->delete();
            }
        }

        $order->delete();
        return redirect()->route('backend.order.index')->withSuccess(__('Order Deleted Successfully.'));
    }
}
