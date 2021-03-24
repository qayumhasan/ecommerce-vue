@extends('layouts.adminapp')
@section('admin_content')
<link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/select2/css/select2.min.css">
<!-- content wrpper -->
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <section class="page_area">
            <div class="panel">
                <div class="panel_header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel_title">
                                <span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Sync Courier</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Courier</span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="panel_body">
                <form action="{{ route('courier.sync.insert') }}" method="POST" id="choice_form">
                        @csrf
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Countries</label>
                            <div class="col-sm-6">
                                <select required name="country_id" id="country_name" class="form-control">
                                    <option value="bangladesh">Bangladesh</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Divisions</label>
                            <div class="col-sm-6">
                                <select required name="division_id" id="divisions_name" class="form-control">
                                    <option value="">------Select Division------</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Districts</label>
                            <div class="col-sm-6">
                                <select required name="districts_id" id="districts_name" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Sub-Districts</label>
                            <div class="col-sm-6">
                                <select required name="sub_district_id" id="sub_districts_name" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Select Couriers</label>
                            <div class="col-sm-6">
                                <div class="select2-purple">
                                    <select required class="select2" name="courier_id[]" id="courier_id" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach($couriers as $courier)
                                        <option value="{{$courier->id}}">{{$courier->courier_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('courier_id') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- selected product section -->
                        <div class="row justify-content-center">
                            <div class="col-md-6 ">
                                <div class="selected-courier-table">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Courier Name</th>
                                                <th>Delivery charge amount</th>
                                                <th>Is cash on delivery</th>
                                            </tr>
                                        </thead>
                                        <tbody class="courier-table-body">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="button-area">
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <button class="btn btn-sm btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!--/middle content wrapper-->
</div>
<!--/ content wrapper -->
<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Courier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            <form class="form-horizontal" action="{{ route('courier.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="courier_name" required>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-blue mr-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- script code start -->
{{-- Get District By Country Script Block --}}
<script>
    $(document).ready(function () {
        $('#divisions_name').on('change', function() {
            var division_id = $(this).val();
            $.ajax({
                url:"{{ url('admin/courier/get/district/by/division/id/') }}"+"/"+division_id,
                type:'get',
                dataType:'json',
                success:function(data){
                    $('#districts_name').empty();
                    $('#districts_name').append('<option value="">------Select District Name------</option>');
                    $.each(data,function(index, district){
                        $('#districts_name').append('<option value="' + district.id + '">'+ district.name +'</option>');
                    });
                }
            });

        })
    });
</script>

{{-- Get Sub-District By Country Script Block --}}

<script>
    $(document).ready(function () {
        $('#districts_name').on('change', function() {
            var district_id = $(this).val();
            $.ajax({
                url:"{{ url('admin/courier/get/sub_district/by/district/id/') }}"+"/"+district_id,
                type:'get',
                dataType:'json',
                success:function(data){
                    console.log(data);

                    $('#sub_districts_name').empty();
                    $('#sub_districts_name').append('<option value="">------Select Sub-District Name------</option>');
                    $.each(data,function(index, sub_district){
                        $('#sub_districts_name').append('<option value="' + sub_district.id + '">'+ sub_district.name +'</option>');
                    });
                }
            });

        })
    });
</script>

{{-- Get Couriers by Courier ID--}}

<script>
      $(document).ready(function () {
        $('.selected-courier-table').hide();
        $(document).on('change','#courier_id', function(){
           var courier_id = $(this).val();
           //console.log(productId);
           if (courier_id == null) {
                $('.selected-courier-table').hide();
           }else{
                $('.selected-courier-table').show();
           }

           $.ajax({
               url:"{{ url('admin/courier/get/couriers/by/courier_id') }}",
               type:'get',
               data:{
                    courier_id: courier_id,
               },
               success:function(data){
                   $('.courier-table-body').empty();
                   $('.courier-table-body').append(data);
               }
           });
        });
    });
</script>

<script src="{{asset('public/adminpanel')}}/assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.select2').select2()
    });
</script>

@endsection
