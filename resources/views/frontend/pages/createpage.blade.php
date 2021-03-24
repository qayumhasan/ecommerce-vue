@extends('layouts.websiteapp')
@section('title', $pagedetails->page_name. " | ".$seo->meta_title)
@section('content')

<section class="section-padding bg-dark inner-header">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <h1 class="mt-0 mb-3 text-white">{{$pagedetails->page_name}}</h1>
               <div class="breadcrumbs">
                  <p class="mb-0 text-white"><a class="text-white" href="{{url('/')}}">Home</a>  /  <span class="text-success">{{$pagedetails->page_name}}</span></p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="section-padding">
      <div class="container">
         <div class="row">
           <div class="col-lg-2 col-md-2">

           </div>
           <div class="col-lg-8 col-md-8">
              <p> {!! $pagedetails->page_details !!} </p>
           </div>
         </div>
       </div>
     </section>
  @endsection
