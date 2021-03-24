@extends('layouts.websiteapp')
@section('title', 'About us | '.$seo->meta_title)
@section('content')
<section class="section-padding bg-dark inner-header">
    <div class="container">
       <div class="row">
          <div class="col-md-12 text-center">
             <h1 class="mt-0 mb-3 text-white">About Us</h1>
             <div class="breadcrumbs">
                <p class="mb-0 text-white"><a class="text-white" href="{{url('/')}}">Home</a>  /  <span class="text-success">About Us</span></p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- End Inner Header -->
 <!-- About -->
 <section class="section-padding bg-white">
    <div class="container">
       <div class="row">
          <div class="pl-4 col-lg-5 col-md-5 pr-4">
             <img class="rounded img-fluid" src="{{asset('public/uploads/aboutus/'.$aboutus->image)}}" alt="Card image cap">
          </div>
          <div class="col-lg-6 col-md-6 pl-5 pr-5">
             <h5 class="mt-2">About Us</h5>
             <h2 class="mt-5 mb-5 text-secondary">{!! $aboutus->about_text !!}</h2>


          </div>
       </div>
    </div>
 </section>

@endsection
