@props(['type'])

@if ($type != 'admin')

<li class="{{set_active_class($type.'*')}}">

    <a href="#{{$type}}" class="iq-waves-effect collapsed" data-toggle="collapse">
        <span class="ripple rippleEffect"></span>
        {{ $slot }}
        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>

    <ul id="{{$type}}" class="iq-submenu collapse {{set_active_class($type.'*', 'show')}}" data-parent="#iq-sidebar-toggle">
        @isset($sidebar_links)
        {{ $sidebar_links }}
        @endisset
    </ul>
</li>

@else
    <li class="{{set_active_class("admin")}}">
        <a href="/admin" class="iq-waves-effect">
            <span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i>
            <span>Tổng quan</span>
        </a>
    </li>
@endif

