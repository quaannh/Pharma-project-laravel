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
                <h1 style="text-align: center">Cập Nhật: <strong><p class="text-primary">{{$loai_san_pham->ten_loai}}</p></strong></h1>
                
            </div>
          </div>
            <div class="row border border-primary">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label>Tên loại</label>
                          <input type="text" class="form-control" name="ten_loai" value="{{$loai_san_pham->ten_loai}}">
                        </div>
    

                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="ghi_chu" class="ckeditor">{{$loai_san_pham->ghi_chu}}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label>Hình</label>
                            <input type="file" class="form-control" id="hinh" name="hinh" aria-describedby="hinh_loai_san_pham">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <input type="checkbox" name="trang_thai" <?php echo $loai_san_pham->trang_thai?'checked="checked"':"" ?> value= "1">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                      </form>
                </div>
            </div>
    </div>

</div>
@endsection