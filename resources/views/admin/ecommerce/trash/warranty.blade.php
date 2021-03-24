@extends('layouts.adminapp')
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Deleted Warranty Information</span>
										</div>
									</div>

								</div>

							</div>
							<form action="{{route('admin.warranty.multidelete')}}" method="post">
						     @csrf
								 <button type="submit" style="margin: 5px;" name="submit" class="btn btn-danger" value="delete" ><i class="fa fa-trash"></i> Delete All</button>
	 										<button type="submit" style="margin: 5px;" name="submit" class="btn btn-success" value="restore" ><i class="fas fa-trash-restore-alt"></i> Restore All</button>

	 									 <button type="button"  style="margin: 5px;" class="btn btn-info" ><i class="fas fa-undo"></i> <a href="{{route('admin.warranty.all')}}" style="color: #fff;">Back</a></button>
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
		                                      <th>Question</th>
		                                      <th>Ans</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		          						@foreach($allwarranty as $data)
		                                  <tr>
	                                  		  <td>
																						<label class="chech_container mb-4">
																							<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
																							<span class="checkmark"></span>
																						</label>
		                                      </td>
		                                      <td>{{$data->w_ques}}</td>
		                                      <td>{{Str::limit($data->w_ans,100)}}</td>

		                                       <td>
		                                           	<a href="{{url('admin/warranty/restore/'.$data->id)}}" class="btn btn-info btn-sm text-white"><i class="fas fa-recycle"></i></a> |
		                                            <a id="delete" href="{{url('admin/warranty/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
<!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Warranty Question And Ans</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.warranty.insert')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Question?</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="w_ques" required>
			    </div>
			  </div>

			  <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Ans:</label>
                <div class="col-sm-8">
                   <textarea class="form-control" type="text" name="w_ans"></textarea>
                </div>
          </div>
		    <div class="form-group text-right">
		    	<input type="reset" value="Reset" class="btn btn-warning">
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
<!-- subcategory -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update SubCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" action="{{route('admin.warranty.update')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
						<div class="form-group row">
		 			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Question?</label>
		 			    <div class="col-sm-8">
		 			      <input type="text" class="form-control" name="w_ques" id="w_ques">
		 			      <input type="hidden" name="id" id="id">
		 			    </div>
		 			  </div>

		 			  <div class="form-group row">
		                 <label for="example-text-input" class="col-sm-3 col-form-label text-right">Ans:</label>
		                 <div class="col-sm-8">
		                    <textarea class="form-control" type="text" name="w_ans" id="w_ans"></textarea>
		                 </div>
		           </div>
		 		    <div class="form-group text-right">
		 		    	<input type="reset" value="Reset" class="btn btn-warning">
		 		    	<button type="submit" class="btn btn-blue">Submit</button>
		 		    </div>

		  </form>
      </div>
    </div>
  </div>
</div>
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
                     url: "{{ url('get/admin/warranty/edit/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#w_ques").val(data.w_ques);
                            $("#w_ans").val(data.w_ans);
                            $("#id").val(data.id);
                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>


@endsection
