@props(['error','class'])

@php
    $default_class = "form-group";
    $error_class = 'has-error'
@endphp

<div class="{{$class ?? $default_class}} @error($error){{$error_class}}@enderror">
    {{ $slot }}
    
    @error($error)
        <div class="text-danger">{{ $message }}</div>
    @enderror

    @error($error.'.*')
        <div class="text-danger">{{ $message }}</div>
    @enderror

</div>