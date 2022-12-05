<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingServiceRequest;
use App\Models\Currency;
use App\Models\ShippingService;
use App\Models\{Country, State, City, GeoZone};
use Illuminate\Http\Request;

class ShippingServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $datas = ShippingService::orderBy('id', 'desc')->get();
        return view('backend.shipping.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $data['zones'] = GeoZone::where('status',1)->get(["zone", "id"]);
        $data['countries'] = Country::get(["name", "id"]);
        // dd($data);
        return view('backend.shipping.create',$data);
    }

    // public function fetchCountry(Request $request)
    // {
    //     $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
    //     return response()->json($data);
    // }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchZones(Request $request)
    {
        $data['cities'] = GeoZone::where("id",$request->zone_id)->first();
        $state_ds = json_decode($data['cities']['state_ids']);
        $states = State::whereIn('id',$state_ds)->get();
        return response()->json([
            'states'=>$states,
            'cost'=>$data['cities']['shipping_cost']
        ]);
    }

    public function fetchShippingZones(Request $request)
    {
        $zones = GeoZone::where("country_id",$request->country_id)->get();
        // $state_ds = json_decode($data['cities']['state_ids']);
        // $states = State::whereIn('id',$state_ds)->get();
        return response()->json([
            'zones'=>$zones,
            // 'cost'=>$data['cities']['shipping_cost']
        ]);
    }
    /**
     * Store a newly created resrouce in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function store(ShippingServiceRequest $request)
    {
        $input = $request->all();
        // $curr = Currency::where('is_default', 1)->first();
        // $input['price'] = $request->price / $curr->value;

        ShippingService::create($input);

        return redirect()->route('backend.shipping.index')->withSuccess(__('New Shipping Service Added Successfully.'));
    }

    /**
     * Show the form for editing for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function edit(ShippingService $shipping)
    {
        $zones = GeoZone::where('status',1)->get(["zone", "id"]);
        $countries = Country::get(["name", "id"]);
        return view('backend.shipping.edit', compact('shipping','zones','countries'));
    }

    /**
     * Change the status for editing the specified resource.
     *
     * @param int $id
     * @param int $status
     * @return \Illuminate\Http\Response
    */
    public function status($id, $status)
    {
        ShippingService::find($id)->update([ 'status' => $status ]);
        ShippingService::where('id', '==', $id)->update([ 'status' => 0 ]);

        return redirect()->route('backend.shipping.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function update(ShippingServiceRequest $request, ShippingService $shipping)
    {
        $input = $request->all();
        // $curr = Currency::where('is_default', 1)->first();
        // $input['price'] = $request->price / $curr->value;

        $shipping->update($input);

        return redirect()->route('backend.shipping.index')->withSuccess(__('Shipping Service Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $shipping = ShippingService::findOrFail($id);
        $shipping->delete();

        return redirect()->route('backend.shipping.index')->withSuccess(__('Shipping Service Deleted Successfully.'));
    }
}
