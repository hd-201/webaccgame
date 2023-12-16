@extends('admin.dashboard')
@section('content')
    <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h2>Vòng quay may mắn</h2>
                </div>
                <style>
                    .wheel_box{
                        position: relative;
                    }
                    img.marker{
                        position: absolute;
                        top: 186px;
                        left: 201px;
                        opacity: 0.8;
                    }
                    img.marker:hover{
                        opacity: 1;
                        transition: 0.2s all ease;
                    }
                </style>
                <div class="card-body">
                    <div class="wheel_box">
                        <img class="wheel" src="{{asset('frontend/images/vongquaylq.png')}}" alt="" height="500px" width="500px">
                        <a onclick="return Spin_Wheel()" id="marker_click" style="cursor: pointer;">
                            <img  class="marker" id="marker_style" src="{{asset('frontend/images/marker.png')}}" width="100px" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
