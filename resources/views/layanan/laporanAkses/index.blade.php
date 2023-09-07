@extends('layouts.firstpage')
@section('content')
<div class="container">
    <div class="text-center">
        <h2>Laporan Akses Informasi Publik</h2>
    </div>
    @foreach ($laporanAkses as $item)
        <td>{!! $item->nama !!}</td>
    @endforeach
</div>
@endsection