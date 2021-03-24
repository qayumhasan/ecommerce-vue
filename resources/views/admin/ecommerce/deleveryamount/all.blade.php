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
											<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Update Delevery Amount</span>
										</div>
									</div>
									<div class="col-md-6 text-right">

									</div>
								</div>
							</div>
							<div class="panel_body">
								<form class="" action="{{route('admin.deleveryamount.submit')}}" method="post">
									@csrf
								<div class="form-group row">
				 			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Amount(৳)</label>
				 			    <div class="col-sm-6">
				 			      <input type="number" class="form-control" name="amount" value="{{$amount->amount}}">
				 			      <input type="hidden" name="id" value="{{$amount->id}}">
				 			    </div>
				 			  </div>
								<div class="form-group row">
				 			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
				 			    <div class="col-sm-6 text-center">
				 			     <button type="submit" class="btn btn-primary" name="button">Update</button>
				 			    </div>
				 			  </div>
								</form>
							</div>
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
          <h4 class="modal-title">Add Color</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('admin.color.insert')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Color Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="color_name" required>
			    </div>
			  </div>
			  <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Color Code</label>
                <div class="col-sm-8">
                   <input class="form-control" type="color" name="color_code">
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
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form class="form-horizontal" action="{{route('admin.color.update')}}" method="POST" enctype="multipart/form-data" >
          	@csrf
			 <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Color Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="color_name" id="color_name" required>
			      <input type="hidden" name="id" id="id">
			    </div>
			  </div>
			  <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Color Code</label>
                <div class="col-sm-8">
                   <input class="form-control" type="color" name="color_code" id="color_code">
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
             var cate_id = $(this).data('id');
     		  // alert(cate_id);
             if(cate_id) {
                 $.ajax({
                     url: "{{ url('/get/color/edit/') }}/"+cate_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#color_name").val(data.color_name);
                            $("#id").val(data.id);
                            $("#color_code").val(data.color_code);
                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>
@endsection
