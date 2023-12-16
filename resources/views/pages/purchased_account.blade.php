@extends('layout')
@section('content')
    <div class="c-layout-page">
        <div class="account">
            <div class="account_content">
                <div class="container">
                    @include('layouts.navbar')
                    <div class="account_sidebar_content" id="historical_content">
                        <div class="account_sidebar_content_title">
                            <p>TÀI KHOẢN ĐÃ MUA</p>
                            <div class="account_sidebar_content_line"></div>
                        </div>
                        <div class="account_content_transaction_history">
                            <form class="form-charge form-charge__accountls account_content_transaction_history__v2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span>Mã tài khoản #</span>
                                            <input type="text" name="serial" class="form-control serial"
                                                placeholder="Mã tài khoản">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span>Trạng thái</span>
                                            <select class="form-control status" name="status">
                                                <option value="" selected="selected">Chọn trạng thái</option>
                                                <option value="0">Thành công</option>
                                                <option value="2">Chờ xử lý</option>
                                                <option value="3">Đang check thông tin</option>
                                                <option value="4">Sai thông tin</option>
                                                <option value="5">Đã xoá</option>
                                                <option value="6">Check lỗi</option>
                                                <option value="15">Sai mật khẩu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group date" id="transaction_history_start">
                                                <span class="input-group-btn">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control started_at"
                                                    name="started_at" autocomplete="off" placeholder="Từ ngày">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group date" id="transaction_history_end">
                                                <span class="input-group-btn">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control ended_at"
                                                    name="ended_at" autocomplete="off" placeholder="Đến ngày">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span>Giá tiền</span>
                                            <select class="form-control" name="price">
                                                <option value="" selected="selected">Chọn giá tiền</option>
                                                <option value="0-50000">Dưới 50K</option>
                                                <option value="50000-200000">Từ 50K - 200K</option>
                                                <option value="200000-500000">Từ 200K - 500K</option>
                                                <option value="500000-1000000">Từ 500K - 1 Triệu</option>
                                                <option value="1000000-5000000">Trên 1 Triệu</option>
                                                <option value="5000000-10000000">Trên 5 Triệu</option>
                                                <option value="10000000">Trên 10 Triệu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="datahtmlcategory">
                                        <div class="input-group">
                                            <span>Game</span>
                                            <select name="key" class="form-control key">
                                                <option value="">Tất cả game</option>
                                                <option value="ban-acc-roblox">Bán Acc Roblox</option>
                                                <option value="nick-lien-quan">Nick Liên Quân</option>
                                                <option value="nick-free-fire">Nick Free Fire</option>
                                                <option value="nick-lien-minh">Nick Liên Minh</option>
                                                <option value="nick-dot-kich">Nick Đột Kích</option>
                                                <option value="acc-genshin-khoi-dau">Acc Genshin Khởi Đầu</option>
                                                <option value="acc-fifa-online-4">Acc FiFa Online 4</option>
                                                <option value="nick-ngoc-rong-online">Nick Ngọc Rồng Online</option>
                                                <option value="ban-nick-nro-lau">Bán Nick Nro Lậu</option>
                                                <option value="ban-nick-toc-chien">Bán Nick Tốc Chiến</option>
                                                <option value="ban-nick-pubg-mobile">Bán Nick PUBG Mobile</option>
                                                <option value="nick-ninja-school">Nick Ninja School</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 item_buy_form_search">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <button type="submit" class="btn btn_timkiem"
                                                        style="position: relative">
                                                        Tìm kiếm
                                                        <div class="row justify-content-center loading-data__timkiem"></div>
                                                    </button>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-all"
                                                        style="position: relative">
                                                        Tất cả
                                                        <div class="row justify-content-center loading-data__all"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="data_pay_account_history" style="position: relative">
                                <div class="table-responsive" id="tableacchstory">
                                    <table class="table table-hover table-custom-res">
                                        <thead>
                                            <tr>
                                                <th>Thời gian</th>
                                                <th>ID</th>
                                                <th>Game</th>
                                                <th>Tài khoản</th>
                                                <th>Trị giá</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="8" style="text-align: center"><span
                                                        style="color: red;font-size: 16px;">Không có dữ liệu !</span></td>
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
            var thongTinElement = document.querySelector('.account_lich-su-mua-account');
            if (thongTinElement) {
                thongTinElement.classList.add('menu_active');
            }
        });
    </script>
@endsection
