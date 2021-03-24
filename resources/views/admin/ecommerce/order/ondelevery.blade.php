@extends('layouts.adminapp')
@section('title', 'On Delevery Order | '.$seo->meta_title)
@section('admin_content')
<link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/select2/css/select2.min.css">
            <!-- content wrpper -->
			<div class="content_wrapper">
				<!--middle content wrapper-->
				<!-- page content -->
				<div class="middle_content_wrapper">
					<section class="page_content">
						<!-- panel -->
						<div class="panel mb-0">
							<div class="panel_header">
								<div class="row">
									<div class="col-md-6">
										<div class="panel_title">
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Delevery Order</span>
										</div>
									</div>
									<div class="col-md-6 text-right">

									</div>
								</div>
							</div>
							<form action="{{route('admin.pendingsoftdelete')}}" method="POST">
						     @csrf

							<div class="panel_body">
								<div class="table-responsive">
		                         <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
		                              <thead>
		                                  <tr>
		                                      <th>
																						<label class="chech_container mb-4">
																							<input type="checkbox"  id="check_all">
																							<span class="checkmark"></span>
																						</label>
		                                      </th>
		                                      <th>#</th>
		                                      <th>Order Code</th>
		                                      <th>Order Quantity</th>
                                          <th>Amount</th>
		                                      <th>phone</th>
		                                      <th>Delevery Status</th>
		                                      <th>Payment Method</th>
		                                      <th>Payment Status</th>
		                                      <!-- <th>Payment action</th> -->
		                                      <th>Manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
                                      @foreach($allorder as $key => $data)
		                                  <tr>
	                                  		  <td>
																							<label class="chech_container mb-4">
																								<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
																								<span class="checkmark"></span>
																							</label>
		                                      </td>
		                                      <td>{{++$key}}</td>
		                                      <td>{{$data->invoice_id}}</td>
		                                      <td>{{$data->total_quantity}}</td>
                                          <td>{{$data->total_price}}</td>
		                                      <td>{{$data->shipping_phone}}</td>
			                                    <td>
			                                       @if($data->dalevary == 0)
		                                           <span class="btn btn-danger">Ordared</span>
	                                            @elseif($data->dalevary == 1)
		                                           <span class="btn btn-danger">Pending</span>
	                                            @elseif($data->dalevary == 2)
		                                           <span class="btn btn-info">On Delevery</span>
		                                          @elseif($data->dalevary == 4)
		                                           <span class="btn btn-info">On Process</span>
																							 @elseif($data->dalevary == 3)
																							  <span class="btn btn-success">Delevered</span>
	                                            @endif
	                                            </td>
			                                    <td>
		                                            @if($data->payment_type == 1)
		                                            <p>Cash On Delivery</p>
		                                            @elseif($data->payment_type == 2)
		                                            <p>Stype</p>
		                                            @elseif($data->payment_type == 3)
		                                            <p>PayPal</p>
		                                            @elseif($data->payment_type == 4)
		                                            <p>SSL</p>
		                                            @elseif($data->payment_type == 5)
		                                            <p>SurjoPay</p>
		                                            @endif
	                                          	</td>
		                                    <td>
																					@if($data->payment_status==1)
																				    <span class="btn btn-success">paid</span>
																					@else
																				    <span class="btn btn-danger">unpaid</span>
																					@endif
		                                    </td>
                                          <!-- <td>
                                              <label class="switch">
                                               <input type="checkbox" onchange="update_payment_status(this)" value="{{$data->id}}" <?php if($data->payment_status == 1)  echo "checked"; ?> >
                                               <span class="slider round"></span>
                                             </label>
                                           </td> -->

		                                       <td>
		                                          <a  href="{{url('admin/product/order/invoice/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-eye"></i></a>
		                                          <a id="delete" href="{{url('admin/product/order/hearddelete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
		                                       </td>
		                                  </tr>
                                      @endforeach

		                              </tbody>
		                          </table>
		                      </div>
							</div>
						  </form>
						</div>
					</section>
				</div>
			</div>
<!-- modal start-->
  <!-- The Modal -->



<!-- edit modal end -->
<script type="text/javascript">

    $(document).ready(function () {

        $('#check_all').on('click', function(e) {

         if($(this).is(':checked',true))

         {
            $(".checkbox").prop('checked', true);

         } else {

            $(".checkbox").prop('checked',false);

         }

        });

    });

</script>
<script>
	function update_payment_status(el){
		//alert('success');
            if(el.checked){
                var payment_status = 1;

            }
            else{
                var payment_status = 0;
            }
            $.post('{{ route('products.orderpayment') }}',
            	{_token:'{{ csrf_token() }}',
            	id:el.value, payment_status:payment_status},
            	function(data){
                if(data == 1){
                    //alert('success');
                }
                else{
                    //alert('Something went wrong');
                }
            });
        }


</script>

@endsection
