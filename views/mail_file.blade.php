@component('mail::message')
# Congratulation


Hey {{ $name }},
You are registered on my page now.

@component('mail::panel', ['url' => ''])
Some quote
@endcomponent

Thanks,<br>
{{ \auth()->user()->name }}
@endcomponent
