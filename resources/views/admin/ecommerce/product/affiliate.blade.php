@extends('layouts.adminapp')
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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Add Affiliate Product</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="submit" class="btn btn-primary"><i class="fas fa-undo-alt"></i> <a href="{{route('admin.product.producttype')}}" style="color: #fff;"> Back</a></button>
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.product.all')}}" style="color: #fff;">All Product</a></button>
								</div>
							</div>

						</div>
						<div class="panel_body">
							<form action="{{route('admin.product.insert')}}" method="POST" id="choice_form" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
									<input type="hidden" name="product_type" value="4">
								    <label for="" class="col-sm-3 col-form-label text-right">Product Name:</label>
								    <div class="col-sm-6">
                                    <input type="text" value="{{ old('product_name') }}" name="product_name" class="form-control" onchange="update_sku()" required>
                                      <span class="text-danger">{{ $errors->first('product_name') }}</span>
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product Sku:</label>
								    <div class="col-sm-6">
                                      <input type="text" value="{{ old('product_sku') }}" class="form-control" name="product_sku" required>
                                      <span class="text-danger">{{ $errors->first('product_sku') }}</span>
								    </div>
								  </div>
								  <div class="form-group row">
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
								  </div>
								   <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product SubCategory</label>
								    <div class="col-sm-6">
								      <select class="form-control" name="subcate_id" id="subcate_id">
								      	<option value="">Select Sub-category</option>
								      </select>
								    </div>
								  </div>
								   <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product ReSubCategory</label>
								    <div class="col-sm-6">
								      <select class="form-control" name="resubcate_id" id="resubcate_id">
								      	<option value="">Select Re-Sub-Category</option>
								      </select>
								    </div>
								  </div>
								   <div class="form-group row">
								    <label for="inputPassword"  class="col-sm-3 col-form-label text-right">Current Unit Price:</label>
								    <div class="col-sm-6">
                                      <input min="0"  value="{{ old('unit_price') }}" step="0.01" name="unit_price" class="form-control" required>
                                      <span class="text-danger">{{ $errors->first('unit_price') }}</span>
								    </div>
								  </div>
								  <!-- combination -->
								   <div class="form-group row">
								    <label class="col-sm-3 col-form-label text-right">Color</label>
										<div class="col-sm-6">
											<div class="select2-purple">
												<select class="select2" name="colors[]" id="colors" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" onchange="myFunction()" disabled>
													@php
														$allcolor=App\Color::where('is_deleted',0)->where('color_status',1)->get();
													@endphp
													@foreach($allcolor as $color)
													<option value="{{$color->color_code}}">{{$color->color_name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<label class="chech_container mb-4">
												<input value="1" type="checkbox" name="colors_active">
												<span class="checkmark"></span>
											</label>
										</div>
								  </div>

								  <div class="customer_choice_options" id="customer_choice_options">


							      </div>
							      <!-- custom choice option -->
							      <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right"></label>
								    <div class="col-sm-5 text-center">
								    	 <button type="button" class="btn btn-info" onclick="add_more_customer_choice_option()">Add Customer Choice</button>
								    </div>
								  </div>
								  <div class="row">
								  	<div class="col-md-3"></div>
								  	<div class="col-md-8">
								  	   <div class="sku_combination" id="sku_combination">

							          </div>
								  	</div>
								  	<div class="col-md-1"></div>

								  </div>
								  <div class="row">
		                          	<div class="col-md-3"></div>
		                          	<div class="col-md-8">
		                             	<label class="chech_container mb-4">
											<input type="checkbox" name="allow_product_condition" id="allow_product_condition" value="1">
											<span class="checkmark"></span>
											Allow Product Condition
										</label>
		                          	</div>
		                        </div>
		                        <div class="form-group row" style="display: none;" id="product_condition">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product Condition:</label>
								    <div class="col-sm-6">
								     <select class="form-control" name="product_condition">
								     	<option value="1">New</option>
								     	<option value="2">Used</option>
								     </select>
								    </div>
								 </div>
								 <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product Brand:</label>
								    <div class="col-sm-6">
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
								 </div>

								  <div class="row">
		                          	<div class="col-md-3"></div>
		                          	<div class="col-md-8">
		                             	<label class="chech_container mb-4">
											<input type="checkbox"  id="allow_product_measurement" name="allow_product_measurement" value="1">
											<span class="checkmark"></span>
											Allow Product Measurement
										</label>
		                          	</div>
		                        </div>
		                        <div class="form-group row" style="display: none;" id="product_measurement">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product Measurement:</label>
								    <div class="col-sm-6">
									     <select class="form-control" name="product_measurement">
									     	@php
												$allmesurement=App\Mesurement::where('is_deleted',0)->where('m_status',1)->get();
									     	@endphp
									     	@foreach($allmesurement as $mesurement)
									     	<option value="{{$mesurement->id}}">{{$mesurement->m_name}}</option>
									     	@endforeach
									     </select>
								    </div>
								 </div>

                          		<div style="margin-top: 15px">
	                          		<div class="row">
	                          			<label for="" class="col-sm-3 col-form-label text-right">Product Description:</label>
									    <div class="col-sm-6">
                                        <textarea name="product_description" id="editor1" rows="10" cols="80">{{ old('product_description')  }}</textarea>
                                        <span class="text-danger">{{ $errors->first('product_description') }}</span>
									    </div>
									</div>
                          	   </div>
                          	   <div style="margin: 15px 0px">
	                          		<div class="row">
	                          			<label for="" class="col-sm-3 col-form-label text-right">Product Buy and Return Policy:</label>
									    <div class="col-sm-6">
                                          <textarea class="editor3" name="buy_and_return_policy" id="editor3" rows="10" cols="80">
                                            {{ old('buy_and_return_policy')  }}
                                          </textarea>
                                          <span class="text-danger">{{ $errors->first('buy_and_return_policy') }}</span>
									    </div>
									</div>
                          	   </div>
		                         <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product Estimated Shipping Time</label>
								    <div class="col-sm-6">
                                    <input type="text" class="form-control" value="{{ old('shipping_time') }}" name="shipping_time">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Meta Tag</label>
								    <div class="col-sm-6">
								      <input type="text" class="form-control" data-role="tagsinput" name="m_tag">
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Meta Description</label>
								    <div class="col-sm-6">
								      <input type="text" value="{{ old('meta_description') }}" class="form-control" name="meta_description">
								    </div>
								  </div>
									<div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Youtube Video iframe</label>
								    <div class="col-sm-6">
								      <textarea class="form-control" name="video"></textarea>
								    </div>
								  </div>

								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label text-right">Gallery Images</label>
									 <div class="col-sm-6">
										<div id="photos" class="row"></div>
									</div>
								</div>

								<div class="form-group row">
								  <label for="" class="col-sm-3 col-form-label text-right">Thumbnail Image</label>
									<div class="col-sm-6">
									<div id="thumbnail_img" class="row">

                  </div>
                  <span class="text-danger">{{ $errors->first('thumbnail_img') }}</span>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12 text-center">
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
	$("#allow_product_condition").click(function() {
		if ($(this).is(":checked")) {
			$("#product_condition").show();
		}
		else {
			$("#product_condition").hide();
			}
	});
	$("#allow_product_measurement").click(function() {
		if ($(this).is(":checked")) {
			$("#product_measurement").show();
		}
		else {
			$("#product_measurement").hide();
			}
	});
	$("#allow_flash_deal").click(function() {
		if ($(this).is(":checked")) {
			$("#flash_deal_section").show();
		}
		else {
			$("#flash_deal_section").hide();
			}
	});
});
</script>


@endsection
