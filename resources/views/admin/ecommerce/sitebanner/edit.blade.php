@extends('layouts.adminapp')
@section('title', 'Update SiteBanner | '.$seo->meta_title)
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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Update SiteBanner</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.sitebanner.all')}}" style="color: #fff;">All SiteBanner</a></button>
								</div>
							</div>

						</div>
						<div class="panel_body">
							<form class="form-horizontal" action="{{route('admin.sitebanner.update')}}" method="POST" enctype="multipart/form-data" >
	           	@csrf

	         <div class="form-group row">
	 			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Select Image Section</label>
	 			    <div class="col-sm-8">
	 			      <select class="form-control section" name="section" id="section">
									<option value="1" @if($data->section==1) selected @else @endif>Homeside(390*193)</option>
									<option value="2" @if($data->section==2) selected @else @endif>Category Top(1650*399)</option>
									<option value="3" @if($data->section==3) selected @else @endif>Homemiddle(530*285)</option>
									<option value="4" @if($data->section==4) selected @else @endif>Homefooter1(1090*245)</option>
									<option value="5" @if($data->section==5) selected @else @endif>Homefooter2(530*245)</option>

	 			      </select>
	 			    </div>
	 			  </div>
					@if($data->category_id == NULL)

					@else
					<div class="form-group row catebox" id="catebox" @if($data->section==2) @else style="display:none" @endif>
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Catgeory</label>
						<div class="col-sm-8">
							@php
							$cate=App\Category::where('is_deleted',0)->orderBy('id','DESC')->get();
							@endphp
							<select class="select2" name="category_id[]" id="category_id" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
								@foreach($cate as $category)
								 <option value="{{$category->id}}" <?php if(in_array($category->id,json_decode($data->category_id))) echo 'selected'?> >{{$category->cate_name}}</option>
								@endforeach
							</select>

						</div>
					</div>
					@endif

	 			  <div class="form-group row">
	 			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Link</label>
	 			    <div class="col-sm-8">
	 			      <input type="text" class="form-control" name="link" id="link" value="{{$data->link}}">
	 			      <input type="hidden"  name="id" id="id" value="{{$data->id}}">
	 			    </div>
	 			  </div>

	 			  <div class="form-group row">
	 			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>
	 			    <div class="col-sm-8">

	 			      <input type="file" name="pic">

	 			    </div>
	 			  </div>
	 			  <div class="form-group row">
	 			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
	 			    <div class="col-sm-8" id="store-img">
							<img src="{{asset('public/uploads/sitebanner/'.$data->image)}}" height="200px" width="300px">
	 			    </div>
	 			  </div>
	 			  <div class="form-group row">
	 			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
	 			    <div class="col-sm-8">
							<input type="hidden" name="old_image" value="{{$data->image}}">
	 			    </div>
	 			  </div>
	 		    <div class="form-group text-center">

	 		    	<button type="submit" class="btn btn-blue">Update</button>
	 		    </div>
	 		     </form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->
   <!-- script code start -->

	 <script src="{{asset('public/adminpanel')}}/assets/plugins/select2/js/select2.full.min.js"></script>
	 <script type="text/javascript">
	   $(function(){

	    $('.select2').select2()

	  });
	 </script>

 <script>
 $(document).ready(function() {

	 $('select[name="section"]').on('change', function(){
	   var id = $(this).val();
	   //alert(id);
	     if( id==2 || id==3 || id==4) {
	     	//alert("success");
	     	$("#catebox").show();

	       }
	       else{
	         $("#catebox").hide();
	       }
	   });
	 });

 </script>

@endsection
