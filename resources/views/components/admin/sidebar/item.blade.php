@props(['path', 'dropdown' => true])

@if ($dropdown)

<li class="{{set_active_class($path.'*')}}">

    <a href="#{{$path}}" class="iq-waves-effect collapsed" data-toggle="collapse">
        <span class="ripple rippleEffect"></span>
        {{ $slot }}
        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>

    <ul id="{{$path}}" class="iq-submenu collapse {{set_active_class($path.'*', 'show')}}" data-parent="#iq-sidebar-toggle">
        @isset($sidebar_links)
        {{ $sidebar_links }}
        @endisset
    </ul>
</li>

@else
    <li class="{{ request() -> is($path) ? 'active' : "" }}">
        <a href="/{{$path}}" class="iq-waves-effect">
            {{$slot}}
        </a>
    </li>
@endif