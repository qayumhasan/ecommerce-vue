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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Choice Product Type</span></div>
								</div>

							</div>

						</div>
						<div class="panel_body">
							<div class="row text-center">
								<div class="col-md-3">
									<div class="physical-button" style="background-color: #d35400;padding:20px 30px;border-radius:5px;">		
									<a href="{{route('admin.product.add')}}" style="color: #fff;font-size: 18px;font-weight: 600;">Physical Product</a>
								</div>
								</div>
								<div class="col-md-3">
									<div class="digital-button" style="background-color: #27ae60;padding:20px 30px;border-radius:5px;">	
									<a  href="{{route('admin.product.digital')}}" style="color: #fff;font-size: 18px;font-weight: 600;">Digital Product </a>
								</div>
								</div>
								<div class="col-md-3">
									<div class="licence-button" style="background-color: #c0392b;padding:20px 30px;border-radius:5px;">	
									<a  href="{{route('admin.product.license')}}" style="color: #fff;font-size: 18px;font-weight: 600;">License Product </a>
								</div>
								</div>
								<div class="col-md-3">
									<div class="appliate-button" style="background-color:#2c3e50;padding:20px 30px;border-radius:5px;">	
									<a  href="{{route('admin.product.affiliate')}}" style="color: #fff;font-size: 18px;font-weight: 600;">Affiliate Product </a>
								</div>
								</div>
							</div>
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
