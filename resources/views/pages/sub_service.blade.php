@extends('layout')
@section('content')
    <div class="content">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dichvu') }}" title="Dịch vụ">Dịch vụ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dichvucon', [$service->slug]) }}"
                                title="{{ $service->title }}">{{ $service->title }}</a></li>
                    </ol>
                </nav>
                <div class="c-content-box">
                    <div class="text-center showcontent">
                        <h1 style="font-size: 30px;font-weight: bold;text-transform: uppercase; margin: 50px 0">DỊCH VỤ {{ $service->title }}
                        </h1>
                    </div>
                    <form method="POST" action="" accept-charset="UTF-8"
                        class="purchaseForm" enctype="multipart/form-data"><input name="_token" type="hidden"
                            value="H2IvOuPfrkeW6KayvWCjSk4lJRTopoOUF5jAioWC">
                        <div class="container detail-service fixcssacount">
                            <div class="row">
                                <div class="col-md-7" style="margin-bottom:20px;">
                                    <div class="row">
                                        <div class="col-md-5 hidden-xs hidden-sm">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="news_image">
                                                        <img src="{{ asset('uploads/service/'. $service->image) }}" class="loading_lazy"
                                                            data-ignore="true" style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row__face">
                                                <p style="margin-top: 15px" class="bb"><i class="fas fa-calendar-check"
                                                        aria-hidden="true"></i> {{  $service->title  }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="mb-15 control-label bb">Nhập số tiền cần mua:</span>
                                            <div class="mb-15">
                                                <input autofocus="" value="10000" class="form-control price "
                                                    id="input_pack" type="text" placeholder="Số tiền">
                                                <span style="font-size: 14px;">Số tiền thanh toán phải từ
                                                    <b style="font-weight:bold;">10.000 đ</b> đến <b style="font-weight:bold;">500.000 đ</b>
                                                </span>
                                            </div>
                                            <span class="mb-15 control-label bb">Hệ số:</span>
                                            <div class="mb-15">
                                                <input type="text" id="txtDiscount" class="form-control t14"
                                                    placeholder="8" value="" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="emply-btns">
                                        <div class="col-md-12">
                                            <div class="emply-btns text-center">
                                                <input type="hidden" name="value" value="10000">
                                                <input type="hidden" name="selected" value="10000">
                                                <input type="hidden" name="server" value="NaN">
                                                <a id="txtPrice"
                                                    style="font-size: 20px;font-weight: bold;text-decoration: none;color: #FFFFFF"
                                                    class="">Tổng nhận: 85 Robux</a>
                                                <button id="btnPurchase" type="button" style="font-size: 20px;"
                                                    class="followus"><i class="fa fa-credit-card" aria-hidden="true"></i>
                                                    Thanh toán</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif"
                                        style="width: 50px;height: 50px;display: none"></div>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"
                                            style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">
                                            Xác nhận thông tin thanh toán</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div>
                                        <div class="row error__service">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <span class="mb-15 control-label bb">Tên đăng nhập Roblox:</span>
                                        <div class="mb-15">
                                            <input type="text" required="" name="customer_data0"
                                                class="form-control t14 " placeholder="Tên đăng nhập Roblox"
                                                value="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="index" value="1">
                                    <div class="modal-footer modal-footer__data">
                                        <div>
                                            <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"
                                                href="/login?return_url=/dich-vu/robux-gamepass-120h">Đăng nhập</a>
                                        </div>
                                        <button type="button"
                                            class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                                            data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="container fixcssacount">
                        <div class="job-wide-devider">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right data-bot"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 column">
                                    <div class="job-details">
                                        <h2
                                            style="margin-bottom: 23px;font-size: 20px;font-weight: bold;text-transform: uppercase;">
                                            Mô tả</h2>
                                        <div class="table-responsive">
                                            <table align="center" border="">
                                                <tbody>
                                                    <tr>
                                                        <td><span style="font-size:16px">✅
                                                                Nạp<em><strong>&nbsp;Robux</strong></em>&nbsp;chính hãng
                                                                sạch và
                                                                chất lượng</span></td>
                                                        <td><span style="font-size:16px"><strong>⭐ Robux</strong>&nbsp;được
                                                                bán
                                                                tại
                                                                Shop game Roblox cam kết chính hãng 100%</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-size:16px">✅ Shop bán&nbsp;<strong><em>ROBUX
                                                                        GAMEPASS5 ngày (120H)&nbsp;</em></strong>giá rẻ,
                                                                nhanh
                                                                chóng</span></td>
                                                        <td><span style="font-size:16px"><strong>⭐ Mua Roblox </strong>với
                                                                mức
                                                                giá
                                                                cực rẻ so với các cách mua thông thường</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-size:16px">✅ Shop&nbsp;<em><strong>Bán
                                                                        Robux</strong></em>&nbsp;đáng tin cậy và an toàn
                                                                nhất</span>
                                                        </td>
                                                        <td><span style="font-size:16px"><strong>⭐ </strong>Hệ thống bán
                                                                Robux
                                                                uy
                                                                tín nhất, nạp ngay trực tiếp vào tài khoản game của người
                                                                mua
                                                                chỉ
                                                                bằng tên nhân vật&nbsp;</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <div style="text-align: center;margin: 15px 0">
                                            <span class="viewmore">Xem tất cả »</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <input style="display: none" type="text" value="1801" id="id_service">
        </div>
        </div>
@endsection
