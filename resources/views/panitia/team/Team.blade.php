@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Team</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Team</li>
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
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Event</th>
                            <th class="text-center">Sekolah</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Jenis Cabang</th>
                            <th class="text-center">Detail</th>
                        </tr>

                        @foreach ($groupedTeams  as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->event->Nama_Event }}</td>
                            <td>{{ $item->pelatih->sekolah }}</td>
                            <td>{{ $item->kategori->Nama_Kategori_Event }}</td>
                            <td>{{ $item->cabang->Nama_Jenis_Cabang_Event }}</td>
                            <td class="text-center">
                                <a href="{{ url('/team/' . '/event/' . $item->event_id . '/detail') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-search"></i> Nama Atlet
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

