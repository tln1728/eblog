@props(['route'])

<li class="{{set_active_class("$route/create")}}">
    <a href="{{route("$route.create")}}">
        <i class="las la-plus-circle"></i>
        {{ $slot }}
    </a>
</li>