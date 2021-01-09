@component('mail::message')


Thank You {{ $connectdata['name'] }} For Contact With Us 

One Of our member will get in touch with you soon


@component('mail::button', ['url' => route('front.home')])
Click Here
@endcomponent 

Thanks,<br>
{{ config('app.name') }}
@endcomponent
