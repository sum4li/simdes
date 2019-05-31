@extends('backend.layouts')
@section('title','Ubah Data')
@section('content')
<div class="col-lg-12">
    {{-- <div class="card border-left-primary"> --}}
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form action="{{route('civil.update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <label>NIK</label>
                              <input type="text" name="nik" value="{{$data->nik}}" class="form-control border-dark-50 nik" required="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" name="name" value="{{$data->name}}" class="form-control border-dark-50" required="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="birth_place" value="{{$data->birth_place}}" class="form-control border-dark-50" required="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="text" name="birth_date" value="{{$data->birth_date}}" class="form-control border-dark-50 datepicker" required="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="sex" class="custom-select" required="">
                                    <option value="laki-laki" {{$data->sex == 'laki-laki' ? 'selected':''}}>Laki-Laki</option>
                                    <option value="perempuan" {{$data->sex == 'perempuan' ? 'selected':''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                              <label>Agama</label>
                              <select name="religion_id" class="custom-select" required="">
                                  @foreach (App\Religion::get() as $row)
                                      <option value="{{$row->id}}" {{$row->id == $data->religion_id ? 'selected':''}}>{{title_case($row->name)}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                              <label>Status Perkawinan</label>
                              <select name="marital_status" class="custom-select" required="">
                                    <option value="belum kawin" {{$data->marital_status == 'belum kawin' ? 'selected':''}}>Belum Kawin/Menikah</option>
                                    <option value="kawin" {{$data->marital_status == 'kawin' ? 'selected':''}}>Kawin/Menikah</option>
                                    <option value="janda" {{$data->marital_status == 'janda' ? 'selected':''}}>Janda</option>
                                    <option value="duda" {{$data->marital_status == 'duda' ? 'selected':''}}>Duda</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" name="job" value="{{$data->job}}" class="form-control border-dark-50" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" name="address" value="{{$data->address}}" class="form-control border-dark-50" required="">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                              <label>Dukuh</label>
                              <select name="hamlet_id" class="custom-select" required="">
                                  @foreach (App\Hamlet::orderBy('name')->get() as $row)
                                  <option value="{{$row->id}}" {{$row->id == $data->hamlet_id ? 'selected':''}}>{{title_case($row->name)}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                              <label>RT</label>
                              <input type="text" name="rt" value="{{$data->rt}}" class="form-control border-dark-50 rt" required="">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                              <label>RW</label>
                              <input type="text" name="rw" value="{{$data->rw}}" class="form-control border-dark-50 rw" required="">
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
