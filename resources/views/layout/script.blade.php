<script src="{{ URL::asset('resources/pharma') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/jquery-ui.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/popper.min.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/owl.carousel.min.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/aos.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/main.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/jquery-3.2.1.min.js"></script>
<script src="{{ URL::asset('resources/pharma') }}/js/back_to_top.js"></script>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        var location = window.location.href;
        $('#nav li a').each(function(){
            if(location.indexOf(this.href)>-1) {
               $(this).parent().addClass('active');
            }
        });
    });
</script>

<script>
    $( function() {
      $( "#sinh_nhat" ).datepicker(
          {
            dateFormat: 'yy-mm-dd'
        }
      );
    });
</script>
