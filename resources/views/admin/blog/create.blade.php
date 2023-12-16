@extends('admin.dashboard')
@section('content')
 <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">Thêm blog</div>

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
    
                    <a href="{{route('blog.index')}}" class="btn btn-success">Liệt kê blog</a>
                    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" id="title" onkeyup="ChangeToSlug();" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input name="slug" class="form-control" id="convert_slug" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" id="desc_edit" name="description" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content</label>s
                            <textarea class="form-control" id="content_edit" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select class="form-control" name="type" required>
                                <option value="blogs" selected>Blogs</option>
                                <option value="instruct">Hướng dẫn</option>
                            </select>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" >
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  @endsection
