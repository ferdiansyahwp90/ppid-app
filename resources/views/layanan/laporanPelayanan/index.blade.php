@extends('layouts.firstpage')
@section('content')
<div class="container">
    <div class="text-center">
        <h2>Laporan Kinerja Instansi Pemerintah</h2>
    </div>
    @foreach ($laporanPelayanan as $item)
        <td>{!! $item->nama !!}</td>
    @endforeach
</div>
@endsection