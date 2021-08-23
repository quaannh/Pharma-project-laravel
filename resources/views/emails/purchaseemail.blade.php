<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;

        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        h3 {
            text-align: center;
        }

    </style>
</head>

<body>
    <h3>Công ty Cổ phần Dược phẩm NQH cung cấp sản phẩm theo tiêu chí Natural Life - Healthy Care - Quality Medical</h3>
    <h3>Thông Tin Đơn Hàng</h3>
    <br>
    <table class="table" width="100%">
        <tr>
            <td><b>Số hóa đơn</b></td>
            <td>{{ $DonDatHang[0]->id }}</td>
            <td><b>Ngày hóa đơn</b></td>
            <td>{{ $DonDatHang[0]->ngay_hoa_don }}</td>
        </tr>
        <tr>
            <td><b>Khách hàng</b></td>
            <td>{{ $DonDatHang[0]->ho_kh }}&nbsp;{{ $DonDatHang[0]->ten_kh }}</td>
            <td><b>Điện thoại</b></td>
            <td>{{ $DonDatHang[0]->dien_thoai }}</td>

        </tr>
        <tr>
            <td><b>Email</b></td>
            <td>{{ $DonDatHang[0]->email }}</td>
            <td><b>Địa chỉ</b></td>
            <td colspan="5">{{ $DonDatHang[0]->dia_chi }}</td>
        </tr>
        @if (Session::has('id_thanh_vien'))
            <tr>
                <td><b>Thành Viên</b></td>
                <td>{{ $DonDatHang[0]->thanh_vien }}</td>
                <td><b>Ưu Đãi Thành Viên</b></td>
                <td>{{ $DonDatHang[0]->uu_dai_thanh_vien }}%</td>
            </tr>
        @endif
    </table>
    <br>
    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <th scope="row">STT</th>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>ĐVT</th>
                <th>Giá Sản Phẩm</th>
                <th>Thành Tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($DonDatHang as $dh)
                <tr>
                    <td scope="row"><?php echo $i; ?></td>
                    <td>{{ $dh->MaSP }}</td>
                    <td>{{ $dh->ten_san_pham }}</td>
                    <td>{{ $dh->so_luong }}</td>
                    <td>{{ $dh->don_vi }}</td>
                    <td>{{ number_format($dh->don_gia) }}</td>
                    <td>{{ number_format($dh->so_luong * $dh->don_gia) }}</td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    <br>
    <table class="table table-bordered" width="50%">
        <thead>
            <tr>
                <td colspan="5">Tổng Hóa Đơn:</td>
                <td>{{ number_format($DonDatHang[0]->tong_tien) }} VNĐ</td>
            </tr>
            <tr>
                <td colspan="5">Giảm Giá:</td>
                <td>{{ number_format($DonDatHang[0]->nhap_coupon) }} VNĐ</td>
            </tr>
            <tr>
                <td colspan="5">Thanh Toán:</td>
                <td>{{ number_format($DonDatHang[0]->con_lai) }} VNĐ</td>
            </tr>
        </thead>
    </table>
</body>

</html>
