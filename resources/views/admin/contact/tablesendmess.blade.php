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

            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="card border-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header">{{ $phan_hoi->ho_ten_khach_hang }}</div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">Câu hỏi:</h5>
                                <p class="card-text"> {{ $phan_hoi->noi_dung }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        @if ($phan_hoi->hinh != null)
                        <h5>Hình ảnh kèm theo</h5>    
                        <img src="{{ URL::asset('resources/pharma/hinh/hinh_y_kien/' . $phan_hoi->hinh) }}"
                                class="card-thumbnail" width="200px" alt="{{ $phan_hoi->ho_ten_khach_hang }}"
                                data-toggle="modal" data-target="#modalCustom">
                            <!-- Modal -->
                            <div class="modal fade " id="modalCustom" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body mb-0 p-0">
                                            <div id="map-container-google-18" class="z-depth-1-half map-container-11"
                                                style="height: 400px">
                                                <img src="{{ URL::asset('resources/pharma/hinh/hinh_y_kien/' . $phan_hoi->hinh) }}"
                                                    class="card-thumbnail" width="800px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                    </div>
                </div>

                <div class="col-md-8">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-black">Nội Dung </label>
                                <textarea id="noi_dung_tra_loi" name="noi_dung_tra_loi"
                                    class="form-control">{{ old('noi_dung_tra_loi') }}</textarea>
                                @error('noi_dung_tra_loi')
                                    <small class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>

@endsection
