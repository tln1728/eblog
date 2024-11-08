@props(['label' => false, 'name', 'type' => 'text'])

@php
$defaults = [
    'name' => $name,
    'id'   => $name,
    'type' => $type,
    'class' => 'form-control',
    'value' => old($name)
];
@endphp

@if ($label)
    <label for="{{$name}}">{{$label}}</label>
@endif

@switch($type)
    @case('select')
        <select {{$attributes($defaults)}}>
            {{$slot}}
        </select>
    @break

    @case('file')
        <input {{$attributes -> merge($defaults) -> except('class')}}>
    @break

    @default
        <input {{$attributes($defaults)}}>

@endswitch