<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{url('/home')}}" class="sidebar-brand">
            Hoàng<span>Dương</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{url('/home')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Home</li>
            <li class="nav-item">
                <a href="{{url('/')}}" class="nav-link" target="_blank">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Trang chủ</span>
                </a>
            </li>
            <li class="nav-item nav-category">Manager</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button"
                    aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="grid"></i>
                    <span class="link-title">Game</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">Danh Mục Game</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('nick.index') }}" class="nav-link">Nick Game</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('service.index') }}" class="nav-link">Dịch Vụ Game</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{route('slider.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('accessory.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="tag"></i>
                    <span class="link-title">Phụ Kiện</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Blog</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('video.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="youtube"></i>
                    <span class="link-title">Video</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('wheel.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="compass"></i>
                    <span class="link-title">Vòng quay</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
{{-- <nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item" href="assets/demo1/dashboard.html">
                <img src="{{ asset('assets/images/screenshots/light.jpg') }}" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item active" href="assets/demo2/dashboard.html">
                <img src="{{ asset('assets/images/screenshots/dark.jpg') }}" alt="light theme">
            </a>
        </div>
    </div>
</nav> --}}