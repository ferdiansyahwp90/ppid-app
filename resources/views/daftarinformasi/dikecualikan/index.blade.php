@extends('layouts.firstpage')
@section('content')
<div class="container">
    <div class="text-center">
        <h2>Informasi Yang Dikecualikan</h2>
    </div>
    @foreach ($dikecualikan as $item)
        <td>{!! $item->deskripsi !!}</td>
    @endforeach
</div>
@endsection