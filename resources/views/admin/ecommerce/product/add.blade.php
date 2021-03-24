@extends('layouts.adminapp')
@section('title', 'Add Product | '.$seo->meta_title)
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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Add Product</span></div>
								</div>
								<div class="col-md-6 text-right">
									<!-- <button type="submit" class="btn btn-primary"><i class="fas fa-undo-alt"></i> <a href="{{route('admin.product.producttype')}}" style="color: #fff;"> Back</a></button> -->
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.product.all')}}" style="color: #fff;">All Product</a></button>
								</div>
							</div>

						</div>
						<div class="panel_body">
							<form action="{{route('admin.product.insert')}}" method="POST" id="choice_form" enctype="multipart/form-data">
								@csrf

								<div class="form-group row">
									  <label for="" class="col-sm-4 col-form-label text-right"></label>
									 <div class="col-sm-2">
											<input class="form-check-input product_type" type="radio" name="product_type" value="1" checked>
											<label class="form-check-label" for="product_type">Grocery</label>
									</div>
									<div class="col-sm-4">
										 <input class="form-check-input product_type" type="radio" name="product_type" value="2" id="pharmacy">
										 <label class="form-check-label" for="inlineRadio1">Medicine</label>
								 </div>
								</div>

								<div class="form-group row">
									<div class="col-md-2"></div>
								    <div class="form-group col-md-4">
								      <label for="inputEmail4">Product Name:</label>
								        <input type="text" value="{{ old('product_name') }}" name="product_name" class="form-control" onchange="update_sku()" required>
												  <span class="text-danger">{{ $errors->first('product_name') }}</span>
								    </div>
								    <div class="form-group col-md-4">
								      <label for="inputPassword4">Product Sku:</label>
											<input type="text" value="{{ old('product_sku') }}" class="form-control" name="product_sku" required>
											<span class="text-danger">{{ $errors->first('product_sku') }}</span>
								    </div>
								  </div>
									<div class="form-group row">
										<div class="col-md-2"></div>
									    <div class="form-group col-md-4">
									      <label for="inputEmail4">Product Quantity:</label>
												<input type="number" value="{{ old('product_qty') }}" class="form-control" name="product_qty">
												<span class="text-danger">{{ $errors->first('product_qty') }}</span>
									    </div>
									    <div class="form-group col-md-4">
									      <label for="inputPassword4">Product Category:</label>
												@php
												$category=App\Category::where('is_deleted',0)->where('cate_status',1)->get();
									    	@endphp
									      <select class="form-control" name="cate_id" id="cate_id" required>
									      	<option value="">Select</option>
									      	@foreach($category as $cate)
									      	<option {{ $cate->id == old('cate_id') ? "SELECTED" : "" }} value="{{$cate->id}}">{{$cate->cate_name}}</option>
									      	@endforeach
	                     </select>
	                        <span class="text-danger">{{ $errors->first('cate_id') }}</span>
									    </div>
									  </div>
										<div class="form-group row">
											<div class="col-md-2"></div>
										    <div class="form-group col-md-4">
										      <label for="inputEmail4">Product SubCategory:</label>
													<select class="form-control" name="subcate_id" id="subcate_id">
														<option value="">Select Sub-category</option>
													</select>
										    </div>
										    <div class="form-group col-md-4">
										      <label for="inputPassword4">Product Price:</label>
													<input min="0"  value="{{ old('unit_price') }}" step="0.01" name="unit_price" class="form-control" required>
	                           <span class="text-danger">{{ $errors->first('unit_price') }}</span>
										    </div>
										  </div>

								<!-- <div class="form-group row">
									<input type="hidden" name="product_type" value="1">
								    <label for="" class="col-sm-3 col-form-label text-right">Product Name:</label>
								    <div class="col-sm-6">
                      <input type="text" value="{{ old('product_name') }}" name="product_name" class="form-control" onchange="update_sku()" required>
                          <span class="text-danger">{{ $errors->first('product_name') }}</span>
								    </div>
								  </div> -->
								  <!-- <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product Sku:</label>
								    <div class="col-sm-6">
                                      <input type="text" value="{{ old('product_sku') }}" class="form-control" name="product_sku" required>
                                      <span class="text-danger">{{ $errors->first('product_sku') }}</span>
								    </div>
								  </div> -->
								  <!-- <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product Quantity:</label>
								    <div class="col-sm-6">
                                      <input type="number" value="{{ old('product_qty') }}" class="form-control" name="product_qty">
                                      <span class="text-danger">{{ $errors->first('product_qty') }}</span>
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product Category</label>
								    <div class="col-sm-6">
								    	@php
											$category=App\Category::where('is_deleted',0)->where('cate_status',1)->get();
								    	@endphp
								      <select class="form-control" name="cate_id" id="cate_id" required>
								      	<option value="">Select</option>
								      	@foreach($category as $cate)
								      	<option {{ $cate->id == old('cate_id') ? "SELECTED" : "" }} value="{{$cate->id}}">{{$cate->cate_name}}</option>
								      	@endforeach
                                      </select>
                                      <span class="text-danger">{{ $errors->first('cate_id') }}</span>
								    </div>
								  </div> -->
								   <!-- <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product SubCategory</label>
								    <div class="col-sm-6">
								      <select class="form-control" name="subcate_id" id="subcate_id">
								      	<option value="">Select Sub-category</option>
								      </select>
								    </div>
								  </div>

								   <div class="form-group row">
								    <label for="inputPassword"  class="col-sm-3 col-form-label text-right">Current Unit Price:</label>
								    <div class="col-sm-6">
                        <input min="0"  value="{{ old('unit_price') }}" step="0.01" name="unit_price" class="form-control" required>
                            <span class="text-danger">{{ $errors->first('unit_price') }}</span>
								    </div>
								  </div> -->
								  <!-- combination -->

									<div class="form-group row">
										<div class="col-md-2"></div>
											<div class="form-group col-md-4">
												<label for="inputEmail4">Product Brand:</label>
												@php
												$allbrand=App\Brand::where('is_deleted',0)->where('brand_status',1)->get();
												@endphp
											 <select class="form-control" name="brand">
												<option value="">Select</option>
												@foreach($allbrand as $brand)
												<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
												@endforeach
											 </select>
											</div>
											<div class="form-group col-md-4">
												<label for="inputPassword4">Product Measurement::</label>
											 <select class="form-control" name="product_measurement">
	 									     	@php
	 												$allmesurement=App\Mesurement::where('is_deleted',0)->where('m_status',1)->get();
	 									     	@endphp
													<option value="">Select</option>
	 									     	@foreach($allmesurement as $mesurement)
	 									     	<option value="{{$mesurement->id}}">{{$mesurement->m_name}}</option>
	 									     	@endforeach
	 									     </select>
											</div>
										</div>
										<div class="form-group row" id="grug" style="display:none">
											<div class="col-md-2"></div>
										    <div class="form-group col-md-8">
										      <label for="inputEmail4">Drug Type:</label>

														  <select class="form-control" name="grug_type">
																<option value="1">Non-Prescrip</option>
																<option value="2">Prescrip</option>
															</select>
										    </div>
										  </div>

										<div class="form-group row">
											<div class="col-md-2"></div>
												<div class="form-group col-md-8">
													<label for="inputEmail4">Product Description:</label>
													<textarea name="product_description" id="editor1" rows="10" cols="80">{{ old('product_description')  }}</textarea>
												</div>
									</div>
									<!-- <div class="form-group row">
										<div class="col-md-2"></div>
											<div class="form-group col-md-4">
												<label for="inputEmail4">Drug Type</label>
												<select class="form-control">

												</select>
											</div>
										</div> -->
									<div class="form-group row">
										<div class="col-md-2"></div>
											<div class="form-group col-md-4">
												<label for="inputEmail4">Meta Tag:</label>
												 <input type="text" class="form-control" data-role="tagsinput" name="m_tag">
											</div>
											<div class="form-group col-md-4">
												<label for="inputPassword4">Meta Description:</label>
													<input type="text" value="{{ old('meta_description') }}" class="form-control" name="meta_description">

											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-2"></div>
												<div class="form-group col-md-4">
													<label for="inputEmail4">Gallery Images</label>
													<div id="photos" class="row"></div>

												</div>
												<div class="form-group col-md-4">
													<label for="inputPassword4">Thumbnail Image:</label>
													<div id="thumbnail_img" class="row">
													 </div>

												</div>
											</div>

								<div class="form-group row">
									<div class="col-md-10 text-center">
										<button type="submit" class="btn btn-primary">Add Product</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->
   <!-- script code start -->
 <script>
 var i = 0;

 		function add_more_customer_choice_option(){
		$('#customer_choice_options').append('<div class="form-group row"><div class="col-lg-3"></div><div class="col-lg-2"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="" placeholder="Choice Title"></div><div class="col-lg-4"><input type="text" class="form-control choice_tag" name="choice_options_'+i+'[]" id="choice_tag" placeholder="Enter choice values" data-role="tagsinput" onchange="update_sku()"></div><div class="col-lg-2"><button onclick="delete_row(this)" class="btn btn-danger btn-icon"><i class="fa fa-times"></i></button></div></div>');
		i++;
		 $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
	}

	 $('input[name="colors_active"]').on('change', function() {
		    if(!$('input[name="colors_active"]').is(':checked')){
				$('#colors').prop('disabled', true);
			}
			else{
				$('#colors').prop('disabled', false);
			}
			update_sku();
		});

	 function delete_row(em){
		$(em).closest('.form-group').remove();
		update_sku();
	}
// $('#colors').on('change', function() {
//     // update_sku();
//     alert('')
// });
$('input[name="unit_price"]').on('keyup', function() {
	    update_sku();
	});

 function update_sku(){
		$.ajax({
		   type:"GET",
		   url:'{{ route('products.sku_combination') }}',
		   data:$('#choice_form').serialize(),
		   success: function(data){
		   	 // console.log(data);
			   $('#sku_combination').html(data);
		   }
	   });
	}



 </script>

<script>
	function myFunction() {
      update_sku()
	}
</script>

<script type="text/javascript">

  $(document).ready(function() {
     $('select[name="cate_id"]').on('change', function(){
         var cate_id = $(this).val();

         if(cate_id) {
             $.ajax({
                 url: "{{  url('/get/subcategory/all/') }}/"+cate_id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {

                        $('#subcate_id').empty();
                        $('#subcate_id').append(' <option value="">--Select--</option>');
                        $.each(data,function(index,districtObj){
                         $('#subcate_id').append('<option value="' + districtObj.id + '">'+districtObj.subcate_name+'</option>');
                       });
                     }
             });
         } else {
             alert('danger');
         }

     });
 });
</script>
<script type="text/javascript">

  $(document).ready(function() {
     $('select[name="subcate_id"]').on('change', function(){
         var subcate_id = $(this).val();
        //alert(subcate_id);
         if(subcate_id) {
             $.ajax({
                 url: "{{  url('/get/resubcategory/all/') }}/"+subcate_id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {

                        $('#resubcate_id').empty();
                        $('#resubcate_id').append(' <option value="">--Select--</option>');
                        $.each(data,function(index,districtObj){
                         $('#resubcate_id').append('<option value="' + districtObj.id + '">'+districtObj.resubcate_name+'</option>');
                       });
                     }
             });
         } else {
             alert('danger');
         }

     });
 });
</script>






 <script>
 $(document).ready(function() {
	$(".product_type").click(function() {
		// alert("ok");
		if ($("#pharmacy").is(":checked")) {
						// alert("pharmacy");
			 $("#grug").show();
		}
		else {
			// alert("glosary")
			$("#grug").hide();
			}
	});
});
</script>


@endsection
