@extends('admin.dashboard')
@section('content')
    <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách blog</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('blog.create') }}" class="btn btn-success">Thêm blog</a>
                    <div class="table-responsive" style="max-width: 100%">
                        <table class="table table-hover mt-2">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Tên blog</th>
                                    <th>Slug</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Loại</th>
                                    <th>Hiển thị</th>
                                    <th class="fixed-column" style="width: 50px">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blog as $key => $blo)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $blo->title }}</td>
                                        <td>{{ $blo->slug }}</td>
                                        <td>{!! $blo->description !!}</td>
                                        <td>
                                            <img height="100px" src="{{ asset('uploads/blog/' . $blo->image) }}" alt="">
                                        </td>
                                        <td>
                                            @if ($blo->type == 'blogs')
                                                Blogs
                                            @else
                                                Hướng dẫn
                                            @endif
                                        </td>
                                        <td>
                                            @if ($blo->status == 0)
                                                Không hiển thị
                                            @else
                                                Hiển thị
                                            @endif
                                        </td>
                                        <td class="fixed-column"s>
                                            <a href="{{ route('blog.edit', $blo->id) }}" class="btn btn-warning"
                                                href="">Sửa</a>
                                            <form action="{{ route('blog.destroy', [$blo->id]) }}" method="POST">
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
                    <div class="d-flex justify-content-end">
                        {{ $blog->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
