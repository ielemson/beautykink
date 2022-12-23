@component('mail::message')
{!! $MsgSubj !!}

{!! $MsgToCustomer !!}

@component('mail::button', ['url' => $link])
View Product
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
