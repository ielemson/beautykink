<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomerMessages;
use Illuminate\Http\Request;

class CustomerMessagesController extends Controller
{
    public function restock_message(){

        $data = CustomerMessages::first();
        return view('backend.customer_messages.restock.create',compact('data'));
    }

    public function order_message(){

        $data = CustomerMessages::first();
        return view('backend.customer_messages.order.create',compact('data'));
    }


    public function restock_message_store(Request $request){ 
        $message = CustomerMessages::first();
        $data =  $request->all();
        // dd($request->all());
    
        $message->update($data);

        return redirect()->back()->withSuccess(__('Data Created Successfully'));
    }

    public function order_message_store(Request $request){ 
        $message = CustomerMessages::first();
        $data =  $request->all();
        // dd($request->all());
    
        $message->update($data);

        return redirect()->back()->withSuccess(__('Data Created Successfully'));
    }
}

