@extends('layout')
@section('content')
    {{-- <x-alert content="Đặt hàng"/> --}}
    <div class="c-content-box c-size-md c-bg-white c-layout-page">
        <div class="container">
            <div class="c-content-box">
                <div id="slider" class="">
                    <div id="slide_banner" class="">
                        @foreach ($slider as $item)
                            <div class="item">
                                <a href="#" alt="{{ $item->title }}">
                                    <img src="{{ asset('uploads/slider/' . $item->image) }}" width="100%"
                                        max-height="435px" alt="{{ $item->title }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin: Testimonals 1 component -->
        <div class="c-content-client-logos-slider-1" data-slider="owl">
            <!-- Begin: Title 1 component -->
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">Dịch vụ nổi bật</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="container">
                <div class="row-flex-safari game-list ">
                    <div class="col-sm-3 col-xs-6 p-20 load-atm">
                        <a ><img src="{{ asset('frontend/images/nap-tien.jpg') }}"
                                width="100%" alt="" />
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-6 p-20">
                        <a href="{{ route('mua-the') }}"><img src="{{ asset('frontend/images/mua-the.jpg') }}"
                                width="100%" alt="" />
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-6 p-20">
                        <a href="{{ route('dichvu') }}"><img src="{{ asset('frontend/images/dich-vu.jpg') }}"
                                width="100%" alt="" />
                        </a>
                    </div>
                    @if (!Auth::user())
                        <div class="col-sm-3 col-xs-6 p-20">
                            <a href="{{ route('login') }}"><img src="{{ asset('frontend/images/tai-khoan.jpg') }}"
                                    width="100%" alt="" />
                            </a>
                        </div>
                    @else
                        <div class="col-sm-3 col-xs-6 p-20">
                            <a href="{{ route('account') }}"><img src="{{ asset('frontend/images/tai-khoan.jpg') }}"
                                    width="100%" alt="" />
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End-->
    </div>
    <!-- End-->
    </div>
    </div>

    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <!-- Begin: Testimonals 1 component -->
            <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
                <!-- Begin: Title 1 component -->
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold">Danh mục game</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <div class="row row-flex-safari game-list">
                    @foreach ($category as $key => $cate)
                        <div class="col-sm-3 col-xs-6 p-5">
                            <div class="classWithPad">
                                <div class="news_image">
                                    <img style="position: absolute;max-width: 79px;height: auto;top: -5px;right: -6px;z-index: 1122;"
                                        src="{{ asset('frontend/images/giam.png') }}" />
                                    <a href="{{ route('mua-nick-slug', [$cate->slug]) }}" title="{{ $cate->title }}"
                                        class="">
                                        <img src="{{ asset('uploads/category/' . $cate->image) }}"
                                            alt="Danh Mục Game {{ $cate->title }}"></a>
                                </div>
                                <div class="news_title">
                                    <h2>
                                        <a href="{{ route('danhmucgame', $cate->slug) }}"
                                            title="{{ $cate->title }}">{{ $cate->title }}</a>
                                    </h2>
                                </div>
                                <div class="news_description">
                                    <p>
                                        Số tài khoản: {{ $cate->nick_count }}
                                    </p>
                                    <!-- <p>
                                         Đã bán: 198
                                         </p> -->
                                </div>
                                <div class="a-more">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="custom72 view">
                                                <a href="{{ route('mua-nick-slug', [$cate->slug]) }}" class=""
                                                    title="{{ $cate->title }}">
                                                    Xem tất cả
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End-->
                </div>

                <!-- End-->
            </div>
        </div>
        <style type="text/css">
            .news_image,
            .image,
            .news_title,
            .a-more,
            .news_description {
                position: relative;
                z-index: 200;
            }

            span.sale {
                position: absolute;
                z-index: 1000;
                right: -1px;
                top: -1px;
                background: rgba(255, 212, 36, .9);
                padding: 5px;
                text-align: center;
                color: #ee4d2d;
                width: 50px;
                font-weight: 700;
                font-size: 15px;
            }

            .sale:after {
                content: "";
                width: 0;
                height: 0;
                left: 0;
                bottom: -4px;
                position: absolute;
                border-color: transparent rgba(255, 212, 36, .9);
                border-style: solid;
                border-width: 0 25px 4px;
            }

            .outPrice {
                padding-top: 20px;
                text-align: center;
                width: 100px;
                margin: 0 auto;
                margin-top: 10px;
                display: flex;
                justify-content: center;
            }

            .oldPrice {
                text-decoration: line-through;
                color: #3f0;
                border: 2px solid;
                padding: 5px 15px;
                border-radius: 5px;
                font-size: 14px;
                font-weight: bold;
            }

            .newPrice {
                border: 2px solid red;
                padding: 5px 15px;
                color: red;
                display: inline;
                border-radius: 5px;
                margin-left: 10px;
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .game-list .a-more .view {
                margin-top: 20px;
            }

            @media (max-width: 550px) {
                .outPrice {
                    flex-direction: column;
                }

                .newPrice {
                    margin-left: 0;
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
            }
        </style>
        <!-- END: PAGE CONTENT -->
    </div>

    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <!-- Begin: Testimonals 1 component -->
            <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
                <!-- Begin: Title 1 component -->
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold">Dịch vụ game</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <div class="row row-flex-safari game-list">
                    @foreach ($service as $key => $serv)
                        <div class="col-sm-3 col-xs-6 p-5">
                            <div class="classWithPad">
                                <div class="news_image">
                                    {{-- <img style="position: absolute;max-width: 79px;height: auto;top: -5px;right: -6px;z-index: 1122;"
                                        src="{{ asset('frontend/images/giam.png') }}" /> --}}
                                    <a href="{{ route('dichvucon', [$serv->slug]) }}" title="{{ $serv->title }}"
                                        class="">
                                        <img src="{{ asset('uploads/service/' . $serv->image) }}"
                                            alt="Danh Mục Game {{ $serv->title }}"></a>
                                </div>
                                <div class="news_title">
                                    <h2>
                                        <a href="{{ route('danhmucgame', $serv->slug) }}"
                                            title="{{ $serv->title }}">{{ $serv->title }}</a>
                                    </h2>
                                </div>
                                <div class="news_description">
                                    <p>
                                        Giao dịch: 7.554 
                                        {{-- {{ $serv->nick_count }} --}}
                                    </p>
                                    <!-- <p>
                                         Đã bán: 198
                                         </p> -->
                                </div>
                                <div class="a-more">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="custom72 view">
                                                <a href="{{ route('danhmucgame', [$serv->slug]) }}" class=""
                                                    title="{{ $serv->title }}">
                                                    Xem tất cả
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End-->
                </div>

                <!-- End-->
            </div>
        </div>
        <style type="text/css">
            .news_image,
            .image,
            .news_title,
            .a-more,
            .news_description {
                position: relative;
                z-index: 200;
            }

            span.sale {
                position: absolute;
                z-index: 1000;
                right: -1px;
                top: -1px;
                background: rgba(255, 212, 36, .9);
                padding: 5px;
                text-align: center;
                color: #ee4d2d;
                width: 50px;
                font-weight: 700;
                font-size: 15px;
            }

            .sale:after {
                content: "";
                width: 0;
                height: 0;
                left: 0;
                bottom: -4px;
                position: absolute;
                border-color: transparent rgba(255, 212, 36, .9);
                border-style: solid;
                border-width: 0 25px 4px;
            }

            .outPrice {
                padding-top: 20px;
                text-align: center;
                width: 100px;
                margin: 0 auto;
                margin-top: 10px;
                display: flex;
                justify-content: center;
            }

            .oldPrice {
                text-decoration: line-through;
                color: #3f0;
                border: 2px solid;
                padding: 5px 15px;
                border-radius: 5px;
                font-size: 14px;
                font-weight: bold;
            }

            .newPrice {
                border: 2px solid red;
                padding: 5px 15px;
                color: red;
                display: inline;
                border-radius: 5px;
                margin-left: 10px;
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .game-list .a-more .view {
                margin-top: 20px;
            }

            @media (max-width: 550px) {
                .outPrice {
                    flex-direction: column;
                }

                .newPrice {
                    margin-left: 0;
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
            }
        </style>
        <!-- END: PAGE CONTENT -->
    </div>
@endsection
