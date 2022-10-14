@php
$categories = App\Models\Category::with('subcategories')
    ->whereStatus(1)
    ->orderby('serial', 'asc')
    ->take(8)
    ->get();
@endphp

@if (count($categories) > 0)
    @foreach ($categories as $key => $pcategory)
        <li class="{{ $pcategory->subcategories->count() > 0 ? 'has-submenu full-width' : '' }}"><a
                href="#">{{ $pcategory->name }}</a>
            <ul class="submenu-nav submenu-nav-mega submenu-nav-width-two colunm-two mt-0">
                @if ($pcategory->subcategories->count() > 0)
                    @foreach ($pcategory->subcategories as $subscategory)
                        <li class="mega-menu-item"><a
                                href="{{ route('frontend.catalog') . '?category=' . $pcategory->slug }}"
                                class="mega-title">{{ $subscategory->name }}</a>
                            <ul>
                                @if ($subscategory->childcategories->count() > 0)
                                    @foreach ($subscategory->childcategories as $childcategory)
                                        <li><a
                                                href="{{ route('frontend.catalog') . '?childcategory=' . $childcategory->slug }}">{{ $childcategory->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        </li>
    @endforeach
@endif
