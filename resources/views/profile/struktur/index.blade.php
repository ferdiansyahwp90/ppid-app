@extends('layouts.firstpage')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2>Struktur PPID</h2>
        </div>
        @foreach ($struktur as $item)
            <div align="middle">
                <img src="{{$item->photo}}" alt="struktur">
            </div>
        @endforeach
    </div>
@endsection