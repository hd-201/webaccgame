@extends('layout')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="video_highlight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">
                        <span id="video_title"></span>
                    </h5>

                    <div class="descrip">
                        <span id="video_description"></span>
                    </div>

                </div>
                <div class="modal-body">
                    <span id="video_link"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="c-layout-page">
        <div class="c-content-box c-size-md">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('video-highlight') }}" title="Dịch vụ">Video</a></li>
                    </ol>
                </nav>
                <form class="form-horizontal form-find m-b-20" role="form" method="get" data-hs-cf-bound="true">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control c-square c-theme" name="key" autocomplete="off"
                                autofocus="" placeholder="Nhập từ khóa..." value="" style="width: 100%">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                            <a class="btn c-btn-square m-b-10 btn-danger" href="https://nick.vn/video">Tất cả</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-9">
                        <div class="art-list">
                            @foreach ($videos as $video)
                                <a style="cursor: pointer;" onclick="return video_highlight({{ $video->id }})">
                                    <div class="a-item">
                                        <div class="thumbnail-image img-thumbnail">
                                            <img src="{{ asset('uploads/video/' . $video->image) }}" alt="png-image">
                                        </div>
                                        <div class="info">
                                            <div class="article_title">
                                                <div
                                                    style="text-transform: uppercase; padding: 7px 0 15px 0; font-size: 18px">
                                                    {{ $video->title }}</div>
                                            </div>
                                            <div class="article_cat_date">
                                                <div style="display: inline-block;margin-right: 15px"><i
                                                        class="fa fa-calendar" aria-hidden="true"></i> 25/10/2023</div>
                                                {{-- <div style="display: inline-block"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <a href="/video/huong-dan" title="Hướng Dẫn">Hướng Dẫn</a></div> --}}
                                            </div>
                                            <div class="article_description hidden-xs">{!! $video->description !!}</div>
                                        </div>
                                </a>
                        </div>
                        @endforeach

                    </div>
                    <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                        {{ $videos->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-content-ver-nav">
                        <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
                            <h3 class="c-font-bold c-font-uppercase">Danh mục</h3>
                            <div class="c-line-left c-theme-bg"></div>
                        </div>
                        <ul class="c-menu c-arrow-dot1 c-theme">
                            <li><a href="/video">Tất cả (34)</a></li>
                            <li><a href="/video/uy-tin-cua-nickvn">Uy Tín Của Hduong.vn (1)</a></li>
                            <li><a href="/video/bai-ghim">Bài Ghim (4)</a></li>
                            <li><a href="/video/tin-game">Tin Game (10)</a></li>
                            <li><a href="/video/huong-dan">Hướng Dẫn (19)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
