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
                    <h1>Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/pelatih/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">

            <div class="card-header">
                <h5 class="card-title">
                    <a href="{{ url('/team/')}}">
                        Kembali
                    </a>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Posisi</th>
                        </tr>

                        @foreach ($team as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->atlet->nama }}</td>
                                <td>{{ $item->atlet->tanggal_lahir }}</td>
                                <td>{{ $item->atlet->posisi }}</td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
</script>
@endsection

