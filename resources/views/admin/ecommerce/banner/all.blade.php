@extends('layouts.adminapp')
@section('title', 'Slider | '.$seo->meta_title)
@section('admin_content')
<!-- content wrpper -->
@php
	$theme=App\ThemeSelector::where('status',1)->first();
@endphp
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
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Slider</span>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="panel_title">
								<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Slider</span></a>
							</div>
						</div>
					</div>
				</div>
				<form action="{{route('admin.banner.multisoftdelete')}}" method="Post">
					@csrf
					<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger"><i class="fa fa-trash"></i> Delete All</button>
					<button type="button" style="margin: 5px;" class="btn btn-success"><i class="fas fa-recycle"></i> <a href="{{route('admin.trash.banner')}}" style="color: #fff;">Restore</a></button> -->
					<div class="panel_body">
						<div class="table-responsive">
							<table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
								<thead>
									@if($theme->id==1)
									<tr>
										<th>
											<label class="chech_container mb-4">
												<input type="checkbox" id="check_all">
												<span class="checkmark"></span>
											</label>
										</th>
										<th>#</th>
										<th>Slider Link</th>
										<th>Slider Image</th>
										<th>Status</th>
										<th>manage</th>
									</tr>
									@elseif($theme->id==2 || $theme->id==3 || $theme->id==4 || $theme->id==5 || $theme->id==6 )
									<tr>
										<th>
											<label class="chech_container mb-4">
												<input type="checkbox" id="check_all">
												<span class="checkmark"></span>
											</label>
										</th>
										<th>#</th>
										<th>Slider Link</th>
										<th>Slider Image</th>
										<th>Status</th>
										<th>manage</th>
									</tr>
									@endif
								</thead>
								<tbody>
								@if($theme->id==1)
									@foreach($allbanner as $key => $data)
									<tr>
										<td>
											<label class="chech_container mb-4">
												<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
												<span class="checkmark"></span>
											</label>
										</td>
										<td>{{++$key}}</td>
										<td>{{Str::limit($data->ban_link,25)}}</td>
										<td>
											<img src="{{asset('public/uploads/banner/'.$data->ban_image)}}" height="45px;">
										</td>
										<td>
											@if($data->ban_status==1)
											<span class="btn btn-success">Active</span>
											@else
											<span class="btn btn-danger">Deactive</span>
											@endif
										</td>
										<td>
											@if($data->ban_status==1)
											<a href="{{url('admin/banner/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
											@else
											<a href="{{url('admin/banner/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
											@endif

											| <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$data->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
											<a id="delete" href="{{url('admin/banner/multihearddelete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
										</td>
									</tr>
									@endforeach
									@elseif($theme->id == 2 || $theme->id == 3 || $theme->id == 4 || $theme->id == 5 || $theme->id == 6)
										@foreach($allbanner as $key => $data)
										<tr>
											<td>
												<label class="chech_container mb-4">
													<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
													<span class="checkmark"></span>
												</label>
											</td>
											<td>{{++$key}}</td>
											<td>{{Str::limit($data->ban_link,25)}}</td>
											<td>
												<img src="{{asset('public/uploads/banner/'.$data->ban_image)}}" height="45px;">
											</td>
											<td>
												@if($data->ban_status==1)
												<span class="btn btn-success">Active</span>
												@else
												<span class="btn btn-danger">Deactive</span>
												@endif
											</td>
											<td>
												@if($data->ban_status==1)
												<a href="{{url('admin/banner/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
												@else
												<a href="{{url('admin/banner/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
												@endif

												| <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$data->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
												<a id="delete" href="{{url('admin/banner/multihearddelete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
											</td>
										</tr>
									@endforeach
									@endif
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
				<h4 class="modal-title">Add Slider</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('admin.banner.insert')}}" method="POST" enctype="multipart/form-data">

					@csrf
					@if($theme->id==1)
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Link</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="ban_link" required>
							<input type="hidden" name="theme_id" value="{{$theme->id}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Image</label>

						<div class="col-sm-8">
							<input type="file" name="pic" required>
							<p>(1655px*937px)</p>
						</div>
					</div>
					@elseif($theme->id==2 || $theme->id==3 || $theme->id==4 || $theme->id==5 || $theme->id==6)
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Link</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="ban_link" required>
							<input type="hidden" name="theme_id" value="{{$theme->id}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Image</label>

						<div class="col-sm-8">
							<input type="file" name="pic" required>
							<p>(1159px*398px)</p>
						</div>
					</div>
					@endif
					<div class="form-group text-right">
						<input type="reset" value="Reset" class="btn btn-warning">
						<button type="submit" class="btn btn-blue">Submit</button>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<!-- <div class="modal-footer">
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
				<h5 class="modal-title" id="exampleModalLabel">Update Slider</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('admin.banner.update')}}" method="POST" enctype="multipart/form-data">
					@csrf
					@if($theme->id==1)
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Link</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="ban_link" id="ban_link">
							<input type="hidden" name="id" id="id">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>

						<div class="col-sm-4">
							<input type="file" name="pic">
							<p>(1230px*425px)</p>
						</div>
						<div class="col-sm-3" id="store-img">

						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-8" id="img">

						</div>
					</div>
					@elseif($theme->id==2 || $theme->id==3 || $theme->id==4 || $theme->id==5 || $theme->id==6)
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Link</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="ban_link" id="ban_link">
							<input type="hidden" name="id" id="id">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>

						<div class="col-sm-4">
							<input type="file" name="pic">
							<p>(1159px*398px)</p>
						</div>
						<div class="col-sm-3" id="store-img">

						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-8" id="img">

						</div>
					</div>
					@endif
					<div class="form-group text-right">
						<!-- <input type="" value="Reset" class="btn btn-warning"> -->
						<button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
						<button type="submit" class="btn btn-blue">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- edit modal end -->
<script type="text/javascript">
	$(document).ready(function() {

		$('#check_all').on('click', function(e) {

			if ($(this).is(':checked', true))

			{
				$(".checkbox").prop('checked', true);

			} else {

				$(".checkbox").prop('checked', false);

			}

		});

	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.editcat').on('click', function() {
			var ban_id = $(this).data('id');
			//alert(ban_id);

			if (ban_id) {
				$.ajax({
					url: "{{ url('/get/admin/banner/edit/') }}/" + ban_id,
					type: "GET",
					dataType: "json",
					success: function(data) {

						$("#ban_link").val(data.ban_link);
						$("#text").val(data.text);
						$("#description").val(data.description);
						$("#id").val(data.id);
						$("#img").html("<img src={{asset('')}}public/uploads/banner/" + data.ban_image + " height='70px' width='200px'/>");
						$("#store-img").append("<input type='hidden' name='old_image' value='" + data.ban_image + "' />");


					}
				});
			} else {
				alert('danger');
			}

		});
	});
</script>
@endsection
