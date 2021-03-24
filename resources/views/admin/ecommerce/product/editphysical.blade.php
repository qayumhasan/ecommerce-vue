@extends('layouts.adminapp')
@section('title', 'Update Product | '.$seo->meta_title)
@section('admin_content')
      <!-- content wrpper -->
			<div class="content_wrapper">

				<div class="middle_content_wrapper">
				<section class="page_area">
					<div class="panel">
						<div class="panel_header">
							<div class="row">
								<div class="col-md-6">
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Update Product</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.product.all')}}" style="color: #fff;">All Product</a></button>
								</div>
							</div>
						</div>
						<div class="panel_body">
							<form action="{{route('admin.product.update',$data->id)}}" method="POST" id="choice_form" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
										<label for="" class="col-sm-4 col-form-label text-right"></label>
									 <div class="col-sm-2">
											<input class="form-check-input product_type" type="radio" name="product_type" value="1" @if($data->product_type==1) checked @endif>
											<label class="form-check-label" for="product_type">Grocery</label>
									</div>
									<div class="col-sm-4">
										 <input class="form-check-input product_type" type="radio" name="product_type" id="pharmacy" value="2" @if($data->product_type==2) checked @endif >
										 <label class="form-check-label" for="inlineRadio1">Medicine</label>
								 </div>
								</div>
								<div class="form-group row">
									<div class="col-md-2"></div>
										<div class="form-group col-md-4">
											<label for="inputEmail4">Product Name:</label>
												<input type="text" name="product_name" class="form-control" onchange="update_sku()" value="{{$data->product_name}}">
												<input name="_method" type="hidden" value="POST">
									      <input type="hidden" name="id" value="{{$data->id}}">
												<span class="text-danger">{{ $errors->first('product_name') }}</span>
										</div>
										<div class="form-group col-md-4">
											<label for="inputPassword4">Product Sku:</label>
											<input type="text" class="form-control" name="product_sku"  value="{{$data->product_sku}}">
											<span class="text-danger">{{ $errors->first('product_sku') }}</span>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-2"></div>
											<div class="form-group col-md-4">
												<label for="inputEmail4">Product Quantity:</label>
												<input type="number" value="{{$data->	product_qty}}" class="form-control" name="product_qty">
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
													<option value="{{$cate->id}}" @if($data->cate_id==$cate->id) selected @endif>{{$cate->cate_name}}</option>
													@endforeach
											 </select>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-md-2"></div>
												<div class="form-group col-md-4">
													<label for="inputEmail4">Product SubCategory:</label>
													@php
													$subcategory=App\SubCategory::where('is_deleted',0)->where('cate_id',$data->cate_id)->get();
										    	@endphp
										      <select class="form-control" name="subcate_id" id="subcate_id">
										      	<option value="">Select</option>
										      	@foreach($subcategory as $subcate)
										      	<option value="{{$subcate->id}}"@if($data->subcate_id==$subcate->id) selected @endif>{{$subcate->subcate_name}}</option>
										      	@endforeach
										      </select>
												</div>
												<div class="form-group col-md-4">
													<label for="inputPassword4">Product Current Price:</label>
  												<input name="unit_price" class="form-control" value="{{$data->product_price}}">
												</div>
											</div>

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
											     	<option value="{{$brand->id}}"@if($data->brand==$brand->id) selected @else @endif>{{$brand->brand_name}}</option>
											     	@endforeach
											     </select>
													</div>
													<div class="form-group col-md-4">
														<label for="inputPassword4">Product Measurement:</label>
													 		<select class="form-control" name="product_measurement">
				 									     	@php
				 												$allmesurement=App\Mesurement::where('is_deleted',0)->where('m_status',1)->get();
				 									     	@endphp
				 									     	<option value="">Select</option>
				 									     	@foreach($allmesurement as $mesurement)
				 									     	<option value="{{$mesurement->id}}" @if($data->product_measurement==$mesurement->id) selected @endif>{{$mesurement->m_name}}</option>
				 									     	@endforeach
				 									     </select>
													</div>
												</div>
												<div class="form-group row" id="grug" @if($data->product_type==1) style="display:none" @endif>
													<div class="col-md-2"></div>
														<div class="form-group col-md-8">
															<label for="inputEmail4">Drug Type:</label>

																	<select class="form-control" name="grug_type">
																		<option value="1" @if($data->grug_type==1) selected @endif>Non-Prescrip</option>
																		<option value="2" @if($data->grug_type==2) selected @endif>Prescrip</option>
																	</select>
														</div>
													</div>
												<div class="form-group row">
													<div class="col-md-2"></div>
														<div class="form-group col-md-8">
															<label for="inputEmail4">Product Description:</label>
															<textarea name="product_description" id="editor1" rows="10" cols="80"> {{$data->product_description}}</textarea>
														</div>
													</div>
													<div class="form-group row">
														<div class="col-md-2"></div>
															<div class="form-group col-md-4">
																<label for="inputEmail4">Meta Tag:</label>
																 <input type="text" class="form-control" data-role="tagsinput" name="m_tag" id="tag" value="{{$data->meta_tag}}">
															</div>
															<div class="form-group col-md-4">
																<label for="inputEmail4">Meta Description:</label>
																 <input type="text" class="form-control" name="meta_description" value="{{$data->meta_description}}">
																 		<input type="hidden" name="old_img" value="{{ $data->thumbnail_img }}">
															</div>
													</div>
													<div class="form-group row">
														<div class="col-md-2"></div>
															<div class="form-group col-md-5">
																<label for="inputEmail4">Gallary Image:</label>
																<div id="photos" class="row">
																	@if(is_array(json_decode($data->photos)))
																		@foreach (json_decode($data->photos) as $key => $photo)
																			<div class="col-md-4 col-xs-6">
																				<div class="img-upload-preview">
																					<img src="{{url('storage/app/public/'.$photo) }}" alt="" height="115px" width="135;">
																					<button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
																					<input type="hidden" name="previous_photos[]" value="{{ $photo }}">

																				</div>
																				<style>
																				.img-upload-preview {
																							    position: relative;
																							}
																				button.btn.btn-danger.close-btn.remove-files {
																							    position: absolute;
																							    left: 5px;
																							    top: 3px;
																							}
																							.img-upload-preview img {
																											    width: 115px;
																											    height: 97px;
																											    position: relative;
																											    top: 11px;
																											}
																											button.btn.btn-danger.close-btn.remove-files {
																											    position: absolute;
																											    left: 5px;
																											    top: 6px;
																											}
																											.img-upload-preview img {

																											    position: absolute;
																											    z-index: 99999999;
																											    left: 6px;
																											}
																											button.btn.btn-danger.close-btn.remove-files {
																											    position: absolute;
																											    left: 5px;
																											    top: 3px;
																											    z-index: 9999999999;
																											}
                        																					.btn {


                                                                                                                padding: 5px 12px;

                                                                                                            }
																				</style>

																			</div>
																		@endforeach
																	@endif
																	</div>
															</div>
															<div class="form-group col-md-5">
																<label for="inputEmail4">Thumbnail Image:</label>

																		<div id="thumbnail_img">
																					@if ($data->thumbnail_img != null)
																						<div class="col-md-4 col-sm-4 col-xs-6">
																							<div class="img-upload-preview">
																								<img src="{{asset('public/uploads/products/thumbnail/productdetails/'.$data->thumbnail_img)}}" alt="" class="img-foy img-responsive" height="115px">
																								<input type="hidden" name="previous_thumbnail_img" value="{{ $data->thumbnail_img }}">
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
																										top: 3px;
																								}
																					</style>
																				</div>
															</div>
													</div>


								<div class="form-group row">
									<div class="col-md-12 text-center">
										<button type="submit" class="btn btn-primary">Update Product</button>
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
 <script>

var i = $('input[name="choice_no[]"').last().val();
	if(isNaN(i)){
		i =0;
	}

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
		   url:'{{ route('products.sku_combination_edit') }}',
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
	$('.remove-files').on('click', function(){
            $(this).parents(".col-md-4").remove();
        });

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
                        $('#subcate_id').append(' <option value="0">--Select--</option>');
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
                        $('#resubcate_id').append(' <option value="0">--Select--</option>');
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


@endsection
