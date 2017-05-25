@component('mail::message')
# Doe Sangue.me

<p>Hello dear, a new campaign was published: {{ $CampTitle }}</p>
<p>It start's: {{ $CampCreated }}, and expires {{ $CampExpiration }}</p>
<p>Published by: {{ $CampOwner->first_name }} {{ $CampOwner->last_name }}.</p>

@component('mail::button', ['url' => '/campaigns/{{ $campaign->id }}'])
See campaign details!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
