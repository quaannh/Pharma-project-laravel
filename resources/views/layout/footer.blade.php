<footer class="site-footer">
    <div class="container">
        <a href="#" id="back-to-top" title="Back to top"><i class="icon-angle-up"></i></a>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="block-7">
                    <h3 class="footer-heading mb-4">Về <strong class="text-primary">PharmaNQH</strong></h3>
                    <p><strong class="text-primary">PharmaNQH</strong> Website: Bán thuốc và quản lý thuốc. Đây là đồ án
                        cuối khóa "Lập trình viên PHP mã nguồn mở " của tôi tại Trung tâm THKH Tự Nhiên.</p>
                    <p>Đồ án xây dựng trên nền tảng Framework Lavarel và Database, Ngôn ngữ lập trình PHP, truy vấn SQL.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">Danh Mục</h3>
                <ul class="list-unstyled">
                    @foreach ($dslsp as $item)
                        <li class="icon-leaf"><a href="{{ url('loai-san-pham/danh-sach/' . $item->id) }}">
                                {{ $item->ten_loai }} </strong></a></li>

                    @endforeach

                </ul>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">Danh Sách Cửa Hàng</h3>
                    <ul class="list-unstyled">
                        @foreach ($dscuahang as $item)
                            <li class="address">
                                <strong class="text-primary">
                                    <span data-toggle="modal" data-target="#modalCustom{{ $item->id }}">{{ $item->ten_cua_hang }}:</span>
                                </strong>{{ $item->dia_chi }}
                            </li>
                            <!-- Modal -->
                            <div class="modal fade " id="modalCustom{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <h2 class="text-black mb-3" style="text-align: center"><strong
                                                class="text-primary">{{ $item->ten_cua_hang }}</strong></h2>
                                        <div class="modal-body mb-0 p-0">
                                            <div id="map-container-google-18" class="z-depth-1-half map-container-11"
                                                style="height: 400px">
                                                @php
                                                    echo $item->ma_nhung;
                                                @endphp
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <h3 class="text-black h4" style="text-align: center">{{ $item->dia_chi }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made
                    with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                        target="_blank" class="text-primary">Colorlib</a>. Downloaded from <a
                        href="https://themeslab.org/" target="_blank">Themeslab</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <p>
                    <script>
                        document.write(new Date().getFullYear());
                    </script> <a href="{{ url('/aboutme') }}">Nguyễn Hồng Quân cảm ơn</a> <i
                        class="icon-smile-o text-primary" aria-hidden="true"></i>
                </p>
            </div>
        </div>
    </div>
</footer>
