@extends('admin.elements.firstpage')

@section('content') 

<main id="main" class="main">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Administrator</span><span class="text-black-50">admin@ppid.com</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            @foreach ($myprofile as $item)
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $myprofile->nama }}" aria-describedby="nama" ><label >Nama</label></div>
                    <div class="col-md-12"><label >Nomor Handphone</label><input type="text" class="form-control" placeholder="Masukkan Nomor Handphone " value=""></div>
                    <div class="col-md-12"><label >Alamat</label><input type="text" class="form-control" placeholder="Masukkan Alamat" value=""></div>
                    <div class="col-md-12"><label >Email</label><input type="text" class="form-control" placeholder="Masukkan Meail" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Negara</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
            @endforeach
        </div>
        {{-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> --}}
    </div>
</div>
</div>
</div>
</main>

@endsection