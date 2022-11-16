@php
$pages = DB::table('pages')->where('pos',0)->get();
@endphp
@if(count($pages) > 0)
<li class="has-submenu"><a href="#">PAGES</a>
    <ul class="submenu-nav">
        @foreach ($pages as $page)
            {{-- <a class="{{ request()->url() == route('frontend.page', $page->slug) ? 'active' : '' }} " href="{{ route('frontend.page', $page->slug) }}"><i class="icon-chevron-right pr-2"></i>{{ $page->title }}</a> --}}
            <li
                class="{{ request()->url() == route('frontend.page', $page->slug) ? 'active' : '' }}">
                <a
                    href="{{ route('frontend.page', $page->slug) }}">{{ Str::upper($page->title )}}</a>
            </li>
           
        @endforeach
    </ul>

</li>

@endif