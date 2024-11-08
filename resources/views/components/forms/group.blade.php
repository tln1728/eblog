@props(['error'])

@php
    $error_class = 'has-error'
@endphp

<div class="form-group @error($error){{$error_class}}@enderror">
    {{ $slot }}
    
    @error($error)
        <div class="text-danger">{{ $message }}</div>
    @enderror

    @error($error.'.*')
        <div class="text-danger">{{ $message }}</div>
    @enderror

</div>