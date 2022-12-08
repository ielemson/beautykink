<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\GeoZone;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

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
        $countries = Country::all();
        return view('backend.geozone.country',compact('states','countries'));
    }

    public function store_country(Request $request){
     
         $country = new Country;
        $country->name = $request->country;
        $country->save();
        return redirect()->route('backend.geozone.index')->withSuccess(__('Country added successfully.'));
        
    }

    public function update_country(Request $request){
    // dd($request->all());
    $country = Country::find($request->country_id);
    $country->name = $request->name;
    $country->save();
    return redirect()->back()->withSuccess(__('Country Updated successfully'));
    }

    public function country_state_bind(Request $request){
        // dd($request->all());
        // if(State::whereIn('country_id',$request->state_id)->exists()){
        // return redirect()->back()->withError(__('thses States already bound to this country'));

        // }
        foreach ($request->state_id as $id) { 
            $state = State::where('id',$id)->first();
            $state->country_id = $request->country_id;
            $state->save(); 
        }
        return redirect()->back()->withSuccess(__('Country bind successfull'));

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
    

    // State Functions

    public function state(){
        $states = State::all();
        $countries = Country::all();
        return view('backend.geozone.state',compact('countries','states'));
    }

    public function store_state(Request $request){

        if(State::where('name',$request->name)->exists()){

       return redirect()->back()->withError(__('State already exist.'));

        }

       $state = new State;
       $state->name = $request->name;
       $state->country_id = $request->country_id;
       $state->save();

       return redirect()->back()->withSuccess(__('State created successfully.'));

    }

    public function destroy_country(Request $request){
        // dd($request->all());
        
        if(State::where('country_id',$request->country_id)->exists()){
            return redirect()->back()->withError(__('Country cannot be deleted, unbind from state first'));
        }
        
        Country::find($request->country_id)->delete();
        // $country->delete();
        return redirect()->back()->withSuccess(__('Country deleted successfully.'));

    }
}
