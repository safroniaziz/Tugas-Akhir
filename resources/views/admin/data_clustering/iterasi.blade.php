@extends('layouts.layout')
@section('menu')
    @include('admin/menu')
@endsection
@section('content-title')
    Data Iterasi Clustering
@endsection
@section('data-title')
    <i class="fa fa-info"></i>&nbsp;Informasi Data Iterasi Clusyering
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kedalaman</th>
                        <th>Kekuatan</th>
                        <th>Nilai Cluster 1</th>
                        <th>Nilai Cluster 2</th>
                        <th>Nilai Cluster 3</th>
                        <th>Nilai Min</th>
                        <th>Kelompok Cluster</th>
                        <th>Iterasi Ke-</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($iterasis as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->kedalaman }}</td>
                            <td>{{ $data->kekuatan }}</td>
                            <td>{{ $data->nilai_cluster_1 }}</td>
                            <td>{{ $data->nilai_cluster_2 }}</td>
                            <td>{{ $data->nilai_cluster_3 }}</td>
                            <td>{{ $data->nilai_min }}</td>
                            <td>{{ $data->kelompok_cluster }}</td>
                            <td>{{ $data->iterasi_ke }}</td>
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