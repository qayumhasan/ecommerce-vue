@extends('layouts.adminapp')
@section('title', 'All Product | '.$seo->meta_title)
@section('admin_content')
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Product</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-plus"></i> <a href="{{route('admin.product.add')}}" style="color: #fff;">Add Product</a></button>
										</div>
									</div>
								</div>

							</div>
							<form action="{{url('admin/product/multisoftdelete')}}" method="post">
						     @csrf
							<button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button>
             				<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-recycle"></i> <a href="{{route('admin.trash.product')}}" style="color: #fff;">Restore</a></button>
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
		                                      <th>Product Name</th>
		                                      <th>Current qty</th>
		                                      <th>Price</th>
		                                      <th>Category</th>

		                                      <th>Image</th>
		                                      <th>Publish</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		          						@foreach($allproduct as $key => $data)
		                                  <tr>
	                                  		  <td>
																						<label class="chech_container mb-4">
																							<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
																							<span class="checkmark"></span>
																						</label>
		                                      </td>
																					<td>{{++$key}}</td>
		                                      <td>{{Str::limit($data->product_name,40)}}</td>
		                                      <td>{{$data->product_qty}}</td>
		                                      <td>{{$data->product_price}}</td>
		                                      <td>{{$data->cate_name}}</td>

		                                      <td>
		                                      	<img src="{{asset('public/uploads/products/thumbnail/'.$data->thumbnail_img)}}" height="45px">
		                                      </td>


								                          <td>
								                          	<label class="switch">
																						  <input type="checkbox" onchange="update_published(this)" value="{{ $data->id }}" <?php if($data->status == 1) echo "checked"; ?> >
																						  <span class="slider round"></span>
																						</label>
								                          </td>

		                                       <td>



		                                           	 <a  href="{{url('admin/product/edittypeone/'.$data->id)}}" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" title="edit" data-original-title="edit"><i class="fas fa-pencil-alt"></i></a>|


		                                            <a id="delete" href="{{url('admin/product/softdelete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
<!-- add modal -->


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
	function update_todays_deal(el){
		//alert('success');
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.todays_deal') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success('Today Deal Update Success');
                }
                else{
                    toastr.danger('Error!Today Deal Update Faild');
                }
            });
        }

        function update_published(el){
        	//alert('success');
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success('Published products updated successfully');
                }
                else{
                    toastr.danger('Something went wrong');
                }
            });
        }
</script>
@endsection
