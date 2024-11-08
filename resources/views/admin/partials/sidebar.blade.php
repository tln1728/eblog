<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="/admin" class="header-logo">
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
                
                <x-admin.sidebar.item type="admin">
                    <i class="las la-home iq-arrow-left"></i>
                    <span>Tổng quan</span>
                </x-admin.sidebar.item>

                <x-admin.sidebar.item type="category">
                    <i class="ri-shirt-line"></i>
                    <span>Quản lý danh mục</span>
                   
                    <x-slot:sidebar_links>
                        <x-admin.sidebar.link-add  path="category">Thêm danh mục</x-admin.sidebar.link-add>
                        <x-admin.sidebar.link-list path="category">Danh sách danh mục</x-admin.sidebar.link-list>
                    </x-slot>
                </x-admin.sidebar.item>
                
                <x-admin.sidebar.item type="news">
                    <i class="ri-function-line"></i>
                    <span>Quản lý tin</span>
                   
                    <x-slot:sidebar_links>
                        <x-admin.sidebar.link-add  path="news">Thêm tin</x-admin.sidebar.link-add>
                        <x-admin.sidebar.link-list path="news">Danh sách tin</x-admin.sidebar.link-list>
                    </x-slot>
                </x-admin.sidebar.item>

                <x-admin.sidebar.item type="users">
                    <i class="las la-user-tie iq-arrow-left"></i>
                    <span>Quản lý tài khoản</span>
                   
                    <x-slot:sidebar_links>
                        <x-admin.sidebar.link-list path="users">Danh sách người dùng</x-admin.sidebar.link-list>
                    </x-slot>
                </x-admin.sidebar.item>

                <!-- 
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