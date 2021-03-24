@extends('layouts.adminapp')
@section('title', 'Add Blog | '.$seo->meta_title)
@section('admin_content')

      <!-- content wrpper -->
			<div class="content_wrapper">
				<!--middle content wrapper-->
				<div class="middle_content_wrapper">

				<section class="page_area">
					<div class="panel">
						<div class="panel_header">
							<div class="row">
								<div class="col-md-6">
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Add Blog</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.blog.all')}}" style="color: #fff;">All Blog</a></button>
								</div>
							</div>
						</div>
						<div class="panel_body">
						<form class="form-horizontal" action="{{route('admin.blog.insert')}}" method="POST" enctype="multipart/form-data" >
						    @csrf
                <div class="form-group row">
									<div class="col-md-2"></div>
								    <div class="form-group col-md-4">
								      <label for="inputEmail4">Blog Title:</label>
								        <input type="text" value="" name="blog_title" class="form-control" onchange="update_sku()" required>
												  <span class="text-danger">{{ $errors->first('blog_title') }}</span>
								    </div>
								    <div class="form-group col-md-4">
								      <label for="inputPassword4">Category</label>
											<select class="form-control" name="cate_id">
                        @php
                          $allcate=DB::table('post_categoris')->get();
                        @endphp
                        <option value="">select</option>
                        @foreach($allcate as $data)
                          <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                      </select>

								    </div>
								  </div>
                  <div class="form-group row">
                    <div class="col-md-2"></div>
                      <div class="form-group col-md-8">
                        <label for="inputEmail4">Description:</label>
                           <textarea class="form-control" name="description" id="editor1" rows="10" cols="80"></textarea>
                      </div>
                  </div>
                  <div class="form-group row">
  									<div class="col-md-2"></div>
  								    <div class="form-group col-md-4">
  								      <label for="inputEmail4">Meta Tag:</label>
  								        <input type="text" class="form-control" data-role="tagsinput" name="m_tag">
  												  <span class="text-danger">{{ $errors->first('blog_title') }}</span>
  								    </div>
  								    <div class="form-group col-md-4">
  								      <label for="inputPassword4">Meta Description:</label>
  											<input type="text" class="form-control" name="meta_description">
  								    </div>
  								  </div>
                    <div class="form-group row">
                      <div class="col-md-2"></div>
                        <div class="form-group col-md-4">
                          <label for="inputEmail4">Image:(800px*533px)</label>
                          <div id="thumbnail_img" class="row">
                           </div>
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
