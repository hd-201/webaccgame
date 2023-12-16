<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">
                    <div style="margin: 0px;display: inline-block">
                        <a href="/" class="c-logo"
                            alt="Shop bán nick game, acc game online avatar, đột kích – CF, liên minh huyền thoại lol , ngọc rồng, khí phách anh hùng - kpah giá rẻ, uy tín...">
                            <img height="42px" src="{{ asset('frontend\images\logo.gif') }}" alt=""
                                class="c-desktop-logo">
                            <img height="42px" src="{{ asset('frontend\images\logo.gif') }}" alt=""
                                class="c-desktop-logo-inverse">
                            <img height="30px" src="{{ asset('frontend\images\logo.gif') }}" alt=""
                                class="c-mobile-logo"> </a>
                    </div>
                    <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                    </button>
                    <button class="c-topbar-toggler" type="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <button class="c-search-toggler" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                    <!--    <button class="c-cart-toggler" type="button">
                    <i class="icon-handbag"></i>
                    <span class="c-cart-number c-theme-bg">2</span>
                    </button>-->
                </div>
                <!-- END: BRAND -->
                <!-- BEGIN: QUICK SEARCH -->
                <form class="c-quick-search" action="#">
                    <input type="text" name="query" placeholder="Tìm kiếm..." value=""
                        class="form-control" autocomplete="off">
                    <span class="c-theme-link">&times;</span>
                </form>
                <!-- END: QUICK SEARCH --> <!-- BEGIN: HOR NAV -->
                <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- BEGIN: MEGA MENU -->
                <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                <style>
                    .c-menu-type-mega:hover {
                        transition-delay: 1s;
                    }

                    .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu>.nav.navbar-nav>li:focus>a:not(.btn),
                    .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu>.nav.navbar-nav>li:active>a:not(.btn),
                    .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu>.nav.navbar-nav>li:hover>a:not(.btn) {
                        color: #3a3f45;
                        background: #FAFAFA;
                    }
                </style>
                <nav
                    class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold d-none hidden-xs hidden-sm">
                    <ul class="nav navbar-nav c-theme-nav">
                        <li class="c-menu-type-classic"><a rel="" href="/"
                                class="c-link dropdown-toggle ">Trang chủ</a></li>
                        <li class="c-menu-type-classic"><a rel="" href="{{ route('mua-nick') }}"
                                class="c-link dropdown-toggle">Mua nick</a></li>
                        <li class="c-menu-type-classic">
                            <a rel="" href="#" class="c-link dropdown-toggle ">Nạp
                                tiền<span class="c-arrow c-toggler"></span></a>
                            <ul id="children-of-41" class="dropdown-menu c-menu-type-classic c-pull-left ">
                                <li class="c-menu-type-classic"><a rel="" href="{{ route('nap-the') }}"
                                        class="">Nạp thẻ cào</a></li>
                                <li class="c-menu-type-classic load-atm"><a rel="" href=""
                                        class="">Nạp ATM tự động</a></li>
                            </ul>
                        </li>
                        <li class="c-menu-type-classic"><a rel="" href="{{ route('video-highlight') }}"
                                class="c-link dropdown-toggle ">Video</a></li>
                        <li class="c-menu-type-classic">
                            <a rel="" href="#" class="c-link dropdown-toggle ">Tin tức<span
                                    class="c-arrow c-toggler"></span></a>
                            <ul id="children-of-42" class="dropdown-menu c-menu-type-classic c-pull-left ">
                                <li class="c-menu-type-classic"><a rel="" href="{{ route('blogs') }}"
                                        class="">Blog</a></li>
                                @foreach ($instruct as $bloghd)
                                    <li class="c-menu-type-classic"><a rel=""
                                            href="{{ route('blog_detail', [$bloghd->slug]) }}"
                                            class="">{{ $bloghd->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @if (!Auth::user())
                            <li><a href="{{ route('login') }}"
                                    class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                    <i class="fa-solid fa-user"></i>Đăng nhập</a>
                            </li>
                            <li><a href="{{ route('register') }}"
                                    class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                    <i class="fa-solid fa-user"></i>Đăng ký</a></li>
                        @else
                            @if (Auth::user()->role_id=='2')
                                <li><a href="{{ route('account') }}"
                                        class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                        <i class="fa-solid fa-user"></i>{{ Auth::user()->name }}</a>
                                </li>
                            @else
                                <li><a href="{{ route('home') }}" target="_blank"
                                    class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                    <i class="fa-solid fa-user"></i>Quản lý</a>
                                </li>
                            @endif
                            <li><a href="{{ route('logout') }}"
                                    class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold"
                                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        @endif
                        </li>
                    </ul>
                </nav>
                <nav
                    class="menu-main-mobile c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold hidden-md hidden-lg">
                    <ul class="nav navbar-nav c-theme-nav">
                        <li class="c-menu-type-classic"><a rel="" href="/"
                                class="c-link dropdown-toggle ">Trang chủ</a></li>
                        <li class="c-menu-type-classic"><a rel="" href="/"
                                class="c-link dropdown-toggle">Mua nick</a></li>
                        <li class="c-menu-type-classic">
                            <a rel="" href="#" class="c-link dropdown-toggle ">Nạp
                                tiền<span class="c-arrow c-toggler"></span></a>
                            <ul id="children-of-41" class="dropdown-menu c-menu-type-classic c-pull-left ">
                                <li class="c-menu-type-classic"><a rel="" href="{{ route('nap-atm') }}"
                                        class="">Nạp thẻ c&agrave;o</a></li>
                                <li class="c-menu-type-classic load-modal"><a rel="" href=""
                                        class="">Nạp ATM tự động</a></li>
                            </ul>
                        </li>
                        <li class="c-menu-type-classic"><a rel="" href="{{ route('video-highlight') }}"
                                class="c-link dropdown-toggle ">Video</a></li>
                        <li class="c-menu-type-classic">
                            <a rel="" href="#" class="c-link dropdown-toggle ">Tin tức<span
                                    class="c-arrow c-toggler"></span></a>
                            <ul id="children-of-42" class="dropdown-menu c-menu-type-classic c-pull-left ">
                                <li class="c-menu-type-classic"><a rel="" href="{{ route('blogs') }}"
                                        class="">Blog</a></li>
                                @foreach ($instruct as $bloghd)
                                    <li class="c-menu-type-classic"><a rel=""
                                            href="{{ route('blog_detail', [$bloghd->slug]) }}"
                                            class="">{{ $bloghd->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @if (!Auth::user())
                            <li><a href="{{ route('login') }}"
                                    class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                    <i class="fa-solid fa-user"></i>Đăng nhập</a>
                            </li>
                            <li><a href="{{ route('register') }}"
                                    class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                    <i class="fa-solid fa-user"></i>Đăng ký</a></li>
                        @else
                            <li><a href="#"
                                    class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                                    <i class="fa-solid fa-user"></i>{{ Auth::user()->name }}</a></li>
                            <li><a href="{{ route('logout') }}"
                                    class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold"
                                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                    Đăng xuất</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>