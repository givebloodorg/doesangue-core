@component('mail::message')
# Account created.

Hello dear <b>{{ $FirstName }} {{ $LastName }}</b> your account has been created, Welcome to us. Now you can login using your username <b>{{ $UserName }}</b> and password you defined..


Thanks,<br>
{{ config('app.name') }}
@endcomponent
