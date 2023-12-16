<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
    aria-hidden="true">
    <form method="POST" action="/atm" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token"
            type="hidden" value="7mjSAWzGmgGvTOk3PfRY089LeW1tHuW4PMUHKBmF">
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
                        <a href="#bank" role="tab" data-toggle="tab" class="c-font-16" aria-expanded="true">Thanh
                            toán</a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#wallet" role="tab" data-toggle="tab" class="c-font-16" aria-expanded="false">Thông
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
                                            <th colspan="2">Thông tin tài khoản #<span id="nick-code"></span></th>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr style="background: #fff">
                                            <th>Danh mục:</th>
                                            <td><span id="nick-title"></span></td>
                                        </tr>

                                        <tr style="background: #f2f2f2">
                                            <td>Giá tiền:</td>
                                            <th class="text-info datagiamgia" data-giamgia="250.000 đ">
                                                <span id="nick-price"></span> đ
                                            </th>
                                        </tr>
                                        <tr style="background: #fff">
                                            <td class="c-account-price-title card--attr__name">Giảm giá:</td>
                                            <th class="text-info acc-price data_discount">0 đ</th>

                                        </tr>
                                        <tr style="background: #f2f2f2">
                                            <td>Tổng thanh toán:</td>
                                            <th class="text-info data_total_price">
                                                <span id="nick-price"></span>đ
                                            </th>
                                        </tr>

                                    </tbody>
                                </table>
                            </li>
                        </ul>
                        {{-- <div class="data_km c-pt-10 voucher" style="width: 100%">
                        <div class=" c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-4"
                            style="background:#f2f2f2;border: 1px solid #DEE2E6;">
                            <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                <div class="card--attr__name fz-16 fw-500 text-center" style="color: #676A6C">
                                    Nhập mã giảm giá
                                </div>
                                <div class="card--attr__value fz-13 fw-500">
                                </div>
                            </div>
                            <div class="card--attr justify-content-between c-mb-16 text-center">
                                <div class="input-group mb-3 card--attr discount_code_data_input">
                                    <input type="text" class="form-control discount_code"
                                        placeholder="Nhập mã giảm giá">
                                    <div class="input-group-append">
                                        <span class="input-group-text refresh-captcha refresh_discount"
                                            data-randid="Q436044" data-price="250000"
                                            style="color: #17a2b8;border: 1px solid #ced4da;border-top-left-radius: 1px;border-bottom-left-radius: 1px;">Áp
                                            dụng</span>
                                    </div>
                                </div>
                            </div>
                            <div class="error__text" style="margin-top: 4px;text-align: left;color: #DA4343"></div>
                            <div class="sussess__text" style="margin-top: 4px;text-align: left;color: #00a651"></div>
                            <div class="card--attr__value fz-13 fw-500">

                            </div>
                        </div>
                    </div> --}}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="wallet">
                        <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                            <li class="c-font-dark">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Chi tiết tài khoản #YTT437132</th>
                                        </tr>
                                        <tr>
                                            <td style="width:50%">Game:</td>
                                            <td class="text-danger" style="font-weight: 700">Blox Fruits</td>
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
                <p style="color: #DA4343;">Số dư tài khoản không đủ để thanh toán vui lòng nạp tiền để tiếp tục giao dịch</p>
            </div>
            <div class="d-flex justify-content-center w-100">
                <button class="btn-nick btn-primary">Thanh toán</button>
                <button class="btn-nick btn-green" data-toggle="modal" data-target="#rechargeModal"
                    data-dismiss="modal">Nạp tiền</button>
            </div>
        </div>
    </form>
</div>
