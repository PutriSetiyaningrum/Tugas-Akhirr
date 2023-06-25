@extends('layouts_user.main')
@section('container')
<section class="flat-title-page">
    <div class="overlay-page"></div>

    <div class="container">
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
                                tabindex="1" placeholder="Enter Full Name" value="{{ Auth::user()->name }}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="email-wrap style-text">
                                <input type="email" id="email" class="form-control" name="email"
                                tabindex="2" placeholder="email" value="{{ Auth::user()->email}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="phone-wrap style-text">
                                <input type="tel" id="telepon" class="tb-my-input" name="telepon"
                                tabindex="1" placeholder="telepon" value="{{ Auth::user()->pengunjung->telepon}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                            <fieldset class="phone-wrap style-text">
                                <input type="tel" id="alamat" class="tb-my-input" name="alamat"
                                tabindex="1" placeholder="alamat" value="{{ Auth::user()->pengunjung->alamat}}" size="32"
                                aria-required="true" required="" autocomplete="off" style="font-size: 16px">
                            </fieldset>
                        </div>
                        <button name="submit" type="submit" id="comment-reply"
                        class="button btn-style4 btn-submit-comment"><span>Edit</span></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
@endsection