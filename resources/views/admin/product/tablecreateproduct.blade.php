@extends('admin.master')
@section('content')
@if (session('alert'))
<div class="alert alert-secondary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('alert') }}
</div>
@endif
<div class="py-5">
<div class="container">
    <div class="row d-flex justify-content-center">
        <h2>Thêm Sản Phẩm Mới</h2>
    </div>
    <div class="row border border-primary">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" value="{{ old('ten_san_pham') }}">
                    @error('ten_san_pham')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Mô tả tóm tắt</label>
                    <textarea id="mo_ta_tom_tat" name="mo_ta_tom_tat"
                        class="form-control">{{ old('mo_ta_tom_tat') }}</textarea>
                    @error('mo_ta_tom_tat')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Chi tiết</label>
                    <textarea id="chi_tiet" name="chi_tiet" class="ckeditor">{{ old('chi_tiet') }}</textarea>
                    @error('chi_tiet')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" class="form-control" id="gia_san_pham" name="gia_san_pham"
                        aria-describedby="gia_san_pham" value="{{ old('gia_san_pham') }}">
                    @error('gia_san_pham')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Giảm giá</label>
                    <input type="text" class="form-control" id="giam_gia" name="giam_gia"
                        aria-describedby="giam_gia" value="{{ old('giam_gia') }}">
                    @error('giam_gia')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đơn Vị Tính</label>
                    <select class="form-control" name="don_vi">               
                            <option value="chai" >Chai</option>
                            <option value="cái" >Cái</option>
                            <option value="gói" >Gói</option> 
                            <option value="hộp" >Hộp</option>
                            <option value="tuýt" >Tuýt</option>                           
                    </select>
                </div>
                <div class="form-group">
                    <label>Nguồn Gốc, Nhà Sản Xuất</label>
                    <input type="text" class="form-control" id="nguon_goc" name="nguon_goc"
                        aria-describedby="nguon_goc" value="{{ old('nguon_goc') }}">
                    @error('nguon_goc')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ten_san_pham">Hình</label>
                    <input type="file" class="form-control" id="hinh_san_pham" name="hinh_san_pham"
                        aria-describedby="hinh_san_pham">
                    @error('hinh_san_pham')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Loại sản phẩm</label>
                    <select class="form-control" name="ma_loai">
                        @foreach ($dslsp as $item)
                            <option value="{{ $item->id }}" @unless(!(old('ma_loai')==$item->id))
                                    selected="selected"
                                @endunless>{{ $item->ten_loai }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection