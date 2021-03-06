@extends('layouts.adminapp')
@section('title', 'All Page | '.$seo->meta_title)
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Page</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<!-- <a href="{{route('admin.faq')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>Add Faq</span></a> -->
											<a href="{{route('admin.page.add')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>Add Page</span></a>

										</div>
									</div>
								</div>

							</div>
							<form action="{{route('admin.page.multisoftdelete')}}" method="Post">
						     @csrf
							<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button> -->
             				<!-- <button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-recycle"></i> <a href="{{route('admin.trash.page')}}" style="color: #fff;">Restore</a></button> -->
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
		                                      <th>Page Name</th>
		                                      <th>Page Details</th>
		                                      <th>Status</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
																		<tr>
																				<td>
																					<label class="chech_container mb-4">
																						<input type="checkbox" name="delid[]" class="checkbox" value="">
																						<span class="checkmark"></span>
																					</label>
																				</td>
																				<td>About Us</td>
																				<td>About-us details</td>
																				<td><span class="btn-success">Active</span></td>
																				 <td>

																					 |<a href="{{route('admin.aboutus')}}" class="btn btn-sm btn-blue text-white"title="edit"><i class="fas fa-pencil-alt"></i></a>|
																				 </td>
																		</tr>
																		<!-- <tr>
																				<td>
																					<label class="chech_container mb-4">
																						<input type="checkbox" name="delid[]" class="checkbox" value="">
																						<span class="checkmark"></span>
																					</label>
																				</td>
																				<td>Terms & Condition</td>
																				<td>Terms And Condition Details</td>
																				<td><span class="btn-success">Active</span></td>
																				 <td>
																					 |<a href="{{route('admin.termscondition')}}" class="btn btn-sm btn-blue text-white"title="edit"><i class="fas fa-pencil-alt"></i></a>|
																				 </td>
																		</tr> -->
		                            	@foreach($page as $data)
		                                  <tr>
	                                  		  <td>
																						<label class="chech_container mb-4">
																							<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
																							<span class="checkmark"></span>
																						</label>
		                                      </td>
		                                      <td>{{$data->page_name}}</td>
		                                      <td>{!! Str::limit($data->page_details,75) !!}</td>
		                                      <td>@if($data->page_status==1)<span class="btn-success">Active</span>@else<span class="btn-danger">Deactive</span>@endif
		                                      </td>

		                                       <td>
		                                      		@if($data->page_status==1)
		                                           	<a  href="{{url('admin/page/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
																								@else
																								<a  href="{{url('admin/page/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
																								@endif
		                                           	|
		                                           	<a href="{{url('admin/page/edit/'.$data->id)}}" class="btn btn-sm btn-blue text-white"title="edit"><i class="fas fa-pencil-alt"></i></a>|

		                                            <a id="delete" href="{{url('admin/page/hearddelete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
 <!-- The Modal -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content bd-example-modal-xl">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Page</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{route('admin.page.insert')}}" method="POST" enctype="multipart/form-data">
			@csrf
			  <div class="form-group row">
			    <label for="" class="col-sm-3 col-form-label text-right">Page Name</label>
			    <div class="col-sm-8">
			     <input type="text" name="page_name" class="form-control" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="" class="col-sm-3 col-form-label text-right">Page Details</label>
			    <div class="col-sm-8">
			     <textarea class="form-control" name="page_details"></textarea>
			    </div>
			  </div>
			<div class="form-group row">
				<div class="col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Add Page</button>
				</div>
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
<!-- edit modal start -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="{{route('admin.page.update')}}" method="POST" enctype="multipart/form-data">
				@csrf
				  <div class="form-group row">
				    <label for="" class="col-sm-3 col-form-label text-right">Page Name:</label>
				    <div class="col-sm-8">
				     <input type="text" name="page_name" id="page_name" class="form-control" required>
				     <input type="hidden" name="id" id="id">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="" class="col-sm-3 col-form-label text-right">Page Details</label>
				    <div class="col-sm-8">
				     <textarea class="form-control" name="page_details" id="page_details"></textarea>
				    </div>
				  </div>
				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Update Page</button>
					</div>
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
</script>
<script type="text/javascript">

      $(document).ready(function() {
         $('.editcat').on('click', function(){
             var page_id = $(this).data('id');
     			//alert(page_id);
             if(page_id) {
                 $.ajax({
                     url: "{{ url('/get/page/edit/') }}/"+page_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                             $("#page_name").val(data.page_name);
                             $("#id").val(data.id);
                             $("#page_details").val(data.page_details);

                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>

@endsection
