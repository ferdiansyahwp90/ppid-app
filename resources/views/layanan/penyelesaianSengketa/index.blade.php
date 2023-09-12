@extends('layouts.firstpage')
@section('content')
<div class="container" id="ppid">       
        <div class="header-ppid">
            <div class="text-center">
                <h2>Penyelesaian Sengketa</h2>
                @foreach ($penyelesaianSengketa as $item)
                    <video controls width="1000" height="500">
                        <source src="{{$item->file}}" type="video/webm" />
                    </video>
                @endforeach
            </div>
        </div>
</div>
@endsection