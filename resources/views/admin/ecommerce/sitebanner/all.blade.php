@extends('layouts.adminapp')
@section('title', 'All SiteBanner | '.$seo->meta_title)
@section('admin_content')
<link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/select2/css/select2.min.css">
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Site-Banner</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<a href="{{route('admin.sitebanner.add')}}" class="btn btn-success" ><i class="fas fa-plus"></i></span> <span>Add SiteBanner</span></a>
										</div>
									</div>
								</div>

							</div>
							<form action="{{route('admin.trash.sitebannerdel')}}" method="Post">
						     @csrf
							<button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button>
             				<!-- <button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-recycle"></i> <a href="{{route('admin.trash.sitebanner')}}" style="color: #fff;">Restore</a></button> -->
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
		                                      <th>#</th>
		                                      <th>Banner Link</th>
		                                      <th>Banner Image</th>
		                                      <th>Status</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		                              	@foreach($siteban as $key => $data)
		                                  <tr>
	                                  		  <td>
																					<label class="chech_container mb-4">
																						<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
																						<span class="checkmark"></span>
																					</label>
		                                      </td>
		                                      <td>
		                                      	@if($data->section==1)
		                                      		Homeside(390*193)
		                                      	@elseif($data->section==2)
		                                       		Category Top(1650*399)
		                                      	@elseif($data->section==3)
		                                      		Homemiddle(530*285)
		                                      	@elseif($data->section==4)
		                                       		Homefooter1(1090*245)
																								@elseif($data->section==5)
		                                       		 Homefooter2(530*245)

		                                        @elseif($data->section==6)
		                                       		 Home banner(570*210)
		                                      	@endif
		                                      </td>
		                                      <td>{{Str::limit($data->link,25)}}</td>

		                                      <td>
		                                      	<img src="{{asset('public/uploads/sitebanner/'.$data->image)}}" height="45px" width="45px">
		                                      </td>

		                                      <td>
																				@if($data->status==1)
																				<span class="btn btn-success">Active</span>
																				@else
																				<span class="btn btn-danger">Deactive</span>
																				@endif
		                                      </td>
		                                       <td>
		                                       		@if($data->status==1)
		                                          <a  href="{{url('admin/sitebanner/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
																								@else
																								<a href="{{url('admin/sitebanner/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
																								@endif
													                                        <!-- | <a class="editcat btn btn-sm btn-blue text-white" data-id="" title="edit"  data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> | -->
																							<a href="{{url('/get/admin/sitebanner/edit/'.$data->id)}}" class="btn btn-info btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>

		                                         <a id="delete" href="{{url('admin/sitebanner/hearddelete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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


<script src="{{asset('public/adminpanel')}}/assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
  $(function(){

   $('.select2').select2()

 });
</script>
<script>
$(document).ready(function() {
// subdistrict
$('select[name="section"]').on('change', function(){
  var id = $(this).val();
  //alert("id");
    if( id==2 ) {
    	//alert("success");
    	$("#catebox").show();

      }
      else{
        $("#catebox").hide();
      }
  });
});




</script>

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
             var id = $(this).data('id');
             //alert(id);

             if(id) {
                 $.ajax({
                     url: "{{ url('/get/admin/sitebanner/edit/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#link").val(data.link);
                            $("#id").val(data.id);
                            $("#store-img").html("<img src={{asset('')}}public/uploads/sitebanner/"+data.image+" height='70px' width='70px'/>");
                            $("#old-img").append("<input type='hidden' name='old_image' value='"+data.image+"' />");
														if(data.section == 1 ){

															$(".section").append("<option value='1' selected>Site Banner(570*300)</option><option value='2'>Category Top(1170*220)</option><option value='3'>Category Home(270*854)</option><option value='4'>HeaderTop(1920*180)</option><option value='5'>Details Banner(270*427)</option>");

														}else if (data.section == 2 ) {
																	$(".section").append("<option value='1'>Site Banner(570*300)</option><option value='2' selected>Category Top(1170*220)</option><option value='3'>Category Home(270*854)</option><option value='4'>HeaderTop(1920*180)</option><option value='5'>Details Banner(270*427)</option>");
														}
														else if (data.section == 3 ) {
																	$(".section").append("<option value='1'>Site Banner(570*300)</option><option value='2'>Category Top(1170*220)</option><option value='3' selected>Category Home(270*854)</option><option value='4'>HeaderTop(1920*180)</option><option value='5'>Details Banner(270*427)</option>");
														}
														else if (data.section == 4 ) {
																	$(".section").append("<option value='1'>Site Banner(570*300)</option><option value='2'>Category Top(1170*220)</option><option value='3'>Category Home(270*854)</option><option value='4' selected>HeaderTop(1920*180)</option><option value='5'>Details Banner(270*427)</option>");
														}
														else if (data.section == 5 ) {
																	$(".section").append("<option value='1'>Site Banner(570*300)</option><option value='2'>Category Top(1170*220)</option><option value='3'>Category Home(270*854)</option><option value='4'>HeaderTop(1920*180)</option><option value='5' selected>Details Banner(270*427)</option>");
														}




                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>


@endsection
