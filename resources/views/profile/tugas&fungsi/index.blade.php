@extends('layouts.firstpage')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2>Tugas dan Fungsi PPID</h2>
        </div>
        @foreach ($tugas as $item)
                <td>{!! $item->deskripsi !!}</td>
        @endforeach
    </div>
@endsection