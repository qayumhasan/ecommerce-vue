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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>About Us</span></div>
								</div>
							</div>

						</div>
						<div class="panel_body">
							<form action="{{route('admin.aboutus.update')}}" method="POST" id="choice_form" enctype="multipart/form-data">
								@csrf
								  <div class="form-group row">
								    <label for="" class="col-sm-3 col-form-label text-right">About us</label>
								    <div class="col-sm-6">
								      <textarea class="" id="aboutus" name="about_text" required>{{$data->about_text}}</textarea>
								      <input type="hidden" name="id" value="{{$data->id}}">
								    </div>
								  </div>
									<div class="form-group row">
								    <label for="" class="col-sm-3 col-form-label text-right">Our Mission</label>
								    <div class="col-sm-6">
								      <textarea class="" id="our_mission" name="our_mission" >{{$data->our_mission}}</textarea>
								    </div>
								  </div>
									<div class="form-group row">
										<label for="" class="col-sm-3 col-form-label text-right">Our Vission</label>
										<div class="col-sm-6">
											<textarea class="" id="our_vission" name="our_vission" >{{$data->our_vission}}</textarea>
										</div>
									</div>
								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Photo</label>
								    <div class="col-sm-2">
								      <input type="file" name="pic" >
								      <input type="hidden" name="oldpic" value="{{$data->image}}">
								    </div>
								    <div class="col-sm-4">
								      <img src="{{asset('public/uploads/aboutus/'.$data->image)}}" height="150px">
								    </div>

								  </div>
								<div class="form-group row">
									<div class="col-md-12 text-center">
										<button type="submit" class="btn btn-primary">Update About Us</button>
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
