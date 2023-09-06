@extends('layouts.firstpage')
@section('content')
<div class="container">
    <div class="text-center">
        <h2>Profil PPID</h2>
    </div>
    @foreach ($ppid as $item)
        <td>{!! $item->deskripsi !!}</td>
    @endforeach
</div>
@endsection