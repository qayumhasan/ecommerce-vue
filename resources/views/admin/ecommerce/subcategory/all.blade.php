@extends('layouts.adminapp')
@section('title', 'All SubCategory | '.$seo->meta_title)
@section('admin_content')
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All SubCategory</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add SubCategory</span></a>
										</div>
									</div>
								</div>

							</div>
							<form action="{{url('admin/subcategory/multiplesoftdelete')}}" method="post">
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
		                                      <th>SubCategory Name</th>
		                                      <th>Category</th>
		                                      <th>SubCategory Icon</th>
		                                      <th>SubCategory Image</th>
		                                      <th>SubCategory Tag</th>
		                                      <th>Status</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
		          						@foreach($allsubcate as $data)
		                                  <tr>
	                                  		  <td>
												<label class="chech_container mb-4">
													<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
													<span class="checkmark"></span>
												</label>
		                                      </td>
		                                      <td>{{$data->subcate_name}}</td>
		                                      <td>{{$data->cate_name}}</td>
		                                      <td>
		                                      	<img src="{{asset('public/uploads/subcategory/'.$data->subcate_icon)}}" height="35px">
		                                      </td>
		                                      <td><img src="{{asset('public/uploads/subcategory/'.$data->subcate_image)}}" height="55px"></td>
		                                      <td>{{$data->subcate_tag}}</td>
		                                      @if($data->subcate_status==1)
								                          <td class="center"><span class="btn btn-success">Active</span></td>
								                          @else
								                          <td class="center"><span class="btn btn-danger">Deactive</span></td>
									                      @endif
		                                       <td>
		                                       			@if($data->subcate_status==1)
		                                           	<a  href="{{url('admin/subcategory/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
													 @else
														<a  href="{{url('admin/subcategory/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
													 @endif
		                                           	| <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$data->id}}" title="edit"  data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
		                                            <a id="delete" href="{{url('admin/subcategory/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
<!-- add modal -->
<!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add SubCategory</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.subcategory.insert')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="subcate_name" required>
			    </div>
			  </div>

			  <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Slug</label>
                <div class="col-sm-8">
                   <input class="form-control" type="text" name="subcate_slug">
                   <p style="font-size: 11px">(If you leave it blank, it will be generated automatically)</p>
                </div>
               </div>
               <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category</label>
			    <div class="col-sm-8">
			    	@php
			    		$category=App\Category::where('is_deleted',0)->get();
			    	@endphp
			      <select class="form-control" name="cate_id">
			      	<option>Select</option>
					@foreach($category as $cate)
			      	<option value="{{$cate->id}}">{{$cate->cate_name}}</option>
			      	@endforeach

			      </select>
			    </div>
			  </div>

			   <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image:</label>
			    <div class="col-sm-8">
			      <input type="file" name="pic">
			  		 <p>(120px*120px)</p>
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Icon:</label>

			    <div class="col-sm-8">
			      <input type="file" name="icon">
			      <p>(20px*20px)</p>
			    </div>
			  </div>


			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Tag:</label>
			    <div class="col-sm-8">
			      <input type="text" name="subcate_tag" class="form-control" data-role="tagsinput">
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
<!-- subcategory -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update SubCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" action="{{route('admin.subcategory.update')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="subcate_name" id="subcate_name" required>
			      <input type="hidden" name="id" id="id">
			    </div>
			  </div>

			  <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Slug</label>
                <div class="col-sm-8">
                   <input class="form-control" type="text" name="subcate_slug" id="subcate_slug">
                   <p style="font-size: 11px">(If you leave it blank, it will be generated automatically)</p>
                </div>
               </div>
               <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category</label>
			    <div class="col-sm-8">
			    	@php
			    		$category=App\Category::where('is_deleted',0)->get();
			    	@endphp
			      <select class="form-control" name="cate_id" id="cate_id">
			      	<option>Select</option>
					@foreach($category as $cate)
			      	<option value="{{$cate->id}}">{{$cate->cate_name}}</option>
			      	@endforeach

			      </select>
			    </div>
			  </div>

			   <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image:</label>
			    <div class="col-sm-4">
			      <input type="file" name="pic" >
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

			    <div class="col-sm-4">
			      <input type="file" name="icon">
			      <p>(20px*20px)</p>
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
			      <input type="text" name="subcate_tag_edit" data-role="tagsinput" class="form-control">
			    </div>
			  </div>
		    <div class="form-group text-right">
		     <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
		    	<button type="submit" class="btn btn-blue">Submit</button>
		    </div>
		  </form>
      </div>
    </div>
  </div>
</div>
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
             var subcate_id = $(this).data('id');
             // alert(subcate_id);
             if(subcate_id) {
                 $.ajax({
                     url: "{{ url('/get/subcategory/edit/') }}/"+subcate_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#subcate_name").val(data.subcate_name);
                            $("#id").val(data.id);
                            $("#subcate_slug").val(data.subcate_slug);
                            $("#subcate_tag_edit").val(data.subcate_tag);
                            $("#cate_id").val(data.cate_id).select;
                            $("#img").html("<img src={{asset('')}}public/uploads/subcategory/"+data.subcate_image+" height='70px'/>");
                            $("#store-img").append("<input type='hidden' name='old_image' value='"+data.subcate_image+"' />");
                            $("#icon").html("<img src={{asset('')}}public/uploads/subcategory/"+data.subcate_icon+" height='70px'/>");
                            $("#store-icon").append("<input type='hidden' name='old_icon' value='"+data.subcate_icon+"' />");

                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>


@endsection
