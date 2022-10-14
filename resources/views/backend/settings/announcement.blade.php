@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Announcement') }}</h1>
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
                      
                    <div class="col-md-12">
                        <form action="{{ route("backend.setting.update") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" row">
                                <div class="col-md-2"></div>
                                <div class="form-group  col-md-8">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            {{-- <input type="checkbox" id="is_announcement" class="email_smtp_check" name="is_announcement" value="1" check> --}}
                                            <label for="is_announcement">{{ __('Advert Banner') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <!-- SMTP Details Row -->
                            <div class="row">
                       
                              <div class="col-md-2"></div>
                              <div class="form-group  col-md-8">
                                <label for="announcement_delay">{{ __('Banner Content') }} </label>
                                <textarea  name="banner_text" class="form-control " id="banner_text" placeholder="{{ __('Enter Banner Content') }}" rows="5" > {{ $setting->banner_text }}</textarea>
                              </div>
                              <div class="col-md-2"></div>

                              <div class="col-md-2"></div>
                              <div class="form-group  col-md-8">
                                @php
                                $pages = DB::table('pages')->wherePos(0)->orwhere('pos', 2)->get();
                                @endphp
                                <label for="announcement_link">{{ __('Link') }} </label>
                                {{-- <select type="text" name="banner_link" class="form-control " id="banner_link" placeholder="{{ __('Enter Link') }}" value="{{ $setting->banner_link }}" > </select> --}}
                                <select type="text" name="banner_link" class="form-control " id="banner_link" > 
                                  @foreach ($pages as $page)
                                    <option value="{{ route('frontend.page', $page->slug) }}">{{$page->title}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-2"></div>
                              <div class="col-md-2"></div>
                              <div class="form-group  col-md-8">
                                <label for="banner_status">{{ __('Status') }} </label>
                               <select class="form-control" name="is_banner">
                                <option value="1" {{ $setting->is_banner == 1 ? 'selected' : '' }}>active</option>
                                <option value="0" {{ $setting->is_banner == 0 ? 'selected' : '' }}>inactive</option>
                               </select>
                                {{-- <input type="text" name="announcement_link" class="form-control " id="announcement_link" placeholder="{{ __('Enter Link') }}" value="{{ $setting->banner_link }}" > --}}
                              </div>
                              <div class="col-md-2"></div>


                            </div>

                            <div class="row">
                              <div class="col-md-2"></div>
                              <div class="form-group  col-md-8">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                              </div>
                            </div>
                        </form>
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
