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
        <h1 style="text-align: center">Cập Nhật: <strong>
                <p class="text-primary">{{ $san_pham->ten_san_pham }}</p>
            </strong></h1>
    </div>
    <div class="row border border-primary">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham"
                        value="{{ $san_pham->ten_san_pham }}">
                    @error('ten_san_pham')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Mô tả tóm tắt</label>
                    <textarea id="mo_ta_tom_tat" name="mo_ta_tom_tat"
                        class="form-control">{{ $san_pham->mo_ta_tom_tat }}</textarea>
                    @error('mo_ta_tom_tat')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Chi tiết</label>
                    <textarea id="chi_tiet" name="chi_tiet"
                    class="ckeditor">{{ $san_pham->chi_tiet }}</textarea>
                    @error('chi_tiet')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" class="form-control" id="gia_san_pham" name="gia_san_pham"
                        aria-describedby="gia_san_pham" value="{{ $san_pham->gia_san_pham }}">
                    @error('gia_san_pham')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đơn Vị Tính</label>
                    <select class="form-control" name="don_vi"> 
                        <option  @if ($san_pham->don_vi=="chai") selected @endif value="chai">Chai</option>   
                        <option @if ($san_pham->don_vi=="cái") selected @endif  value="cái" >Cái</option>                                  
                        <option @if ($san_pham->don_vi=="gói") selected @endif  value="gói" >Gói</option> 
                        <option @if ($san_pham->don_vi=="hộp") selected @endif  value="hộp" >Hộp</option>
                        <option @if ($san_pham->don_vi=="tuýt") selected @endif  value="tuýt" >Tuýt</option>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label>Nguồn Gốc, Nhà Sản Xuất</label>
                    <input type="text" class="form-control" id="nguon_goc" name="nguon_goc"
                        aria-describedby="nguon_goc" value="{{ $san_pham->nguon_goc }}">
                    @error('nguon_goc')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Giảm giá</label>
                    <input type="text" class="form-control" id="giam_gia" name="giam_gia"
                        aria-describedby="giam_gia" value="{{ $san_pham->giam_gia }}">
                    @error('giam_gia')
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
                    <label for="exampleInputEmail1">Loại sản phẩm </label>

                    <select class="form-control" name="ma_loai">
                        @foreach ($dslsp as $item)
                            <option value="{{ $item->id }}" @unless(!($san_pham->ma_loai == $item->id))
                                    selected="selected"
                                @endunless>{{ $item->ten_loai }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
