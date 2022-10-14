<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\HomeCustomize;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listin of resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data = HomeCustomize::first();
        return view('backend.homepage.index', [
            'first_banner' => json_decode($data->banner_first, true),
            'second_banner' => json_decode($data->banner_secend, true),
            'third_banner' => json_decode($data->banner_third, true),
            'popular_category' => json_decode($data->popular_category, true),
            'two_column_category' => json_decode($data->two_column_category, true),
            'feature_category' => json_decode($data->feature_category, true),
            'home4_banner' => json_decode($data->home_page4, true),
            'home_4_popular_category' => json_decode($data->home_4_popular_category, true),
            'categories' => Category::whereStatus(1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function firstBannerUpdate(Request $request)
    {
        $request->validate([
            'img1'      => 'image',
            'img2'      => 'image',
            'img3'      => 'image',
            'firsturl1' => 'required|max:200',
            'firsturl2' => 'required|max:200',
            'firsturl3' => 'required|max:200',
        ]);

        $all_images_names = [ 'img1', 'img2', 'img3' ];
        $input = $request->all();
        foreach ($all_images_names as $single_image) {
            if ($request->hasFile($single_image)) {
                $data = HomeCustomize::first();
                $check = json_decode($data->banner_first, true);
                $input[$single_image] = ImageHelper::handleUploadedImage($request->$single_image, 'uploads/banners', $check[$single_image]);
            }
        }

        unset($input['_token']);
        $data = HomeCustomize::first();

        foreach (json_decode($data->banner_first, true) as $key => $value) {
            if (isset($input[$key])) {
                $input[$key] = $input[$key];
            } else {
                $input[$key] = $value;
            }
        }

        $data->banner_first = json_encode($input, true);
        $data->update();
        return redirect()->back()->withSuccess(__('Banner Update Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function secondBannerUpdate(Request $request)
    {
        $request->validate([
            'img1'      => 'image',
            'img2'      => 'image',
            'img3'      => 'image',
            'url1' => 'required|max:200',
            'url2' => 'required|max:200',
            'url3' => 'required|max:200',
        ]);

        $all_images_names = [ 'img1', 'img2', 'img3' ];
        $input = $request->all();
        foreach ($all_images_names as $single_image) {
            if ($request->hasFile($single_image)) {
                $data = HomeCustomize::first();
                $check = json_decode($data->banner_secend, true);
                $input[$single_image] = ImageHelper::handleUploadedImage($request->$single_image, 'uploads/banners', $check[$single_image]);
            }
        }

        unset($input['_token']);
        $data = HomeCustomize::first();

        foreach (json_decode($data->banner_secend, true) as $key => $value) {
            if (isset($input[$key])) {
                $input[$key] = $input[$key];
            } else {
                $input[$key] = $value;
            }
        }

        $data->banner_secend = json_encode($input, true);
        $data->update();
        return redirect()->back()->withSuccess(__('Banner Update Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function thirdBannerUpdate(Request $request)
    {
        $request->validate([
            'img1'      => 'image',
            'img2'      => 'image',
            'url1' => 'required|max:200',
            'url2' => 'required|max:200',
        ]);

        $all_images_names = [ 'img1', 'img2' ];
        $input = $request->all();
        foreach ($all_images_names as $single_image) {
            if ($request->hasFile($single_image)) {
                $data = HomeCustomize::first();
                $check = json_decode($data->banner_third, true);
                $input[$single_image] = ImageHelper::handleUploadedImage($request->$single_image, 'uploads/banners', $check[$single_image]);
            }
        }

        unset($input['_token']);
        $data = HomeCustomize::first();

        foreach (json_decode($data->banner_third, true) as $key => $value) {
            if (isset($input[$key])) {
                $input[$key] = $input[$key];
            } else {
                $input[$key] = $value;
            }
        }

        $data->banner_third = json_encode($input, true);
        $data->update();
        return redirect()->back()->withSuccess(__('Banner Update Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function popularCategoryUpdate(Request $request)
    {
        $request->validate([
            'popular_title' => 'required|max:255'
        ]);

        $input = $request->all();
        unset($input['_token']);
        $data = HomeCustomize::first();
        $data->popular_category = json_encode($input, true);
        $data->update();
        return redirect()->back()->withSuccess(__('Popular Category Update Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function twoColumnCategoryUpdate(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $data = HomeCustomize::first();
        $data->two_column_category = json_encode($input, true);
        $data->update($input);
        return redirect()->back()->withSuccess(__('Two Column Category Update Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function featureCategoryUpdate(Request $request)
    {
        $request->validate([
            'feature_title' => 'required|max:255'
        ]);

        $input = $request->all();
        unset($input['_token']);
        $data = HomeCustomize::first();
        $data->feature_category = json_encode($input, true);
        $data->update($input);
        return redirect()->back()->withSuccess(__('Feature Category Update Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function homepage4BannerUpdate(Request $request)
    {
        $request->validate([
            'img1'      => 'image',
            'img2'      => 'image',
            'img3'      => 'image',
            'img4'      => 'image',
            'img5'      => 'image',
            'url1' => 'required|max:200',
            'url2' => 'required|max:200',
            'url3' => 'required|max:200',
            'url4' => 'required|max:200',
            'url5' => 'required|max:200',
            'label1' => 'required|max:200',
            'label2' => 'required|max:200',
            'label3' => 'required|max:200',
            'label4' => 'required|max:200',
            'label5' => 'required|max:200',
        ]);

        $all_images_names = [ 'img1', 'img2', 'img3', 'img4', 'img5' ];
        $input = $request->all();
        foreach ($all_images_names as $single_image) {
            if ($request->hasFile($single_image)) {
                $data = HomeCustomize::first();
                $check = json_decode($data->home_page4, true);
                $input[$single_image] = ImageHelper::handleUploadedImage($request->$single_image, 'uploads/banners', $check[$single_image]);
            }
        }

        unset($input['_token']);
        $data = HomeCustomize::first();
        if (!$data->home_page4) {
            $data->home_page4 = json_encode($input, true);
            $data->update();
        } else {
            foreach (json_decode($data->home_page4, true) as $key => $value) {
                if (isset($input[$key])) {
                    $input[$key] = $input[$key];
                } else {
                    $input[$key] = $value;
                }
            }

            $data->home_page4 = json_encode($input, true);
            $data->update();
        }

        return redirect()->back()->withSuccess(__('Banner Update Successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function homepage4CategoryUpdate(Request $request)
    {
        $category = json_encode($request->home_4_popular_category, true);
        $data = HomeCustomize::first();
        $data->home_4_popular_category = $category;
        $data->update();
        return redirect()->back()->withSuccess(__('Banner Update Successfully.'));
    }
}
