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
                <h1 style="text-align: center">Thêm Silder</h1>
            </div>
        </div>
        <div class="row border border-primary">
    
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên slider</label>
                        <input type="text" class="form-control" name="ten_slider" value="{{ old('ten_slider') }}">
                        @error('ten_slider')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hình slider</label>
                        <input type="file" class="form-control" id="hinh" name="hinh" aria-describedby="hinh_slider">
                        @error('hinh')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" name="tieu_de" value="{{ old('tieu_de') }}">
                        @error('tieu_de')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="noi_dung" class="ckeditor">{{ old('noi_dung') }}</textarea>
                        @error('noi_dung')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                        @error('url')
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