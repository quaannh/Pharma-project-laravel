@extends('admin.master')

@section('content')
<div class="py-5">
    @if (session('alert'))
    <div class="alert alert-secondary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('alert') }}
    </div>
@endif
<div class="container">
    <div class="row d-flex justify-content-center">
        <h2>Tạo Coupon</h2>
    </div>
    <div class="row border border-primary">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Mã Code</label>
                    <input type="text" class="form-control" name="ma_code" value="{{ $coupon_detail->ma_code }}" minlength="4" maxlength="8">
                    @error('ma_code')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Loại Code</label>
                    <select class="form-control" name="loai_code">               
                            <option  @if ($coupon_detail->loai_code=="số tiền cố định")
                                selected
                            @endif value="số tiền cố định">số tiền cố định</option>
                            <option @if ($coupon_detail->loai_code=="tỷ lệ phần trăm")
                                selected
                            @endif value="tỷ lệ phần trăm" >tỷ lệ phần trăm</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label>Giá Trị</label>
                    <input type="number" class="form-control" id="gia_tri" name="gia_tri"
                        aria-describedby="gia_tri" value="{{ $coupon_detail->gia_tri }}" min="0"> 
                    @error('gia_san_pham')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Hạn Sử Dụng</label>
                    <input type="text" class="form-control" id="han_su_dung" name="han_su_dung"
                        aria-describedby="han_su_dung" value="{{ $coupon_detail->han_su_dung }}" autocomplete="off">
                    @error('han_su_dung')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">PHạm Vi Áp Dụng</label>
                    <select class="form-control" name="pham_vi_ap_dung">               
                            <option  @if ($coupon_detail->pham_vi_ap_dung=="khách")
                                selected
                            @endif value="KHÁCH">Khách</option>
                       
                            <option @if ($coupon_detail->pham_vi_ap_dung=="thành viên đồng")
                                selected
                            @endif value="ĐỒNG" >Thành viên đồng</option>       
                            
                            <option @if ($coupon_detail->pham_vi_ap_dung=="thành viên bạc")
                                selected
                            @endif value="BẠC" >Thành viên bạc</option>       

                            <option @if ($coupon_detail->pham_vi_ap_dung=="thành viên vàng")
                                selected
                            @endif value="VÀNG" >Thành viên vàng</option>     
                           
                            <option @if ($coupon_detail->pham_vi_ap_dung=="thành viên kim cương")
                                selected
                            @endif value="KIM CƯƠNG" >Thành viên kim cương</option>         

                            
                    </select>
                </div>



                <div class="form-group">
                    <label>Trạng Thái</label>
                    <input type="checkbox" name="trang_thai" <?php echo $coupon_detail->trang_thai ? 'checked="checked"' : ''; ?> value= "1">
                   
                </div>

                <button type="submit" class="btn btn-primary">Cập Nhật Coupon</button>
            </form>
        </div>
    </div>
</div>
   
</div>
@endsection