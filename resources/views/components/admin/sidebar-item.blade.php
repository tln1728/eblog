<li class="{{ request() -> is('category*') ? 'active menu-active' : ''}}">
    <a href="#catagory" class="iq-waves-effect collapsed" data-toggle="collapse">
        <span class="ripple rippleEffect"></span>
        <i class="ri-function-line"></i>
        <span>Quản lý danh mục</span>
        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
    </a>

    <ul id="catagory" class="iq-submenu collapse {{ request() -> is('category*') ? 'show' : ''}}" data-parent="#iq-sidebar-toggle">
        <li class="{{ request() -> is('category/create') ? 'active menu-active' : ''}}">
            <a href="{{route('category.create')}}">
                <i class="las la-plus-circle"></i>
                Thêm danh mục
            </a>
        </li>

        <li class="{{ request() -> is('category') ? 'active menu-active' : ''}}">
            <a href="{{route('category.index')}}">
                <i class="las la-th-list"></i>
                Danh sách danh mục
            </a>
        </li>
    </ul>
</li>