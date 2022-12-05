<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\GeoZone;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeoZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = GeoZone::all();
        return view('backend.geozone.index',compact('datas'));
    }

    public function country()
    {
        $states = State::all();
        return view('backend.geozone.country',compact('states'));
    }

    public function store_country(Request $request){

        $country = new Country;
        $country->name = $request->country;
        $country->save();
        // DB::table('states')->update(['country_id' => $country->id]);
        return redirect()->route('backend.geozone.index')->withSuccess(__('Country added.'));
        
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
        return view('backend.geozone.create',compact('states','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $geozone = new GeoZone;
        $request->except('state_ids');
        $state_ids = json_encode($request->state_ids,true);
        $request->merge(['state_ids' => $state_ids]);
        // dd($request->all());
       $geozone->zone = $request->zone;
       $geozone->country_id = $request->country_id;
       $geozone->state_ids = $request->state_ids;
       $geozone->shipping_status = $request->shipping_status;
       $geozone->status = $request->status;
       $geozone->shipping_cost = $request->shipping_cost;
       $geozone->status = 0;
       $geozone->save();
       return redirect()->route('backend.geozone.index')->withSuccess(__('Shipping Zone added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $states = State::all();
        $countries = Country::all();
        return view('backend.geozone.index',compact('states','countries'));
    }

    public function status($id, $status)
    {
        GeoZone::find($id)->update([ 'status' => $status ]);
        return redirect()->route('backend.geozone.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $geozone = GeoZone::find($id);
        $states = State::all();
        $countries = Country::all();
        return view('backend.geozone.edit',compact('geozone','states','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $geozone = GeoZone::find($id);
        $request->except('state_ids');
        $state_ids = json_encode($request->state_ids,true);
        $request->merge(['state_ids' => $state_ids]);
        // dd($request->all());
       $geozone->zone = $request->zone;
       $geozone->country_id = $request->country_id;
       $geozone->state_ids = $request->state_ids;
       $geozone->shipping_status = $request->shipping_status;
       $geozone->status = $request->status;
       $geozone->shipping_cost = $request->shipping_cost;
       $geozone->status = 0;
       $geozone->save();
       return redirect()->route('backend.geozone.index')->withSuccess(__('Shipping Zone updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = GeoZone::findOrFail($id);
        $code->delete();
        return redirect()->route('backend.geozone.index')->withSuccess(__('Geozone Deleted Successfully.'));
    }
}
