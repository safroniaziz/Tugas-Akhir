@extends('layouts.layout')
@section('menu')
    @include('admin/menu')
@endsection
@section('content-title')
    Dashboard
@endsection
@section('data-title')
    <i class="fa fa-info"></i>&nbsp;Informasi Data Pada Aplikasi
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Kedalaman</th>
                        <th>Kekuatan</th>
                        <th>Nama Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($data_gempa as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->tahun }}</td>
                            <td>{{ $data->latitude }}</td>
                            <td>{{ $data->longitude }}</td>
                            <td>{{ $data->kedalaman }}</td>
                            <td>{{ $data->kekuatan }}</td>
                            <td>{{ $data->lokasi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endpush