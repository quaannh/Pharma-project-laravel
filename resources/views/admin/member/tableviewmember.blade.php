@extends('admin.master')
@section('content')
    <div class="py-5">
        <div class="row d-flex justify-content-center">
            <h2>Danh Sách Thành Viên</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 10%">Mã TV</th>
                        <th style="width: 20%">Họ Tên</th>
                        <th style="width: 10%">Sinh Nhật</th>
                        <th style="width: 10%">Giới Tính</th>
                        <th style="width: 10%">Email</th>
                        <th style="width: 10%">Điện Thoại</th>
                        <th style="width: 15%">Hạng</th>
                        <th style="width: 10%">Xem Chi Tiết</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($member as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->ma_thanh_vien }}</td>
                            <td>{{ $item->ho_thanh_vien }} {{ $item->ten_thanh_vien }}
                            </td>
                            <td>{{ $item->sinh_nhat }}
                            </td>
                            <td>{{ $item->gioi_tinh }}
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->dien_thoai }}</td>
                            <td>{{ $item->hang_thanh_vien }}</td>
                            <td>
                                <a href="{{ url('admin/member/danh-sach/xem-chi-tiet/' . $item->id) }}">
                                    <button type="button" class="btn btn-primary">Xem</button>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
