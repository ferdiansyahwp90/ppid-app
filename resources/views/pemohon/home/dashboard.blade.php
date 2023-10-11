@extends('pemohon.home.index')

@section('content')
<div class="row mt-5 offset-md-4">
    <div class="col-md-4">
        <div class="card px-3 py-3">
            Jumlah Permintaan Diterima : {{ $acc->count() }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="card px-3 py-3">
            Jumlah Permintaan Belum Diterima : {{ $revoke->count() }}
        </div>
    </div>
</div>
@endsection