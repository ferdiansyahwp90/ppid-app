@extends('layouts.firstpage')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2>Visi dan Misi PPID</h2>
        </div>
        @foreach ($visi as $item)
            <td>{!! $item->deskripsi !!}</td>
        @endforeach
    </div>
@endsection