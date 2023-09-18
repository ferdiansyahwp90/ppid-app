@extends('layouts.firstpage')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 portfolio-container">
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($galeri as $item)
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="{{$item->photo}}" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">{{$item->name}}</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="{{$item->photo}}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection