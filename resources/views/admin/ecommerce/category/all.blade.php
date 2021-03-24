@extends('layouts.adminapp')
@section('title', 'All Category | '.$seo->meta_title)
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Category</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Category</span></a>
										</div>
									</div>
								</div>

							</div>
							<form action="{{url('admin/category/multiplesoftdelete')}}" method="Post">
						     @csrf

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
		                                      <th>Category Name</th>

		                                      <th>Category Image</th>
																					 <th>Category Banner</th>
		                                      <th>Category Tag</th>
		                                      <th>Status</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                              	@foreach($allcategory as $data)
		                                  <tr>
	                                  		  <td>
																						<label class="chech_container mb-4">
																							<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
																							<span class="checkmark"></span>
																						</label>
		                                      </td>
		                                      <td>{{$data->cate_name}}</td>
																					<td>
																						<img src="{{asset('public/uploads/category/'.$data->cate_image)}}" height="45px;">
																					</td>
		                                      <td>
		                                      		<img src="{{asset('public/uploads/category/banner/'.$data->cate_banner)}}" height="45px;">
		                                      </td>
		                                      <td>{{$data->cate_tag}}</td>
														              @if($data->cate_status==1)
											                          <td class="center"><span class="btn btn-success">Active</span></td>
											                          @else
											                          <td class="center"><span class="btn btn-danger">Deactive</span></td>
												                      @endif
		                                       <td>
		                                       		@if($data->cate_status==1)
		                                           	<a href="{{url('admin/category/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
																							@else
																							<a href="{{url('admin/category/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
																							@endif
		                                           	| <a href="{{url('admin/category/edit/'.$data->id)}}" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" ><i class="fas fa-pencil-alt"></i></a>|
		                                            <a id="delete" href="{{url('admin/category/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
<div class="modal fade bd-example-modal-lg" id="myModal1">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add Category
				</h4>
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
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-3 col-form-label text-right">Slug</label>
								<div class="col-sm-8">
									 <input class="form-control" type="text" name="cate_slug">
									 <p style="font-size: 11px">(If you leave it blank, it will be generated automatically)</p>
								</div>
						 </div>

						 <div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Cate Image:</label>
							<div class="col-sm-8">
								<input type="file" name="pic">
								 <p>(140px*148px)</p>
							</div>
						</div>

					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Cate Banner</label>

						<div class="col-sm-8">
							<input type="file" name="ban">
							<p>(555px*179px)</p>
						</div>
					</div>


			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Tag:</label>
				<div class="col-sm-8">
					<input type="text" name="tag" class="form-control" data-role="tagsinput">
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
