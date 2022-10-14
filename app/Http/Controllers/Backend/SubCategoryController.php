<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Repositories\Backend\SubCategoryRepository;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication
     *
     * @param \App\Repositories\Backend\SubCategoryRepository $repository
     * @return void
     *
    */
    public function __construct(SubCategoryRepository $repository)
    {
        $this->middleware('auth:admin');

        $this->repository = $repository;
    }

    /**
     * Dispaly a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('backend.subcategory.index', [
            'datas' => Subcategory::with('category')->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('backend.subcategory.create', [
            'categories' => Category::orderBy('id', 'desc')->whereStatus(1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function store(SubCategoryRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('backend.subcategory.index')->withSuccess(__('New Subcategory Added Successfully.'));
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
        Subcategory::find($id)->update(['status' => $status]);
        return redirect()->route('backend.subcategory.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param in $id
     * @return \Illuminate\Http\Response
    */
    public function edit(Subcategory $subcategory)
    {
        return view('backend.subcategory.edit', [
            'subcategory' => $subcategory,
            'categories' => Category::whereStatus(1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function update(SubCategoryRequest $request, Subcategory $subcategory)
    {
        $this->repository->update($subcategory, $request);
        return redirect()->route('backend.subcategory.index')->withSuccess(__('Subcategory Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $this->repository->delete($subcategory);
        return redirect()->route('backend.subcategory.index')->withSuccess(__('Subcategory Deleted Successfully.'));
    }
}
