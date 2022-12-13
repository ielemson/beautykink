<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ShippingMethod::all();
        return view('backend.shipping_method.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.shipping_method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ShippingMethod::create($request->all());
        return redirect()->route('backend.shippingmethod.index')->withSuccess(__('New Shipping Method Added Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shipping_method  $shipping_method
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingMethod  $ShippingMethod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = ShippingMethod::where('id',$id)->first();
       return view('backend.shipping_method.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingMethod  $ShippingMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = ShippingMethod::find($id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->save();
        return redirect()->route('backend.shippingmethod.index')->withSuccess(__('Shipping Method Updated Successfully.'));
    }

    public function status($id, $status)
    {
        ShippingMethod::find($id)->update([ 'status' => $status ]);
        return redirect()->route('backend.shippingmethod.index')->withSuccess(__('Status Updated Successfully.'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shipping_method  $shipping_method
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = ShippingMethod::findOrFail($id);
        $shipping->delete();

        return redirect()->route('backend.shippingmethod.index')->withSuccess(__('Shipping Method Deleted Successfully.'));
    }
}
