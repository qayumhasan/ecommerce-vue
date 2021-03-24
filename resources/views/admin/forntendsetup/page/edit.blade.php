@extends('layouts.adminapp')
@section('title', 'Update Page | '.$seo->meta_title)
@section('admin_content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- content wrpper -->
			<div class="content_wrapper">
				<!--middle content wrapper-->
				<div class="middle_content_wrapper">

				<section class="page_area">
					<div class="panel">
						<div class="panel_header">
							<div class="row">
								<div class="col-md-6">
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Update Page</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.page.all')}}" style="color: #fff;">All Page</a></button>
								</div>
							</div>
						</div>
						<div class="panel_body">
						<form class="form-horizontal" action="{{route('admin.page.update')}}" method="POST" enctype="multipart/form-data" >
						    @csrf
							 <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Page Name</label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control" name="page_name" value="{{$data->page_name}}">
							      <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Page Details</label>
							    <div class="col-sm-6">
							      <textarea class="form-control" name="page_details" id="editor1" rows="10" cols="80">{{$data->page_details}}</textarea>

							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta tag</label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control" name="meta_ta" value="{{$data->meta_tag}}">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Description</label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control" name="meta_des" value="{{$data->meta_des}}">
							    </div>
							  </div>
						    <div class="form-group text-center">

						    	<button type="submit" class="btn btn-blue">Update Page</button>
						    </div>

							</form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->



@endsection
