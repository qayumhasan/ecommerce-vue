@extends('layouts.adminapp')
@section('admin_content')
 <div class="content_wrapper">
      <div class="middle_content_wrapper">
	<section class="page_area">
	     <div class="row">
        		<div class="col-lg-6">
        		     <div class="panel">
              			<div class="panel_header">
              			     <div class="panel_title"><span class="text-center">Facebook</span></div>
              			</div>
            			    <div class="panel_body">

                        <form class="form-horizontal" action="{{ url('admin/sociallogin/update') }}" method="POST">
                     @csrf
                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="FACEBOOK_CLIENT_ID">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">App ID</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="FACEBOOK_CLIENT_ID" value="{{ env('FACEBOOK_CLIENT_ID') }}" placeholder="Facebook Client ID" required>
                         </div>
                     </div>
                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="FACEBOOK_CLIENT_SECRET">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">App Secret</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="FACEBOOK_CLIENT_SECRET" value="{{ env('FACEBOOK_CLIENT_SECRET') }}" placeholder="Facebook Client Secret" required>
                         </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-lg-12 text-center">
                             <button class="btn btn-success" type="submit">Update</button>
                         </div>
                     </div>
                 </form>
            			       </div>
        		       </div>
        	    	</div>
        	    <div class="col-lg-6">
          		     <div class="panel">
                			<div class="panel_header">
                			     <div class="panel_title"><span class="text-center">Google</span></div>
                			</div>
                			    <div class="panel_body">

                            <form class="form-horizontal" action="{{ url('admin/sociallogin/update') }}" method="POST">
                                  @csrf
                                  <div class="form-group row">
                                      <input type="hidden" name="types[]" value="GOOGLE_CLIENT_ID">
                                      <div  class="col-md-1"></div>
                                      <div class="col-lg-2">
                                          <label class="control-label">Client ID</label>
                                      </div>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="GOOGLE_CLIENT_ID" value="{{  env('GOOGLE_CLIENT_ID') }}" placeholder="Google Client ID" required>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <input type="hidden" name="types[]" value="GOOGLE_CLIENT_SECRET">
                                        <div  class="col-md-1"></div>
                                      <div class="col-lg-2">
                                          <label class="control-label">Client Secret</label>
                                      </div>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="GOOGLE_CLIENT_SECRET" value="{{  env('GOOGLE_CLIENT_SECRET') }}" placeholder="Google Client Secret" required>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-lg-12 text-center">
                                          <button class="btn btn-success" type="submit">Update</button>
                                      </div>
                                  </div>
                              </form>
                			  </div>
          		       </div>
        		</div>
	     </div>
<div class="row">

	       <!-- <div class="col-lg-6">
	     	     <div class="panel">
      	     		<div class="panel_header">
      	     		     <div class="panel_title"><span class="text-center">Mollie Payment Gateway </span></div>
      	     		</div>
	     		    <div class="panel_body">
	                  <form class="py-2" action="" method="post"  >
	                         	@csrf
        	     			<div class="form-group row">
        	     			    <label for="example-text-input" class="col-sm-3 col-form-label">Secret Key</label>
        	     			    <div class="col-sm-9">
        	     			        <input class="form-control" type="text" value=""  required="" name="mol_secret_key">
        	     			    </div>
        	     			</div>
            	     			<div class="form-group row">
            	     			    <label for="example-text-input" class="col-sm-3 col-form-label"> Publish Key</label>
            	     			    <div class="col-sm-9">
            	     			        <input class="form-control" type="text" value=""  name="mol_publish_key">
            	     			    </div>
            	     			</div>
                        <input type="hidden" name="id" value="">
                       	<br>
                       	<div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                              <div class="col-sm-6">
                                  <button type="submit" class="btn btn-success">Update</button>
                              </div>
                          </div>
                      </form>
      	     		  </div>
      	     	       </div>
      	     	</div> -->
      	  </div>
	</section>
      </div>
</div>
@endsection
