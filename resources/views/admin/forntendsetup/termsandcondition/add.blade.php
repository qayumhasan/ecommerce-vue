@extends('layouts.adminapp')
@section('admin_content')  
<link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/select2/css/select2.min.css">
      <!-- content wrpper -->
			<div class="content_wrapper">
				<!--middle content wrapper-->
				<div class="middle_content_wrapper">
					
				<section class="page_area">
					<div class="panel">
						<div class="panel_header">
							<div class="row">
								<div class="col-md-6">
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Terms And Condition</span></div>
								</div>
							</div>
							
						</div>
						<div class="panel_body">
							<form action="{{route('admin.termsandcondition.update')}}" method="POST" id="choice_form" enctype="multipart/form-data">
								@csrf
								  <div class="form-group row">
								    <label for="" class="col-sm-3 col-form-label text-right">Terms And Condition</label>
								    <div class="col-sm-6">
								      <textarea class="" id="aboutus" name="termsandcondition" required>{{$data->termsandcondition}}</textarea>
								      <input type="hidden" name="id" value="{{$data->id}}">
								    </div>
								  </div>
								<div class="form-group row">
									<div class="col-md-12 text-center">
										<button type="submit" class="btn btn-primary">Update Terms & Condition</button>
									</div>
								</div>
							</form>
								
						</div>	
					</div>
				</section>
			</div><!--/middle content wrapper-->  
			</div><!--/ content wrapper -->
   <!-- script code start -->


@endsection