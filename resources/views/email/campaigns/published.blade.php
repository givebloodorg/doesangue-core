@component('mail::message')
# Doe Sangue.me

<p>Hello {{ $users }}, a new campaign was published: {{ $campaign->title }}</p>
<p>It start's: {{ $campaign->created_at->format('d-m-Y') }}, and expires {{ $campaign->expires->format('d-m-Y h:m') }}</p>
<p>Published by: {{ $campaign->owner->first_name }} {{ $campaign->owner->last_name }}.</p>

@component('mail::button', ['url' => '/campaigns/{{ $campaign->id }}'])
See campaign details!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
