@component('mail::message')
{!! $MsgSubj !!}

{!! $MsgToCustomer !!}

@component('mail::button', ['url' => "https://dev.beautykink.com/user/login"])
Login to your dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
