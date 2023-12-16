@extends('admin.dashboard')
@section('content')
 <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">Sửa nick game</div>
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
    
                    <a href="{{route('nick.index')}}" class="btn btn-success">Liệt kê nick game</a>
                    <a href="{{route('nick.create')}}" class="btn btn-success">Thêm nick game</a>
                    <form action="{{route('nick.update', $nick->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" id="title" class="form-control" value="{{ $nick->title }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="description">{{ $nick->description }}</textarea>
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img width="250px" src="{{asset('uploads/nick/'.$nick->image)}}" alt="{{$nick->image}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input name="price" class="form-control" value="{{ $nick->price }}">
                        </div>  
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" required>
                                @if ($nick->status==1)
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                @else
                                    <option value="1">Hiển thị</option>
                                    <option value="0" selected>Không hiển thị</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thuộc game</label>
                            <select class="form-control " name="category_id" id="choose_category">
                                <option value="0">---Vui lòng chọn game---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id==$nick->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thuộc game</label>
                            <input name="attribute" class="form-control" value="{{ $nick->attribute }}">
                            {{-- <select class="form-control " name="category_id" id="choose_category">
                                <option value="0">---Vui lòng chọn game---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        {{-- PHỤ KIỆN --}}
                        <span id="attribute"></span>
                        <button type="submit" class="btn btn-primary">Update nick</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  @endsection