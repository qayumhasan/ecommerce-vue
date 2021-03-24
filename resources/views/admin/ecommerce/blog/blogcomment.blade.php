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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Blog Comment</span>
										</div>
									</div>
									
								</div>

							</div>
							<form action="{{url('admin/blogcomment/multidel')}}" method="Post">
						     @csrf
							<button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button>
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
		                                      <th>Name</th>
		                                      <th>Email</th>
		                                      <th>Comment</th>
		                                      <th>Reply</th>
		                                      <th>BlogID</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                              	@foreach($allcomment as $data)
		                                  <tr>
	                                  		  <td>
												<label class="chech_container mb-4">
													<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
													<span class="checkmark"></span>
												</label>
		                                      </td>
		                                      <td>{{$data->name}}</td>
		                                      <td>{!! $data->email !!}</td>
		                                      <td>{!! $data->comment !!}</td>
		                                      <td>{!! $data->reply !!}</td>
		                                      <td>{!! $data->blog_id !!}</td>
		                                       <td>
		                                       	@if($data->is_active==1)
		                                       	 <a href="{{ url('admin/comment/active/'.$data->id) }}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="" data-original-title="Active"><i class="far fa-thumbs-up"></i></a>
		                                       	 @else
		                                       	  <a href="{{ url('admin/comment/deactive/'.$data->id) }}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="" data-original-title="Active"><i class="far fa-thumbs-down"></i></a>
		                                       	 @endif

	                                            <a id="delete" href="{{url('admin/blogcomment/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>

	                                            <a class="editcat btn btn-sm btn-blue text-white" data-id="{{ $data->id }}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-comment-dots"></i></a> 
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
<div class="modal fade bd-example-modal-lg" id="editModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Reply Comment</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form class="form-horizontal" action="{{ route('admin.reply.comment') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Reply Comment</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="reply"></textarea>
							<input type="hidden" name="id" id="id">
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-blue">Reply</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.editcat').on('click', function() {
			var id = $(this).data('id');
			//alert(id);

			if (id) {
				$.ajax({
					url: "{{ url('/get/admin/blogcomment/reply/') }}/" + id,
					type: "GET",
					dataType: "json",
					success: function(data) {
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
