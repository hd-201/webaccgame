@extends('layout')
@section('content')

<div class="c-layout-page">
    <div class="c-content-box c-size-md">
       <div class="container">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>
                @if($blog->type=='blogs')
                  <li class="breadcrumb-item"><a href="{{ route('blogs') }}" title="Dịch vụ">Blogs</a></li>
                @else
                  <li class="breadcrumb-item"><a href="#" title="Dịch vụ">Hướng dẫn</a></li>
                @endif
                <li class="breadcrumb-item"><a href="{{ route('blog_detail',[$blog->slug]) }}" title="Dịch vụ">{{ $blog->title }}</a></li>
            </ol>
        </nav>
          <div class="row">
             <div class="col-md-9">
               <img src="{{asset('uploads/blog/'.$blog->image)}}" alt="png-image" width="50%">
                <h5>{!! $blog->description !!}</h5>
                <p>{!! $blog->content !!}</p>
             </div>
             <div class="col-md-3">
                <div class="c-content-ver-nav">
                   <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
                      <h3 class="c-font-bold c-font-uppercase">Danh mục</h3>
                      <div class="c-line-left c-theme-bg"></div>
                   </div>
                   <ul class="c-menu c-arrow-dot1 c-theme">
                      <li><a href="/blog">Tất cả (34)</a></li>
                      <li><a href="/blog/uy-tin-cua-nickvn">Uy Tín Của Hduong.vn (1)</a></li>
                      <li><a href="/blog/bai-ghim">Bài Ghim (4)</a></li>
                      <li><a href="/blog/tin-game">Tin Game (10)</a></li>
                      <li><a href="/blog/huong-dan">Hướng Dẫn (10)</a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 @endsection