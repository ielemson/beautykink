@php
$categories = App\Models\Category::with('subcategories')
    ->whereStatus(1)
    ->orderby('serial', 'asc')
    ->take(8)
    ->get();
@endphp


<div class="widget-categories mobile-cat">
    <ul id="category_list">
        @foreach ($categories as $getcategory)
            <li class="has-children">
                <a class="category_search"
                    href="{{ route('frontend.catalog') . '?category=' . $getcategory->slug }}">{{ $getcategory->name }}
                    @if ($getcategory->subcategories->count() > 0)
                        <span><i class="icon-chevron-down"></i></span>
                    @endif
                </a>
                <ul id="subcategory_list">
                    @foreach ($getcategory->subcategories as $getsubcategory)
                        <li class="">
                            <a class="subcategory"
                                href="{{ route('frontend.catalog') . '?subcategory=' . $getsubcategory->slug }}">{{ $getsubcategory->name }}</a>
                            <ul id="childcategory_list">
                                @foreach ($getsubcategory->childcategories as $getchildcategory)
                                    <li class="">
                                        <a class="childcategory"
                                            href="{{ route('frontend.catalog') . '?childcategory=' . $getchildcategory->slug }}">{{ $getchildcategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
