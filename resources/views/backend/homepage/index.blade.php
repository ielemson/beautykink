@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Home Page') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              @include('alerts.alerts')
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5 col-sm-3">
                      <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">{{ __('3 column banner First') }}</a>

                        {{-- <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">{{ __('Popular Categories') }}</a> --}}

                        {{-- <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">{{ __('3 column banner Second') }}</a> --}}

                        {{-- <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">{{ __('Two column category') }}</a> --}}

                        {{-- <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false">{{ __('Featured Categories') }}</a> --}}

                        {{-- <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#tab6" role="tab" aria-controls="tab6" aria-selected="false">{{ __('2 column banner') }}</a> --}}

                        {{-- <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#tab7" role="tab" aria-controls="tab7" aria-selected="false">{{ __('Home Page 4 Banner 5 Column') }}</a> --}}

                        {{-- <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#tab8" role="tab" aria-controls="tab8" aria-selected="false">{{ __('Home Page 4 Popular Categories') }}</a> --}}

                      </div>
                    </div>
                    <div class="col-7 col-sm-9">
                      <div class="tab-content" id="vert-tabs-tabContent">

                        <div class="tab-pane text-left fade show active" id="tab1" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <form action="{{ route('backend.first.banner.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Image 1') }} *</label>
                                        <br>
                                        <img src="{{ $first_banner['img1'] ? asset($first_banner['img1']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img1" class="custom-file-input upload-photo" id="img1" aria-label="File browser">
                                            <label class="custom-file-label" for="img1">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Image 2') }} *</label>
                                        <br>
                                        <img src="{{ $first_banner['img2'] ? asset($first_banner['img2']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img2" class="custom-file-input upload-photo" id="img2" aria-label="File browser">
                                            <label class="custom-file-label" for="img2">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Image 3') }} *</label>
                                        <br>
                                        <img src="{{ $first_banner['img3'] ? asset($first_banner['img3']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img3" class="custom-file-input upload-photo" id="img3" aria-label="File browser">
                                            <label class="custom-file-label" for="img3">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="firsturl1">{{ __('URL 1') }} *</label>
                                        <input type="text" name="firsturl1" class="form-control " id="firsturl1" placeholder="{{ __('Enter Banner Url') }}" value="{{ $first_banner['firsturl1'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="firsturl2">{{ __('URL 2') }} *</label>
                                        <input type="text" name="firsturl2" class="form-control " id="firsturl2" placeholder="{{ __('Enter Banner Url') }}" value="{{ $first_banner['firsturl2'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="firsturl3">{{ __('URL 3') }} *</label>
                                        <input type="text" name="firsturl3" class="form-control " id="firsturl3" placeholder="{{ __('Enter Banner Url') }}" value="{{ $first_banner['firsturl3'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                            <form action="{{ route('backend.popular.category.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="popular_title">{{ __('Section Title') }} *</label>
                                        <input type="text" name="popular_title" class="form-control " id="popular_title" placeholder="{{ __('Popular Category Section Title') }}" value="{{ $popular_category['popular_title'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 1 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="category_id1">{{ __('Select Category') }} *</label>
                                        <select name="category_id1" id="category_id1" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $popular_category['category_id1'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="subcategory_id1">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id1" id="subcategory_id1" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id', $popular_category['category_id1'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $popular_category['subcategory_id1'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="childcategory_id1">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id1" id="childcategory_id1" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$popular_category['category_id1'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $popular_category['childcategory_id1'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 2 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="category_id2">{{ __('Select Category') }} *</label>
                                        <select name="category_id2" id="category_id2" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $popular_category['category_id2'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="subcategory_id2">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id2" id="subcategory_id2" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$popular_category['category_id2'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $popular_category['subcategory_id2'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="childcategory_id2">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id2" id="childcategory_id2" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$popular_category['category_id2'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $popular_category['childcategory_id2'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 3 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="category_id3">{{ __('Select Category') }} *</label>
                                        <select name="category_id3" id="category_id3" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $popular_category['category_id3'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="subcategory_id3">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id3" id="subcategory_id3" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$popular_category['category_id3'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $popular_category['subcategory_id3'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="childcategory_id3">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id3" id="childcategory_id3" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$popular_category['category_id3'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $popular_category['childcategory_id3'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 4 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="category_id4">{{ __('Select Category') }} *</label>
                                        <select name="category_id4" id="category_id4" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $popular_category['category_id4'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="subcategory_id4">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id4" id="subcategory_id4" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$popular_category['category_id4'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $popular_category['subcategory_id4'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="childcategory_id4">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id4" id="childcategory_id4" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$popular_category['category_id4'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $popular_category['childcategory_id4'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                  <div class="col-md-2"></div>
                                  <div class="form-group  col-md-8">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                            <form action="{{ route('backend.second.banner.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Image 1') }} *</label>
                                        <br>
                                        <img src="{{ $second_banner['img1'] ? asset($second_banner['img1']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img1" class="custom-file-input upload-photo" id="img1" aria-label="File browser">
                                            <label class="custom-file-label" for="img1">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Image 2') }} *</label>
                                        <br>
                                        <img src="{{ $second_banner['img2'] ? asset($second_banner['img2']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img2" class="custom-file-input upload-photo" id="img2" aria-label="File browser">
                                            <label class="custom-file-label" for="img2">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Image 3') }} *</label>
                                        <br>
                                        <img src="{{ $second_banner['img3'] ? asset($second_banner['img3']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img3" class="custom-file-input upload-photo" id="img3" aria-label="File browser">
                                            <label class="custom-file-label" for="img3">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url1">{{ __('URL 1') }} *</label>
                                        <input type="text" name="url1" class="form-control " id="url1" placeholder="{{ __('Enter Banner Url') }}" value="{{ $second_banner['url1'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url2">{{ __('URL 2') }} *</label>
                                        <input type="text" name="url2" class="form-control " id="url2" placeholder="{{ __('Enter Banner Url') }}" value="{{ $second_banner['url2'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url3">{{ __('URL 3') }} *</label>
                                        <input type="text" name="url3" class="form-control " id="url3" placeholder="{{ __('Enter Banner Url') }}" value="{{ $second_banner['url3'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.two.column.category.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 1 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="column_category_id1">{{ __('Select Category') }} *</label>
                                        <select name="category_id1" id="column_category_id1" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $two_column_category['category_id1'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="cloumn_subcategory_id1">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id1" id="cloumn_subcategory_id1" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$two_column_category['category_id1'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $two_column_category['subcategory_id1'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="cloumn_childcategory_id1">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id1" id="cloumn_childcategory_id1" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$two_column_category['category_id1'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $two_column_category['childcategory_id1'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 2 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="column_category_id2">{{ __('Select Category') }} *</label>
                                        <select name="category_id2" id="column_category_id2" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $two_column_category['category_id2'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="cloumn_subcategory_id2">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id2" id="cloumn_subcategory_id2" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$two_column_category['category_id2'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $two_column_category['subcategory_id2'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="cloumn_childcategory_id2">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id2" id="cloumn_childcategory_id2" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$two_column_category['category_id2'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $two_column_category['childcategory_id2'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                  <div class="col-md-2"></div>
                                  <div class="form-group  col-md-8">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.feature.category.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="feature_title">{{ __('Section Title') }} *</label>
                                        <input type="text" name="feature_title" class="form-control " id="feature_title" placeholder="{{ __('Feture Category') }}" value="{{ $feature_category['feature_title'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 1 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_category_id1">{{ __('Select Category') }} *</label>
                                        <select name="category_id1" id="feature_category_id1" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $popular_category['category_id1'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_subcategory_id1">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id1" id="feature_subcategory_id1" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$feature_category['category_id1'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $popular_category['subcategory_id1'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_childcategory_id1">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id1" id="feature_childcategory_id1" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$feature_category['category_id1'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $popular_category['childcategory_id1'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 2 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_category_id2">{{ __('Select Category') }} *</label>
                                        <select name="category_id2" id="feature_category_id2" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $popular_category['category_id2'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_subcategory_id2">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id2" id="feature_subcategory_id2" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$feature_category['category_id2'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $popular_category['subcategory_id2'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_childcategory_id2">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id2" id="feature_childcategory_id2" class="form-control select2">
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$feature_category['category_id2'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $popular_category['childcategory_id2'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 3 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_category_id3">{{ __('Select Category') }} *</label>
                                        <select name="category_id3" id="feature_category_id3" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $popular_category['category_id3'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_subcategory_id3">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id3" id="feature_subcategory_id3" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$feature_category['category_id3'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $popular_category['subcategory_id3'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_childcategory_id3">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id3" id="feature_childcategory_id3" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$feature_category['category_id3'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $popular_category['childcategory_id3'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 mb-2"><h2 class="">{{ __('Category 4 :') }}</h2></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_category_id4">{{ __('Select Category') }} *</label>
                                        <select name="category_id4" id="feature_category_id4" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2" required>
                                            <option value="" disabled>{{ __('Select One') }}</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $popular_category['category_id4'] ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_subcategory_id4">{{ __('Select Sub-Category') }} </label>
                                        <select name="subcategory_id4" id="feature_subcategory_id4" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('subcategories')->where('category_id',$feature_category['category_id4'])->whereStatus(1)->get() as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $popular_category['subcategory_id4'] ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="feature_childcategory_id4">{{ __('Select Child-Category') }} </label>
                                        <select name="childcategory_id4" id="feature_childcategory_id4" class="form-control select2" >
                                            <option value="" >{{ __('Select One') }}</option>
                                            @foreach (DB::table('child_categories')->where('category_id',$feature_category['category_id4'])->whereStatus(1)->get() as $childcat)
                                                <option value="{{ $childcat->id }}" {{ $childcat->id == $popular_category['childcategory_id4'] ? 'selected' : '' }}>{{ $childcat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                  <div class="col-md-2"></div>
                                  <div class="form-group  col-md-8">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.third.banner.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Image 1') }} *</label>
                                        <br>
                                        <img src="{{ $third_banner['img1'] ? asset($third_banner['img1']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img1" class="custom-file-input upload-photo" id="img1" aria-label="File browser">
                                            <label class="custom-file-label" for="img1">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Image 2') }} *</label>
                                        <br>
                                        <img src="{{ $third_banner['img2'] ? asset($third_banner['img2']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img2" class="custom-file-input upload-photo" id="img2" aria-label="File browser">
                                            <label class="custom-file-label" for="img2">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url1">{{ __('URL 1') }} *</label>
                                        <input type="text" name="url1" class="form-control " id="url1" placeholder="{{ __('Enter Banner Url') }}" value="{{ $third_banner['url1'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url2">{{ __('URL 2') }} *</label>
                                        <input type="text" name="url2" class="form-control " id="url2" placeholder="{{ __('Enter Banner Url') }}" value="{{ $third_banner['url2'] }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.homepage4.banner.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">{{ __('Banner 1 Image') }} *</label>
                                        <br>
                                        <img src="{{ $home4_banner['img1'] ? asset($home4_banner['img1']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img1" class="custom-file-input upload-photo" id="img1" aria-label="File browser">
                                            <label class="custom-file-label" for="img1">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="label1">{{ __('Banner 1 Button Text') }} *</label>
                                        <input type="text" name="label1" class="form-control " id="label1" placeholder="{{ __('Enter Banner 1 Button Text') }}" value="{{ isset($home4_banner['label1']) ? $home4_banner['label1'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url1">{{ __('Banner 1 Button Link') }} *</label>
                                        <input type="text" name="url1" class="form-control " id="url1" placeholder="{{ __('Enter Banner 1 Button Link') }}" value="{{ isset($home4_banner['url1']) ? $home4_banner['url1'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="">{{ __('Banner 2 Image') }} *</label>
                                        <br>
                                        <img src="{{ $home4_banner['img2'] ? asset($home4_banner['img2']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img2" class="custom-file-input upload-photo" id="img2" aria-label="File browser">
                                            <label class="custom-file-label" for="img2">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="label2">{{ __('Banner 2 Button Text') }} *</label>
                                        <input type="text" name="label2" class="form-control " id="label2" placeholder="{{ __('Enter Banner 1 Button Text') }}" value="{{ isset($home4_banner['label2']) ? $home4_banner['label2'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url2">{{ __('Banner 2 Button Link') }} *</label>
                                        <input type="text" name="url2" class="form-control " id="url2" placeholder="{{ __('Enter Banner 1 Button Link') }}" value="{{ isset($home4_banner['url2']) ? $home4_banner['url2'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="">{{ __('Banner 3 Image') }} *</label>
                                        <br>
                                        <img src="{{ $home4_banner['img3'] ? asset($home4_banner['img3']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img3" class="custom-file-input upload-photo" id="img3" aria-label="File browser">
                                            <label class="custom-file-label" for="img3">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="label3">{{ __('Banner 3 Button Text') }} *</label>
                                        <input type="text" name="label3" class="form-control " id="label3" placeholder="{{ __('Enter Banner 1 Button Text') }}" value="{{ isset($home4_banner['label3']) ? $home4_banner['label3'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url3">{{ __('Banner 3 Button Link') }} *</label>
                                        <input type="text" name="url3" class="form-control " id="url3" placeholder="{{ __('Enter Banner 1 Button Link') }}" value="{{ isset($home4_banner['url3']) ? $home4_banner['url3'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="">{{ __('Banner 4 Image') }} *</label>
                                        <br>
                                        <img src="{{ $home4_banner['img4'] ? asset($home4_banner['img4']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img4" class="custom-file-input upload-photo" id="img4" aria-label="File browser">
                                            <label class="custom-file-label" for="img4">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="label4">{{ __('Banner 4 Button Text') }} *</label>
                                        <input type="text" name="label4" class="form-control " id="label4" placeholder="{{ __('Enter Banner 1 Button Text') }}" value="{{ isset($home4_banner['label4']) ? $home4_banner['label4'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url4">{{ __('Banner 1 Button Link') }} *</label>
                                        <input type="text" name="url4" class="form-control " id="url4" placeholder="{{ __('Enter Banner 1 Button Link') }}" value="{{ isset($home4_banner['url4']) ? $home4_banner['url4'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <label for="">{{ __('Banner 5 Image') }} *</label>
                                        <br>
                                        <img src="{{ $home4_banner['img5'] ? asset($home4_banner['img5']) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 496 x 204.') }}</span>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="img5" class="custom-file-input upload-photo" id="img5" aria-label="File browser">
                                            <label class="custom-file-label" for="img5">{{ __('Upload Image...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="label5">{{ __('Banner 5 Button Text') }} *</label>
                                        <input type="text" name="label5" class="form-control " id="label5" placeholder="{{ __('Enter Banner 1 Button Text') }}" value="{{ isset($home4_banner['label5']) ? $home4_banner['label5'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <label for="url5">{{ __('Banner 5 Button Link') }} *</label>
                                        <input type="text" name="url5" class="form-control " id="url5" placeholder="{{ __('Enter Banner 1 Button Link') }}" value="{{ isset($home4_banner['url5']) ? $home4_banner['url5'] : '' }}" >
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8 border-bottom mb-4"></div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.homepage4.category.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                      <label for="home_4_popular_category">{{ __('Select Categories') }} *</label>
                                        <select name="home_4_popular_category[]" id="home_4_popular_category" multiple data-placeholder="Select Categories" class="form-control select2" >
                                            @foreach ($categories as $cat)
                                                @if (!is_null($home_4_popular_category))
                                                    <option value="{{ $cat->id }}" {{ in_array($cat->id, $home_4_popular_category) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                @else
                                                    <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-2"></div>
                                    <div class="form-group  col-md-8">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
