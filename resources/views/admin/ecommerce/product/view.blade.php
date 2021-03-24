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
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>View Product</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.product.all')}}" style="color: #fff;">All Product</a></button>
								</div>
							</div>
							
						</div>
						<form id="option-choice-form">
							@csrf
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6 text-center">
								<div class="panel_body">
									<div class="card" style="width: 18rem;">
									  <img src="{{asset('/'.$view->thumbnail_img)}}" class="card-img-top" alt="...">
									  <div class="card-body">
									    <h5 class="card-title text-center">{{$view->product_name}}</h5>
									    <p class="card-text">Price:{!! $view->product_price !!}</p>
									    <a href="#" class="btn btn-primary"><i class="fas fa-cart-plus"></i></a><br>
									    color
									  </div>
									  
									  @if (count(json_decode($view->colors)) > 0)
									    @foreach (json_decode($view->colors) as $key => $color)
										    <div class="form-group">
												<input type="radio"  id="{{ $view->id }}-color-{{ $key }}" name="color" value="{{ $color }}" @if($key == 0) checked @endif>
												  <label style="background: {{ $color }}; padding: 8px 10px;" data-toggle="tooltip"></label>
											</div>
										@endforeach
									  @endif
									</div>
									@foreach (json_decode($view->choice_options) as $key => $choice)
									<div class="row">
										<div class="col-md-2">
											<h4>{{ $choice->title }}:</h4>

										</div>
										<div class="col-md-2">
											<ul>
												@foreach ($choice->options as $key => $option)
                                                <li>
                                                    <input type="radio" id="{{ $choice->name }}-{{ $option }}" name="{{ $choice->name }}" value="{{ $option }}" @if($key == 0) checked @endif>
                                                    <label for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                </li>
                                               @endforeach
											</ul>
										</div>
									</div>
									@endforeach
									<div class="row">
										<div class="col-md-2 text-right">
											<label>Quantity:</label>
										</div>
										<div class="col-md-3">
											<input type="number" name="quantity" value="1">
										</div>
										
									</div>
								</div>
								
								
							</div>
							<div class="col-md-6"></div>
							<div class="col-md-6" id="chosen_price_div">
								<h3>Price Total:<strong id="chosen_price"></strong></h3>
							</div>
						
						</div>
						<input type="hidden" name="id" value="{{ $view->id }}">
					</form>
					</div>
				</section>
			</div><!--/middle content wrapper-->  
			</div><!--/ content wrapper -->
   <!-- script code start -->

 <script>
     $(document).ready(function() {
    		
            getVariantPrice();
    	});
</script>
<script>
 $(document).ready(function() {
    $('#option-choice-form input').on('change', function(){
    	//alert('success');
        getVariantPrice();
    });
});
    function getVariantPrice(){
        if($('#option-choice-form input[name=quantity]').val() > 0){
            $.ajax({
               type:"GET",
               url: '{{ route('products.variant_price') }}',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){

               	//console.log(data.price);
                   // $('#option-choice-form #chosen_price_div').removeClass('d-none');
                   $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                   // $('#available-quantity').html(data.quantity);
               }
           });
        }
    }
</script>
@endsection