@component('mail::message')
{!! $MsgSubj !!}

{!! $MsgToCustomer !!}
<a style="align-items: center" href="{{ $link }}">
<img src="{{asset($img)}}" style="width:100%; text-align:center !important;" alt="Product"></a>
<br/><br/>Thanks,<br/>
{{ config('app.name') }}

@endcomponent
