@props(['type'])

@php
$class        = request() -> is($type.'*')       ? 'active' : '';
$class_create = request() -> is($type.'/create') ? 'active' : '';
$class_list   = request() -> is($type)           ? 'active' : '';
$class_child  = request() -> is($type.'*')       ? 'show'   : '';
@endphp


<li class="{{$class}}" >
    <a href="#{{$type}}" class="iq-waves-effect collapsed" data-toggle="collapse">
        <span class="ripple rippleEffect"></span>
        <i class="ri-function-line"></i>
        <span>Quản lý {{$slot}}</span>
        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>

    <ul id="{{$type}}" class="iq-submenu collapse {{$class_child}}" data-parent="#iq-sidebar-toggle">
        <li class="{{$class_create}}">
            <a href="{{route($type.'.create')}}">
                <i class="las la-plus-circle"></i>
                Thêm {{$slot}}
            </a>
        </li>

        <li class="{{$class_list}}">
            <a href="{{route($type.'.index')}}">
                <i class="las la-th-list"></i>
                Danh sách {{$slot}}
            </a>
        </li>
    </ul>
</li>