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
                    <input type="text" class="form-control" name="ma_code" value="{{ old('ma_code') }}" minlength="4" maxlength="8">
                    @error('ma_code')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Loại Code</label>
                    <select class="form-control" name="loai_code">               
                            <option value="số tiền cố định" >số tiền cố định</option>
                            <option value="tỷ lệ phần trăm" >tỷ lệ phần trăm</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label>Giá Trị</label>
                    <input type="number" class="form-control" id="gia_tri" name="gia_tri"
                        aria-describedby="gia_tri" value="{{ old('gia_tri') }}" min="0"> 
                    @error('gia_san_pham')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Hạn Sử Dụng</label>
                    <input type="text" class="form-control" id="date" name="han_su_dung"
                        aria-describedby="han_su_dung" value="{{ old('han_su_dung') }}" autocomplete="off">
                    @error('han_su_dung')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Phạm Vi Áp Dụng</label>
                    <select class="form-control" name="pham_vi_ap_dung">               
                            <option value="KHÁCH" >Khách</option>
                            <option value="ĐỒNG" >Thành viên đồng</option>      
                            <option value="BẠC" >Thành viên bạc</option>
                            <option value="VÀNG" >Thành viên vàng</option>      
                            <option value="KIM CƯƠNG" >Thành viên kim cương</option>                    
                    </select>
                </div>

                <div class="form-group">
                    <label>Trạng Thái</label>
                    <input type="checkbox" name="trang_thai" <?php echo old('trang_thai')?'checked="checked"':"" ?> value= "1">
                </div>

                <button type="submit" class="btn btn-primary">Tạo Coupon</button>
            </form>
        </div>
    </div>
</div>
   
</div>
@endsection