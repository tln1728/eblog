<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html" class="header-logo">
            <img src="adminTemplate/assets/images/logo.png" class="img-fluid rounded-normal" alt="">
            <div class="logo-title">
                <span class="text-primary text-uppercase">Booksto</span>
            </div>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="{{ request() -> is('admin') ? 'active menu-active' : ''}}">
                    <a href="/admin" class="iq-waves-effect">
                        <span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>

                <!-- active menu-active -->
                <li class="{{ request() -> is('category*') ? 'active menu-active' : ''}}">
                    <a href="#catagory" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="">
                        <span class="ripple rippleEffect"></span><i class="ri-function-line"></i>
                        <span>Quản lý danh mục</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                    <ul id="catagory" class="iq-submenu collapse {{ request() -> is('category*') ? 'show' : ''}}" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request() -> is('category/create') ? 'active menu-active' : ''}}">
                            <a href="{{route('category.create')}}"><i class="las la-plus-circle"></i>Thêm danh mục</a>
                        </li>

                        <li class="{{ request() -> is('category') ? 'active menu-active' : ''}}">
                            <a href="{{route('category.index')}}"><i class="las la-th-list"></i>Danh sách danh mục</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request() -> is('news*') ? 'active menu-active' : ''}}">
                    <a href="#product" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="">
                        <span class="ripple rippleEffect"></span><i class="ri-shirt-line"></i>
                        <span>Quản lý tin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="product" class="iq-submenu collapse {{ request() -> is('news*') ? 'show' : ''}}" data-parent="#iq-sidebar-toggle">

                        <li class="{{ request() -> is('news/create') ? 'active menu-active' : ''}}">
                            <a href="{{route('news.create')}}"><i class="las la-plus-circle"></i>Thêm tin</a>
                        </li>

                        <li class="{{ request() -> is('news') ? 'active menu-active' : ''}}">
                            <a href="{{route('news.index')}}"><i class="las la-th-list"></i>Danh sách tin</a>
                        </li>

                    </ul>
                </li>

                <li class="">
                    <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="">
                        <span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i>
                        <span>Quản lý tài khoản</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class=""><a href="#"><i class="las la-plus-circle"></i>Thêm tài khoản</a></li>
                        <li class=""><a href="#"><i class="las la-th-list"></i>Danh sách tài khoản</a></li>
                    </ul>
                </li>

                <!-- <li class="">
                    <a href="#" class="iq-waves-effect">
                        <span class="ripple rippleEffect"></span><i class="ri-bill-line"></i>
                        <span>Quản lý đơn hàng</span>
                    </a>
                </li> -->

                <li class="">
                    <a href="#" class="iq-waves-effect">
                        <span class="ripple rippleEffect"></span><i class="ri-message-2-line"></i>
                        <span>Quản lý bình luận</span>
                    </a>
                </li>

                <!-- <li class="">
                    <a href="#" class="iq-waves-effect">
                        <span class="ripple rippleEffect"></span><i class="ri-pie-chart-box-line"></i>
                        <span>Biểu đồ thống kê</span></a>
                </li> -->

                <li>
                    <a href="/" class="iq-waves-effect">
                        <span class="ripple rippleEffect"></span>
                        <span>Về trang web</span></a>
                </li>

            </ul>
        </nav>
    </div>
</div>