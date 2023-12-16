@extends('admin.dashboard')
@section('content')
 <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">Cập nhật blog</div>

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
                    <form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" class="form-control" id="title" onkeyup="ChangeToSlug();" required value="{{$blog->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input name="slug" class="form-control" id="convert_slug" value="{{$blog->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" id="desc_edit" name="description" required>{{$blog->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content</label>
                            <textarea class="form-control" id="content_edit" name="content" required>{{$blog->content}}</textarea>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img width="150px" src="{{asset('uploads/blog/'.$blog->image)}}" alt="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select class="form-control" name="type" required>
                                @if ($blog->type=='blogs')
                                    <option value="blogs" selected>Blogs</option>
                                    <option value="instruct">Hướng dẫn</option>
                                @else
                                    <option value="blogs">Blogs</option>
                                    <option value="instruct" selected>Hướng dẫn</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" required>
                                @if ($blog->status==1)
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                @else
                                    <option value="1">Hiển thị</option>
                                    <option value="0" selected>Không hiển thị</option>
                                @endif
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  @endsection