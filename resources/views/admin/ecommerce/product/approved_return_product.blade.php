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
                                <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Approved Return Products</span>
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
                                    <th>Customar Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>manage</th>
                                </tr>
                            </thead>
                    

                            <tbody>
                                @foreach($products as $product)
                                @foreach(json_decode($product->products) as $row)
                                <tr>
                                    <td>#{{$product->order_id}}</td>
                                    <td>
                                        {{$row->name}}
                                        @if($row->colors)
                                                                <p>Color:<strong class="product-color" style="background: {{$row->colors}};">{{$row->colors}}</strong></p>
                                                            @endif



                                                            @php
                

                                                                // store attibute name
                                                                $sizename = [];
                                                                $productdetails = App\Product::findOrFail($row->product_id);

                                                                foreach (json_decode($productdetails->choice_options) as $key => $choice) {

                                                                    $size = $choice->title; //this reaturn size,model
                                                                    $choicename = $choice->name; //this reaturn form name  
                                                                    array_push($sizename, $size);
                                                                }
                                                                $countsize = count($sizename);
                                                                
                                                                
                                                            @endphp

                                                                                                        

                                                        @if($countsize == 1)
                                                            @php
                                                                $sizenameone =$sizename[0];
                                                            @endphp
                                                            <p>{{$sizename[0]}}:<strong> {{$row->$sizenameone}}</strong></p>


                                                        @elseif($countsize == 2)
                                                            @php
                                                                $sizenameone =$sizename[0];
                                                                $sizenametwo =$sizename[1];
                                                            @endphp
                                                            <p>{{$sizename[0]}}:<strong> {{$row->$sizenameone}}</strong></p>
                                                            <p>{{$sizename[1]}}:<strong> {{$row->$sizenametwo}}</strong></p>


                                                        @elseif($countsize == 3)
                                                            @php
                                                                $sizenameone =$sizename[0];
                                                                $sizenametwo =$sizename[1];
                                                                $sizenamethree =$sizename[2];
                                                            @endphp
                                                            <p>{{$sizename[0]}}:<strong> {{$row->$sizenameone}}</strong></p>
                                                            <p>{{$sizename[1]}}:<strong> {{$row->$sizenametwo}}</strong></p>
                                                            <p>{{$sizename[2]}}:<strong> {{$row->$sizenamethree}}</strong></p>

                                                        @elseif($countsize == 4)

                                                            @php
                                                                $sizenameone =$sizename[0];
                                                                $sizenametwo =$sizename[1];
                                                                $sizenamethree =$sizename[2];
                                                                $sizenamefour =$sizename[3];
                                                            @endphp
                                                            <p>{{$sizename[0]}}:<strong> {{$row->$sizenameone}}</strong></p>
                                                            <p>{{$sizename[1]}}:<strong> {{$row->$sizenametwo}}</strong></p>
                                                            <p>{{$sizename[2]}}:<strong> {{$row->attributes->$sizenamethree}}</strong></p>
                                                            <p>{{$sizename[3]}}:<strong> {{$row->$sizenamefour}}</strong></p>

                                                        @endif

                                    </td>
                                    @php
                                        $customar=App\CustomarAccount::where('userid',$product->user_id)->first();
                                    @endphp
                                    <td>
                                        {{$customar->name}}
                                    </td>
                                    <td>
                                        {{$product->quantity}}
                                    </td>
                                    <td>
                                        {{ltrim($product->price,0)}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.approved.return.product.delete',$product->id)}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
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