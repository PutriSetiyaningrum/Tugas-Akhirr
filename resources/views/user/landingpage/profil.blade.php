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

<section class="flat-contact ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7">
                <div class="post">
                    <div id="respond" class="respond-comment">
                        <h2 class="title-comment">Profil <span class="text-color-3">Pengunjung</span></h2>
                        <p class="text"></p>
                        <form method="post" id="contactform" class="comment-form form-submit"
                        action="{{ url('/profil/'.Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="col-lg-3 col-md-6">
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
                        <div class="text-wrap clearfix">
                            <fieldset class="name-wrap style-text">
                                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" size="32"
                                autocomplete="off" style="font-size: 16px" value="">
                            </fieldset>
                            <fieldset class="name-wrap style-text">
                                <input type="text" id="name" class="form-control" name="name"
                                tabindex="1" placeholder="Masukan Nama" value="{{ Auth::user()->name }}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="email-wrap style-text">
                                <input type="email" id="email" class="form-control" name="email"
                                tabindex="2" placeholder="Masukan Email" value="{{ Auth::user()->email}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="phone-wrap style-text">
                                <input type="tel" id="telepon" class="tb-my-input" name="telepon"
                                tabindex="1" placeholder="Masukan Telepon" value="{{ Auth::user()->pengunjung->telepon}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="phone-wrap style-text">
                                <input type="tel" id="alamat" class="tb-my-input" name="alamat"
                                tabindex="1" placeholder="Masukakn Alamat" value="{{ Auth::user()->pengunjung->alamat}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                        </div>
                        <button name="submit" type="submit" id="comment-reply"
                        class="button btn-style4 btn-submit-comment"><span>Edit</span></button>
                        <button type="button" class="btn btn-primary btn-style4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Ganti Password
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</section>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section("javascript")
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
crossorigin="anonymous">
</script>
@endsection
