<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tax;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Highlight;
use App\Models\ChildCategory;
use App\Models\Gallery;
use App\Models\ItemHiglight;
use App\Models\Setting;
use Intervention\Image\Facades\Image;
use App\Repositories\Backend\ItemRepository;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\This;

use function PHPUnit\Framework\directoryExists;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication
     *
     * @param \App\Repositories\Backend\ItemRepository $repository
     * @return void
    */
    public function __construct(ItemRepository $repository)
    {
        $this->middleware('auth:admin');
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function add()
    {
        return view('backend.item.add');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $item_type = $request->has('item_type') ? ( $request->item_type ? $request->item_type : '' ) : '';
        $is_type = $request->has('is_type') ? ( $request->is_type ? $request->is_type : '' ) : '';
        $category_id = $request->has('category_id') ? ( $request->category_id ? $request->category_id : '' ) : '';
        $orderBy = $request->has('orderby') ? ( $request->orderby ? $request->orderby : 'desc' ) : 'desc';

        $datas = Item::
                    when($item_type, function($query, $item_type){
                        return $query->where('item_type', $item_type);
                    })
                    ->when($is_type, function($query, $is_type){
                        return $query->where('is_type', $is_type);
                    })
                    ->when($category_id, function($query, $category_id){
                        return $query->where('category_id', $category_id);
                    })
                    ->when($orderBy, function($query, $orderBy){
                        return $query->orderBy('id', $orderBy);
                    })
                    ->get();
        return view('backend.item.index', [
            'datas' => $datas,
            'categories' => Category::whereStatus(1)->get()
        ]);
    }

    /**
     * Return json data of subcategories for specific category.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function getSubcategory(Request $request)
    {
        if ($request->category_id) {
            $category = Category::findOrFail($request->category_id);
            $data = $category->subcategories;
        } else {
            $data = [];
        }

        return  response()->json([ 'data' => $data ], 200);
    }

    /**
     * Return json data of subcategories for specific category.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function getChildCategory(Request $request)
    {
        if ($request->subcategory_id) {
            $subcategory = Subcategory::find($request->subcategory_id);
            $data = $subcategory->childcategories;
        } else {
            $data = [];
        }

        return  response()->json([ 'data' => $data ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('backend.item.create', [
            'curr' => Currency::where('is_default', 1)->first(),
            'categories' => Category::whereStatus(1)->get(),
            'brands' => Brand::whereStatus(1)->get(),
            'taxes' => Tax::whereStatus(1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(ItemRequest $request)
    {
        // dd($request->all());
        $request->except('slug');
        $slug = strtolower($request->slug);
        $request->merge(['slug' => $slug]);
        // dd($request);
        $this->repository->store($request);
        return redirect()->route('backend.item.index')->withSuccess(__('New Product Added Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit(Item $item)
    {
        return view('backend.item.edit', [
            'item' => $item,
            'curr' => Currency::where('is_default', 1)->first(),
            'categories' => Category::whereStatus(1)->get(),
            'subcategories' => Subcategory::whereStatus(1)->where('category_id', $item->category_id)->get(),
            'childcategories' => ChildCategory::whereStatus(1)->where('subcategory_id', $item->subcategory_id)->get(),
            'brands' => Brand::whereStatus(1)->get(),
            'taxes' => Tax::whereStatus(1)->get(),
            'social_icons' => json_decode($item->social_icons, true),
            'social_links' => json_decode($item->social_links, true),
            'specification_name' => json_decode($item->specification_name, true),
            'specification_description' => json_decode($item->specification_description, true),
            'higlights' => Highlight::whereStatus(1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(ItemRequest $request, Item $item)
    {
        // dd($request->all());
        if($request->has('photo')){

            $image = $request->file('photo');
            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

            $galeryImg = Image::make($image)->resize(800, 800);
            $image_path = 'uploads/items/gallery/' . $image_name;
            Image::make($galeryImg)->save(public_path($image_path));

            $gallery = Gallery::where('item_id',$item->id)->first();

            if ($gallery->photo) {
                if (file_exists($gallery->photo)) {
                    unlink($gallery->photo);
                }
                $input['file'] = null;
            }

            $gallery->photo = $image_path;
            $gallery->save();
        }

        $request->except('slug');
        $slug = strtolower($request->slug);
        $request->merge(['slug' => $slug]);

        $this->repository->update($item, $request);

        return redirect()->route('backend.item.index')->withSuccess(__('Product Updated Successfully.'));
    }

    /**
     * Change the status of the specified resource.
     *
     * @param  int  $id
     * @param int $status
     * @return \Illuminate\Http\Response
    */
    public function status($id, $status)
    {
        Item::where('id', $id)->update([ 'status' => $status ]);
        return redirect()->route('backend.item.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $this->repository->delete($item);
        return redirect()->route('backend.item.index')->withSuccess(__('Product Deleted Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function galleries(Item $item)
    {
        return view('backend.item.galleries', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\GalleryRequest  $request
     * @return \Illuminate\Http\Response
    */
    public function galleriesUpdate(GalleryRequest $request)
    {
   
        
        if ($galleries = $request->file('galleries')) {  
        
            foreach ($galleries as $image) {
               
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $galeryImg = Image::make($image)->resize(800, 800);
                $image_path = 'uploads/items/gallery/' . $image_name;
                Image::make($galeryImg)->save(public_path($image_path));
                // array_push($images, $image_path);
                $gallery = new Gallery;
                $gallery->item_id = $request->item_id;
                $gallery->photo = $image_path;
                $gallery->save();
            }

            return redirect()->back()->withSuccess(__('Successfully uploaded.'));

        }

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function galleryDelete($gallery_id)
    {
        $gallery = Gallery::findOrFail($gallery_id);
        $this->repository->galleryDelete($gallery);
        return redirect()->back()->withSuccess(__('Successfully Deleted From Gallery.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function highlight(Item $item)
    {
        // dd(ItemHiglight::where('item_id',$item->id)->pluck('highlight_id')->toArray());
        return view('backend.item.higlight.index', [
            'item' => $item,
            'higlights' => Highlight::where('status',1)->get(),
            'itemhiglights_ids' => ItemHiglight::where('item_id',$item->id)->pluck('highlight_id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function highlightUpdate(Item $item, Request $request)
    {
        $this->repository->highlight($item, $request);
        return redirect()->route('backend.item.index')->withSuccess(__('Product Updated Successfully.'));
    }


    // ---------------- DIGITAL PRODUCT START ---------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function digitalItemCreate()
    {
        return view('backend.item.digital.create', [
            'curr' => Currency::where('is_default', 1)->first(),
            'categories' => Category::whereStatus(1)->get(),
            'brands' => Brand::whereStatus(1)->get(),
            'taxes' => Tax::whereStatus(1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ItemRequest  $request
     * @return \Illuminate\Http\Response
    */
    public function digitalItemStore(Request $request)
    {
        $this->repository->store($request);
        return redirect()->route('backend.item.index')->withSuccess(__('New Product Added Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function digitalItemEdit($id)
    {
        $item = Item::findOrFail($id);

        return view('backend.item.digital.edit', [
            'item' => $item,
            'curr' => Currency::where('is_default', 1)->first(),
            'categories' => Category::whereStatus(1)->get(),
            'subcategories' => Subcategory::whereStatus(1)->where('category_id', $item->category_id)->get(),
            'childcategories' => ChildCategory::whereStatus(1)->where('subcategory_id', $item->subcategory_id)->get(),
            'brands' => Brand::whereStatus(1)->get(),
            'taxes' => Tax::whereStatus(1)->get(),
            'social_icons' => json_decode($item->social_icons, true),
            'social_links' => json_decode($item->social_links, true),
            'specification_name' => json_decode($item->specification_name, true),
            'specification_description' => json_decode($item->specification_description, true),
        ]);
    }

    // ---------------- LICENSE PRODUCT START ---------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function licenseItemCreate()
    {
        return view('backend.item.license.create', [
            'curr' => Currency::where('is_default', 1)->first(),
            'categories' => Category::whereStatus(1)->get(),
            'brands' => Brand::whereStatus(1)->get(),
            'taxes' => Tax::whereStatus(1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ItemRequest  $request
     * @return \Illuminate\Http\Response
    */
    public function licenseItemStore(ItemRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('backend.item.index')->withSuccess(__('New Product Added Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function licenseItemEdit($id)
    {
        $item = Item::findOrFail($id);

        return view('backend.item.license.edit', [
            'item' => $item,
            'curr' => Currency::where('is_default', 1)->first(),
            'categories' => Category::whereStatus(1)->get(),
            'subcategories' => Subcategory::whereStatus(1)->where('category_id', $item->category_id)->get(),
            'childcategories' => ChildCategory::whereStatus(1)->where('subcategory_id', $item->subcategory_id)->get(),
            'brands' => Brand::whereStatus(1)->get(),
            'taxes' => Tax::whereStatus(1)->get(),
            'social_icons' => json_decode($item->social_icons, true),
            'social_links' => json_decode($item->social_links, true),
            'specification_name' => json_decode($item->specification_name, true),
            'specification_description' => json_decode($item->specification_description, true),
            'license_name' => json_decode($item->license_name, true),
            'license_key' => json_decode($item->license_key, true)
        ]);
    }

    public function clone($item_id){
    $item = Item::find($item_id);
    $replicated = $item->replicate();
    $replicated->slug = $replicated->slug.'-copy';
    $replicated->name = $replicated->name.'-copy';
    $replicated->status = false;
    $replicated->created_at = Carbon::now();
    $replicated->save();

    // get current photo gallery
    $photoGallery = Gallery::where('item_id',$item_id)->first();
    $galleryImg = new Gallery;
    $galleryImg->item_id = $replicated->id;
    $galleryImg->photo = $photoGallery->photo;
    $galleryImg->save();

    return redirect()->route('backend.item.index')->withSuccess(__('Product cloned Successfully.'));

    }

    public function stock(){

        $data = Setting::first();
        $datas = Item::where('stock' , '<', $data->item_stock_limit)->get();
        return view('backend.item.stock',['datas'=>$datas]);
        
    }

    
    public function highlightStore(Request $request){
        // return $request->all();
        foreach ($request->highlight_id as $key => $id) {
            $highlightProduct = new ItemHiglight();
            $highlightProduct->highlight_id = $id;
            $highlightProduct->item_id = $request->product_id;
            $highlightProduct->save();
        }
        return redirect()->route('backend.item.index')->withSuccess(__('Prouct atttached to highlight Successfully.'));

    }
    public function highlightItemUpdate(Request $request,$id){
        // return ItemHiglight::where('item_id',$id)->get();
        // dd($id);
        foreach ($request->highlight_id as $key => $id) {
            ItemHiglight::where('highlight_id',$id)->delete();
            // $highlightProduct->highlight_id = $id;
            // $highlightProduct->item_id = $request->product_id;
            // $highlightProduct->save();
        }
        return redirect()->route('backend.item.index')->withSuccess(__('Prouct detttached from highlight Successfully.'));

    }

}
