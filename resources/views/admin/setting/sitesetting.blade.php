@extends('layouts.adminapp')
@section('title', 'Company Information | '.$seo->meta_title)
@section('admin_content')
 <div class="content_wrapper">
      <div class="middle_content_wrapper">
	<section class="page_area">
	     <div class="row">
		<div class="col-lg-6 offset-3">
		     <div class="panel">
			<div class="panel_header">
			     <div class="panel_title"><span class="text-center">Company Information</span></div>
			</div>
			    <div class="panel_body">
	                                   <form class="py-2" action="{{ route('admin.social.update') }}" method="post" >
	                                   	@csrf
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Company Name</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->company_name }}"  required="" name="company_name">
	                                             </div>
	                                         </div>
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Phone One </label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->phone_one }}"  name="phone_one">
	                                             </div>
	                                         </div>
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Phone Two </label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->phone_two }}"  name="phone_two">
	                                             </div>
	                                         </div>
	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Email One </label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="email" value="{{ $social->email_one }}"  name="email_one">
	                                             </div>
	                                         </div>
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Email Two </label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="email" value="{{ $social->email_two }}"  name="email_two">
	                                             </div>
	                                         </div>

	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Address</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->address }}"   name="address">
	                                             </div>
	                                         </div>

	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Facebook</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->facebook }}"   name="facebook">
	                                             </div>
	                                         </div>
	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Instagram</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->instagram }}"  name="instagram">
	                                             </div>
	                                         </div>
	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Twitter</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->twitter }}"   name="twitter">
	                                             </div>
	                                         </div>
	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Linkedin</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->linkedin }}"  name="linkedin">
	                                             </div>
	                                         </div>
	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Google</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->google }}"   name="google">
	                                             </div>
	                                         </div>
	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Feed</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $social->feed }}"  name="feed">
	                                             </div>
	                                         </div>



	                                       <input type="hidden" name="id" value="{{ $social->id }}">
	                                      	<br>
	                                      	<div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label"></label>
	                                             <div class="col-sm-9">
	                                                 <button type="submit" class="btn btn-success">Update</button>
	                                             </div>
	                                         </div>

	                                     </form>
			  </div>
		       </div>
		</div>
	     </div>
	</section>
      </div>
</div>
@endsection
