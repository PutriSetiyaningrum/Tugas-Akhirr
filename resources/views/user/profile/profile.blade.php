@extends("layouts.main")

@section('content')
<section class="home-section">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                    src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                <p class="text-muted text-center">Software Engineer</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link"><h4><b>Profil</b></h4></a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-pane" id="settings">

                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="email" value="{{ $user->email}}">
                                            </div>
                                        </div>

                                        @can("pelatih")
                                        <div class="form-group row">
                                            <label for="sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="sekolah" placeholder="Sekolah" value="{{ Auth::user()->pelatih->sekolah}}">
                                            </div>
                                        </div>
                                        @endcan

                                        @can("pengunjung")
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="alamat" placeholder="Alamat" value="{{ Auth::user()->pengunjung->alamat}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="telepon" placeholder="Telepon" value="{{ Auth::user()->pengunjung->telepon  }}">
                                            </div>
                                        </div>
                                        @endcan

                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="foto" placeholder="Foto" value="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Ubah</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>

    <!--Edit profile-->

    @endsection
