
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
                                    Password Reset
                                 </h5>
                              </div>
                              <form action="{{route('customar.changepass.submit')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">Old Password <span class="required" style="color:red">*</span></label>
                                          <input name="oldpass" class="form-control border-form-control" type="password" >
                                          <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">New Password <span class="required" style="color:red">*</span></label>
                                          <input name="password" class="form-control border-form-control" placeholder="" type="password">

                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">Confirm Password <span class="required" style="color:red">*</span></label>
                                          <input name="password_confirmation" class="form-control border-form-control" placeholder="" type="password">

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
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection
