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
                        <div class="account_pay_card">
                            <div class="account_sidebar_content_title">
                                <p>NẠP THẺ</p>
                                <div class="account_sidebar_content_line"></div>
                            </div>
                            <div class="col-auto pl-0 pr-0 " id="form-content">
                                <form action="{{ route('nap-the') }}" method="POST" class="form-charge" id="form-charge2">
                                    <input type="hidden" name="_token" value="kVmDg3abhJ5v6xTBXrYPyCs3n713gnkOtEQjTe5h">
                                    <div class="form-group row ">
                                        <label class="col-md-3 control-label">
                                            Loại thẻ:
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group" style="width: 100%">
                                                <select id="telecom" name="type" class="form-control">
                                                    <option value="VINAPHONE">VINAPHONE</option>
                                                    <option value="MOBIFONE">MOBIFONE</option>
                                                    <option value="VCOIN">VCOIN</option>
                                                    <option value="GATE">GATE</option>
                                                    <option value="ZING">ZING</option>
                                                    <option value="VIETNAMMOBILE">VIETNAMMOBILE</option>
                                                    <option value="GARENA">GARENA</option>
                                                    <option value="VIETTEL">VIETTEL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">
                                            Mệnh giá:
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group" style="width: 100%">
                                                <select name="amount" id="amount" class="form-control">
                                                    <option value="">-- Vui lòng chọn mệnh giá, sai mất thẻ --
                                                    </option>
                                                    <option value="10000" rel-ratio="undefined">10.000 VNĐ - Nhận 70.0%
                                                    </option>
                                                    <option value="20000" rel-ratio="undefined">20.000 VNĐ - Nhận 70.0%
                                                    </option>
                                                    <option value="30000" rel-ratio="undefined">30.000 VNĐ - Nhận 70.0%
                                                    </option>
                                                    <option value="50000" rel-ratio="undefined">50.000 VNĐ - Nhận 70.0%
                                                    </option>
                                                    <option value="100000" rel-ratio="undefined">100.000 VNĐ - Nhận 72.0%
                                                    </option>
                                                    <option value="200000" rel-ratio="undefined">200.000 VNĐ - Nhận 72.0%
                                                    </option>
                                                    <option value="300000" rel-ratio="undefined">300.000 VNĐ - Nhận 72.0%
                                                    </option>
                                                    <option value="500000" rel-ratio="undefined">500.000 VNĐ - Nhận 72.0%
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">
                                            Mã số thẻ:
                                        </label>
                                        <div class="col-md-6 change_pin">
                                            <div class="input-group" style="width: 100%">
                                                <input type="text" class="form-control" name="pin" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">
                                            Số Serial:
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group" style="width: 100%">
                                                <input type="text" class="form-control" name="serial" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">
                                            Mã bảo vệ:
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group" style="width: 100%">
                                                <input type="text" class="form-control" name="captcha" id="captcha"
                                                    required="">
                                                <div style="    border: 1px solid #ced4da;height: 38px;display:flex">
                                                    <div class="captcha_1">
                                                        <span class="capchaImage h-100 d-flex"><img
                                                                src="https://nick.vn/captcha/default?3LLAxB0T"></span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn reload" onclick="reloadCaptcha()"
                                                    style="border-radius: 4px;color: red">
                                                    ↻
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row " style="margin: 20px 0">
                                        <div class="col-md-6" style="    margin-left: 25%;">
                                            <button
                                                class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block google_buy_charge"
                                                type="submit">Nạp thẻ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="paycartdata">
                            <div class="table-responsive">
                                <table class="table table-hover table-custom-res">
                                    <thead>
                                        <tr>
                                            <th>Thời gian</th>
                                            <th>Nhà mạng</th>
                                            <th>Mã thẻ</th>
                                            <th>Serial</th>
                                            <th>Mệnh giá</th>
                                            <th>Kết quả</th>
                                            <th>Thực nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="col-md-12 left-right justify-content-end paginate__v1 paginate__v1__nt paginate__v1_mobie frontend__panigate">
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
            var thongTinElement = document.querySelector('.account_nap-the');
            if (thongTinElement) {
                thongTinElement.classList.add('menu_active');
            }
        });
    </script>
@endsection
