@extends('layouts.adminapp')
@section('title', 'Wallet | '.$seo->meta_title)
@section('admin_content')
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Customer Wallet</span>
										</div>
									</div>
									<div class="col-md-6 text-right">

									</div>
								</div>

							</div>
							<form action="" method="post">
						     @csrf
							<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button>
             				<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-recycle"></i> <a href="{{route('admin.trash.color')}}" style="color: #fff;">Restore</a></button> -->
							<div class="panel_body">
								<div class="table-responsive">
		                         <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
		                              <thead>
		                                  <tr>
		                                      <th>#</th>
		                                      <th>Customer</th>
		                                      <th>Amount</th>
		                                      <th>Date</th>
		                                      <th>Invoice</th>
		                                      <th>Transection</th>
		                                      <th>Type</th>
		                                      <th>Approval</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                       			@foreach($allwallet as $key => $data)
		                       				
		                                  <tr>
	                                  		  <td>{{++$key}}</td>
	                                  		  @php
	                                  		  	$customername=App\CustomarAccount::where('userid',$data->user_id)->first();
	                                  		  @endphp
		                                      <td>@if($customername) {{$customername->name}} @else Null @endif</td>
		                                      <td>{{$data->amount}}</td>
		                                      <td>{{$data->date}}</td>
		                                      <td>{{$data->invoice_id}}</td>
		                                      <td>@if($data->transection_id==NULL) NULL @else {{$data->transection_id}} @endif </td>
		                                      <td>@if($data->payment_style==2) Offline @else Online @endif</td>
		                                      <td>@if($data->payment_status==1) <span class="btn btn-success">Approve</span>@else <span class="btn btn-danger"> N/A @endif </span> </td>
		                                       <td>
		                                       	@if($data->payment_status==1)
		                                           <a href="#" class="btn btn-sm btn-success text-white"  title="edit"><i class="fas fa-thumbs-up"></i></a>
		                                         @else
		                                         <a href="{{url('admin/custommer/wallet/active/'.$data->id)}}" class="btn btn-sm btn-default text-white"  title="edit"><i class="fas fa-thumbs-down"></i></a>
		                                         @endif

		                                           <a id="delete" href="{{url('admin/custommer/wallet/delete/'.$data->id)}}" class="btn btn-sm btn-danger text-white"  title="delete"><i class="fas fa-trash"></i></a>
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
  <div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Color</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.color.insert')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Color Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="color_name" required>
			    </div>
			  </div>
			  <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Color Code</label>
                <div class="col-sm-8">
                   <input class="form-control" type="color" name="color_code">
                </div>
               </div>
		    <div class="form-group text-right">
		    	<button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
		    	<button type="submit" class="btn btn-blue">Submit</button>
		    </div>
		  </form>
        </div>

        <!-- Modal footer -->
       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->

      </div>
    </div>
  </div>
<!-- modal end -->

<!-- edit modal -->

<!-- edit modal start-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form class="form-horizontal" action="{{route('admin.color.update')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Color Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="color_name" id="color_name" required>
			      <input type="hidden" name="id" id="id">
			    </div>
			  </div>
			  <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Color Code</label>
                <div class="col-sm-8">
                   <input class="form-control" type="color" name="color_code" id="color_code">
                </div>
               </div>
		    <div class="form-group text-right">
		    	<button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
		    	<button type="submit" class="btn btn-blue">Submit</button>
		    </div>
		  </form>
      </div>
    </div>
  </div>
</div>

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
<script type="text/javascript">

      $(document).ready(function() {
         $('.editcat').on('click', function(){
             var cate_id = $(this).data('id');
     		  // alert(cate_id);
             if(cate_id) {
                 $.ajax({
                     url: "{{ url('/get/color/edit/') }}/"+cate_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#color_name").val(data.color_name);
                            $("#id").val(data.id);
                            $("#color_code").val(data.color_code);
                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>
@endsection
