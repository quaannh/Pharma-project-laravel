@extends('admin.master')

@section('content')
    <div class="py-5">
        <div class="row d-flex justify-content-center">
            <h2>Danh Sách Tin Tức</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th style="width: 5%">STT</th>
                        <th style="width: 15%">Tiêu Đề</th>
                        <th style="width: 15%">Hình</th>
                        <th style="width: 30%">Tóm Tắt</th>
                        <th style="width: 10%">Tác Giả</th>
                        <th style="width: 10%">Nhân Viên</th>
                        <th style="width: 10%">Trạng Thái</th>
                        <th colspan="3">
                            <a href="{{ url('admin/tin-tuc/danh-sach/them-tin-tuc') }}"><i
                                    class="fa fa-plus-circle"></i> Thêm Mới</a>
                        </th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @php
                        $i = 1;
                    @endphp

                    @foreach ($tin_tuc as $item)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $item->tieu_de }}</td>
                            <td>
                                <img src="{{ URL::asset('resources/pharma/hinh/hinh_tin_tuc/' . $item->hinh_tin_tuc) }}"
                                    alt="{{ $item->tieu_de }}" class="img-thumbnail">
                            </td>
                            <td style="text-align: start">{{ $item->tom_tat }}</td>
                            <td>{{ $item->tac_gia }}</td>
                            <td>{{ $item->nhan_vien }}</td>
                            <td>
                                <?php if ($item->trang_thai == 0) {
                                    echo 'ẩn';
                                    } else {
                                    echo 'hiện';
                                    } ?>
                            </td>
                            <td>
                                <a href="{{ url('admin/tin-tuc/danh-sach/cap-nhat/' . $item->id) }}">
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
                                            Tin Tức: {{ $item->tieu_de }}. Sẽ Được Xóa, Xác Nhận Để Xóa.
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <a href="/admin/tin-tuc/xoa/{{ $item->id }}">
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
