@extends('layouts.adminapp')
@section('title', 'All Faq | '.$seo->meta_title)
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Faq</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<!-- <a href="{{route('admin.faq')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>Add Faq</span></a> -->
											<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Faq</span></a>

										</div>
									</div>
								</div>

							</div>
							<form action="{{url('admin/trash/multihearddelfaq')}}" method="Post">
						     @csrf
							<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button> -->

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
		                                      <th>Status</th>
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
		                                      <td>@if($data->faq_status==1)<span class="btn-success">Active</span>@else <span class="btn-danger">Deactive</span> @endif</td>
		                                       <td>
		                                       	@if($data->faq_status==1)
		                                           	<a  href="{{url('admin/faq/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
												@else
													<a  href="{{url('admin/faq/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
												@endif
		                                           	| <!-- <a href="{{url('admin/faq/edit/'.$data->id)}}" class="btn btn-info btn-sm text-white" title="edit" data-original-title="edit"><i class="fas fa-pencil-alt"></i></a> -->
		                                           	<a class="editcat btn btn-sm btn-blue text-white" data-id="{{$data->id}}" title="edit"  data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a>|

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
 <!-- The Modal -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content bd-example-modal-xl">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Faq</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{route('admin.faq.insert')}}" method="POST" id="choice_form" enctype="multipart/form-data">
			@csrf
			  <div class="form-group row">
			    <label for="" class="col-sm-3 col-form-label text-right">Faq Ques?</label>
			    <div class="col-sm-8">
			     <input type="text" name="faq_ques" class="form-control" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="" class="col-sm-3 col-form-label text-right">Faq Ans</label>
			    <div class="col-sm-8">
			     <textarea class="form-control" name="faq_ans"></textarea>
			    </div>
			  </div>
			<div class="form-group row">
				<div class="col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Add Faq</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="{{route('admin.faq.update')}}" method="POST" id="choice_form" enctype="multipart/form-data">
				@csrf
				  <div class="form-group row">
				    <label for="" class="col-sm-3 col-form-label text-right">Faq Ques?</label>
				    <div class="col-sm-8">
				     <input type="text" name="faq_ques" id="faq_ques" class="form-control" required>
				     <input type="hidden" name="id" id="id">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="" class="col-sm-3 col-form-label text-right">Faq Ans</label>
				    <div class="col-sm-8">
				     <textarea class="form-control" name="faq_ans" id="faq_ans"></textarea>
				    </div>
				  </div>
				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Update Faq</button>
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
             var faq_id = $(this).data('id');
     			//alert(faq_id);
             if(faq_id) {
                 $.ajax({
                     url: "{{ url('/get/faq/edit/') }}/"+faq_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                             $("#faq_ques").val(data.faq_ques);
                             $("#id").val(data.id);
                             $("#faq_ans").val(data.faq_ans);

                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>

@endsection
