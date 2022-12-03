<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoCodeRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Item;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication.
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
        return view('backend.code.index', [
            'datas' => PromoCode::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categories = Category::where('status',1)->get();
        $items = Item::where('status',1)->get();
        return view('backend.code.create',compact('categories','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response
    */
    public function store(PromoCodeRequest $request)
    {
        // dd($request);

        $curr = Currency::where('is_default', 1)->first();
        $input = $request->all();
        if ($input['type'] == 'amount') {
            $input['discount'] = $input['discount'] / $curr->value;
        }
        // dd($request->all());
        if($request->no_of_times_per_user != null && $request->customer_login == 0){
            return redirect()->route('backend.code.create')->withError(__('To enable No of times per user, please enable customer login.'));
        }
        $input['category'] = json_encode($request->category, true);
        $input['product'] = json_encode($request->product, true);

        PromoCode::create($input);
        return redirect()->route('backend.code.index')->withSuccess(__('Coupon Code Added Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
    
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function edit(PromoCode $code)
    {
        $curr = Currency::where('is_default', 1)->first();
        $categories = Category::where('status',1)->get();
        $items = Item::where('status',1)->get();
        // dd($code);
        return view('backend.code.edit', compact('code', 'curr','items','categories'));
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
        PromoCode::find($id)->update([ 'status' => $status ]);
        return redirect()->route('backend.code.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function update(PromoCodeRequest $request, PromoCode $code)
    {
        $curr = Currency::where('is_default', 1)->first();
        $input = $request->all();
        if ($input['type'] == 'amount') {
            $input['discount'] = $input['discount'] / $curr->value;
        }
        $input['category'] = json_encode($request->category, true);
        $input['product'] = json_encode($request->product, true);
        // dd($input);

        $code->update($input);
        return redirect()->route('backend.code.index')->withSuccess(__('Promo Code Updated Successfully.'));
    }

    /**
     * Remove the specified resrouce from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $code = PromoCode::findOrFail($id);
        $code->delete();
        return redirect()->route('backend.code.index')->withSuccess(__('Promo Code Deleted Successfully.'));
    }
}
