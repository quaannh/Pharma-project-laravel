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
                <h1 style="text-align: center">Thêm Tin Tức</h1>
            </div>
        </div>
        <div class="row border border-primary">
    
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input type="text" class="form-control" name="tieu_de" value="{{ old('tieu_de') }}">
                        @error('tieu_de')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label >Hình</label>
                        <input type="file" class="form-control" id="hinh" name="hinh"
                            aria-describedby="hinh">
                        @error('hinh')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea id="tom_tat" name="tom_tat"
                            class="form-control">{{ old('tom_tat') }}</textarea>
                        @error('tom_tat')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Chi tiết</label>
                        <textarea id="chi_tiet" name="chi_tiet" class="ckeditor">{{ old('chi_tiet') }}</textarea>
                        @error('chi_tiet')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tác Giả</label>
                        <input type="text" class="form-control" id="tac_gia" name="tac_gia"
                            aria-describedby="tac_gia" value="{{ old('tac_gia') }}">
                        @error('tac_gia')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nhân Viên</label>
                        <input type="text" class="form-control" id="nhan_vien" name="nhan_vien"
                            aria-describedby="nhan_vien" value="{{ old('nhan_vien') }}">
                        @error('nhan_vien')
                            <small class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <input type="checkbox" name="trang_thai" <?php echo old('trang_thai')?'checked="checked"':"" ?> value= "1">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection