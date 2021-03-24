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
                                <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Return Order</span>
                            </div>
                        </div>
                    </div>

                </div>
                
                    <div class="panel_body">
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                                <thead>
                                    <tr>
                                        <th>
                                            SL
                                        </th>
                                        <th># Order ID</th>
                                        <th>Customar Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Order Date</th>
                                        <th>manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($allproduct as $row)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>#{{$row->orderrid}}</td>
                                        <td>{{$row->users->name}}</td>
                                        <td>{{$row->quantity}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>
                                        {{date('d-m-Y', strtotime($row->created_at))}}
                                        </td>
                                        <td>

                              


                                            <a  href="{{route('admin.customar.show.product',[$row->orderrid,$row->users->userid])}}" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" title="edit" data-original-title="Deactive"><i class="fas fa-pencil-alt"></i></a>|

                                            <a id="delete" href="{{route('admin.customar.deleted.product',$row->orderrid)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                              @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
              
            </div>
        </section>
    </div>
</div>
<!-- add modal -->
@endsection