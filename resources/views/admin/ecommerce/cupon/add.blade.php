@extends('layouts.adminapp')
@section('title', 'Cupon Add | '.$seo->meta_title)
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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Add Cupon</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.cupon.all')}}" style="color: #fff;">All Cupon</a></button>
								</div>
							</div>

						</div>
						<div class="panel_body">
							<form action="{{route('admin.cupon.insert')}}" method="POST" id="choice_form" enctype="multipart/form-data">
								@csrf
								  <div class="form-group row">
								    <label for="" class="col-sm-3 col-form-label text-right">Cupon Type:</label>
								    <div class="col-sm-6">
								      <select class="form-control" name="cupon_type">
								      	<option>Select</option>
								      	<option value="1">For Total Order</option>
								      	<option value="2">For Products</option>
								      </select>
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Cupon Code:</label>
								    <div class="col-sm-6">
								      <input type="text" class="form-control" name="cupon_code" required>
								    </div>
								  </div>
								<div id="fortotalorder" style="display: none">

								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Minimum Shopping:</label>
								    <div class="col-sm-6">
								      <input type="number" class="form-control" name="minimum_shopping">
								    </div>
								  </div>
								</div>
								<!--  -->
							<div id="forproduct" style="display: none">
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Product</label>
								   <div class="col-sm-6">
											<div class="select2-purple">
												<select class="select2" name="product_id[]" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
													@php
														$allproduct=App\Product::where('is_deleted',0)->OrderBy('id','DESC')->get();
													@endphp
													<option value="1" selected>select</option>
													@foreach($allproduct as $product)
													<option value="{{$product->id}}">{{$product->product_name}}</option>
													@endforeach
												</select>
											</div>
										</div>
								</div>
							</div>
								<!--  -->
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Discount:</label>
								    <div class="col-sm-5">
								      <input type="number" class="form-control" name="discount">
								    </div>
								    <div class="col-sm-1">
								      <select class="form-control" name="discount_type">
								      	<option value="1">Amount</option>
								      	<option value="2">%</option>
								      </select>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Date</label>
								    <div class="col-sm-3">
								      <input type="date" class="form-control" name="cupon_start_date" placeholder="Start Date" required>
								    </div>
								    <div class="col-sm-3">
								      <input type="date" class="form-control" name="cupon_end_date" placeholder="End Date" required>
								    </div>
								</div>
								<div class="form-group row">
									<div class="col-md-12 text-center">
										<button type="submit" class="btn btn-primary">Add Cupon</button>
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

 </script>



<script type="text/javascript">

  $(document).ready(function() {
     $('select[name="cupon_type"]').on('change', function(){
        var cupon_id = $(this).val();

        if(cupon_id==1){
        	$("#fortotalorder").show();
        	$("#forproduct").hide();
        }
        else if(cupon_id==2){
        	$("#forproduct").show();
        	$("#fortotalorder").hide();
        }else{
        	$("#forproduct").hide();
        	$("#fortotalorder").hide();
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
		if ($(this).is(":checked")){
			$("#flash_deal_section").show();
		}
		else {
			$("#flash_deal_section").hide();
			}
	});
});
</script>


<script src="{{asset('public/adminpanel')}}/assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
  $(function(){

   $('.select2').select2()

 });
</script>

@endsection
