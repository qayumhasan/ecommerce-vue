@extends('layouts.adminapp')
@section('title', 'Add SiteBanner | '.$seo->meta_title)
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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Add SiteBanner</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.sitebanner.all')}}" style="color: #fff;">All SiteBanner</a></button>
								</div>
							</div>

						</div>
						<div class="panel_body">
						 <form class="form-horizontal" action="{{route('admin.sitebanner.insert')}}" method="POST" enctype="multipart/form-data" >
					          	@csrf
								 <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Select Image Section</label>
								    <div class="col-sm-8">
								      <select class="form-control" name="section">

								      	@php
								      		$choistheme=App\ThemeSelector::where('status',1)->first();
								      	@endphp
								      	@if($choistheme->id==1)
									            <option value="1">Homeside(390*193)</option>
									            <option value="3">Homemiddle(530*285)</option>
									            <option value="4">Homefooter1(1090*245)</option>
									            <option value="5">Homefooter2(530*245)</option>
												<option value="2">Category Top(1650*399)</option>
										@elseif($choistheme->id==9)
												<option value="6">Home Banner(570*210)</option>
										@endif

								      </select>
								    </div>
								  </div>
								  <div class="form-group row catebox" id="catebox" style="display: none">
								    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Catgeory</label>
								    <div class="col-sm-8">
								       @php
										$cate=App\Category::where('is_deleted',0)->orderBy('id','DESC')->get();
								       @endphp
								      <select class="select2" name="category_id[]" id="category_id" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
										    @foreach($cate as $category)
								      		<option value="{{$category->id}}">{{$category->cate_name}}</option>
								      	@endforeach
								      </select>

								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>
								    <div class="col-sm-8">
								      <input type="file" name="pic" required>
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Link</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" name="link">
								    </div>
								  </div>

							    <div class="form-group row">
							    	<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
								    <div class="col-sm-8 text-center">
								      <button type="submit" class="btn btn-blue">Submit</button>
								    </div>

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
	     if( id==2) {
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
