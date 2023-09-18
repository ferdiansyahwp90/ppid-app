@extends('layouts.firstpage')
@section('content')
<div class="container">
    <div class="text-center">
        <h2>Informasi Serta Merta</h2>
    </div>
    @foreach ($sertamerta as $item)
        <td>{!! $item->deskripsi !!}</td>
    @endforeach
</div>
@endsection