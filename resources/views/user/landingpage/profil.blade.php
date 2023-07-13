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
            <div class="col-lg-6 col-md-5">
                <div class="box">
                    <h2 class="title-comment">Ubah <span class="text-color-3">Password</span></h2>
                    <hr>
                    <div class="text-wrap clearfix">
                        <fieldset class="name-wrap style-text">
                            <label for="passwordlama" style="font-size: 16px">Password Saat Ini :</label>
                            <input type="text" id="passwordlama" class="form-control" name="passwordlama"
                            placeholder="Masukan Password Saat Ini" value="" size="32"
                            tabindex="2" aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                        </fieldset>
                        <hr>
                        <fieldset class="name-wrap style-text">
                            <label for="passwordbaru" style="font-size: 16px">Password Baru :</label>
                            <input type="text" id="passwordbaru" class="form-control" name="passwordbaru"
                            placeholder="Masukan Password Baru" value="" size="32"
                            tabindex="2" aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                        </fieldset>
                        <hr>
                        <fieldset class="email-wrap style-text">
                            <label for="konfirpassword" style="font-size: 16px">Ulangi Password Baru :</label>
                            <input type="email" id="konfirpassword" class="form-control" name="konfirpassword"
                            tabindex="1" placeholder="Konfirmasi Ulang Password Baru" value="" size="32"
                            aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                        </fieldset>
                    </div>
                    <button name="submit" type="submit" id="comment-reply"
                    class="button btn-style4 btn-submit-comment">Ubah Password</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-7">
                <div class="post">
                    <div id="respond" class="respond-comment">
                        <h2 class="title-comment">Profil <span class="text-color-3">Pengunjung</span></h2>
                        <hr>
                        <form method="post" id="contactform" class="comment-form form-submit"
                        action="{{ url('/profil/'.Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
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
                            <fieldset class="name-wrap style-text">
                                <label for="name" style="font-size: 16px">Nama :</label>
                                <input type="text" id="name" class="form-control" name="name"
                                placeholder="Masukan Nama" value="{{ Auth::user()->name }}" size="32"
                                tabindex="2" aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="email-wrap style-text">
                                <label for="email" style="font-size: 16px">Email :</label>
                                <input type="email" id="email" class="form-control" name="email"
                                tabindex="1" placeholder="Masukan Email" value="{{ Auth::user()->email}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="phone-wrap style-text">
                                <label for="telepon" style="font-size: 16px">Telepon :</label>
                                <input type="tel" id="telepon" class="tb-my-input" name="telepon"
                                tabindex="1" placeholder="Masukan Telepon" value="{{ Auth::user()->pengunjung->telepon}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="phone-wrap style-text">
                                <label for="alamat" style="font-size: 16px">Alamat :</label>
                                <input type="tel" id="alamat" class="tb-my-input" name="alamat"
                                tabindex="2" placeholder="Masukakn Alamat" value="{{ Auth::user()->pengunjung->alamat}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                        </div>
                        <button name="submit" type="submit" id="comment-reply"
                        class="button btn-style4 btn-submit-comment">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
