@extends('admin.dashboard')
@section('content')
<div class="page-content">
    <div class="">
        <div class="card">
            <div class="card-header">
                <h2>Danh sách nick game</h2>
            </div>
            <div class="card-body" >
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{route('nick.create')}}" class="btn btn-success">Thêm nick game</a>
                <div class="table-responsive" style="max-width: 100%">
                    <table class="table table-hover mt-2">
                        <thead>
                          <tr class="table-dark">
                            <th>ID</th>
                            <th>Tên nick</th>
                            <th>Mã số</th>
                            <th>Thư viện ảnh</th>
                            <th style="max-width: 50px">Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Thuộc nick</th>
                            <th>Thuộc tính</th>
                            <th>Giá</th>
                            <th>Hiển thị</th>
                            <th class="fixed-column" style="width: 50px">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($nicks as $key => $nick)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$nick->title}}</td>
                                <td>{{$nick->code}}</td>
                                <td>
                                    <a href="{{ route('gallery.edit',[$nick->id]) }}" class="btn btn-success">
                                        Thêm ảnh
                                        @if($nick->gallery_count==0)
                                        <span class="badge text-bg-danger">{{ $nick->gallery_count }} ảnh</span>
                                        @else
                                        <span class="badge text-bg-dark">{{ $nick->gallery_count }} ảnh</span>
                                        @endif
                                    </a></td>
                                <td >{{$nick->description}}</td>
                                <td>
                                    <img width="150px" src="{{asset('uploads/nick/'.$nick->image)}}" alt="">
                                </td>
                                <td>{{$nick->category->title}}</td>
                                <td>
                                   @php
                                       $attribute = json_decode($nick->attribute);
                                   @endphp
                                   @foreach ($attribute as $attri)
                                       <span class="badge text-bg-success">{{ $attri }}</span>
                                   @endforeach
                                </td>
                                <td>{{$nick->price}}</td>
                                <td>
                                    @if ($nick->status==0)
                                        Không hiển thị
                                    @else
                                        Hiển thị
                                    @endif
                                </td>
                                <td class="fixed-column">
                                    <a href="{{route('nick.edit', $nick->id)}}" class="btn btn-warning" href="">Sửa</a>
                                    <form action="{{route('nick.destroy', [$nick->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa mục này hong?');" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{$nicks->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection