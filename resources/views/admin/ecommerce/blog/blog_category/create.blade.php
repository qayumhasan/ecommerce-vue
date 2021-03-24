@extends('layouts.adminapp')
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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All BlogCategory</span>
										</div>
									</div>
									<div class="col-md-6 text-right">
										<div class="panel_title">
											<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add BlogCategory</span></a>
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

		                                      <th>#</th>
		                                      <th>Category</th>
		                                      <th>Status</th>
		                                      <th>manage</th>
		                                  </tr>
		                              </thead>
		                              <tbody>
                                    @foreach($allcate as $key => $cate)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$cate->name}}</td>

                                              @if($cate->status==1)
                                             <td class="center"><span class="btn btn-success">Active</span></td>
                                             @else
                                             <td class="center"><span class="btn btn-danger">Deactive</span></td>
                                           @endif

                                            <td>
                                              @if($cate->status==1)
                                              <a  href="{{url('admin/blogcate/deactive/'.$cate->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
                                               @else
                                                <a  href="{{url('admin/blogcate/active/'.$cate->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
                                               @endif
                                              | <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$cate->id}}" title="edit"  data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                               <a id="delete" href="{{url('admin/blogcategory/delete/'.$cate->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
          <h4 class="modal-title">Add PostCategory</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.blog.category.submit')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
  			 <div class="form-group row">
  			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
  			    <div class="col-sm-8">
  			      <input type="text" class="form-control" name="name" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" action="{{route('admin.blogcategory.update')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="name" id="name" required>
			      <input type="hidden" name="id" id="id">
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

      $(document).ready(function() {
         $('.editcat').on('click', function(){
             var subcate_id = $(this).data('id');
             // alert(subcate_id);
             if(subcate_id) {
                 $.ajax({
                     url: "{{ url('/get/blogcategory/edit/') }}/"+subcate_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#name").val(data.name);
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
