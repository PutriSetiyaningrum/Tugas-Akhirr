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
                                <h3 class="profile-username text-center">Nina Mcintire</h3>
                                <p class="text-muted text-center">Software Engineer</p>
                                <a href="#" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
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
                                                <input type="text" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="email" value="{{ $user->email}}" readonly>
                                            </div>
                                        </div>

                                        @can("pelatih")
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Sekolah</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" placeholder="Name" value="{{ $user->sekolah}}" readonly>
                                            </div>
                                        </div>
                                        @endcan

                                        @can("pengunjung")
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" placeholder="Name" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Telepon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" placeholder="Name" value="" readonly>
                                            </div>
                                        </div>
                                        @endcan
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
    @endsection
