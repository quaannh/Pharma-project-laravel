@extends('admin.master')

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <h2>Danh Sách Khách Hàng Cần Tư Vấn</h2>
            </div>
            <div class="table-responsive ">
                <table class="table table-bordered table-hover" style="text-align: center">
                    <caption>List of users</caption>
                    <thead>
                        <tr>
                            <th style="width: 5%">STT</th>
                            <th style="width: 15%">Khách Hàng</th>
                            <th style="width: 10%">Số Điện Thoại</th>
                            <th style="width: 30%">Nội Dung</th>
                            <th style="width: 20%">Thời Gian</th>
                            <th style="width: 10%">Trạng Thái</th>
                            <th style="width: 10%"></th>

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

                        @foreach ($tu_van as $item)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $item->ho_ten_khach_hang }}</td>
                                <td>{{ $item->dien_thoai }}</td>
                                <td>{{ $item->noi_dung }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <?php 
                                    if($item->trang_thai ==0)
                                    echo '<p class="text-danger"><strong><b>chưa phản hồi </b></strong></p>';
                                    else {
                                        echo "đã phản hồi";
                                    }   
                                    ?>
                                
                                </td>
                                <td>
                                    <a href="{{ url('admin/mess/danh-sach/tra-loi/' . $item->id) }}">
                                        <button type="button" class="btn btn-primary">Trả Lời</button>
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
                    {{ $tu_van->links() }}
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center">
                <h2>Danh Sách Ý Kiến Từ Khách Hàng</h2>
            </div>
            <div class="table-responsive ">
                <table class="table table-bordered table-hover" style="text-align: center">
                    <caption>List of users</caption>
                    <thead>
                        <tr>
                            <th style="width: 10%">STT</th>
                            <th style="width: 20%">Khách Hàng</th>
                            <th style="width: 10%">Số Điện Thoại</th>
                            <th style="width: 40%">Nội Dung</th>
                            <th style="width: 20%">Thời Gian</th>

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

                        @foreach ($y_kien as $item)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $item->ho_ten_khach_hang }}</td>
                                <td>{{ $item->dien_thoai }}</td>
                                <td>{{ $item->noi_dung }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    {{ $y_kien->links() }}
                </div>
            </div>
        </div>
            
    </div>


@endsection
