@extends('admin.master')

@section('content')
    <div class="py-5">
        <div class="row d-flex justify-content-center">
            <h2>Danh Sách Slider</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th style="width: 5%">STT</th>
                        <th style="width: 15%">Tên Slider</th>
                        <th style="width: 15%">Hình Slider</th>
                        <th style="width: 20%">Tiêu Đề</th>
                        <th style="width: 20%">Nội Dung</th>
                        <th style="width: 10%">Trạng Thái</th>
                        <th colspan="3">
                            <a href="{{ url('admin/slider/danh-sach/them-slider') }}"><i
                                    class="fa fa-plus-circle"></i> Thêm Mới</a>
                        </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($slider as $item)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $item->ten_slider }}</td>
                            <td>
                                <img src="{{ URL::asset('resources/pharma/hinh/hinh_silder/' . $item->hinh_slider) }}"
                                    alt="{{ $item->ten_slider }}" class="img-thumbnail">
                            </td>
                            <td style="text-align: start">{{ $item->tieu_de }}</td>
                            <td style="text-align: start">{{ $item->noi_dung }}</td>
                            <td>                                
                                <?php if ($item->trang_thai == 0) {
                                echo 'ẩn';
                                } else {
                                echo 'hiện';
                                } ?>
                            </td>
                            <td>
                                <a href="{{ url('admin/slider/danh-sach/cap-nhat/' . $item->id) }}">
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
                                            Slider: {{ $item->ten_slider }}. Sẽ Được Xóa, Xác Nhận Để Xóa.
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <a href="/admin/slider/xoa/{{ $item->id }}">
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
