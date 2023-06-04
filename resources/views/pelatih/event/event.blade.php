@php
    use App\Models\Persyaratan;
@endphp

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
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                @foreach ($event as $data)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                @php
                                    $count = Persyaratan::where("event_id", $data->id)->count();
                                @endphp
                                {{ $count }}
                            </h3>

                            <p>
                                {{ $data->Nama_Event }}
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url ('/event/persyaratan/'.$data->id)}}" class="small-box-footer">Isi Persyaratan<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endforeach
                <!-- fix for small devices only -->
                {{-- <div class="clearfix hidden-md-up"></div> --}}
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

