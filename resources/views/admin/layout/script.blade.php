<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="{{ URL::asset('resources/js') }}/dashboard.js"></script>
    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <!-- -->
    <script src="{{ URL::asset('resources/pharma') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ URL::asset('resources/pharma') }}/js/jquery-ui.js"></script>
    <script src="{{ URL::asset('resources/pharma') }}/js/popper.min.js"></script>
    <script src="{{ URL::asset('resources/pharma') }}/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('resources/pharma') }}/js/owl.carousel.min.js"></script>
    <script src="{{ URL::asset('resources/pharma') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ URL::asset('resources/pharma') }}/js/aos.js"></script>
    <script src="{{ URL::asset('resources/pharma') }}/js/main.js"></script>
    <script src="{{ URL::asset('resources/pharma') }}/js/jquery-3.2.1.min.js"></script>
    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        $(function() {
            $("#date").datepicker({
                minDate: 0, // không lấy mấy ngày trước
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    <script>
        $(function() {
            $("#ngay_nhap").datepicker({
                minDate: 0, // không lấy mấy ngày trước
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var location = window.location.href;
            $('#nav li a').each(function() {
                if (location.indexOf(this.href) > -1) {
                    $(this).parent().addClass('active');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#filter").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;

            window.print();
            document.body.innerHTML = originalContents;
   

        }
    </script>
