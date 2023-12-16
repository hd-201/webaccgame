@extends('layout')
@section('content')
    <div class="c-layout-page">
        <div class="container">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h2 class="modal-title">Xác nhận mua tài khoản</h2>
                        </div>
                        <div class="modal-body">
                            <div class="c-content-tab-4 c-opt-3" role="tabpanel">
                                <ul class="nav nav-justified" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#bank" role="tab" data-toggle="tab" class="c-font-16"
                                            aria-expanded="true">Thanh
                                            toán</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#wallet" role="tab" data-toggle="tab" class="c-font-16"
                                            aria-expanded="false">Thông
                                            tin tài khoản</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="bank">
                                        <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                                            <li class="c-font-dark">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr style="background: #fff">
                                                            <th colspan="2">Thông tin tài khoản #{{ $nick->code }}
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr style="background: #fff">
                                                            <th>Danh mục:</th>
                                                            <td>{{ $category->title }}</td>
                                                        </tr>

                                                        <tr style="background: #f2f2f2">
                                                            <td>Giá tiền:</td>
                                                            <th class="text-info datagiamgia">
                                                                {{ number_format($nick->price, 0, ',', ',') }} đ
                                                            </th>
                                                        </tr>
                                                        <tr style="background: #fff">
                                                            <td class="c-account-price-title card--attr__name">Giảm giá:
                                                            </td>
                                                            <th class="text-info acc-price data_discount">0 đ</th>

                                                        </tr>
                                                        <tr style="background: #f2f2f2">
                                                            <td>Tổng thanh toán:</td>
                                                            <th class="text-info data_total_price">
                                                                {{ number_format($nick->price, 0, ',', ',') }} đ
                                                            </th>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="wallet">
                                        <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                                            <li class="c-font-dark">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="2">Chi tiết tài khoản #{{ $nick->code }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:50%">Game:</td>
                                                            <td class="text-danger" style="font-weight: 700">
                                                                {{ $category->title }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <div class="modal-footer data__dangnhap" style="justify-content: center">
                            <div class="nick-footer-notify">
                                <p style="color: #DA4343;">Số dư tài khoản không đủ để thanh toán vui lòng nạp tiền để
                                    tiếp tục giao
                                    dịch
                                </p>
                            </div>
                            <div class="d-flex justify-content-center w-100">
                                {{-- @if (Auth::user()) 
                                        <a class="btn-nick btn-primary" href="{{ route('lich-su') }}">Thanh toán</a>
                                    @else
                                        <a class="btn-nick btn-primary" href="{{ route('login') }}">Thanh toán</a>
                                    @endif --}}
                                <form action="{{ url('/vnpay_payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="total" value="{{ $nick->price }}">
                                    <button type="submit" class="btn btn-primary" name="redirect" style="padding: 10px 30px; font-weight:bold;">Thanh toán VNPay</button>
                                </form>
                                <button class="btn-nick btn-green" data-toggle="modal" data-target="#rechargeModal"
                                    data-dismiss="modal">Nạp tiền</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal" id="atmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-cont">
                    </div>
                </div>
            </div> --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/garena/lien-quan"
                            title="{{ $category->title }}">{{ $category->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $nick->code }}</li>
                </ol>
            </nav>
            <div class="c-shop-product-details-4">
                <div class="row">
                    <div class="col-md-4 m-b-20">
                        <div class="c-product-header">
                            <!--<h4 class="c-font-uppercase c-font-bold">Liên minh huyền thoại - Việt Nam</h4>-->
                            <div class="c-content-title-1">
                                <h2 class="c-font-uppercase c-font-bold" style="font-size: 30px">#{{ $nick->code }}</h2>
                                <span class="c-font-red c-font-bold">{{ $category->title }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 visible-sm visible-xs visible-sm">
                        <div class="text-center m-t-20">
                            <img class="img-responsive img-thumbnail" src="{{ asset('/uploads/nick/' . $nick->image) }}"
                                alt="png-image">
                        </div>
                        <div class="c-product-meta">
                            <div class="c-content-divider">
                                <i class="icon-dot"></i>
                            </div>
                            <div class="row">
                                @php
                                    $attribute = json_decode($nick->attribute);
                                @endphp
                                @foreach ($attribute as $attri)
                                    <div class="col-sm-6 col-xs-6 c-product-variant">
                                        <p
                                            class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold c-font-red">
                                            {{ $attri }}</p>
                                    </div>
                                @endforeach
                                <div class="col-sm-6 col-xs-6 c-product-variant">
                                    <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi
                                        bật:
                                        <span class="c-font-red">{{ $nick->description }}</span>
                                    </p>
                                </div>

                            </div>
                            <div class="c-content-divider">
                                <i class="icon-dot"></i>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-meta">
                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">
                            <div class="position0">
                                {{ number_format($nick->price, 0, ',', ',') }} CARD
                            </div>
                            <div class="position1">
                                {{ number_format($nick->price, 0, ',', ',') }} ATM
                            </div>
                        </div>
                        <div style="display: none">
                        </div>
                        <script type="text/javascript">
                            $(".c-product-price").append($(".position0"));
                            $(".c-product-price").append($(".position1"));
                        </script>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="c-product-header">
                            <div class="c-content">
                                <button type="button"
                                    class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal"
                                    data-toggle="modal" rel="/buyacc/518323">Mua ngay</button>
                                <button type="button"
                                    class="btn c-btn btn-lg btn-danger c-font-uppercase c-font-bold c-btn-square m-t-20 load-atm"
                                    rel="/hire-purchase/518323">Trả góp</button>
                                <a type="button"
                                    class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20 load-atm">ATM
                                    - Ví điện tử</a>
                                <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20"
                                    href="{{ route('nap-the') }}">Nạp thẻ cào</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-product-meta visible-md visible-lg">
                    <div class="c-content-divider">
                        <i class="icon-dot"></i>
                    </div>
                    <div class="row">
                        @php
                            $attribute = json_decode($nick->attribute);
                        @endphp
                        @foreach ($attribute as $attri)
                            <div class="col-sm-6 col-xs-6 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold c-font-red">
                                    {{ $attri }}</p>
                            </div>
                        @endforeach
                        <div class="col-sm-6 col-xs-6 c-product-variant">
                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span
                                    class="c-font-red">{{ $nick->description }}</span></p>
                        </div>
                    </div>
                    <div class="c-content-divider">
                        <i class="icon-dot"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container m-t-20 content_post">
            @foreach ($gallery as $key => $gal)
                <p>
                    <a rel="gallery" data-fancybox="images" href="{{ asset('uploads/gallery/' . $gal->image) }}">
                        <img class="img-responsive img-thumbnail" alt="{{ $gal->title }}"
                            src="{{ asset('uploads/gallery/' . $gal->image) }}">
                    </a>
                </p>
            @endforeach
            <div class="buy-footer" style="text-align: center">
                <button type="button"
                    class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal"
                    rel="/buyacc/518323">Mua ngay</button>
            </div>
        </div>
        <div class="container m-t-20 ">
            <div class="game-item-view" style="margin-top: 40px">
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold">Tài khoản liên quan</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <div class="row row-flex  item-list">
                    @foreach ($nicks as $nic)
                        @if ($nic->code != $nick->code)
                            <div class="col-sm-6 col-md-3">
                                <div class="classWithPad">
                                    <div class="image">
                                        <a href="{{ route('nick-detail', [$nic->code]) }}">
                                            <img src="{{ asset('uploads/nick/' . $nic->image) }}" alt="png-image">
                                            <span class="ms">MS: {{ $nic->code }}</span>
                                        </a>
                                    </div>
                                    <div class="description">
                                        {{ $nic->description }}
                                    </div>
                                    <div class="attribute_info">
                                        <div class="row">
                                            @php
                                                $attribute = json_decode($nic->attribute);
                                            @endphp
                                            @foreach ($attribute as $attri)
                                                <div class="col-xs-6 a_att">
                                                    <b>{{ $attri }}</b>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="a-more">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="price_item">
                                                    {{ number_format($nic->price, 0, ',', ',') }}đ
                                                </div>
                                            </div>
                                            <div class="col-xs-6 ">
                                                <div class="view">
                                                    <a href="{{ route('nick-detail', [$nic->code]) }}">Chi tiết</a>
                                                    <!-- <a href="/acc/518480">Chi tiết</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-vertical tutorial_area">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="">Thử vận may liên quân
                                    chỉ với 12k - 18k -60k <i class="glyphicon glyphicon-flag"></i></a>
                            </h5>
                        </div>
                        <div id="tab1" class="panel-collapse collapse in" aria-expanded="true" style="">
                            <div class="panel-body">
                                <p>Ngoài <strong><a href="https://nick.vn/garena/lien-quan" target="_blank">Bán Nick Liên
                                            Quân Mobile</a></strong> theo các thông tin đã show sẵn.<strong><a
                                            href="https://nick.vn/mua-ban-nick-game-random" target="_blank">Shop chuyên
                                            bán acc liên quân random</a></strong> cho các bạn thử vận may với các gói ưu đãi
                                    khác nhau :</p>
                                <p>- <strong><a href="https://nick.vn/garena/lien-quan-random-so-cap"
                                            target="_blank">Random liên quân sơ cấp 12k&nbsp;</a></strong></p>
                                <p>- <a href="https://nick.vn/garena/lien-quan-random-trung-cap"
                                        target="_blank"><strong>Random liên quân trung cấp 18k</strong></a></p>
                                <p>- <a href="https://nick.vn/garena/lien-quan-random-cao-cap"
                                        target="_blank"><strong>Random liên quân cao cấp 60k</strong></a></p>
                                <p>.Các bạn sẽ có cơ hội nhận được những <a href="https://nick.vn/mua-ban-nick-game-random"
                                        target="_blank"><strong>acc liên quân ngẫu nhiên</strong> </a>có thể là acc víp,acc
                                    cùi, acc tầm trung..vv</p>
                                <p>Mỗi mức giá để có tỷ lệ random khác nhau.Nào nào nhanh chóng thử vậy may của mình
                                    thôi.&nbsp;<span style="color:#e74c3c"><strong>Tích cực quay tay vận may sẽ
                                            đến</strong></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="">Dịch vụ game khác <i
                                        class="glyphicon glyphicon-flag"></i></a>
                            </h5>
                        </div>
                        <div id="tab1" class="panel-collapse collapse in" aria-expanded="true" style="">
                            <div class="panel-body">
                                <p>Ngoài&nbsp; <strong>shop bán acc liên quân</strong>&nbsp;Shop còn có các dịch vụ khác như
                                    <strong><a href="https://nick.vn/dich-vu/ban-quan-huy" target="_blank"><span
                                                style="color:#e74c3c">mua bán quân huy giá rẻ</span></a></strong>,
                                    <strong>&nbsp;,<a href="https://nick.vn/mua-the" target="_blank"><span
                                                style="color:#e74c3c">bán thẻ garena giá&nbsp; rẻ</span> </a>và hơn 40 dịch
                                        vụ game khác</strong> tại&nbsp;<strong><a href="https://nick.vn/dich-vu"
                                            target="_blank">https://nick.vn/dich-vu</a>&nbsp;(<a
                                            href="https://nick.vn/dich-vu" target="_blank">click</a>)</strong>
                                </p>
                                <p><strong>Link bán quân huy</strong> :&nbsp;<strong><a
                                            href="https://nick.vn/dich-vu/lien-quan"
                                            target="_blank">https://nick.vn/dich-vu/lien-quan</a>&nbsp;(<a
                                            href="https://nick.vn/dich-vu/lien-quan" target="_blank">click</a>)</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="">Xem Thêm <i
                                        class="glyphicon glyphicon-flag"></i></a>
                            </h5>
                        </div>
                        <div id="tab1" class="panel-collapse collapse in" aria-expanded="true" style="">
                            <div class="panel-body">
                                <h3><a href="https://shopsonflo.vn/garena/nick-lien-quan-gia-re-100-trang-thong-tin"><span
                                            style="color:#ffffff"><strong>- Nick liên quân có đá quý</strong></span></a>
                                </h3>
                                <h3><a href="https://muanicklienquan.com/"><span style="color:#ffffff"><strong>- Nick liên
                                                quân game random&nbsp;</strong></span></a></h3>
                                <h3><a
                                        href="https://muanicklienquan.com/garena/nick-lien-quan-gia-re-shop-ban-nick-lien-quan-gia-re-dam-bao-uy-tin-100-trang-thong-tin"><span
                                            style="color:#ffffff"><strong>- Nick liên quân giá rẻ</strong></span></a></h3>
                                <h3><span style="color:#ffffff"><strong>- Acc liên quân rank cao thủ , thách
                                            đấu.</strong></span></h3>
                                <h3><a href="https://muanicklienquan.com/vong-quay-quan-huy"><span
                                            style="color:#ffffff"><strong>- Tài khoản liên quân có nhiều
                                                tướng</strong></span></a></h3>
                                <h3><span style="color:#ffffff"><strong>- Tài khoản lq có nhiều trang phục</strong></span>
                                </h3>
                                <h3><a href="https://muanicklienquan.com/vong-quay-nak-ve-than"><span
                                            style="color:#ffffff"><strong>-&nbsp;Acc liên quân trang phục - skin Siêu
                                                Việt</strong></span></a></h3>
                                <h3><span style="color:#ffffff"><strong>- Nick liên quân bản thử nghiệm</strong></span>
                                </h3>
                                <h3><span style="color:#ffffff"><strong>- Acc liên quân full tướng full
                                            skin&nbsp;</strong></span></h3>
                                <h3><span style="color:#ffffff"><strong>- Acc liên quân 9k</strong></span></h3>
                                <h3><span style="color:#ffffff"><strong>- Nick liên quân full ngọc</strong></span></h3>
                                <h3><span style="color:#ffffff"><strong>- Nick liên quân giá rẻ 20k</strong></span></h3>
                                <h3><span style="color:#ffffff"><strong>- Acc liên quân ngọc 90</strong></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
