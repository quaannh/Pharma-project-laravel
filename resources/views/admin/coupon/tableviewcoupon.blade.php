@extends('admin.master')
@section('content')
    <div class="py-5">
        <div class="row d-flex justify-content-center">
            <h2>Danh Sách Mã Giảm Giá, Khuyến Mãi</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th style="width: 5%">STT</th>
                        <th style="width: 20%">Mã Code</th>
                        <th style="width: 20%">Loại Code</th>
                        <th style="width: 15%">Giá Trị</th>
                        <th style="width: 20%">Hạn Sử Dụng</th>
                        <th style="width: 20%">Phạm Vi</th>
                        <th style="width: 10%">Trạng Thái</th>
                        <th colspan="3">
                            <a href="{{ url('admin/coupons/them-ma-giam-gia') }}"><i
                                    class="fa fa-plus-circle"></i> Thêm Mới</a>
                        </th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @php
                        $i = 1;
                    @endphp

                    @foreach ($coupon as $item)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $item->ma_code }}</td>
                            <td >{{ $item->loai_code }}</td>
                            <td>
                                <?php 
                                if( $item->loai_code =='tỷ lệ phần trăm')
                                echo $item->gia_tri .' %';
                                else
                                echo number_format($item->gia_tri) .' VNĐ';
                                ?>
                                </td>
                            <td>{{ $item->han_su_dung }}</td>
                            <td >{{ $item->pham_vi_ap_dung }}</td>
                            <td>
                                <?php if ($item->trang_thai == 0) {
                                    echo 'not active';
                                    } else {
                                    echo 'active';
                                    } ?>
                            </td>
                            <td>
                                <a href="{{ url('admin/coupons/danh-sach/cap-nhat/' . $item->id) }}">
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
                                            Coupon: {{ $item->ma_code }}. Sẽ Được Xóa, Xác Nhận Để Xóa.
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <a href="/admin/coupons/xoa/{{ $item->id }}">
                                            @method('DELETE')
                                            <button type="button" class="btn btn-primary">Xóa</button>
                                        </a>
                                        </div>
                                      </div>
                                    </div>
                                </div>                           
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
