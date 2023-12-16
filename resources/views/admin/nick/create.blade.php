@extends('admin.dashboard')
@section('content')
 <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">Thêm nick game</div>
                {{-- Lấy các lỗi khi người dùng nhập thiếu hoặc trùng  --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Vui lòng kiểm tra lại dữ liệu
                    </div> 
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <a href="{{route('nick.index')}}" class="btn btn-success">Liệt kê nick game</a>
                    <form action="{{route('nick.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" id="title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input name="price" id="title" class="form-control" >
                        </div>  
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" >
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thuộc game</label>
                            <select class="form-control " name="category_id" id="choose_category">
                                <option value="0">---Vui lòng chọn game---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- PHỤ KIỆN --}}
                        <span id="attribute"></span>
                        <button type="submit" class="btn btn-primary">Add nick</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  @endsection