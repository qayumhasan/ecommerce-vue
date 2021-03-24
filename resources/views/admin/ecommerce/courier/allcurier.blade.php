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
                                <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Courier</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">

                        </div>
                    </div>
                </div>
                <form action="" method="Post">
                    @csrf
                    <div class="panel_body">
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                                <thead>
                                    <tr class="text-center">
                                        <th>Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allcurier as $data)

                                    <tr class="text-center">

                                        <td>{{$data->courier_name}}</td>
                                        <td>
                                            <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$data->id}}" title="edit"  data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a>
                                            <a id="delete" class="btn btn-danger btn-sm" href="{{url('admin/courier/curierdelete/'.$data->id)}}"><i class="fas fa-trash"></i></a>
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

<div class="modal fade bd-example-modal-lg" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Courier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            <form class="form-horizontal" action="{{url('admin/courier/update')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="courier_name" id="courier_name" required>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-blue mr-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

      $(document).ready(function() {
         $('.editcat').on('click', function(){
             var id = $(this).data('id');
             //alert(id);
             if(id) {
                 $.ajax({
                     url: "{{ url('/admin/courier/edit/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $("#courier_name").val(data.courier_name);
                            $("#id").val(data.id);


                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>

<!-- modal start-->


<!-- edit modal end -->


@endsection
