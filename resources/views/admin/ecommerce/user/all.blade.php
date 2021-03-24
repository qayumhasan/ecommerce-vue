@extends('layouts.adminapp')
@section('title', 'All User | '.$seo->meta_title)
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All User</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<a href="{{route('admin.user.add')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>Add User</span></a>
										</div>
									</div>
								</div>

							</div>
							<form action="{{url('admin/category/multiplesoftdelete')}}" method="Post">
						     @csrf
							<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button> -->
             				<!-- <button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-recycle"></i> <a href="{{route('admin.trash.category')}}" style="color: #fff;">Restore</a></button> -->
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
		                                      <th>email</th>
		                                      <th>Phone</th>
		                                      <th>Address</th>
		                                      <th>Role Type</th>
		                                      <th>Image</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                              	@foreach($alluser as $data)
		                                  <tr>
	                                  		  <td>
																					<label class="chech_container mb-4">
																						<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
																						<span class="checkmark"></span>
																					</label>
		                                      </td>
		                                      <td>{{$data->name}}</td>

		                                      <td>{{$data->email}}</td>
		                                      <td>{{$data->phone}}</td>
		                                      <td>{{$data->address}}</td>
		                                      <td>{{$data->type}}</td>
		                                      <td>
																							<img src="{{asset('public/uploads/user/'.$data->avatar)}}" height="35px">
																					</td>

		                                       <td>
		                                           |<a href="{{url('admin/user/edit/'.$data->id)}}" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" ><i class="fas fa-pencil-alt"></i></a>|
		                                            <a id="delete" href="{{url('admin/user/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
