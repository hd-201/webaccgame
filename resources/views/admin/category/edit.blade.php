@extends('admin.dashboard')
@section('content')
 <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h3>Cập nhật danh mục</h3>
                </div>
    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <a href="{{route('category.index')}}" class="btn btn-success">Liệt kê danh mục game</a>
                    <a href="{{route('category.create')}}" class="btn btn-success">Thêm danh mục game</a>
                    <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')

                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" class="form-control" id="title" onkeyup="ChangeToSlug();" required value="{{$category->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input name="slug" class="form-control" id="convert_slug" required value="{{$category->slug}}">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="description" required>{{$category->description}}</textarea>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img width="150px" src="{{asset('uploads/category/'.$category->image)}}" alt="" required>

                        </div>  
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" required>
                                @if ($category->status==1)
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