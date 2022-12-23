@component('mail::message')
# Account created

Your Account is Almost ready. 

Please on the Button to activate your account.


@component('mail::button', ['url' => route('activate-account', $user->activation_token)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
