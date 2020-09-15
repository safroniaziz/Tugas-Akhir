@extends('layouts.layout')
@section('menu')
    @include('admin/menu')
@endsection
@section('content-title')
    Data Nilai Cost Clustering
@endsection
@section('data-title')
    <i class="fa fa-info"></i>&nbsp;Informasi Data Nilai Cost Clustering
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Iterasi Ke-</th>
                        <th>Nilai Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($nilai_costs as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->iterasi_ke }}</td>
                            <td>{{ $data->nilai_cost }}</td>
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