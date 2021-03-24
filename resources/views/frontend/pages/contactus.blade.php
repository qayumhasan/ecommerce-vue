@extends('layouts.websiteapp')
@section('title', 'Contact | '.$seo->meta_title)
@section('content')

<section class="section-padding bg-dark inner-header">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <h1 class="mt-0 mb-3 text-white">Contact Us</h1>
               <div class="breadcrumbs">
                  <p class="mb-0 text-white"><a class="text-white" href="{{url('/')}}">Home</a>  /  <span class="text-success">Contact Us</span></p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End Inner Header -->
   <!-- Contact Us -->
   <section class="section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4">
               <h3 class="mt-1 mb-5">Get In Touch</h3>
               <h6 class="text-dark"><i class="mdi mdi-home-map-marker"></i> Address :</h6>
               <p>{{$contact->address}}</p>
               <h6 class="text-dark"><i class="mdi mdi-phone"></i> Phone :</h6>
               <p>{{$contact->phone_one}}, {{$contact->phone_two}}</p>
               <!-- <h6 class="text-dark"><i class="mdi mdi-deskphone"></i> Mobile :</h6>
               <p>(+20) 220 145 6589, +91 12345-67890</p> -->
               <h6 class="text-dark"><i class="mdi mdi-email"></i> Email :</h6>
               <p>{{$contact->email_one}},{{$contact->email_two}}</p>
               <!--<h6 class="text-dark"><i class="mdi mdi-link"></i> Company Name :</h6>-->
               <!--<p>{{$contact->company_name}}</p>-->
               <div class="footer-social"><span>Follow : </span>
                 @php
                   $slocial=DB::table('socials')->first();
                 @endphp
                  <a href="{{$slocial->facebook}}"><i class="mdi mdi-facebook"></i></a>
                  <a href="{{$slocial->twitter}}"><i class="mdi mdi-twitter"></i></a>
                  <a href="{{$slocial->instragram}}"><i class="mdi mdi-instagram"></i></a>
                  <a href="{{$slocial->google}}"><i class="mdi mdi-google"></i></a>
               </div>
            </div>
            <div class="col-lg-8 col-md-8">
               <div class="card">
                  <div class="card-body">
                      {!! $contact->google_map  !!}
                     <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109552.19658195564!2d75.78663251672796!3d30.900473637371658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a837462345a7d%3A0x681102348ec60610!2sLudhiana%2C+Punjab!5e0!3m2!1sen!2sin!4v1530462134939" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                  </div>
                  <style>
                      .card-body  iframe {
                        width: 685px !important;
                        }
                        .text-success {
                                color: #ffffff !important;
                            }
                        @media (max-width: 575.98px) {
                          .card-body iframe {
                            width: 346px !important;
                            height: 300px;
                        }


                        }
                        @media (min-width: 576px) and (max-width: 767.98px) {


                      .card-body iframe {
                            width: 556px !important;
                            height: 400px;
                        }

                        }

                  </style>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End Contact Us -->
   <!-- Contact Me -->
   <section class="section-padding  bg-white">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 section-title text-left mb-4">
               <h2>Contact Us</h2>
            </div>
            <form action="{{route('frontend.contract.us.send.message')}}" method="post" class="col-lg-12 col-md-12" name="sentMessage" id="contactForm" novalidate >
              @csrf

               <div class="row">
                 <div class="control-group form-group form-group col-md-6 {{$errors->has('visitor_name')? ' has-error':''}}">
                    <div class="controls ">
                       <label>Full Name <span class="text-danger">*</span></label>
                       <input type="text" name="visitor_name" placeholder="Full Name" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                       <p class="help-block"></p>
                    </div>
                 </div>
                 <div class="control-group form-group col-md-6 {{$errors->has('phone')? ' has-error':''}}">
                    <label>Phone Number <span class="text-danger">*</span></label>
                    <div class="controls">
                       <input type="text" name="phone" placeholder="Phone Number" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                    </div>
                 </div>
               </div>



               <div class="row">

                  <div class="control-group form-group col-md-6">
                     <div class="controls">
                        <label>Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="visitor_email" placeholder="Email Address"  class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                     </div>
                  </div>
                  <div class="control-group form-group col-md-6 {{$errors->has('phone')? ' has-error':''}}">
                     <label>Subject <span class="text-danger">*</span></label>
                     <div class="controls">
                          <input type="text" name="visitor_subject" placeholder="Subject"  class="form-control">

                     </div>
                  </div>
               </div>
               <div class="control-group form-group">
                  <div class="controls">
                     <label>Message <span class="text-danger">*</span></label>
                     <textarea name="visitor_message" rows="4" cols="100" placeholder="Message"  class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                  </div>
               </div>
               <div id="success"></div>
               <!-- For success/fail messages -->
               <button type="submit" class="btn btn-success">Send Message</button>
            </form>
         </div>
      </div>
   </section>
   <!-- End Contact Me -->

@endsection
