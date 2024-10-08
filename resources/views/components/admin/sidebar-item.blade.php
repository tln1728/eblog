@props(['type'])

<li class="{{set_active_class($type.'*')}}" >

    <a href="#{{$type}}" class="iq-waves-effect collapsed" data-toggle="collapse">
        <span class="ripple rippleEffect"></span>
        <i class="ri-function-line"></i>
        <span>Quản lý {{$slot}}</span>
        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>

    <ul id="{{$type}}" class="iq-submenu collapse {{set_active_class($type.'*', 'show')}}" data-parent="#iq-sidebar-toggle">
        <li class="{{set_active_class($type.'/create')}}">
            <a href="{{route($type.'.create')}}">
                <i class="las la-plus-circle"></i>
                Thêm {{$slot}}
            </a>
        </li>

        <li class="{{set_active_class($type)}}">
            <a href="{{route($type.'.index')}}">
                <i class="las la-th-list"></i>
                Danh sách {{$slot}}
            </a>
        </li>
    </ul>
</li>