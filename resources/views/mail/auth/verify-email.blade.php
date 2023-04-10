<x-mail::message>
# {{ trans('Hello!') }}

{{ trans('Please click the button below to verify your email address.') }}

<x-mail::button :url="$url">
{{ trans('Verify Email Address') }}
</x-mail::button>

{{ trans('If you did not create an account, no further action is required.') }}

{{ trans('Regards') }}, {{ config('app.name') }}

<x-mail::subcopy>
{{ trans("If you're having trouble clicking the \":action\" button, copy and paste the URL below into your web browser:", [
    'action' => trans('Verify Email Address'),
]) }} <span class="break-all">[{{ $url }}]({{ $url }})</span>
</x-mail::subcopy>

</x-mail::message>
