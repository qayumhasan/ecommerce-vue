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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Update Blog</span></div>
								</div>
								<div class="col-md-6 text-right">


									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.blog.all')}}" style="color: #fff;">All Blog</a></button>
								</div>
							</div>
						</div>
						<div class="panel_body">
						<form class="form-horizontal" action="{{route('admin.blog.update')}}" method="POST" enctype="multipart/form-data" >
						    @csrf
                <div class="form-group row">
									<div class="col-md-2"></div>
								    <div class="form-group col-md-4">
								      <label for="inputEmail4">Blog Title:</label>
								        <input type="text" value="{{$data->blog_title}}" name="blog_title" class="form-control" >
								        <input type="hidden" value="{{$data->id}}" name="id">
												  <span class="text-danger">{{ $errors->first('blog_title') }}</span>
								    </div>
								    <div class="form-group col-md-4">
								      <label for="inputPassword4">Category</label>
											<select class="form-control" name="cate_id">
                        @php
                          $allcate=DB::table('post_categoris')->get();
                        @endphp
                        <option value="">select</option>
                        @foreach($allcate as $cate)
                          <option value="{{$cate->id}}" @if($data->cate_id == $cate->id) selected @endif>{{$cate->name}}</option>
                        @endforeach
                      </select>

								    </div>
								  </div>
                  <div class="form-group row">
                    <div class="col-md-2"></div>
                      <div class="form-group col-md-8">
                        <label for="inputEmail4">Description:</label>
                           <textarea class="form-control" name="description" id="editor1" rows="10" cols="80">{{$data->description}}</textarea>
                      </div>
                  </div>
                  <div class="form-group row">
  									<div class="col-md-2"></div>
  								    <div class="form-group col-md-4">
  								      <label for="inputEmail4">Meta Tag:</label>
  								        <input type="text" class="form-control" data-role="tagsinput" name="m_tag" value="{{$data->meta_tag}}">
  												  <span class="text-danger">{{ $errors->first('blog_title') }}</span>
  								    </div>
  								    <div class="form-group col-md-4">
  								      <label for="inputPassword4">Meta Description:</label>
  											<input type="text" class="form-control" name="meta_description" value="{{$data->meta_description}}">
  								    </div>
  								  </div>
                    <div class="form-group row">
                      <div class="col-md-2"></div>
                        <div class="form-group col-md-4">
                          <label for="inputEmail4">Image:(800px*533px)</label>
                          <div id="thumbnail_img">
                                @if ($data->image != null)
                                  <div class="col-md-4">
                                    <div class="img-upload-preview">
                                      <img src="{{asset('public/uploads/blog/'.$data->image)}}" alt="" class="img-foy img-responsive" height="115px">
                                      <input type="hidden" name="previous_thumbnail_img" value="{{ $data->image }}">
                                      <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                    </div>
                                  </div>
                                @endif
                                <style>
                                        .img-upload-preview {
                                                  position: relative;
                                              }
                                button.btn.btn-danger.close-btn.remove-files {
                                    position: absolute;
                                    left: 5px;
                                    top: 10px;
                                    z-index: 99999;
                                }
                                      .img-upload-preview img {
                                            position: relative;
                                            z-index: 11;
                                            width: 90px;
                                        }
                                   label.file_upload {
                                        position: absolute;
                                        position: relative !important;
                                        bottom: 109px;
                                        z-index: 2;
                                    }
                                    .img-upload-preview img {
                                        position: relative;
                                     
                                        width: 96px;
                                        z-index: 9999;
                                        top: 6px;
                                    }
                                </style>
                              </div>
                    </div>
                        </div>
                    </div>

						    <div class="form-group text-center">

						    	<button type="submit" class="btn btn-blue">Update Blog</button>
						    </div>

							</form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->

@endsection
