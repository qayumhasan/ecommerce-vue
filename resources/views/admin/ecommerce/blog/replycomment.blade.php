@extends('layouts.adminapp')
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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Reply Blog Comment</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="submit" class="btn btn-primary"><i class="fas fa-undo-alt"></i> <a href="{{route('admin.product.producttype')}}" style="color: #fff;"> Back</a></button>

									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.blog.all')}}" style="color: #fff;">All Comment Blog</a></button>
								</div>
							</div>
						</div>
						<div class="panel_body">
						<form class="form-horizontal" action="{{route('admin.blog.insert')}}" method="POST" enctype="multipart/form-data" >
						    @csrf
							 <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Blog Title</label>
							    <div class="col-sm-6">
							      <p>jhgfhjfgggfgfhgjf</p>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Comment</label>
							    <div class="col-sm-6">
							     <p></p>
							  		
							    </div>
							  </div>
							   <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Reply</label>
							    <div class="col-sm-6">
							      <textarea class="form-control"></textarea>
							  		 
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
