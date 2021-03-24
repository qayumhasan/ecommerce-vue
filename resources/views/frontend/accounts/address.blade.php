
@extends('layouts.websiteapp')
@section('title', 'User Profile | '.$seo->meta_title)
@section('content')
<section class="account-page section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 mx-auto">
                  <div class="row no-gutters">
                    @include('frontend.include.accounts.menu')
                     <div class="col-md-8">
                        <div class="card card-body account-right">
                           <div class="widget">
                              <div class="section-header">
                                 <h5 class="heading-design-h5">
                                    My Information
                                 </h5>
                              </div>
                              <form action="{{route('customar.address.create')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">Name <span class="required">*</span></label>
                                          <input name="name" class="form-control border-form-control" placeholder="" type="text" value="{{auth::user()->name}}">

                                       </div>
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">Address<span class="required">*</span></label>
                                          <textarea name="address" class="form-control border-form-control">{{auth::user()->address}}</textarea>
                                            @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="custom-control custom-checkbox mb-3">
                                          <input type="file" name="pic">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12 text-center">
                                       <div class="custom-control custom-checkbox mb-3">
                                          <button type="submit" name="button" class="btn btn-success"> Update</button>
                                       </div>
                                    </div>
                                 </div>

                              </form>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="custom-control mb-3">
                                       <a href="{{route('customar.passwordreset')}}" class="btn btn-primary" style="color:white">Change Password</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection
