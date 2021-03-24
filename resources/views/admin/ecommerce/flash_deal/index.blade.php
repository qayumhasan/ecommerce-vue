@extends('layouts.adminapp')
@section('title', 'All Flash Deall| '.$seo->meta_title)
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Flash Deal</span>
										</div>
									</div>
									<div class="col-md-6 text-right">

												<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{ route('admin.flash.deal.create') }}" style="color: #fff;">Add Flash Deal</a></button>

									</div>
								</div>
							</div>
							<form action="{{route('admin.flash.deal.multiple.force.delete')}}" method="Post">
						     @csrf
							<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Delete All</button> -->
                            <!-- <button type="button"  style="margin: 5px;" class="btn btn-success btn-sm" ><i class="fas fa-recycle"></i> <a href="{{ route('admin.flash.deal.trash.view') }}" style="color: #fff;">Restore</a></button> -->
                            @if ($flashDeals->count() > 1)
                                <button type="button"  style="margin: 5px;" class="btn btn-secondary btn-sm" ><i class="far fa-thumbs-down"></i> <a href="{{ route('admin.flash.deal.all.decative') }}" style="color: #fff;">Inactive All</a></button>
                            @endif

							<div class="panel_body">
								<div class="table-responsive">
		                         <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
		                              <thead>
		                                  <tr>
		                                      <th>
												<label class="chech_container mb-4">
													<input type="checkbox" id="check_all">
													<span class="checkmark"></span>
												</label>
		                                      </th>
		                                      <th>Title</th>
		                                      <th>Started Date</th>
		                                      <th>Ended Date</th>
		                                      <th>Status</th>
		                                      <th>Action</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                              	@foreach($flashDeals as $flashDeal)
		                                  <tr>
	                                  		  <td>
												<label class="chech_container mb-4">
													<input type="checkbox" name="delid[]" class="checkbox" value="{{$flashDeal->id}}">
													<span class="checkmark"></span>
												</label>
		                                      </td>
		                                      <td>{{$flashDeal->title}}</td>
		                                      <td>{{$flashDeal->start_date}}</td>
		                                      <td>{{$flashDeal->end_date}}</td>
								              @if($flashDeal->status == 1)
					                          <td class="center"><span class="badge-success rounded px-1">Active</span></td>
					                          @else
					                          <td class="center"><span class="badge-danger rounded px-1">Deactive</span></td>
						                      @endif
		                                       <td>
		                                       		@if($flashDeal->status==1)
                                                    <a  href="{{ route('admin.flash.deal.change.status', $flashDeal->id) }}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a> |
													@else
													<a  href="{{ route('admin.flash.deal.change.status', $flashDeal->id) }}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a> |
													@endif
                                                    <a href="{{ route('admin.flash.deal.edit', $flashDeal->id) }}" class="btn btn-sm btn-blue text-white" ><i class="fas fa-pencil-alt"></i></a> |
		                                            <a id="delete" href="{{ route('admin.flash.deal.single.force.delete', $flashDeal->id) }}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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

<!-- modal end -->

<!-- edit modal -->

<!-- edit modal start-->

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
