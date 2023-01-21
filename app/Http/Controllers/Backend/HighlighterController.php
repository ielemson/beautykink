<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Highlight;
use Illuminate\Http\Request;

class HighlighterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Highlight::all();
        return view('backend.highlight.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.highlight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
      $data = new Highlight();
      $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        // return $data;
        return redirect()->route('backend.highlight.index')->withSuccess(__('Product Higlight Created Successfuly.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Highlight::where('id',$id)->first();
        return view('backend.highlight.edit',compact('data'));
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
             // dd($request->all());
        $data = Highlight::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        // return $data;
        return redirect()->route('backend.highlight.index')->withSuccess(__('Product Higlight Updated Successfuly.'));
    }

    public function status($id, $status)
    {
        Highlight::findOrFail($id)->update(['status' => $status]);
        return redirect()->route('backend.highlight.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Highlight::findOrFail($id);
        $faq->delete();
        return redirect()->route('backend.highlight.index')->withSuccess(__('Product Higlight Deleted Successfully.'));
    }
}
