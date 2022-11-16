<?php

namespace App\Repositories\Backend;

use App\Helpers\ImageHelper;
use App\Models\ChildCategory;

class ChildCategoryRepository {

    /**
     * Store childcategory.
     *
     * @param \App\Http\Requests\ChildCategoryRequest $request
     * @return void
    */
    public function store($request)
    {
        $input = $request->all();
        $input['slug'] = strtolower($input['slug']);
        $input['photo'] = ImageHelper::handleUploadedImage($request->file('photo'), 'uploads/categories');
        ChildCategory::create($input);
    }

    /**
     * Update childcategory.
     *
     * @param \App\Http\Requests\ChildCategoryRequest $request
     * @return void
    */
    public function update($childcategory, $request)
    {
        $input = $request->all();
        $input['slug'] = strtolower($input['slug']);
        if($file = $request->file('photo')){
            $input['photo'] = ImageHelper::handleUpdatedUploadedImage($file, 'uploads/categories', $childcategory, 'photo');
        }
        $childcategory->update($input);
    }

    /**
     * Delete childcategory.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function delete($childcategory)
    {
        $childcategory->delete();
    }
}
