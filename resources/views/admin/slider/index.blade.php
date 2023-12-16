@extends('admin.dashboard')
@section('content')
    <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách slider</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('slider.create') }}" class="btn btn-success">Thêm slider</a>
                    <div class="table-responsive" style="max-width: 100%">
                        <table class="table table-hover mt-2">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Tên slider</th>
                                    <th>Mô tả</th>
                                    <th>Hiển thị</th>
                                    <th>Hình ảnh</th>
                                    <th class="fixed-column" style="width: 50px">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider as $key => $slide)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $slide->title }}</td>
                                        <td>{{ $slide->description }}</td>
                                        <td>
                                            @if ($slide->status == 0)
                                                Không hiển thị
                                            @else
                                                Hiển thị
                                            @endif
                                        </td>
                                        <td>
                                            <img height="100px" src="{{ asset('uploads/slider/' . $slide->image) }}"
                                                alt="">
                                        </td>
                                        <td class="fixed-column">
                                            <a href="{{ route('slider.edit', $slide->id) }}" class="btn btn-warning"
                                                href="">Sửa</a>
                                            <form action="{{ route('slider.destroy', [$slide->id]) }}" method="POST">
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
                        {{ $slider->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
