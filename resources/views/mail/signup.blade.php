<x-mail::message>
# Signed Up

Dear {{ ucfirst($user->name) }} signed up successfully!

<x-mail::button :url="$url">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
