@extends('admin.dashboard')
@section('content')
    <div class="page-content">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-header">
                    <h2>Dịch vụ game</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('service.create') }}" class="btn btn-success">Thêm dịch vụ game</a>
                    <div class="table-responsive" style="max-width: 100%">
                        <table class="table table-hover my-3">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Tên dịch vụ</th>
                                    <th>Slug</th>
                                    <th>Mô tả</th>
                                    <th>Hiển thị</th>
                                    <th>Hình ảnh</th>
                                    <th class="fixed-column" style="width: 50px">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service as $key => $serv)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $serv->title }}</td>
                                        <td>{{ $serv->slug }}</td>
                                        <td>{{ $serv->description }}</td>
                                        <td>
                                            @if ($serv->status == 0)
                                                Không hiển thị
                                            @else
                                                Hiển thị
                                            @endif
                                        </td>
                                        <td>
                                            <img width="150px" src="{{ asset('uploads/service/' . $serv->image) }}"
                                                alt="">
                                        </td>
                                        <td class="fixed-column">
                                            <a href="{{ route('service.edit', [$serv->id]) }}" class="btn btn-warning"
                                                href="">Sửa</a>
                                            <form action="{{ route('service.destroy', [$serv->id]) }}" method="POST">
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
                        {{ $service->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
