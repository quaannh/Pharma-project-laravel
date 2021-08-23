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
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center">Thêm Loại Sản Phẩm</h1>
            </div>
        </div>
        <div class="row border border-primary">
    
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên loại</label>
                        <input type="text" class="form-control" name="ten_loai" value="{{ old('ten_loai') }}">
                        @error('ten_loai')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea name="ghi_chu" class="ckeditor">{{ old('ghi_chu') }}</textarea>
                        @error('ghi_chu')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Hình</label>
                        <input type="file" class="form-control" id="hinh" name="hinh" aria-describedby="hinh_loai_san_pham">
                        @error('hinh')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <input type="checkbox" name="trang_thai" <?php echo old('trang_thai')?'checked="checked"':"" ?> value= "1">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection