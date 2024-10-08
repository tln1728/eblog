@props(['path'])

<li class="{{set_active_class($path)}}">
    <a href="{{route("$path.index")}}">
        <i class="las la-th-list"></i>
        {{ $slot }}
    </a>
</li>