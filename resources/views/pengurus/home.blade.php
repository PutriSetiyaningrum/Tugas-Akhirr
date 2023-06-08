@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Selamat Datang Di Dashboard Pengurus PERBASI Indramayu</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{$user}}
                            </h3>
                            <p>PANITIA</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-users"></i>
                        </div>
                        <a href="{{ url('/akun/panitia') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{$pelatih}}
                            </h3>
                            <p>PELATIH</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-users"></i>
                        </div>
                        <a href="{{ url('/akun/pelatih') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{$pengunjung}}
                            </h3>
                            <p>PENGUNJUNG</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-users"></i>
                        </div>
                        <a href="{{ url('/akun/pengunjung') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                {{$tentangperbasi}}
                            </h3>
                            <p>TENTANG PERBASI</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-file-alt"></i>
                        </div>
                        <a href="{{ url('/master/tentangperbasi') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @endsection

