<?php

namespace App\Repositories\Backend;

use App\Helpers\ImageHelper;
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
        $input['photo'] = ImageHelper::handleUploadedImage($request->file('photo'), 'uploads/categories');
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
        if($file = $request->file('photo')){
            $input['photo'] = ImageHelper::handleUpdatedUploadedImage($file, 'uploads/categories', $subcategory, 'photo');
        }
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
