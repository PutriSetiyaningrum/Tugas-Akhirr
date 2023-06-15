@php
use App\Models\Persyaratan;
use Carbon\Carbon;
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
                                <b>{{ $data->Nama_Event }}</b>
                            </p>
                            <div class="card-header">
                                <button type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#modal-default">
                                    <i class=""></i> detail
                                </button>
                            </div>


                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        @php

                        $waktu = strtotime(date('Y-m-d H:i:s'));
                        $tanggal = strtotime($data['selesai']);

                        if ($waktu > $tanggal) {
                            $diff = 1;
                        } else {
                            $diff = 0;
                        }
                        @endphp
                        @if ($diff == 1)
                        <a disabled class="small-box-footer">
                            Expired
                        </a>
                        @elseif($diff == 0)
                        <a href="{{ url ('/event/persyaratan/'.encrypt($data->id))}}" class="small-box-footer">Isi Persyaratan<i class="fas fa-arrow-circle-right"></i></a>
                        @endif

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

@foreach ($event as $dat)
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Mulai pada <br>
                                @php
                                $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $data->mulai);
                                $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                            </b>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Selesai pada <br>
                                @php
                                $selesai = Carbon::createFromFormat('Y-m-d H:i:s', $data->selesai);
                                $format = $selesai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

