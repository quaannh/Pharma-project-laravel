@extends('admin.master')

@section('content')

    <div class="py-5">

        <div class="row d-flex justify-content-center">
            <h2>Danh Sách Đơn Hàng Chưa Xử Lý</h2>
        </div>
        @if (count($order_new) == 0)
            <div class="row d-flex justify-content-center" style="border: 0.1px soil:black">
                <h5 >Không Có Đơn Hàng Mới Chưa Xử Lý</h5>
            </div>
        @else
            <div class="table-responsive ">
                <table class="table table-bordered table-hover" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="width: 15%">Mã Hóa Đơn</th>
                            <th style="width: 15%">Ngày Hóa Đơn</th>
                            <th style="width: 15%">Tổng Tiền </th>
                            <th style="width: 15%">Mã Giảm Giá</th>
                            <th style="width: 15%">Còn Lại</th>
                            <th style="width: 15%">Trạng Thái</th>

                            <th colspan="3"></th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        @foreach ($order_new as $item)
                            <tr>

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->ngay_hoa_don }}</td>
                                <td>{{ number_format($item->tong_tien) }} VNĐ</td>
                                <td>{{ number_format($item->nhap_coupon) }} VNĐ</td>
                                <td>{{ number_format($item->con_lai) }} VNĐ</td>
                                <td>
                                    <?php if ($item->trang_thai == 0) {
                                    echo 'chưa giao';
                                    } else {
                                    echo 'đã giao';
                                    } ?>
                                </td>

                                <td>
                                    <a href="{{ url('admin/order/danh-sach/xem-chi-tiet/' . $item->id) }}">
                                        <button type="button" class="btn btn-primary">Xem</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/order/danh-sach/cap-nhat/' . $item->id) }}">
                                        <button type="button" class="btn btn-primary">Sửa</button>
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        @endif

    </div>

    <div class="py-5">
        <div class="row d-flex justify-content-center">
            <h2>Danh Sách Đơn Hàng</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <thead>
                    <tr>
                        <th style="width: 5%">STT</th>
                        <th style="width: 15%">Mã Hóa Đơn</th>
                        <th style="width: 15%">Ngày Hóa Đơn</th>
                        <th style="width: 15%">Tổng Tiền </th>
                        <th style="width: 15%">Đặt Cọc</th>
                        <th style="width: 15%">Còn Lại</th>
                        <th style="width: 15%">Trạng Thái</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>

                <tbody id="myTable">
                @if (isset($_GET['page']))
                    @php
                        $i = ($_GET['page'] - 1) * 10 + 1;
                    @endphp

                @else
                    @php
                        $i = 1;
                    @endphp
                @endif
                    @foreach ($order as $item)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->ngay_hoa_don }}</td>
                            <td>{{ number_format($item->tong_tien) }} VNĐ</td>
                            <td>{{ number_format($item->dat_coc) }} VNĐ</td>
                            <td>{{ number_format($item->con_lai) }} VNĐ</td>
                            <td>
                                <?php if ($item->trang_thai == 0) {
                                echo 'chưa giao';
                                } else {
                                echo 'đã giao';
                                } ?>
                            </td>

                            <td>
                                <a href="{{ url('admin/order/danh-sach/xem-chi-tiet/' . $item->id) }}">
                                    <button type="button" class="btn btn-primary">Xem</button>
                                </a>
                            </td>
                        </tr>
                        @php
                        $i++;
                    @endphp
                    @endforeach

                </tbody>
            </table>
            <div class="row justify-content-center">
                {{ $order->links() }}
            </div>
        </div>

    </div>

@endsection
