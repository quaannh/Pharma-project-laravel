@extends('admin.master')

@section('content')

    <div class="py-3">
        <h2 style="text-align: center">Dashboard</h2>
    </div>

    <?php
    $today = date('Y-m-d');
    ?>
    <div id="load">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card border-success mb-3">
                            <div class="card-header bg-transparent border-success">Đơn Hàng Mới</div>
                            <div class="card-body text-success">
                                <h5 class="card-title">
                                    Số Lượng: {{ Count($DonHangMoi) }}
                                </h5>
                                <!--  nếu có đơn hàng mới chuông reo -->
                                @if (Count($DonHangMoi) > 0)
                                    <div class="wrapper">
                                        <div class="bell" id="bell-1">
                                            <div class="anchor material-icons layer-1">notifications_active</div>
                                            <div class="anchor material-icons layer-2">notifications</div>
                                            <div class="anchor material-icons layer-3">notifications</div>
                                        </div>
                                    </div>
                                @endif
                                <!--  nếu có đơn hàng mới chuông reo -->
                                <p class="card-text">
                                    {{ $today }}
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-success"><a class="icon icon-eye"
                                    href="{{ url('admin/order/danh-sach') }}"> Xem</a></div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        @foreach ($DonHangChuaGiao as $DonHangChuaGiao)
                            <div class="card border-success mb-3">
                                <div class="card-header bg-transparent border-success">Đơn Hàng Chưa Giao</div>
                                <div class="card-body text-success">
                                    <h5 class="card-title">
                                        Số Lượng: {{ $DonHangChuaGiao->don_hang_chua_giao }}
                                    </h5>
                                    <p class="card-text">
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-success"><a class="icon icon-eye"
                                        href="{{ url('admin/order/danh-sach') }}"> Xem</a></div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-4">
                        @foreach ($DonHang as $DonHang)
                            <div class="card border-success mb-3">
                                <div class="card-header bg-transparent border-success">Tổng Đơn Hàng</div>
                                <div class="card-body text-success">
                                    <h5 class="card-title">
                                        Số Lượng: {{ $DonHang->don_hang }}
                                    </h5>
                                    <p class="card-text">
                                    </p>

                                </div>
                                <div class="card-footer bg-transparent border-success"><a class="icon icon-eye"
                                        href="{{ url('admin/order/danh-sach') }}"> Xem</a></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Thành Viên</h5>
                                        <p class="card-text">{{ $ThanhVien }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Số Lượt Truy Cập</h5>
                                        <p class="card-text">{{ $SoLuotTruyCap }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card border-success mb-3">
                            <div class="card-header bg-transparent border-success">TOP SELLER </div>
                            <div class="card-body text-dark">
                                <table class="table table-bordered table-hover" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">STT</th>
                                            <th style="width: 40%">Tên Sản Phẩm</th>
                                            <th style="width: 20%">Số Lượng</th>
                                        </tr>
                                    </thead>

                                    <tbody id="myTable">
                                        <?php $i = 1; ?>
                                        @foreach ($TopBuy as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->ten_san_pham }}</td>
                                                <td>{{ $item->sl_da_ban }}</td>

                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer bg-transparent border-success"><a class="icon icon-eye"
                                    href="{{ url('admin/stock/danh-sach') }}"> Xem</a></div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2">
        <div class="col-md-6 mb-4">
            <div class="card border-dark">
                <div class="card-header">Thống Kê Số Sản Phẩm Theo Loại</div>
                <div class="card-body">
                    <canvas id="line-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-dark">
                <div class="card-header">Thống Kê Doanh Thu Theo Tháng</div>
                <div class="card-body">
                    <canvas id="bar-chart"></canvas>
                </div>
            </div>

        </div>
        <div class="col mb-4">
            <div class="card border-dark">
                <div class="card-header">Thống Kê Số Sản Phẩm Đã Bán</div>
                <div class="card-body text-dark">
                    <canvas id="bar2-chart"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')


    <script>
        $(document).ready(function() {
            setInterval(function() {
                $("#load").load(window.location.href + " #load");
            }, 3000);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: [
                    @foreach ($SoSanPhamTheoLoai as $item)
                        '{{ $item->ten_loai }}',
                    @endforeach

                ],
                datasets: [{
                    data: [
                        @foreach ($SoSanPhamTheoLoai as $item)
                            '{{ $item->TSSP }}',
                        @endforeach
                    ],
                    label: "Số Sản Phẩm",
                    borderColor: "#75b239",
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'World population per region (in millions)'
                }
            }
        });
    </script>

    <script>
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($DoanhThuTheoThang as $item)
                        '{{ $item->ngay }}',
                    @endforeach
                ],
                datasets: [{
                    label: "Doanh Thu (VNĐ)",
                    backgroundColor: ["#007bff", "#d527b7", "#dc3545", "#fd7e14", "#007bff", "#7971ea",
                        "#ffc107", "#28a745", "#20c997", "#dc3545"
                    ],
                    data: [
                        @foreach ($DoanhThuTheoThang as $item)
                            '{{ $item->tong_tien }}',
                        @endforeach
                    ]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                }
            }
        });
    </script>

    <script>
        new Chart(document.getElementById("bar2-chart"), {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($SoLuongDaBan as $item)
                        '{{ $item->ten_san_pham }}',
                    @endforeach
                ],
                datasets: [{
                    label: "Số sản phẩm bán được",
                    backgroundColor: ["#007bff", "#d527b7", "#dc3545", "#fd7e14", "#007bff", "#7971ea",
                        "#ffc107", "#28a745", "#20c997", "#dc3545"
                    ],
                    data: [
                        @foreach ($SoLuongDaBan as $item)
                            '{{ $item->sl_da_ban }}',
                        @endforeach
                    ]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                }
            }
        });
    </script>
@endsection
