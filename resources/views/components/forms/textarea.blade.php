@props(['label' => false, 'name'])

@php
$defaults = [
    'name' => $name,
    'id'   => $name,
    'rows' => 4,
    'class' => 'form-control',
];
@endphp

@if ($label)
    <label for="{{$name}}">{{ $label }}</label>
@endif

<textarea {{$attributes($defaults)}}>{{$slot}}</textarea>