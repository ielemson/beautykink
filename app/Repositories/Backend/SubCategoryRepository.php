<?php

namespace App\Repositories\Backend;

use App\Models\Subcategory;

class SubCategoryRepository{

    /**
     * Store subcategory.
     *
     * @param \App\Http\Request\SubCategoryRequest $request
     * @return void
    */
    public function store($request)
    {
        $input = $request->all();
        Subcategory::create($input);
    }

    /**
     * Update subcategory.
     *
     * @param \App\Http\Requests\SubCategoryRequest $request
     * @return void
    */
    public function update($subcategory, $request)
    {
        $input = $request->all();
        $subcategory->update($input);
    }

    /**
     * Delete subcategory.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function delete($subcategory)
    {
        $subcategory->delete();
    }
}
