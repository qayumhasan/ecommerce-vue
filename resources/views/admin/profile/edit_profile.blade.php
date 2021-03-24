@extends('layouts.adminapp')
@section('admin_content')
 <div class="content_wrapper">
      <div class="middle_content_wrapper">
	<section class="page_area">
	     <div class="row">     						
		<div class="col-lg-6 offset-3">
		     <div class="panel">
			<div class="panel_header">
			     <div class="panel_title"><span class="text-center">Profile Update</span></div>
			</div>
			    <div class="panel_body">
	                                   <form class="py-2" action="{{ Route('admin.update.profile') }}" method="post" enctype="multipart/form-data">
	                                   	@csrf
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ Auth::user()->name }}"  required="" name="name">
	                                             </div>
	                                         </div>
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Email Address</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="email" value="{{ Auth::user()->email }}"  required="" name="email">
	                                             </div>
	                                         </div>

	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Phone</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ Auth::user()->phone }}"  required="" name="phone">
	                                             </div>
	                                         </div>
	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Address</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ Auth::user()->address }}"  required="" name="address">
	                                             </div>
	                                         </div>
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Image</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="file"  name="avatar">
	                                             </div>
	                                         </div>
	                                      	<br>
	                                      	<div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label"></label>
	                                             <div class="col-sm-9">
	                                                 <button type="submit" class="btn btn-success">Submit</button>   
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