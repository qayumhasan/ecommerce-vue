@extends('layouts.adminapp')
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Deleted Site-Banner</span>
										</div>
									</div>
									<div class="col-md-6 text-right">

									</div>
								</div>

							</div>
							<form action="{{route('admin.trash.sitebannerdel')}}" method="Post">
						     @csrf
								 <button type="submit" style="margin: 5px;" name="submit" class="btn btn-danger" value="delete" ><i class="fa fa-trash"></i> Delete All</button>
 				         <button type="submit" style="margin: 5px;" name="submit" class="btn btn-success" value="restore" ><i class="fas fa-trash-restore-alt"></i> Restore All</button>
 				         <button type="button"  style="margin: 5px;" class="btn btn-info" ><i class="fas fa-undo"></i> <a href="{{route('admin.sitebanner.all')}}" style="color: #fff;">Back</a></button>




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
		                                      	Site Banner(435*175)
		                                      	@elseif($data->section==2)
		                                        Category Top(1170*220)
		                                      	@elseif($data->section==3)
		                                      	Category Home(270*854)
		                                      	@elseif($data->section==4)
		                                        Category HeaderTop(1920*180)
																						@elseif($data->section==5)
		                                        Details Banner(270*427)
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


                                                <a  href="{{url('admin/sitebanner/restore/'.$data->id)}}" class="btn btn-info btn-sm text-white"  data-original-title="Delete"><i class="fas fa-recycle"></i></a>
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
<!-- modal start-->
  <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Site-Banner</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.sitebanner.insert')}}" method="POST" enctype="multipart/form-data" >

          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Select Image Section</label>
			    <div class="col-sm-8">
			      <select class="form-control" name="section">
			      <option value="1">Site Banner(570*300)</option>
						<option value="2">Category Top(1170*220)</option>
						<option value="3">Category Home(270*854)</option>
						<option value="4">Category HeaderTop(1920*180)</option>
						<option value="5">Details Banner(270*427)</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group row catebox" id="catebox" style="display: none">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Catgeory</label>
			    <div class="col-sm-8">
			       @php
					$cate=App\Category::where('is_deleted',0)->orderBy('id','DESC')->get();
			      @endphp
			      <select class="select2" name="category_id[]" id="category_id" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
					@foreach($cate as $category)
			      	<option value="{{$category->id}}">{{$category->cate_name}}</option>
			      	@endforeach
			      </select>

			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>
			    <div class="col-sm-8">
			      <input type="file" name="pic" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Link</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="link">
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
<!-- modal end -->

<!-- edit modal -->

<!-- edit modal start-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form class="form-horizontal" action="{{route('admin.sitebanner.update')}}" method="POST" enctype="multipart/form-data" >
          	@csrf

          	<div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Select Image Section</label>
			    <div class="col-sm-8">
			      <select class="form-control" name="section" id="section">
			      		<option value="1">Site Banner(570*300)</option>
						<option value="2">Category Top(1170*220)</option>
						<option value="3">Category Home(270*854)</option>
						<option value="4">HeaderTop(1920*180)</option>
			      </select>
			    </div>
			  </div>

			  <div class="form-group row catebox" id="catebox">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Catgeory</label>
			    <div class="col-sm-8">
			      @php
					$cate=App\Category::where('is_deleted',0)->orderBy('id','DESC')->get();
			      @endphp
			      <select class="form-control">
					@foreach($cate as $category)
			      	<option value="{{$category->id}}">{{$category->cate_name}}</option>
			      	@endforeach
			      </select>

			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Link</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="link" id="link">
			      <input type="hidden"  name="id" id="id">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>
			    <div class="col-sm-8">

			      <input type="file" name="pic">

			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
			    <div class="col-sm-8" id="store-img">

			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
			    <div class="col-sm-8" id="old-img">

			    </div>
			  </div>





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
    if( id==2 || id==3 || id==4) {
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
             //alert(ban_id);

             if(id) {
                 $.ajax({
                     url: "{{ url('/get/admin/sitebanner/edit/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#link").val(data.link);
                            $("#id").val(data.id);
                            $("#section").val(data.section).select;
                            $("#store-img").html("<img src={{asset('')}}public/uploads/banner/sitebanner/"+data.image+" height='70px' width='70px'/>");

                            $("#old-img").append("<input type='hidden' name='old_image' value='"+data.image+"' />");


                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>


@endsection
