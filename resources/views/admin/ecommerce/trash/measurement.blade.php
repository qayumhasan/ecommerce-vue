@extends('layouts.adminapp')
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Deleted Measurement</span>
										</div>
									</div>
									<!-- <div class="col-md-6 text-right">
										<div class="panel_title">
											<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Measurement</span></a>
										</div>
									</div> -->
								</div>
								
							</div>
							<form action="{{route('admin.trash.measurement.delete')}}" method="post">
						     @csrf

						     <button type="submit" style="margin: 5px;" name="submit" class="btn btn-danger" value="delete" ><i class="fa fa-trash"></i> Delete All</button>
				             <button type="submit" style="margin: 5px;" name="submit" class="btn btn-success" value="restore" ><i class="fas fa-trash-restore-alt"></i> Restore All</button>

				             <button type="button"  style="margin: 5px;" class="btn btn-info" ><i class="fas fa-undo"></i> <a href="{{route('admin.measurement.all')}}" style="color: #fff;">Back</a></button>
							
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
		                                      <th>Measurement Name</th>
		                  
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                       			@foreach($allmesurement as $data)
		                                  <tr>
	                                  		  <td>
												<label class="chech_container mb-4">
													<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
													<span class="checkmark"></span>
												</label>
		                                      </td>
		                                      <td>{{$data->m_name}}</td>
		                                      
		                                       <td>
		                    					
		                                           	| <a  href="{{url('admin/measurement/recover/'.$data->id)}}" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Edit" ><i class="fas fa-recycle"></i></a> |
		                                           
		                                            <a id="delete" href="{{url('admin/measurement/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
          <h4 class="modal-title">Add Measurement</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.measurement.insert')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="m_name" required>
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
<!-- modal end -->

<!-- edit modal -->

<!-- edit modal start-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Measurement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form class="form-horizontal" action="{{route('admin.measurement.update')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="m_name" id="m_name" required>
			      <input type="hidden" name="id" id="id">
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
             var m_id = $(this).data('id');
     		  // alert(m_id);
             if(m_id) {
                 $.ajax({
                     url: "{{ url('/get/measurement/edit/') }}/"+m_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                            $("#m_name").val(data.m_name);
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