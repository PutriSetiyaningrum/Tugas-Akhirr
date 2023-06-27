@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Selamat Datang Di Dashboard Panitia PERBASI Indramayu</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{$pelatih}}
                            </h3>
                            <b><p>PELATIH</p></b>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-users"></i>
                        </div>
                        <a href="{{ url ('/akun/pelatih')}}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{$event}}
                            </h3>
                            <b><p>EVENT</p></b>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-file-alt"></i>
                        </div>
                        <a href="{{ url ('/master/event')}}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{$kategorievent}}
                            </h3>
                            <b><p>KATEGORI EVENT</p></b>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-file-alt"></i>
                        </div>
                        <a href="{{ url ('/master/kategorievent')}}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{$jeniscabangevent}}
                            </h3>
                            <b><p>JENIS CABANG EVENT</p></b>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-file-alt"></i>
                        </div>
                        <a href="{{ url ('/master/jeniscabangevent')}}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                {{$jadwalpertandingan}}
                            </h3>
                            <b><p>JADWAL PERTANDINGAN</p></b>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-file-alt"></i>
                        </div>
                        <a href="{{ url ('/informasi/jadwalpertandingan')}}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                {{$hasilpertandingan}}
                            </h3>
                            <b><p>HASIL PERTANDINGAN</p></b>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-file-alt"></i>
                        </div>
                        <a href="{{ url ('/informasi/hasilpertandingan')}}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <h3>
                                {{$persyaratan}}
                            </h3>
                            <b><p>PERSYARATAN</p></b>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-calendar-alt"></i>
                        </div>
                        <a href="{{ url('persyaratan')}}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

