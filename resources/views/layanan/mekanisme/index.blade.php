@extends('layouts.firstpage')
@section('content')
<div class="container" id="ppid">
    <div class="text-center">
        <h2>Mekanisme</h2>
        @foreach ($mekanisme as $item)
            <video controls width="1000" height="500">
                <source src="{{$item->file}}" type="video/webm" />
            </video>
        @endforeach
    </div>
</div>
@endsection