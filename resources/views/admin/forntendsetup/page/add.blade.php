@extends('layouts.adminapp')
@section('title', 'Add Page | '.$seo->meta_title)
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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Add Page</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="submit" class="btn btn-primary"><i class="fas fa-undo-alt"></i> <a href="{{route('admin.product.producttype')}}" style="color: #fff;"> Back</a></button>

									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.page.all')}}" style="color: #fff;">All Page</a></button>
								</div>
							</div>
						</div>
						<div class="panel_body">
						<form class="form-horizontal" action="{{route('admin.page.insert')}}" method="POST" enctype="multipart/form-data" >
						    @csrf
							 <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Page Name</label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control" name="page_name" required>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Page Details</label>
							    <div class="col-sm-6">
							      <textarea class="form-control" name="page_details" id="editor1" rows="10" cols="80"></textarea>

							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta tag</label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control" name="meta_ta">
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Description</label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control" name="meta_des">
							    </div>
							  </div>
						    <div class="form-group text-center">

						    	<button type="submit" class="btn btn-blue">Add Blog</button>
						    </div>

							</form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->



@endsection
