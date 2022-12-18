{{-- @if ($setting->theme == 'theme1')

    @includeIf('frontend.themes.beautykink')

@elseif ($setting->theme == 'theme2')

    @includeIf('frontend.themes.beautykink')

@elseif ($setting->theme == 'theme3')

    @includeIf('frontend.themes.theme3')

@elseif($setting->theme == 'theme4')

    @includeIf('frontend.themes.theme4')

@endif --}}

@include('frontend.themes.beautykink')
