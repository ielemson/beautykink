@component('mail::message')

<h1 style="text-align: center">{!! $MsgSubj !!}</h1>

<p>{!! $MsgToCustomer !!}</p>

@component('mail::button', ['url' => "https://dev.beautykink.com/user/login"])
Login to your dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
