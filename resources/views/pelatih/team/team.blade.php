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
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ url('/team/pilih-atlet') }}" class="btn btn-success">Pilih Atlet<i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Event</th>
                            <th class="text-center">Pelatih</th>
                            <th class="text-center">Sekolah</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Jenis Cabang Event</th>
                            <th class="text-center">Detail</th>
                        </tr>

                        @foreach ($team  as $item)
                        <tr>
                            <td class="text-center"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <a href="{{ url('/team/team/'.encrypt($item["id"])) . '/detail-team' }}" class="btn btn-primary btn-sm">
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

