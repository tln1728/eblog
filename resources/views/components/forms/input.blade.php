@props(['label' => false, 'name'])

@php
$defaults = [
    'type' => 'text',
    'name' => $name,
    'class' => 'form-control',
    'value' => old($name)
];
@endphp

@if ($label)
    <label>{{ $label }}</label>
@endif

<input {{ $attributes($defaults) }}>