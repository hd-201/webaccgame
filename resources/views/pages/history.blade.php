@extends('layout')
@section('content')
    <div class="c-layout-page">
        <div class="account">
            <div class="account_content">
                <div class="container">
                    @include('layouts.navbar')
                    <div class="account_sidebar_content" id="historical_content">
                        <div class="account_sidebar_content_title">
                            <p>LỊCH SỬ GIAO DỊCH</p>
                            <div class="account_sidebar_content_line"></div>
                        </div>
                        <div class="booking_detail"></div>
                        <div class="account_content_transaction_historyv2">
                            <form class="form-charge form-charge__accounttxns account_content_transaction_history__v2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group date" id="transaction_history_start">
                                                <span class="input-group-btn input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control input-group-addon started_at"
                                                    name="started_at" autocomplete="off" placeholder="Từ ngày">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group date" id="transaction_history_end">
                                                <span class="input-group-btn input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control input-group-addon ended_at"
                                                    name="ended_at" autocomplete="off" placeholder="Đến ngày">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 data__config">
                                        <div class="input-group">
                                            <span>Giao dịch</span>
                                            <select name="config" class="form-control config">
                                                <option value="">--Tất cả --</option>
                                                <option value="charge">Nạp thẻ tự động</option>
                                                <option value="service_purchase">Thanh toán dịch vụ</option>
                                                <option value="transfer">Nạp Ví - ATM tự động</option>
                                                <option value="rubywheel">Mingame vòng quay</option>
                                                <option value="flip">Mingame lật hình</option>
                                                <option value="plus_money">Cộng tiền</option>
                                                <option value="minus_money">Trừ tiền</option>
                                                <option value="slotmachine">Mingame quay xèng</option>
                                                <option value="slotmachine5">Mingame quay xèng 5 giải</option>
                                                <option value="squarewheel">Mingame quay vòng vòng</option>
                                                <option value="smashwheel">Mingame đập lu đồng</option>
                                                <option value="rungcay">Mingame rung cây</option>
                                                <option value="gieoque">Mingame gieo quẻ</option>
                                                <option value="buy_acc">Mua tài khoản</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 data__status">
                                        <div class="input-group">
                                            <span>Trạng thái</span>
                                            <select name="status" class="form-control status">
                                                <option value="">--Tất cả --</option>
                                                <option value="0">Không thành công</option>
                                                <option value="1">Thành công</option>
                                                <option value="2">Chờ xử lý</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 item_buy_form_search">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <button type="submit" class="btn btn-timkiem"
                                                        style="position: relative">
                                                        Tìm kiếm
                                                        <div class="row justify-content-center loading-data__timkiem"></div>
                                                    </button>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-all"
                                                        style="position: relative">
                                                        Tất cả
                                                        <div class="row justify-content-center loading-data__timkiem"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="data_lich__su_history" style="position: relative">
                                <div class="table-responsive">
                                    <table class="table table-hover table-custom-res">
                                        <thead>
                                            <tr>
                                                <th>Thời gian</th>
                                                <th>ID</th>
                                                <th>Tài khoản </th>
                                                <th>Giao dịch</th>
                                                <th>Số tiền</th>
                                                <th>Số dư cuối</th>
                                                <th>Nội dung</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="8"><span style="color: red;font-size: 16px;">Không có dữ liệu</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tìm thẻ có class là 'account_lich-su-giao-dich' và thêm class 'menu_active'
            var thongTinElement = document.querySelector('.account_lich-su-giao-dich');
            if (thongTinElement) {
                thongTinElement.classList.add('menu_active');
            }
        });
    </script>
@endsection
