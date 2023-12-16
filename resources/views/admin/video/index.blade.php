@extends('admin.dashboard')
@section('content')
    <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách video</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('video.create') }}" class="btn btn-success">Thêm video</a>
                    <div class="table-responsive" style="max-width: 100%">
                        <table class="table table-hover mt-2">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Slug</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Video</th>
                                    <th>Hiển thị</th>
                                    <th class="fixed-column" style="width: 50px">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $key => $video)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $video->title }}</td>
                                        <td>{{ $video->slug }}</td>
                                        <td>{{ $video->description }}</td>
                                        <td>
                                            <img height="100px" src="{{ asset('uploads/video/' . $video->image) }}"
                                                alt="">
                                        </td>
                                        <td>
                                            {!! $video->link !!}
                                        </td>
                                        <td>
                                            @if ($video->status == 0)
                                                Không hiển thị
                                            @else
                                                Hiển thị
                                            @endif
                                        </td>
                                        <td class="fixed-column">
                                            <a href="{{ route('video.edit', $video->id) }}" class="btn btn-warning"
                                                href="">Sửa</a>
                                            <form action="{{ route('video.destroy', [$video->id]) }}" method="POST">
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
                        {{ $videos->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
