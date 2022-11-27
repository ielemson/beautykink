@php
$pages = DB::table('pages')->where('pos',0)->where('status',1)->get();
@endphp
@if(count($pages) > 0)

        @foreach ($pages as $page)
            <li
                class="{{ request()->url() == route('frontend.page', $page->slug) ? 'active' : '' }}">
                <a
                    href="{{ route('frontend.page', $page->slug) }}">{{ Str::upper($page->title )}}</a>
            </li>
           
        @endforeach
    

@endif