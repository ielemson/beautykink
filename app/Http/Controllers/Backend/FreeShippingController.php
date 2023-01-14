<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\FreeShipping;
use App\Models\State;
use Illuminate\Http\Request;

class FreeShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = FreeShipping ::all();
        return view('backend.freeshipping.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $countries = Country::all();
        return view('backend.freeshipping.create',compact('states','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        FreeShipping::create($request->all());
        
        return redirect()->route('backend.freeshipping.index')->withSuccess(__('New Free Shipping Added Successfully.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FreeShipping  $freeShipping
     * @return \Illuminate\Http\Response
     */
    public function show(FreeShipping $freeShipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FreeShipping  $freeShipping
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FreeShipping::where('id',$id)->first();
        $countries = Country::all();
        $states = State::all();
        return view('backend.freeshipping.edit',compact('data','countries','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FreeShipping  $freeShipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $data = FreeShipping::find($id);
        $data->update($request->all());
        return redirect()->route('backend.freeshipping.index')->withSuccess(__('Free Shipping Updated Successfully.'));
    }

    public function status($id, $status)
    {
        // return $id.'-'.$status;
        FreeShipping::findOrFail($id)->update(['is_status' => $status]);
        return redirect()->route('backend.freeshipping.index')->withSuccess(__('Data Updated Successfully.'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FreeShipping  $freeShipping
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FreeShipping::find($id)->delete();
        return redirect()->back()->withSuccess("Free shipping data removed");
    }
}
