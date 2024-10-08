<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html" class="header-logo">
            <img src="/adminTemplate/assets/images/logo.png" class="img-fluid rounded-normal" alt="">
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

                <x-admin.sidebar-item type="category">Danh mục</x-admin.sidebar-item>
                
                <x-admin.sidebar-item type="news">Tin</x-admin.sidebar-item>

                <!-- 
                <i class="ri-shirt-line"></i>
                <i class="las la-user-tie iq-arrow-left"></i>
                <span>Quản lý bình luận</span>
                <span>Biểu đồ thống kê</span></a> -->

                <li>
                    <a href="/" class="iq-waves-effect">
                        <span class="ripple rippleEffect"></span>
                        <span>Về trang web</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>