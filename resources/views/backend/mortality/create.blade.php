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
            <form action="{{route('mortality.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                          <label>Nama</label>
                          <select name="civil_id" id="civil" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="text" name="date" class="form-control datepicker" required="">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea name="description" class="form-control" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('mortality.index')}}">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function(){
        $('#civil').select2({
            minimumInputLength: 1,
            allowClear: true,
            placeholder: 'Masukkan Nama Penduduk',
            theme: "bootstrap",
            dropdownParent: $('body'),
            ajax: {
            dataType: 'json',
            url: '{!! route('civil.getCivil') !!}',
            delay: 200,
            data: function(params) {
                return {
                search: params.term
                }
            },
            processResults: function (response) {
                var results = [];
                $.each(response, function (index, data) {
                    results.push({
                        id: data.id,
                        text: data.name + ' ('+data.nik+')' + ' ('+data.address+')'
                    });
                });

                return {
                    results: results
                };
            },
        }
        });

        $('.datepicker').datepicker({
            format : 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight:true
        });

});
</script>

@endpush
