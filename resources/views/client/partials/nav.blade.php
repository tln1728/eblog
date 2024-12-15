<!-- Start Home-1 Menu & Site Logo & Social Media -->
<div class="eblog-home-1-menu">
    <div class="eblog-site-main-logo-menu-social">
        <div class="container">
            <div class="row align-items-center plr_md--30 plr_sm--30 plr--10">
                <div class="col-xl-2 col-lg-2 col-md-7 col-sm-7 col-7 p-0">
                    <div class="eblog-site-logo">
                        <a class="logo-light" href="/"><img src="/client/assets/images/logo/logo-01.svg" alt="eblog"></a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                    <nav>
                        <div class="eblog-home-1-menu">
                            <ul class="list-unstyled eblog-desktop-menu">
                                <li class="menu-item eblog-has-dropdown">
                                    <a href="/" >Trang chủ</a>
                                </li>
                                <li class="menu-item eblog-has-dropdown">
                                    <a href="/category/all" class="eblog-dropdown-main-element">Danh mục</a>
                                    <ul class="eblog-submenu list-unstyled menu-pages">
                                        @foreach ($categories as $cat)
                                        <li class="nav-item"><a href="{{route('category.show',$cat -> title)}}">{{$cat->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item"><a href="#" class="eblog-dropdown-main-element">Giới thiệu</a></li>
                                <li class="menu-item"><a href="#" class="eblog-dropdown-main-element">Về chúng tôi</a></li>
                                <li class="menu-item"><a href="#" class="eblog-dropdown-main-element">Liên lạc</a></li>
                                @auth
                                <li class="menu-item"><a href="{{route('news.create')}}" class="eblog-dropdown-main-element">Đăng bài</a></li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-5 col-sm-5 col-5 p-0">
                    <div class="eblog-header-top-social-media">
                        <a href="#" id="search" class="eblog-header-top-search-btn search-icon action-item icon">
                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.1256 16.1458L13.4056 11.7888C14.5398 10.5319 15.1053 8.91973 14.9847 7.28771C14.864 5.65568 14.0663 4.12943 12.7576 3.02647C11.4488 1.9235 9.72983 1.32874 7.95814 1.3659C6.18645 1.40306 4.49849 2.06929 3.2454 3.226C1.9923 4.3827 1.27055 5.94082 1.23029 7.57622C1.19003 9.21162 1.83436 10.7984 3.02924 12.0064C4.22412 13.2145 5.87756 13.9508 7.64558 14.0622C9.41361 14.1736 11.1601 13.6516 12.5218 12.6046L17.2418 16.9616L18.1256 16.1458ZM2.50064 7.73083C2.50064 6.70389 2.83054 5.70001 3.44862 4.84614C4.0667 3.99227 4.94521 3.32676 5.97304 2.93376C7.00088 2.54077 8.13188 2.43795 9.22302 2.63829C10.3142 2.83864 11.3164 3.33316 12.1031 4.05931C12.8898 4.78547 13.4255 5.71065 13.6426 6.71786C13.8596 7.72507 13.7482 8.76907 13.3225 9.71784C12.8967 10.6666 12.1757 11.4775 11.2507 12.0481C10.3257 12.6186 9.23816 12.9231 8.12564 12.9231C6.6343 12.9216 5.20452 12.3741 4.14999 11.4007C3.09545 10.4272 2.50229 9.10745 2.50064 7.73083Z" fill="#1E1E1E" />
                            </svg>
                        </a>
                        <div class="search-input-area">
                            <div class="container">
                                <div class="search-input-inner">
                                    <div class="input-div">
                                        <x-forms.form action="{{route('search_news')}}">
                                            <input id="searchInput1" value="{{$kw??''}}"  class="search-input" type="text" name="kw" placeholder="Search by keyword or #">
                                        </x-forms.form>
                                    </div>
                                    <div class="search-close-icon"><i class="fa-regular fa-xmark-large rt-xmark"></i></div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('history') }}">
                            History
                        </a>                        
                        @if (Auth::user() ?-> role === App\Models\User::ROLE_ADMIN)
                        <a href="{{route('dashboard')}}" class="cart-bar">
                            AdminPage
                        </a>
                        
                        @elseif(Auth::check())
                            <a href="profile" class="cart-bar">
                                P
                            </a>
                        @endif
                        <!-- <div class="eblog-header-top-menu-bar menu-btn">
                            <a href="javascript:void(0)">
                                <div class="line small"></div>
                                <div class="line big"></div>
                                <div class="line small"></div>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Home-1 Menu & Site Logo & Social Media -->