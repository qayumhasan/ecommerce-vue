@extends('layouts.adminapp')
@section('title', 'Color | '.$seo->meta_title)
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Color</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Color</span></a>
										</div>
									</div>
								</div>

							</div>
							<form action="{{url('admin/color/multisoftdelete')}}" method="post">
						     @csrf
							<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button> -->
             				<!-- <button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-recycle"></i> <a href="{{route('admin.trash.color')}}" style="color: #fff;">Restore</a></button> -->
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
		                                      <th>Color Name</th>
		                                      <th>Color Code</th>
		                                      <th>Color</th>
		                                      <th>Status</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                       			@foreach($allcolor as $data)
		                                  <tr>
	                                  		  <td>
												<label class="chech_container mb-4">
													<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
													<span class="checkmark"></span>
												</label>
		                                      </td>
		                                      <td>{{$data->color_name}}</td>
		                                      <td>{{$data->color_code}}</td>
		                                      <td>
		                                      	<div style="background:{{$data->color_code}};height: 20px;width: 30px"></div>
		                                      </td>
		                                      @if($data->color_status==1)
					                          <td class="center"><span class="btn btn-success">Active</span></td>
					                    	  @else
					                          <td class="center"><span class="btn btn-danger">Deactive</span></td>
						              		  @endif
		                                       <td>
															                   @if($data->color_status==1)
															                    <a  href="{{url('admin/color/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
																									@else
																										<a  href="{{url('admin/color/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
																									@endif
		                                           	| <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$data->id}}" title="edit"  data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
		                                            <a id="delete" href="{{url('admin/color/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
