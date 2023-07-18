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
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @if (session("error"))
                    <div class="alert alert-danger">
                        {!! session("error") !!}
                    </div>
                @endif

                @if (session("sukses"))
                    <div class="alert alert-success">
                        {!! session("sukses") !!}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (empty(Auth::user()->foto))
                                    <img class="profile-user-img img-fluid img-circle" src="{{ url('/AdminLTE') }}/dist/img/user.png" class="img-circle elevation-2">
                                    @else
                                    <img class="profile-user-img img-fluid img-circle" src="{{ url('/storage/'. Auth::user()->foto) }}" class="img-circle elevation-2">
                                    @endif
                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                    <p class="text-muted text-center">{{ $user->level}}</p>
                                    <div class="card-header">
                                        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                                            <i class=""></i>Ubah Password
                                        </button>
                                    </div>
                                </div>
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
                                    <form class="form-horizontal" action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error("name") {{ 'is-invalid' }} @enderror"
                                                id="name" name="name" placeholder="Name" value="{{ $user->name }}" autocomplete="off">
                                                @error("name")
                                                <span class="error invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control @error("email") {{ 'is-invalid' }} @enderror"
                                                id="email" name="email" placeholder="email" value="{{ $user->email}}" autocomplete="off">
                                                @error("email")
                                                <span class="error invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        @if (Auth::user()->level == "pelatih")
                                        <div class="form-group row">
                                            <label for="sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error("sekolah") {{ 'is-invalid' }} @enderror"
                                                id="sekolah" name="sekolah" placeholder="Sekolah" value="{{ Auth::user()->pelatih->sekolah}}" autocomplete="off">
                                                @error("sekolah")
                                                <span class="error invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @else

                                        @endif

                                        @if (empty(Auth::user()->foto))

                                        @else
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label"> Profil Saya </label>
                                            <div class="col-sm-10">
                                                <img src="{{ url('/storage/'.Auth::user()->foto) }}" style="width: 150px; height: 150px">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="">
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

    <!-- Ganti Password -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @if (session("sukses"))
                <div class="alert alert-success">
                    {!! session("sukses") !!}
                </div>
                @endif
                <form action="{{ url('/user/profile') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="passwordlama"> Password Lama </label>
                            <input type="password" class="form-control @error("passwordlama") {{ 'is-invalid' }} @enderror" name="passwordlama"
                            id="passwordlama" placeholder="Masukkan Password Lama" value="{{ old('passwordlama') }}" autocomplete="off">
                            @error("passwordlama")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="passwordbaru"> Password Baru </label>
                            <input type="password" class="form-control @error("passwordbaru") {{ 'is-invalid' }} @enderror" name="passwordbaru"
                            id="passwordbaru" placeholder="Masukkan password Baru" value="{{ old('passwordbaru') }}" autocomplete="off">
                            @error("passwordbaru")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="konfirpass"> Konfirmasi Password Baru </label>
                            <input type="password" class="form-control @error("konfirpass") {{ 'is-invalid' }} @enderror" name="konfirpass"
                            id="konfirpass" placeholder="Konfirmasi Password Baru" value="{{ old('konfirpass') }}" autocomplete="off">
                            @error("konfirpass")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class=""></i>Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->
    @endsection
