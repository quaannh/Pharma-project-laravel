@extends('admin.master')

@section('content')
<div id="load">

    <div class="py-5">
        <div class="row d-flex justify-content-center">
            <h2>Danh Sách Log</h2>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-hover" style="text-align: center">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th style="width: 10%">STT</th>
                        <th style="width: 30%">User</th>
                        <th style="width: 60%">Time</th>

                    </tr>
                </thead>
                <tbody id="myTable">

                    @if (isset($_GET['page']))
                        @php
                            $i = ($_GET['page'] - 1) * 10 + 1;
                        @endphp

                    @else
                        @php
                            $i = 1;
                        @endphp
                    @endif

                    @foreach ($logfile as $item)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $item->User }}</td>
                            <td>{{ $item->Time }}</td>
                       </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                {{ $logfile->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $("#load").load(window.location.href + " #load");
            }, 3000);
        });
    </script>
@endsection
