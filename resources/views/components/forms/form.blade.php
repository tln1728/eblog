@php
$default = [
    "method" => "GET",
];

$method = strtoupper($attributes->get('method', $default['method']));

$formMethod = in_array($method, ['PUT', 'PATCH', 'DELETE']) ? 'POST' : $method;

@endphp

<form method="{{$formMethod}}" {{ $attributes -> merge($default) -> except('method') }}>
    @if ($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>