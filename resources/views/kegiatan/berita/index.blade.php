@extends('layouts.firstpage')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($berita as $item)
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="{{$item->photo}}" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="assets/img/icon/icon-3.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">{{$item->name}}</h4>
                            <p class="mb-4">{{$item->deskripsi}}</p>
                            <a class="btn btn-sm" href="{{$item->link}}"><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection