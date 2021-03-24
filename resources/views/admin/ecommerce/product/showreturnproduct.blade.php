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
                                <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Return Product of Order ID # {{$cartdata->orderid}} </span>
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
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    
                                    <th>Price</th>
                                    <th>Refund Reason</th>
                                    <th>Order Date</th>
                                    <th>manage</th>
                                </tr>
                            </thead>
                    

                            <tbody>
                                @foreach($cartdata->products as $row)
                                @if($row->return_product)
                                <tr>
                                    <td>
                                       {{$loop->iteration}} 
                                    </td>
                                    <td>
                                       {{$row->name}}
                                    </td> 
                                    <td>
                                       {{$row->quantity}}
                                    </td>   
                                    <td>
                                       {{$row->price}}
                                    </td>
                                    @foreach($cartdata->details as $data)
                                    @if($row->id == $data->product_id)
                                    <td>
                                        <b data-toggle="tooltip" data-placement="top" title="{{$data->refund_reason}}">
                                                {{Str::limit($data->refund_reason,30,'...')}}    
                                            </b>
                                        
                                    </td>
                                    @endif
                                    @endforeach
                                    
                                    <td>
                                    {{date('d-m-Y', strtotime($cartdata->created_at))}}
                                       
                                    </td>
                                    <td class="text-center">
                                       <a href="{{route('admin.customar.approve.product',[$cartdata->orderid,$row->id,$userid])}}" class="btn btn-success" >Approve</a>
                                       <a href="{{route('admin.customar.reject.product',[$cartdata->orderid,$row->id])}}" class="btn btn-warning" >Reject</a>
                                    </td>   
                                </tr>
                                @endif
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