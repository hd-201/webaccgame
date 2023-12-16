@extends('admin.dashboard')
@section('content')
    <div class="page-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách phụ kiện</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('accessory.create') }}" class="btn btn-success">Thêm phụ kiện</a>
                    <div class="table-responsive" style="max-width: 100%">
                        <table class="table table-hover mt-2">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Thuộc game</th>
                                    <th>Hiển thị</th>
                                    <th class="fixed-column" style="width: 50px">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accessories as $key => $accessory)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $accessory->title }}</td>
                                        <td>{{ $accessory->category->title }}</td>
                                        <td>
                                            @if ($accessory->status == 0)
                                                Không hiển thị
                                            @else
                                                Hiển thị
                                            @endif
                                        </td>
                                        <td class="fixed-column">
                                            <a href="{{ route('accessory.edit', $accessory->id) }}" class="btn btn-warning"
                                                href="">Sửa</a>
                                            <form action="{{ route('accessory.destroy', [$accessory->id]) }}" method="POST">
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
                        {{ $accessories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
