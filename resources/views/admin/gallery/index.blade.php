@extends('admin.dashboard')
@section('content')
    <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm gallery</h2>
                </div>
                {{-- Lấy các lỗi khi người dùng nhập thiếu hoặc trùng  --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
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

                    <a href="{{ route('nick.index') }}" class="btn btn-success">Liệt kê nick game</a>
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nick_id" value="{{ Request::segment(2) }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" required multiple name="image[]" class="form-control">
                        </div>
                        {{-- PHỤ KIỆN --}}
                        <span id="attribute"></span>
                        <button type="submit" class="btn btn-primary">Add image</button>
                    </form>
                    <div class="table-responsive" style="max-width: 100%">
                        <table class="table table-hover mt-2">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Hình ảnh</th>
                                    <th class="fixed-column" style="width: 50px">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallery as $key => $gal)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $gal->title }}</td>
                                        <td>
                                            <img width="150px" src="{{ asset('uploads/gallery/'.$gal->image) }}"
                                                alt="">
                                        </td>
                                        <td class="fixed-column">
                                            <form action="{{ route('gallery.destroy', [$gal->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Bạn có muốn xóa mục này hong?');"
                                                    class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
