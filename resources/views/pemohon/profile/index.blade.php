@extends('pemohon.elements.index')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">{{ $title ?? '' }}</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title ?? ''}}</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  
  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
  @if(session('danger'))
    <div class="alert alert-danger">
      {{session('danger')}}
    </div>
  @endif

  <!-- Row -->
  <div class="row">
    <div class="col-lg-8 col-xlg-9 offset-md-3 mt-4">
      <div class="card px-2 py-2">
        <div class="card-title">
            Profile
        </div>
        <a href="{{url('/edit-profile')}}"><button class="btn btn-primary float-end">Edit Profile</button></a>
          <div class="card-body">
            <table class="table">
              <tr>
                  <td>Email</td><td>:</td><td>{{ auth()->user()->email }}</td>
              </tr>
              <tr>
                  <td>Status</td><td>:</td><td>{{ auth()->user()->status }}</td>
              </tr>
              <tr>
                  <td>Tanggal Ditambahkan</td><td>:</td><td>{{ auth()->user()->created_at->format('d,M Y') }}</td>
              </tr>
            </table>
          </div>
        </div>
    </div>  
  </div>
</div>
@endsection