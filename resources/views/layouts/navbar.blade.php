<div class="account_sidebar_menu">
    <div class="row">
        <div class="col-6 col-sm-6 col-md-12 col-lg-12">
            <div class="account_sidebar_menu_title dropdown d-flex">
                <p class="c-mr-8">MENU TÀI KHOẢN</p>
            </div>
            <div class="account_sidebar_menu_nav dropdown-content">
                <ul>
                    <li>
                        <a href="{{route('account') }}" class="account_thong-tin">Thông tin tài khoản</a>
                    </li>
                    <li>
                        <a href="/changepasswork" class="account_changepasswork">Đổi Mật Khẩu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-12 col-lg-12">
            <div class="account_sidebar_menu_title dropdown d-flex">
                <p class="c-mr-8">MENU GIAO DỊCH</p>
            </div>
            <div class="account_sidebar_menu_nav dropdown-content">
                <ul>
                    <li>
                        <a href="{{ route('lich-su') }}" class="account_lich-su-giao-dich">Lịch sử giao dịch</a>
                    </li>
                    <li>
                        <a href="{{ route('tai-khoan-da-mua') }}" class="account_lich-su-mua-account">Tài khoản đã mua</a>
                    </li>
                    <li>
                        <a href="/dich-vu-da-mua" class="account_dich-vu-da-mua">Dịch vụ đã mua</a>
                    </li>
                    <li>
                        <a href="/the-cao-da-mua" class="account_the-cao-da-mua">Thẻ cào đã mua</a>
                    </li>
                    <li>
                        <a href="{{ route('nap-the') }}" class="account_nap-the">Nạp thẻ tự động</a>
                    </li>
                    <li>
                        <a href="/lich-su-nap-the" class="account_lich-su-nap-the">Lịch sử nạp thẻ</a>
                    </li>
                    <li>
                        <a href="{{ route('nap-atm') }}" class="account_recharge-atm">Nạp tiền từ ATM</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".account_sidebar_menu_title").click(function () {
            // Kiểm tra kích thước màn hình trước khi thực hiện hành động
            if ($(window).width() < 992) {
                $(".account_sidebar_menu_nav").toggle();
            }
        });
    });
    $(document).ready(function () {
        $(".account_sidebar_menu_nav ul li a").click(function () {
            // Loại bỏ class 'menu_active' từ tất cả các mục
            $(".account_sidebar_menu_nav ul li a").removeClass("menu_active");
            // Thêm class 'menu_active' cho mục được click
            $(this).addClass("menu_active");
        });
    });
</script>