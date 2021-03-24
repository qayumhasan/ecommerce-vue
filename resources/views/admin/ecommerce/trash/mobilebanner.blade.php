@extends('layouts.adminapp')
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Deleted Mobile-Banner</span>
										</div>
									</div>
								</div>

							</div>
							<form action="{{route('admin.trash.mobilebannerdel')}}" method="Post">
						     @csrf
							 <button type="submit" style="margin: 5px;" name="submit" class="btn btn-danger" value="delete" ><i class="fa fa-trash"></i> Delete All</button>
							 <button type="submit" style="margin: 5px;" name="submit" class="btn btn-success" value="restore" ><i class="fas fa-trash-restore-alt"></i> Restore All</button>
							 <button type="button"  style="margin: 5px;" class="btn btn-info" ><i class="fas fa-undo"></i> <a href="{{route('admin.mbanner.all')}}" style="color: #fff;">Back</a></button>
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
		                                      <th>Link</th>
		                                      <th>Section</th>
		                                      <th>Banner Image</th>

		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
																		@foreach($allbanner as $key => $data)
																		<tr>
																			<td>
																				<label class="chech_container mb-4">
																					<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
																					<span class="checkmark"></span>
																				</label
																			</td>
																			<td>{{++$key}}</td>
																			<td>{{$data->link}}</td>
																			<td>
																				@if($data->section==1)
																				Banner(460*90)
																				@elseif($data->section==2)
																				Bottom Image(225*90)
																				@endif
																			</td>
																			<td>
																				<img src="{{asset('public/uploads/sitebanner/mobile/'.$data->img)}}" height="35px" alt="image">
																			</td>

																			<td>

																				|<a class="btn btn-sm btn-blue text-white" href="{{url('admin/mobile/banner/restore/'.$data->id)}}"><i class="fas fa-recycle"></i></a> |
																				<a id="delete" href="{{url('admin/mobile/banner/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>

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
          <h4 class="modal-title">Add Site-Banner</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.mobilebanner.insert')}}" method="POST" enctype="multipart/form-data" >

          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Select Image Section</label>
			    <div class="col-sm-8">
			      <select class="form-control" name="section">
				      <option value="1">Banner(460*90)</option>
							<option value="2">Bottom Image(225*90)</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>
			    <div class="col-sm-8">
			      <input type="file" name="pic" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Link</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="link">
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
<div class="modal fade bd-example-modal-lg" id="editModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Update Mobile-Banner</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form class="form-horizontal" action="{{url('admin/mobile/banner/update')}}" method="POST" enctype="multipart/form-data" >

					@csrf
		 <div class="form-group row">
				<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Select Image Section</label>
				<div class="col-sm-8">
					<select class="form-control section" name="section">

					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>
				<div class="col-sm-8">
					<input type="file" name="pic">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
				<div class="col-sm-8" id="store-img">

				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Link</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="link" id="link">
					<input type="hidden" name="id" id="id">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
				<div class="col-sm-8" id="old-img">

				</div>
			</div>

			<div class="form-group text-right">
				<button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
				<button type="submit" class="btn btn-blue">Update</button>
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
<!-- edit modal start-->


<script src="{{asset('public/adminpanel')}}/assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
  $(function(){

   $('.select2').select2()

 });
</script>


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
             var id = $(this).data('id');
             //alert(id);

             if(id) {
                 $.ajax({
                     url: "{{ url('/get/admin/mobile/banner/edit/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#link").val(data.link);
                            $("#id").val(data.id);
                            $("#store-img").html("<img src={{asset('')}}public/uploads/sitebanner/mobile/"+data.img+" height='70px' width='70px'/>");
                            $("#old-img").append("<input type='hidden' name='old_image' value='"+data.img+"' />");
														if(data.section == 1 ){
															$(".section").append("<option value='1'selected>Banner(460*90)</option><option value='2'>Bottom Image(225*90)</option>");

														}else if (data.section == 2 ) {
																	$(".section").append("<option value='1'>Banner(460*90)</option><option value='2' selected>Bottom Image(225*90)</option>");
														}

                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>


@endsection
