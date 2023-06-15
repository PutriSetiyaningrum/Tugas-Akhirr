@extends('layouts.main')

@section("css")
<link rel="stylesheet" href="{{ url('/AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('/AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('/AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Persyaratan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/panitia/home') }}">Panitia</a></li>
                        <li class="breadcrumb-item active">Persyaratan</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">
            @can("pelatih")
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ url('/event/persyaratan/'.encrypt($id).'/create') }}" class="btn btn-success">Tambah Persyaratan <i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            @endcan
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            @can("pelatih")
                            <th style="width: 10px">No</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Jenis Cabang</th>
                            <th class="text-center">Sekolah</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>

                            @endcan

                            @can("panitia")
                            <th class="text-center" style="width: 10px">No.</th>
                            <th class="text-center">Nama Event</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Jenis Cabang</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($persyaratan as $item)
                        @can("pelatih")
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}.</td>
                            <td class="text-center">{{$item->kategori->Nama_Kategori_Event}}</td>
                            <td class="text-center">{{$item->cabang->Nama_Jenis_Cabang_Event}}</td>
                            <td class="text-center">{{$item->sekolah}}</td>
                            <td class="text-center">
                                @if ($item["status"] == 0)
                                <span class="badge badge-warning">
                                    Belum Di Konfirmasi
                                </span>
                                @elseif ($item["status"] == 1)
                                <span class="badge badge-success">
                                    Sudah Disetujui
                                </span>
                                @elseif ($item["status"] == 2)
                                <span class="badge badge-danger">
                                    Ditolak
                                </span>
                                <br>
                                <small>
                                    Alasan {{ $item["deskripsi"] }}
                                </small>
                                @endif
                            </td>
                            <td width="11%" class="text-center">
                                <a href="{{ url('/event/persyaratan/'.encrypt($item["id"])) . '/detail-persyaratan' }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-search"></i> Detail
                                </a>
                                @if ($item["status"] != 0)

                                @else

                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="{{ url('/event/persyaratan/'. encrypt($id) . '/' . $item['id'] . '/edit') }}"><i class="fa fa-edit"></i>Edit</a>
                                </button>
                                @endif
                            </td>

                            @can("panitia")

                            @endcan
                        </tr>
                        @endcan

                        @can("panitia")
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td class="text-center">{{ $item["event"]["Nama_Event"] }}</td>
                            <td class="text-center">{{ $item["kategori"]["Nama_Kategori_Event"] }}</td>
                            <td class="text-center">{{ $item["cabang"]["Nama_Jenis_Cabang_Event"]}}</td>
                            <td class="text-center">
                                @if ($item["status"] == 0)
                                <span class="badge badge-warning">
                                    Belum Di Konfirmasi
                                </span>
                                @elseif ($item["status"] == 1)
                                <span class="badge badge-success">
                                    Sudah Disetujui
                                </span>
                                @elseif ($item["status"] == 2)
                                <span class="badge badge-danger">
                                    Ditolak
                                </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/persyaratan/'.encrypt($item["id"])) . '/detail' }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-search"></i> Detail
                                </a>
                                @if ($item["status"] != 0)
                                @else
                                <a href="{{ url('/persyaratan/'. encrypt($item['id']) . '/ubah_status') }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i> Ubah Status
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach ($persyaratan as $item)
<div class="modal fade" id="modal-default-status-{{ $item["id"] }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/persyaratan/' . $item["id"]) . '/status' }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cekdata"> Ubah Status Persyaratan </label>
                        <select name="cekdata" class="form-control" id="cekdata">
                            <option value="">- Pilih -</option>
                            <option value="1">Setujui</option>
                            <option value="2">Tolak</option>
                        </select>
                    </div>
                    <div class="form-group" style="display: none" id="alasan">
                        <label for="deskripsi"> Alasan </label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Masukkan Alasan"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
@section("js")

<script src="{{ url('/adminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(document).ready(function() {
        $("#cekdata").change(function() {
            let status= $("#cekdata").val();
            if (status == 2) {
                console.log("ada");
                $("#alasan").show();
            } else {
                $("#alasan").hide();
            }
        })
    })
</script>
@endsection


