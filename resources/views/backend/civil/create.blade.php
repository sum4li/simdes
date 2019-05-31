@extends('backend.layouts')
@section('title','Tambah Data')
@section('content')
<div class="col-lg-12">
    {{-- <div class="card border-left-primary"> --}}
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form action="{{route('civil.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                          <label>NIK</label>
                          <input type="text" name="nik" id="" class="form-control border-dark-50 nik" required="" autofocus="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="name" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="birth_place" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" name="birth_date" id="" class="form-control border-dark-50 datepicker" required="">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="sex" class="custom-select" required="">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                          <label>Agama</label>
                          <select name="religion_id" class="custom-select" required="">
                              @foreach (App\Religion::get() as $row)
                                  <option value="{{$row->id}}">{{title_case($row->name)}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label>Status Perkawinan</label>
                          <select name="marital_status" class="custom-select" required="">
                                <option value="belum kawin">Belum Kawin/Menikah</option>
                                <option value="kawin">Kawin/Menikah</option>
                                <option value="janda">Janda</option>
                                <option value="Duda">Duda</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="job" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" name="address" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                          <label>Dukuh</label>
                          <select name="hamlet_id" class="custom-select" required="">
                              @foreach (App\Hamlet::orderBy('name')->get() as $row)
                              <option value="{{$row->id}}">{{title_case($row->name)}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                          <label>RT</label>
                          <input type="text" name="rt" id="" class="form-control border-dark-50 rt" required="">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                          <label>RW</label>
                          <input type="text" name="rw" id="" class="form-control border-dark-50 rw" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('civil.index')}}">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('backend/js/jquery.mask.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('.nik').mask('999999999999999999',{placeholder: 'Harus Angka'});
        $('.rt').mask('999',{placeholder: 'Harus Angka'});
        $('.rw').mask('999',{placeholder: 'Harus Angka'});

        $('.datepicker').datepicker({
            format : 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight:true
        });

    });
</script>

@endpush
