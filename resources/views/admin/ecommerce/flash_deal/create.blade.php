@extends('layouts.adminapp')
@section('title', 'Flash Deal | '.$seo->meta_title)
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
									<div class="panel_title">
											<span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Add Flash Deal</span>
									</div>
									</div>
									<div class="col-md-6 text-right">
											<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{ route('admin.flash.deal.index') }}" style="color: #fff;">All Flash Deal</a></button>
									</div>
									</div>
							</div>
						<div class="panel_body">
							<form action="{{route('admin.flash.deal.insert')}}" method="POST" id="choice_form" enctype="multipart/form-data">
								@csrf
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Title</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" name="title">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Start Date</label>
                                    <div class="col-sm-6">
                                        <input required type="date" class="form-control" name="start_date">
                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label text-right">End Date</label>
                                    <div class="col-sm-6">
																			<input required type="date" class="form-control" name="end_date">
                                        <!-- <input required type="date" class="form-control" name="end_date"> -->

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label text-right">Select Product</label>
                                    <div class="col-sm-6">
                                        <div class="select2-purple">
                                            <select required class="select2" name="product_id[]" id="product_id" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('product_id') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- selected product section -->
                                <div class="row justify-content-center">
                                    <div class="col-md-6 ">
                                        <div class="selected-products-table">
                                            <table class="table table-sm table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Product Id</th>
                                                        <th>Name</th>
                                                        <th>Photo</th>
                                                        <th>Base Price</th>
                                                        <th>Discount</th>
                                                        <th>Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="products-table-body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-area">
                                    <div class="row">
                                        <div class="col-md-6 offset-3">
                                            <button class="btn btn-sm btn-success" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
							</form>
						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
		</div><!--/ content wrapper -->
   <!-- script code start -->


<script type="text/javascript">

    $(document).ready(function(){
        $('.selected-products-table').hide();
        $(document).on('change','#product_id', function(){
           var productId = $(this).val();
           //console.log(productId);
            var test = $(this).serialize();

           if (productId == null) {
                $('.selected-products-table').hide();
           }else{
            $('.selected-products-table').show();
           }

           $.ajax({
               url:"{{ url('admin/flash/deal/get/selected/products/by/ajax') }}",
               type:'get',
               data:{
                    productId: productId,
               },
               success:function(data){
                   console.log(data);
                   $('.products-table-body').empty();
                   $('.products-table-body').append(data);
               }
           });
        });
    })

</script>

<script src="{{asset('public/adminpanel')}}/assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
  $(function(){

   $('.select2').select2()

 });
</script>

@endsection
