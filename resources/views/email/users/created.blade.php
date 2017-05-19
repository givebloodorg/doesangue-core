@component('mail::message')
# Account created.

Hello dear {{ $FirstName }} {{ $LastName }} your account has been created, Welcome to us. Now you can login using your username <b>{{ $UserName }}</b> and password you defined..


Thanks,<br>
{{ config('app.name') }}
@endcomponent
