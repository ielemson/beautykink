<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildCategoryRequest;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Subcategory;
use App\Repositories\Backend\ChildCategoryRepository;

class ChildCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Backend\ChildCategoryRepository  $repository
     * @return void
    */
    public function __construct(ChildCategoryRepository $repository)
    {
        $this->middleware('auth:admin');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('backend.childcategory.index', [
            'datas' => ChildCategory::with('category')->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('backend.childcategory.create', [
            'categories' => Category::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function store(ChildCategoryRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('backend.childcategory.index')->withSuccess(__('New Childcategory Added Successfully.'));
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
        ChildCategory::find($id)->update(['status' => $status]);
        return redirect()->route('backend.childcategory.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Show the form editing the specified resouce.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function edit(ChildCategory $childcategory)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = Subcategory::orderBy('id', 'desc')->whereCategoryId($childcategory->category_id)->get();
        return view('backend.childcategory.edit', compact('childcategory', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function update(ChildCategoryRequest $request, ChildCategory $childcategory)
    {
        $this->repository->update($childcategory, $request);
        return redirect()->route('backend.childcategory.index')->withSuccess(__('Childcategory Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $childcategory = ChildCategory::findOrFail($id);
        $this->repository->delete($childcategory);
        return redirect()->route('backend.childcategory.index')->withSuccess(__('Childcategory Deleted Successfully.'));

    }
}
