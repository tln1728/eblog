@props(['path'])

<li class="{{set_active_class("$path/create")}}">
    <a href="{{route("$path.create")}}">
        <i class="las la-plus-circle"></i>
        {{ $slot }}
    </a>
</li>