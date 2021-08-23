@extends('admin.master')

@section('content')
    <div class="py-5">
        <div class="row d-flex justify-content-center">
            <h2>Danh Sách Sản Phẩm</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th style="width: 5%">STT</th>
                        <th style="width: 10%">Tên Sản Phẩm</th>
                        <th style="width: 10%">Hình Sản Phẩm</th>
                        <th style="width: 10%">Giá Sản Phẩm</th>
                        <th style="width: 10%">Giảm Giá</th>
                        <th style="width: 10%">Đơn Vị</th>
                        <th style="width: 10%">Nguồn Gốc</th>
                        <th style="width: 5%">Mã Loại</th>
                        <th style="width: 30%">Mô Tả</th>
                        <th colspan="3">
                            <a href="{{ url('admin/san-pham/danh-sach/them-san-pham') }}"><i class="fa fa-plus-circle"></i> Thêm
                                Mới</a>
                        </th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($dssp as $item)
                        <tr>
                            <th scope="row">{{$item->id }}</th>
                            <td>{{ $item->ten_san_pham }}</td>
                            <td>
                                <img src="{{ URL::asset('resources/pharma/hinh/hinh_san_pham/' . $item->hinh_san_pham) }}"
                                    alt="{{ $item->ten_san_pham }}" class="img-thumbnail">
                            </td>
                            <td>{{ number_format($item->gia_san_pham) }} VNĐ</td>
                            <td>{{ number_format($item->giam_gia) }} VNĐ</td>
                            <td >{{ $item->don_vi }}</td>
                            <td >{{ $item->nguon_goc }}</td>
                            <td >{{ $item->ma_loai }}</td>
                            <td style="text-align: start">{{ $item->mo_ta_tom_tat }}</td>
                            <td>
                                <a href="{{ url('admin/san-pham/danh-sach/cap-nhat/' . $item->id) }}">
                                    <button type="button" class="btn btn-primary">Sửa</button>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete{{$item->id}}">
                                    Xóa
                                </button>
                                <!-- Modal Xác Nhận Xóa-->
                                <div class="modal fade" id="delete{{$item->id}}">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Xác Nhận</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            Sản Phẩm: {{ $item->ten_san_pham }}. Sẽ Được Xóa, Xác Nhận Để Xóa.
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <a href="/admin/san-pham/xoa/{{ $item->id }}">
                                            @method('DELETE')
        
                                            <button type="button" class="btn btn-primary">Xóa</button>
                                        </a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
 
                </tbody>

            </table>
            
        </div>
    </div>
@endsection
