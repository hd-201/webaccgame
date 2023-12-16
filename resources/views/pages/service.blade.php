@extends('layout')
@section('content')
<div class="c-layout-page">
    <div class="container">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>
             <li class="breadcrumb-item"><a href="{{ route('dichvu') }}" title="Dịch vụ">Dịch vụ</a></li>
          </ol>
       </nav>
       <div class="row row-flex-safari game-list">
         @foreach ($service as $key => $serv)
             <div class="col-sm-3 col-xs-6 p-5">
                 <div class="classWithPad">
                     <div class="news_image">
                         <img style="position: absolute;max-width: 79px;height: auto;top: -5px;right: -6px;z-index: 1122;"
                             src="{{ asset('frontend/images/giam.png') }}" />
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
                           Giao dịch: 
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
                                     <a href="{{ route('dichvucon', [$serv->slug]) }}" class=""
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
    </div>
</div>
@endsection