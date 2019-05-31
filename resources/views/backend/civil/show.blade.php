@extends('backend.layouts')
@section('title','Detail Penduduk')
@section('content')
<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nama</label>
                        {{$data->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
