@extends('layouts_user.main')
@section('container')
<section class="flat-title-page">
    <div class="overlay-page"></div>
    <div class="container">
        <div class="team-heading wow fadeInDown" data-wow-delay="0ms" data-wow-duration="500ms">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs">
                        <h1>
                            Profil Saya
                            <span class="style-color">
                            </span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="flat-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ url('/ubahpasswordpengunjung') }}" method="POST">
                    @csrf
                    <div class="box">
                        <h2 class="title-comment">
                            Ubah
                            <span class="text-color-3">Password</span>
                        </h2>
                        <hr>

                        @if (session("error"))
                        <div class="alert alert-danger">
                            {!! session("error") !!}
                        </div>
                        <br>
                        @endif

                        @if (session("sukses"))
                        <div class="alert alert-success">
                            {!! session("sukses") !!}
                        </div>
                        @endif

                        @csrf
                        @method("post")
                        <div class="text-wrap clearfix">
                            <fieldset class="name-wrap style-text">
                                <label for="passwordsekarang" style="font-size: 16px">Password Saat Ini :</label>
                                <input type="password" id="passwordsekarang" class="form-control @error('passwordsekarang') {{ 'is-invalid' }} @enderror" name="passwordsekarang" placeholder="Masukan Password Saat Ini" value="{{ old('passwordsekarang') }}" size="32" tabindex="2" aria-required="true" autocomplete="off" style="font-size: 16px">
                                @error("passwordsekarang")
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </fieldset>
                            <hr>
                            <fieldset class="name-wrap style-text">
                                <label for="passwordbaru" style="font-size: 16px">Password Baru :</label>
                                <input type="password" id="passwordbaru" class="form-control @error('passwordbaru') {{ 'is-invalid' }} @enderror" name="passwordbaru" placeholder="Masukan Password Baru" value="{{ old('passwordbaru') }}" size="32" tabindex="2" aria-required="true" autocomplete="off" style="font-size: 16px">
                                @error("passwordbaru")
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </fieldset>
                            <hr>
                            <fieldset class="email-wrap style-text">
                                <label for="konfirpassword" style="font-size: 16px">Ulangi Password Baru :</label>
                                <input type="password" id="konfirpassword" class="form-control @error('konfirpassword') {{ 'is-invalid' }} @enderror" name="konfirpassword" tabindex="1" placeholder="Konfirmasi Ulang Password Baru" value="{{ old('konfirpassword') }}" size="32" aria-required="true" autocomplete="off" style="font-size: 16px">
                                @error("konfirpassword")
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </fieldset>
                        </div>
                        <br>
                        <button name="submit" type="submit" id="comment-reply" class="button btn-style4 btn-submit-comment">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">

                    @method("PUT")
                    <div class="post">
                        <div id="respond" class="respond-comment">
                            <h2 class="title-comment">Profil <span class="text-color-3">Pengunjung</span></h2>
                            @if (session("error-profile"))
                                <div class="alert alert-danger">
                                    {!! session("error") !!}
                                </div>
                                <br>
                                @endif

                                @if (session("message"))
                                <div class="alert alert-success">
                                    {!! session("message") !!}
                                </div>
                                @endif

                            @csrf
                            <hr>
                            <div class="col-lg-5 col-md-5">
                                <div class="team-box grid-post wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="media">
                                        @if (empty(Auth::user()->foto))
                                        <img class="profile-user-img img-fluid img-circle" src="{{ url('/AdminLTE') }}/dist/img/user.png" class="img-circle elevation-2">
                                        @else
                                        <img class="profile-user-img img-fluid img-circle" src="{{ url('/storage/'. Auth::user()->foto) }}" class="img-circle elevation-2">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-wrap clearfix">
                                <fieldset class="name-wrap style-text">
                                    <label for="foto" style="font-size: 16px">Foto :</label>
                                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" size="32"
                                    tabindex="2" autocomplete="off" style="font-size: 16px" value="">
                                </fieldset>
                                <br>
                                <fieldset class="name-wrap style-text">
                                    <label for="name" style="font-size: 16px">Nama :</label>
                                    <input type="text" id="name" class="form-control @error("name") {{ 'is-invalid' }} @enderror" name="name"
                                    placeholder="Masukan Nama" value="{{ old('name') ?? Auth::user()->name ?? '' }}" size="32"
                                    tabindex="2" aria-required="true" autocomplete="off" style="font-size: 16px">
                                    @error("name")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </fieldset>
                                <br>
                                <fieldset class="email-wrap style-text">
                                    <label for="email" style="font-size: 16px">Email :</label>
                                    <input type="text" id="email" class="form-control @error("email") {{ 'is-invalid' }} @enderror" name="email"
                                    tabindex="1" placeholder="Masukan Email" value="{{ old('email') ?? Auth::user()->email}}" size="32"
                                    aria-required="true" autocomplete="off" style="font-size: 16px">
                                    @error("email")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </fieldset>
                                <br>
                                <fieldset class="phone-wrap style-text">
                                    <label for="telepon" style="font-size: 16px">Telepon :</label>
                                    <input type="number" id="telepon" class="form-control @error("telepon") {{ 'is-invalid'}} @enderror" name="telepon"
                                    tabindex="1" placeholder="Masukan Telepon" value="{{ old('telepon') ?? Auth::user()->pengunjung->telepon}}" size="32"
                                    aria-required="true" autocomplete="off" style="font-size: 16px">
                                    @error("telepon")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </fieldset>
                                <br>
                                <fieldset class="phone-wrap style-text">
                                    <label for="alamat" style="font-size: 16px">Alamat :</label>
                                    <input type="text" id="alamat" class="form-control @error("alamat") {{ 'is-invalid'}} @enderror" name="alamat"
                                    tabindex="2" placeholder="Masukakn Alamat" value="{{ old('alamat') ?? Auth::user()->pengunjung->alamat}}" size="32"
                                    aria-required="true" autocomplete="off" style="font-size: 16px">
                                    @error("alamat")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </fieldset>
                            </div>
                            <br>
                            <button name="submit" type="submit" id="comment-reply"
                            class="button btn-style4 btn-submit-comment">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
