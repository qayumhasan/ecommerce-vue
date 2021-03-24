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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Deleted Faq</span>
										</div>
									</div>
									<div class="col-md-6 text-right">

									</div>
								</div>

							</div>
							<form action="{{url('admin/trash/multihearddelfaq')}}" method="Post">
						     @csrf
						      <button type="submit" style="margin: 5px;" name="submit" class="btn btn-danger" value="delete" ><i class="fa fa-trash"></i> Delete All</button>

				             <button type="submit" style="margin: 5px;" name="submit" class="btn btn-success" value="restore" ><i class="fas fa-trash-restore-alt"></i> Restore All</button>

				             <button type="button"  style="margin: 5px;" class="btn btn-info" ><i class="fas fa-undo"></i> <a href="{{route('admin.faq.all')}}" style="color: #fff;">Back</a></button>


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
		                                      <th>Faq Ques</th>
		                                      <th>Faq Ans</th>

		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                              @foreach($allfaq as $data)
		                                  <tr>
	                                  		  <td>
												<label class="chech_container mb-4">
													<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
													<span class="checkmark"></span>
												</label>
		                                      </td>
		                                      <td>{{$data->faq_ques}}</td>
		                                      <td>{{ Str::limit($data->faq_ans,80)}}</td>

		                                       <td>
		                                           	<a href="{{url('admin/faq/recover/'.$data->id)}}" class="btn btn-info btn-sm text-white" title="edit" data-original-title="edit"><i class="fas fa-recycle"></i></a> |
		                                            <a id="delete" href="{{url('admin/faq/faqhearddelete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
          <h4 class="modal-title">Add Cupon</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.category.insert')}}" method="POST" enctype="multipart/form-data" >

          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="cate_name" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form class="form-horizontal" action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data" >

          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="cate_name" id="cate_name" required>
			      <input type="hidden" name="id" id="id">
			    </div>
			  </div>
			  <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Slug</label>
                <div class="col-sm-8">
                   <input class="form-control" type="text" name="cate_slug" id="cate_slug">
                   <p style="font-size: 11px">(If you leave it blank, it will be generated automatically)</p>
                </div>
               </div>

			   <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image:</label>
			    <div class="col-sm-4">
			      <input type="file" name="pic">
			      <p>(120px*120px)</p>
			    </div>
			    <div class="col-sm-4" id="store-img">

			    </div>
			  </div>
			  <div class="form-group row">

			    <div class="col-sm-3">

			    </div>
			    <div class="col-sm-4" id="img">

			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Icon:</label>

			    <div class="col-sm-6">
			      <input type="file" name="icon">
			      <p style="margin-bottom: -10px">(32px*32px)</p>

			    </div>
			    <div class="col-sm-3" id="store-icon">

			    </div>
			  </div>

			  <div class="form-group row">
			    <div class="col-sm-3">

			    </div>
			    <div class="col-sm-4" id="icon">

			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Tag:</label>
			    <div class="col-sm-8">
			      <input type="text" name="cate_tag_edit" id="cate_tag_edit" class="form-control cate_tag_edit">
			    </div>
			  </div>
		    <div class="form-group text-right">
		    	<!-- <input type="" value="Reset" class="btn btn-warning"> -->
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

@endsection
