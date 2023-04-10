<x-mail::message>
# {{ trans('Hello!') }}

{{ trans('You are receiving this email because we received a password reset request for your account.') }}

<x-mail::button :url="$url">
{{ trans('Reset Password') }}
</x-mail::button>

{{ trans('This password reset link will expire in :count minutes.', [
    'count' => $count,
]) }}

{{ trans('If you did not request a password reset, no further action is required.') }}

{{ trans('Regards') }}, {{ config('app.name') }}

<x-mail::subcopy>
{{ trans("If you're having trouble clicking the \":action\" button, copy and paste the URL below into your web browser:", [
    'action' => trans('Reset Password'),
]) }} <span class="break-all">[{{ $url }}]({{ $url }})</span>
</x-mail::subcopy>

</x-mail::message>
