@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Tambah Data Event</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/master/event') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama Event">Nama Event</label>
                            <input type="text" class="form-control" id="Nama_Event" name="Nama_Event" placeholder="Nama Event" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="mulai">Mulai</label>
                            <input type="datetime-local" class="form-control" id="mulai" name="mulai" placeholder="mulai">
                        </div>
                        <div class="form-group">
                            <label for="selesai">Selesai</label>
                            <input type="datetime-local" class="form-control" id="selesai" name="selesai" placeholder="selesai">
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

