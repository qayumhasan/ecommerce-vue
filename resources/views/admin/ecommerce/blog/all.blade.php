@extends('layouts.adminapp')
@section('title', 'All Blog | '.$seo->meta_title)
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Blog</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<a href="{{route('admin.blog.add')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>Add Blog</span></a>
										</div>
									</div>
								</div>

							</div>
							<form action="{{url('admin/blog/multiplesoftdelete')}}" method="Post">
						     @csrf
							<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button> -->
             				<!-- <button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-recycle"></i> <a href="{{route('admin.trash.blog')}}" style="color: #fff;">Restore</a></button> -->
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
		                                      <th>Blog ID</th>
		                                      <th>Blog Title</th>
		                                      <th>Description</th>
		                                      <th>Image</th>
		                                      <th>Creator</th>
		                                      <th>Status</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                              	@foreach($all as $data)
		                                  <tr>
	                                  		  <td>
												<label class="chech_container mb-4">
													<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
													<span class="checkmark"></span>
												</label>
		                                      </td>
		                                      <td>{{$data->id}}</td>
		                                      <td>{{Str::limit($data->blog_title,30)}}</td>

		                                      <td>{!! Str::limit($data->description,30) !!}</td>
		                                      <td><img src="{{ asset('public/uploads/blog/'.$data->image) }}" height="35px"></td>
		                                      <td>{!! Str::limit($data->creator_name,40) !!}</td>
								              @if($data->status==1)
					                          <td class="center"><span class="btn btn-success">Active</span></td>
					                          @else
					                          <td class="center"><span class="btn btn-danger">Deactive</span></td>
						                      @endif
		                                       <td>
	                                       		@if($data->status==1)
	                                           	<a href="{{url('admin/blog/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
																							@else
																							<a href="{{url('admin/blog/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
																							@endif
	                                           	| <a href="{{url('admin/blog/edit/'.$data->id)}}" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" ><i class="fas fa-pencil-alt"></i></a>|
	                                            <a id="delete" href="{{url('admin/blog/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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

@endsection
