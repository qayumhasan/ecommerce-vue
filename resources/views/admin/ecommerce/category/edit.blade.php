@extends('layouts.adminapp')
@section('title', 'Update Category | '.$seo->meta_title)
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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>update Category</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.category.all')}}" style="color: #fff;">All Category</a></button>
								</div>
							</div>
						</div>
						<div class="panel_body">
						<form class="form-horizontal" action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data" >
						          	@csrf
									 <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category Name:</label>
									    <div class="col-sm-6">
									      <input type="text" class="form-control" name="cate_name" required value="{{$data->cate_name}}">
									      <input type="hidden" name="id" value="{{$data->id}}">
									    </div>
									  </div>
									  <div class="form-group row">
					                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Category Slug</label>
					                <div class="col-sm-6">
					                   <input class="form-control" type="text" name="cate_slug" value="{{$data->cate_slug}}">
					                   <p style="font-size: 11px">(If you leave it blank, it will be generated automatically)</p>
					                </div>
						         </div>
									  <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Cate Image:</label>
									    <div class="col-sm-6">
									      <input type="file" name="pic">
									  		 <p>(270px*270px)</p>
									    </div>
									  </div>
                   					 <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
									    <div class="col-sm-6">
									      <img src="{{asset('public/uploads/category/'.$data->cate_image)}}" height="150px" width="200px">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Cate Banner:</label>
									    <div class="col-sm-6">
                        <input type="file" name="ban">
                        <p>(555px*179px)</p>
									    </div>
									  </div>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-3 col-form-label text-right"></label>
                      <div class="col-sm-6">
                          <img src="{{asset('public/uploads/category/banner/'.$data->cate_banner)}}" height="150px" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-3 col-form-label text-right">Meta Tag</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" data-role="tagsinput" name="tag" value="{{$data->cate_tag}}">
                      </div>
                    </div>

								    <div class="form-group text-center">
								    	<button type="submit" class="btn btn-blue">Update Category</button>
								    </div>

							</form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->



@endsection
