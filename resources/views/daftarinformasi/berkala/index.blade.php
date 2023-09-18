@extends('layouts.firstpage')
@section('content')
<div class="container">
    <div class="text-center">
        <h2>Informasi Berkala</h2>
    </div>
    @foreach ($berkala as $item)
        <td>{!! $item->deskripsi !!}</td>
    @endforeach
</div>
@endsection