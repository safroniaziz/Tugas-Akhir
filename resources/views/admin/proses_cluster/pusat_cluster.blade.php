@extends('layouts.layout')
@section('content-title')
    Proses Clustering
@endsection
@section('data-title')
    <i class="fa fa-info"></i>&nbsp;Informasi Data Pada Aplikasi
@endsection
@section('menu')
    @include('admin/menu')
@endsection
@section('content')
    <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body" style="background-color: #f4f6f9 !important">
            <div class="row">
                <div class="col-md-12">
                    @if (!empty($max))
                        @if ($max == $max_cost)
                            @if ($max == 1)
                                <div class="alert alert-info alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Iterasi ke {{ $max }} sudah berhasil, silahkan lanjutkan ke iterasi ke {{ $max+1 }}
                                </div>
                                @else
                                    {{-- @if ($cost_sebelumnya->nilai_cost < $cost_akhir->nilai_cost) --}}
                                        {{-- <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Iterasi dihentikan pada iterasi ke {{ $max }}, nilai cost baru lebih besar dari nilai cost lama
                                        </div> --}}
                                        {{-- @else --}}
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Iterasi ke {{ $max }} sudah berhasil silahkan lanjutkan iterasi jika diperlukan !!
                                        </div>
                                {{-- @endif --}}
                            @endif
                            
                        @endif
                    @endif
                </div>
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12" style="margin-bottom: 10px;">
                    @if ($max > 1)
                        {{-- @if ($cost_sebelumnya->nilai_cost < $cost_akhir->nilai_cost) --}}
                            {{-- <a class="btn btn-danger btn-sm text-white disabled"><i class="fa fa-ban"></i>&nbsp;Proses Clustering Dihentikan</a> --}}
                            {{-- @else --}}
                            {{-- <a href="{{ route('admin.proses_clustering.generate_clustering') }}"></a> --}}
                            <form action="{{ route('admin.proses_clustering.generate_clustering') }}" method="GET">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-refresh fa-spin"></i>&nbsp; Clustering Data Gempa</button>
                            </form>
                        {{-- @endif --}}
                        @else
                        <form action="{{ route('admin.proses_clustering.generate_clustering') }}" method="GET">
                            @csrf
                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-refresh fa-spin"></i>&nbsp; Clustering Data Gempa</button>
                        </form>
                    @endif
                </div>
                @if ($max > 1)
                    @if ($cost_sebelumnya->nilai_cost < $cost_akhir->nilai_cost)
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box" >
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                
                                <div class="info-box-content">
                                <span class="info-box-text">Jumlah Iterasi</span>
                                <span class="info-box-number">
                                    {{ $max }} <a style="font-weight: 500">Iterasi</a>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box" >
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                
                                <div class="info-box-content">
                                <span class="info-box-text">Jumlah Cluster Satu</span>
                                <span class="info-box-number">
                                    {{ $cluster_satu['jumlah'] }} <a style="font-weight: 500">Data</a>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box" >
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                
                                <div class="info-box-content">
                                <span class="info-box-text">Jumlah Cluster Dua</span>
                                <span class="info-box-number">
                                    {{ $cluster_dua['jumlah'] }} <a style="font-weight: 500">Data</a>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box" >
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                
                                <div class="info-box-content">
                                <span class="info-box-text">Jumlah Cluster Tiga</span>
                                <span class="info-box-number">
                                    {{ $cluster_tiga['jumlah'] }} <a style="font-weight: 500">Data</a>
                                </span>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <i class="fa fa-close"></i>Silahkan selesaikan proses iterasi terlebih dahulu !!
                        </div>
                    @endif
                    @else
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-close"></i>Silahkan selesaikan proses iterasi terlebih dahulu !!
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#kelas').DataTable();
        } );

        function previewFoto() {
            var preview = document.querySelector('#preview-foto');
            var file    = document.querySelector('input[type=file]').files[0];
            var reader  = new FileReader();

            reader.onloadend = function () {
            preview.src = reader.result;
            }

            if (file) {
            reader.readAsDataURL(file);
            } else {
            preview.src = "";
            }
        }

        function ubahSiswa(id){
            $.ajax({
                url: "{{ url('admin/manajemen_siswa') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id').val(data.id);
                    $('#nm_siswa').val(data.nm_siswa);
                    $('#kelas_id').val(data.kelas_id);
                    $('#paket_id').val(data.paket_id);
                    $('#nm_sekolah').val(data.nm_sekolah);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#alamat_rumah').val(data.alamat_rumah);
                    $('#jenjang').val(data.jenjang);
                    $('#no_hp').val(data.no_hp);
                    $('#email').val(data.email);
                    $('#nm_orang_tua').val(data.nm_orang_tua);
                    $('#pekerjaan_orang_tua').val(data.pekerjaan_orang_tua);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        function hapusSiswa(id){
            $('#modalhapus').modal('show');
            $('#id_hapus').val(id);
        }

    </script>
@endpush