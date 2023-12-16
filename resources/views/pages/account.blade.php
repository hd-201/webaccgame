@extends('layout')
@section('content')
    <div class="c-layout-page" style="">
        <style>
            .btn-submit {
                background-color: #2579f2;
                border-color: transparent;
                border-width: 1px;
                color: #fff;
                border-radius: 0.375rem;
                font-weight: 500;
                height: 2.5rem;
                padding-left: 1rem;
                padding-right: 1rem;
                margin-left: 16px;
                cursor: pointer;
            }
        </style>
        <div class="account">
            <div class="account_content">
                <div class="container">
                    @include('layouts.navbar')
                    <div class="account_sidebar_content" id="historical_content">
                        <div class="account_sidebar_content_title">
                            <p>Thông tin tài khoản</p>
                            <div class="account_sidebar_content_line"></div>
                        </div>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">ID của bạn:</th>
                                    <th id="info_id"><span class="id-profile">{{ Auth::user()->id }}</span>
                                        <button type="button border-none" class="copy-text">
                                            <img src="/frontend/images/copy-black.png" alt=""
                                                class="img-affiliate loading_lazy" data-ignore="true">
                                        </button>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">Tên tài khoản</th>
                                    <th id="info_name"><span>{{ Auth::user()->name }}</span></th>
                                </tr>
                                <tr>
                                    <th scope="row">Số dư tài khoản:</th>
                                    <th id="info_balance"><span><i class="text-danger">{{ number_format(Auth::user()->surplus ,0,',',',')}} đ</i></span></th>
                                </tr>
                                <tr>
                                    <th scope="row">Mật khẩu</th>
                                    <td><a href=""
                                            style="color: red;text-decoration: none;font-weight: 600;font-style: italic">Đổi
                                            mật khẩu</a></td>
                                </tr>
                                <tr></tr>
                            </tbody>
                        </table>
                        <div class="affiliate-enable">
                            <div class="d-flex align-items-center c-mt-12">
                                <form class="w-100 d-flex" id="affiliate-enable">
                                    <input type="text" class="form-control"
                                        placeholder="Nhập mã giới thiệu" name="refId" id="ref_id">
                                    <button type="submit" class="btn btn-primary">
                                        Gửi
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tìm thẻ có class là 'account_thong-tin' và thêm class 'menu_active'
            var thongTinElement = document.querySelector('.account_thong-tin');
            if (thongTinElement) {
                thongTinElement.classList.add('menu_active');
            }
        });
    </script>
@endsection
