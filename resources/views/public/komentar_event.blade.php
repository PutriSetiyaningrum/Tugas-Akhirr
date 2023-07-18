@php
use App\Models\CounterArtikel;
@endphp

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
                    <h1>Data Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/panitia/home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Event</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class="text-center">Nama Event</th>
                                <th class="text-center">Mulai</th>
                                <th class="text-center">Selesai</th>
                                <th class="text-center">Penonton</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event  as $item)
                            @php
                            $count = CounterArtikel::where("id_event", $item["id"])->count();
                            @endphp
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->Nama_Event }}</td>
                                <td class="text-center">{{ $item->mulai }}</td>
                                <td class="text-center">{{ $item->selesai }}</td>
                                <td class="text-center">{{ $count }} Orang</td>
                                <td class="text-center">
                                    <a href="{{ url('/informasi/tentang-event/' . $item["slug"]) }}" target="_blank" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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

