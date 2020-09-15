@extends('layouts.layout')
@section('menu')
    @include('admin/menu')
@endsection
@section('content-title')
    Data Pusat Clustering
@endsection
@section('data-title')
    <i class="fa fa-info"></i>&nbsp;Informasi Data Pusat Clustering
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Iterasi Ke-</th>
                        <th>Cluster Ke-</th>
                        <th>Kedalaman</th>
                        <th>Kekuatan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($pusat_clusters as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->iterasi_ke }}</td>
                            <td>{{ $data->cluster_ke }}</td>
                            <td>{{ $data->kedalaman }}</td>
                            <td>{{ $data->kekuatan }}</td>
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