@extends('layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="row no-gutters">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon far fa-calendar-alt"></i>
                  </div>
                  <a href="{{ url('/persyaratan')}}" class="small-box-footer">Isi Persyaratan<i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection

