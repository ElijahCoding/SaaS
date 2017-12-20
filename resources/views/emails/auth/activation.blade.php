@component('mail::message')
# Please Activate Your Account

The body of your message.

@component('mail::button', ['url' => ''])
Activate 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
