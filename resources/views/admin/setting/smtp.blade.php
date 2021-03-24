@extends('layouts.adminapp')
@section('title', 'Smtp Setting | '.$seo->meta_title)
@section('admin_content')
 <div class="content_wrapper">
      <div class="middle_content_wrapper">
	<section class="page_area">
	     <div class="row">
         <div class="col-md-2">

         </div>
        		<div class="col-lg-8">
        		     <div class="panel">
              			<div class="panel_header">
              			     <div class="panel_title"><span class="text-center">SMTP SETUP</span></div>
              			</div>
            			    <div class="panel_body">

                        <form class="form-horizontal" action="{{ url('admin/sociallogin/update') }}" method="POST">
                     @csrf
                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="MAIL_DRIVER">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">MAIL_DRIVER</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="MAIL_DRIVER" value="{{ env('MAIL_DRIVER') }}" placeholder="MAIL_DRIVER" required>
                         </div>
                     </div>
                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="MAIL_HOST">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">MAIL_HOST</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="MAIL_HOST" value="{{ env('MAIL_HOST') }}" placeholder="MAIL_HOST" required>
                         </div>
                     </div>
                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="MAIL_PORT">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">MAIL_PORT</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}" placeholder="MAIL_PORT" required>
                         </div>
                     </div>

                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="MAIL_USERNAME">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">MAIL_USERNAME</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}" placeholder="MAIL_USERNAME" required>
                         </div>
                     </div>
                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">MAIL_PASSWORD</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{ env('MAIL_PASSWORD') }}" placeholder="MAIL_PASSWORD" required>
                         </div>
                     </div>
                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">MAIL_ENCRYPTION</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{ env('MAIL_ENCRYPTION') }}" placeholder="MAIL_ENCRYPTION" required>
                         </div>
                     </div>
                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">MAIL_FROM_NAME</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{ env('MAIL_FROM_NAME') }}" placeholder="MAIL_FROM_NAME" required>
                         </div>
                     </div>

                     <div class="form-group row">
                         <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                         <div class="col-md-1"></div>
                         <div class="col-lg-2">
                             <label class="control-label">MAIL_FROM_ADDRESS</label>
                         </div>
                         <div class="col-lg-6">
                             <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{ env('MAIL_FROM_ADDRESS') }}" placeholder="MAIL_FROM_ADDRESS" required>
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

	</section>
      </div>
</div>
@endsection
