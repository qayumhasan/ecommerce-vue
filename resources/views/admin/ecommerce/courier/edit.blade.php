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
                                <span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Sync Courier Edit</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{ route('courier.index') }}"
                            style="color: #fff;">Back</a></button>
                        </div>
                    </div>

                </div>
                <div class="panel_body">
                <form action="{{ route('courier.sync.update', $sub_district->id) }}" method="POST" id="choice_form">
                        @csrf
                        <input type="hidden" name="upazila_courier_id" id="upazila_courier_id" value="{{ $sub_district->id }}">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Countries</label>
                            <div class="col-sm-6">
                                <select required name="country_id" id="country_name" class="form-control">
                                    <option value="bangladesh">Bangladesh</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Division</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{ $division->name }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Districts</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{ $district->name }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Sub-Districts</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{ $sub_district->name }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label text-right">Select Couriers</label>
                            <div class="col-sm-6">
                                <div class="select2-purple">
                                    <select required class="select2" onchange="getCourier();" name="courier_id[]" id="courier_id" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach($couriers as $courier)
                                        <option
                                            @foreach ($up_couriers as $up_courier)
                                                {{ $up_courier->courier_id == $courier->id ? "SELECTED" : "" }}
                                            @endforeach
                                            value="{{$courier->id}}"
                                            >
                                            {{$courier->courier_name}}
                                        </option>
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
                                <div class="col-md-6 offset-3 text-center">
                                    <button class="btn btn-success" type="submit">Submit</button>
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
<!-- script code start -->


<script src="{{asset('public/adminpanel')}}/assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
    $(function () {

        $('.select2').select2()

    });
</script>

<script>

function getCourier() {


    var courierId = $('#courier_id').val();
    var upazila_courier_id = $('#upazila_courier_id').val();

    if (courierId == null) {
        $('.selected-courier-table').hide();
    }else{
        $('.selected-courier-table').show();
    }
    console.log(courier_id);
    $.ajax({
        url:"{{ url('admin/courier/get/courier/for/update') }}",
        type:'get',
        data:{
            courierId: courierId,
            upazila_courier_id:upazila_courier_id
        },
        success:function(data){

            $('.courier-table-body').empty();
            $('.courier-table-body').append(data);
        }
    });
}
getCourier();
</script>

@endsection
