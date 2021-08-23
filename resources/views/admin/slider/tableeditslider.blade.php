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
                    <h1 style="text-align: center">Cập Nhật: <strong>
                            <p class="text-primary">{{ $slider->ten_slider }}</p>
                        </strong></h1>

                </div>
            </div>
            <div class="row border border-primary">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input type="text" class="form-control" name="ten_slider" value="{{ $slider->ten_slider }}">
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
                            <input type="text" class="form-control" name="tieu_de" value="{{ $slider->tieu_de }}">
                            @error('tieu_de')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="noi_dung" class="ckeditor">{{ $slider->noi_dung }}</textarea>
                            @error('noi_dung')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" name="url" value="{{ $slider->url }}">
                            @error('url')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <input type="checkbox" name="trang_thai" <?php echo $slider->trang_thai ?
                            'checked="checked"' : ''; ?> value= "1">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
