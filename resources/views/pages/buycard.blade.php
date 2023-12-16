@extends('layout')
@section('content')
<div class="c-layout-page">
   <div class="container">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('mua-the') }}" title="Dịch vụ">Mua thẻ nạp</a></li>
         </ol>
      </nav>
   </div>
   <div class="text-center" style="margin: 40px 0;">
      <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase">DỊCH VỤ MUA THẺ </h2>
   </div>
   <form method="POST" action="" accept-charset="UTF-8" class="" enctype="multipart/form-data" data-hs-cf-bound="true">
      <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">
      <div class="container detail-service">
         <div class="row">
            <div class="col-md-8" style="margin-bottom:20px;">
               <div class="service-info">
                  <div class="col-md-5 hidden-xs hidden-sm ">
                     <div class="news_image" style="margin-top: 10px">
                        <img src="{{ asset('/frontend/images/store-card.jpg') }}" alt="png-image">
                     </div>
                  </div>
                  <div class="col-md-7">
                     <span class="mb-15 control-label bb">Chọn nhà mạng:</span>
                     <div class="mb-15">
                        <select name="telecom_key" id="telecom_key" class="server-filter form-control t14" style="">
                           <option value="VIETTEL">Viettel</option>
                           <option value="SOHACOIN">SohaCoin</option>
                           <option value="VINAPHONE">Vinaphone</option>
                           <option value="MOBIFONE">Mobifone</option>
                           <option value="CARROT">Thẻ Carot (Team)</option>
                           <option value="ZING">Zing Card( Vina Game)</option>
                           <option value="VCOIN">Vcoin (VTC Online)</option>
                           <option value="GATE">Gate (FPT Online)</option>
                           <option value="GARENA">Garena</option>
                           <option value="SCOIN">Scoin ( VTC Mobile)</option>
                           <option value="APPOTA">Appota</option>
                           <option value="VIETNAMOBILE">Vietnamobile</option>
                           <option value="FUNCARD">Funcard</option>
                           <option value="GOSU">Gosu</option>
                        </select>
                     </div>
                     <span class="mb-15 control-label bb">Mệnh giá:</span>
                     <div class="mb-15">
                        <select name="amount" id="amount" class="server-filter form-control t14" style="">
                           <option r-default="0" value="10000" rel-ratio="100.0">10,000 VNĐ - 0%</option>
                           <option r-default="0" value="20000" rel-ratio="100.0">20,000 VNĐ - 0%</option>
                           <option r-default="0" value="50000" rel-ratio="97.0">50,000 VNĐ - 3%</option>
                           <option r-default="0" value="100000" rel-ratio="97.0">100,000 VNĐ - 3%</option>
                           <option r-default="0" value="200000" rel-ratio="97.0">200,000 VNĐ - 3%</option>
                           <option r-default="0" value="500000" rel-ratio="97.0">500,000 VNĐ - 3%</option>
                        </select>
                     </div>
                     <span class="mb-15 control-label bb">Số lượng:</span>
                     <div class="mb-15">
                        <select name="quantity" id="quantity" class="server-filter form-control t14" style="">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="row">
                  <div class="col-md-12">
                     <div class=" emply-btns text-center">
                        <a id="txtPrice" style="font-size: 20px;font-weight: bold" class="">Tổng: 10,000 VNĐ</a>
                        <a style="font-size: 20px;" class="followus" href="/login" title=""><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán</a>
                        {{-- <a style="font-size: 20px;" class="followus" href="/login" title=""><i class="fa fa-key" aria-hidden="true"></i> Đăng nhập để thanh toán</a> --}}
                     </div>
                  </div>
               </div>
               <div class="row box-body" style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none" alt="png-image"></div>
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Xác nhận thông tin thanh toán</h4>
               </div>
               <div class="modal-body">
                  <p> Bạn thực sự muốn thanh toán?</p>
               </div>
               <div class="modal-footer">
                  <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Đăng nhập</a>
                  <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
@endsection
