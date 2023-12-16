@extends('admin.dashboard')
@section('content')
 <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">Cập nhật phụ kiện game</div>

                {{-- Lấy các lỗi khi người dùng nhập thiếu hoặc trùng  --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <a href="{{route('accessory.index')}}" class="btn btn-success">Liệt kê phụ kiện</a>
                    <form action="{{route('accessory.update', $accessory->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" class="form-control" id="title"required value="{{$accessory->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" required>
                                @if ($accessory->status==1)
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                @else
                                    <option value="1">Hiển thị</option>
                                    <option value="0" selected>Không hiển thị</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thuộc về game</label>
                            <select class="form-control" name="category_id" required>
                                @foreach ($categories as $cate)
                                    <option {{ $cate->id==$accessory->category_id ? 'selected' : '' }} value="{{ $cate->id }}">{{ $cate->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Accessory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  @endsection