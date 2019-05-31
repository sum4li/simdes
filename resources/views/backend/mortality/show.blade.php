@extends('backend.layouts')
@section('title','Detail Data')
@section('content')
<div class="col-lg-12">
    {{-- <div class="card border-left-primary"> --}}
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" value="{{$data->civil->nik}}" class="form-control" readonly="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{title_case($data->civil->name)}}" class="form-control" readonly="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Dukuh</label>
                        <input type="text" name="name" value="{{title_case($data->civil->hamlet->name)}}" class="form-control" readonly="">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label>RT</label>
                        <input type="text" name="name" value="{{$data->civil->rt}}" class="form-control" readonly="">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label>RW</label>
                        <input type="text" name="name" value="{{$data->civil->rw}}" class="form-control" readonly="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Kematian</label>
                        <input type="text" name="name" value="{{Carbon\Carbon::parse($data->date)->format('d-m-Y')}}" class="form-control" readonly="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" readonly="">{{$data->description}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-gorup">
                        <a class="btn btn-light shadow-sm" href="{{route('mortality.index')}}">Kembali</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
