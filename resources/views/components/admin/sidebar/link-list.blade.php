@props(['route'])

<li class="{{set_active_class($route)}}">
    <a href="{{route("$route.index")}}">
        <i class="las la-th-list"></i>
        {{ $slot }}
    </a>
</li>