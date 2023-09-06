@extends('layouts.firstpage')
@section('content')
  <div class="container">
      <div class="text-center">
        <h2>SOP PPID</h2>
      </div>
      @foreach ($sop as $item)
              <td>{!! $item->deskripsi !!}</td>
      @endforeach
  </div>
@endsection