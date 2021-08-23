@extends('admin.master')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>TOP Sản Phẩm</h2>
            </div>
            <div class="row d-flex justify-content-center">
                <?php $i = 1; ?>
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($san_pham_rank as $san_pham_rank)
                            <div class="col-md-4 mb-4">
                                <div class="card border-success mb-3">
                                    <div class="card-header bg-transparent border-success"><strong class="text-success">TOP
                                            {{ $i }}:</strong> {{ $san_pham_rank->ten_san_pham }}</div>
                                    <div class="card-body text-success">
                                        <h5 class="card-title">
                                            Số Lượng: {{ $san_pham_rank->sl_da_ban }}
                                        </h5>
                                        <p class="card-text">
                                            Mã Sản Phẩm: {{ $san_pham_rank->ma_san_pham }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-5">
                    <p>Nếu Sản phẩm là hàng mới chưa có trong db hãy: <br><a class="fa fa-hand-o-right" href="{{ url('admin/san-pham/danh-sach/them-san-pham') }}"> Tạo sản phẩm mới</a></p>
                </div>
              
               
                <div class="col-md-7">
                    <form action="{{ url('admin/stock/danh-sach/nhap-kho/') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nhập mã sản phẩm (đã có) muốn nhập kho</label>
                            <input type="number" name="get_id" placeholder="nhập mã sản phẩm" min="1" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Tiếp tục</button>
                            </div>
                            <div class="col-md-8">
                                @if (session('alert'))
                                <div class="alert alert-secondary alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ session('alert') }}
                                </div>
                            @endif
                            </div>
                        </div>
                      
                    </form>
                </div>
            </div>

            <hr>
            <div class="row">
                <h2>Danh Sách Sản Phẩm Trong Kho</h2>
            </div>
            <div class="table-responsive ">
                <table class="table table-bordered table-hover" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="width: 5%">Mã SP </th>
                            <th style="width: 15%">Tên SP</th>
                            <th style="width: 10%">SL Còn</th>
                            <th style="width: 10%">SL Đã Bán</th>
                            <th style="width: 15%">Ngày Nhập</th>
                            <th style="width: 10%">Mã Lô Hàng</th>
                            <th style="width: 15%">Nguồn Nhập</th>
                            <th style="width: 15%">HSD</th>
                            <th style="width: 10%">Trạng Thái</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">

                        @foreach ($kho as $item)
                            <tr>

                                <td>{{ $item->ma_san_pham }}</td>
                                <td>{{ $item->ten_san_pham }}</td>
                                <td>{{ $item->sl_trong_kho }}</td>
                                <td>{{ $item->sl_da_ban }}</td>
                                <td>{{ $item->ngay_nhap }}</td>
                                <td>{{ $item->ma_lo_hang }}</td>
                                <td>{{ $item->nguon_nhap }}</td>
                                <td>{{ $item->han_su_dung }}</td>
                                <td>
                                    <?php if ($item->han_su_dung <  date('Y-m-d')) {
                                    echo '<p class="text-danger"><strong><b>Hết HSD</b></strong></p>';
                                    } else {
                                    echo '<p class="text-black">Còn HSD</p>';
                                    } ?>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>

@endsection
