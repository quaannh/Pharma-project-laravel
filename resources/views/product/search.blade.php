@php
if (isset($_GET['gia_tri_tim'])) {
    $gia_tri_tim = $_GET['gia_tri_tim'];
} else {
    $gia_tri_tim = '';
}
@endphp
<div class="header_search_container ml-auto">
    <div class="header_search">
        <form action="/san-pham/tim-kiem/" method="GET" id="header_search_form"
            class="header_search_form d-flex flex-row align-items-center justfy-content-start">
            <div>
                <div class="header_search_activation"><i class="fa fa-search" aria-hidden="true"></i></div>
            </div>
            <input name="gia_tri_tim" type="text" class="header_search_input" placeholder="@php
                echo $gia_tri_tim;
            @endphp"
                required="required">
        </form>
    </div>
</div>
