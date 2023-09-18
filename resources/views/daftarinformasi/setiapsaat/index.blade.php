@extends('layouts.firstpage')
@section('content')
<div class="container">
    <div class="text-center">
        <h2>Informasi Setiap Saat</h2>
    </div>
    @foreach ($setiapsaat as $item)
        <td>{!! $item->deskripsi !!}</td>
    @endforeach
</div>
@endsection