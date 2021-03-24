@extends('layouts.websiteapp')
@section('title', 'Return product| '.$seo->meta_title)
@section('content')
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="user-information.html">Account</a></li>
                <li>Invoice Detail</li>
            </ul>
        </div>
    </div>
    <section class="ps-section--account">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.include.accounts.menu')
                </div>
                <div class="col-lg-9">

                    <div class="ps-section__right mt-8">

                        <div class="ps-section--account-setting">
                            <div class="ps-section__header">
                                <h3>Refund Request -<strong>Applied Refund Request</strong></h3>
                            </div>
                            <div class="ps-section__content">

                                <div class="table-responsive">
                                    <table class="table ps-table" >
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Product</th>
                                                <th>Variation</th>
                                                <th style="width: 15%;">Date</th>
                                                <th>Order id</th>
                                                <th style="width: 15%;">Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            @foreach($pronotapprove as $products)
                                            @foreach($products->products as $row)
                                            @if($row->return_product == 1)
                                            <tr>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail"><a href="{{url('product/invoice')}}/{{$row->product_id}}"><img src="{{asset('public/uploads/products/thumbnail/productdetails')}}/{{$row->thumbnail_img}}" alt=""></a></div>
                                                        <div class="ps-product__content"><a href="{{url('product/invoice')}}/{{$row->product_id}}">{{$row->name}}</a>
</td>
                                                <td>
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
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span>{{date('d-m-Y', strtotime($products ->created_at))}} </span></td>
                                                <td><span>{{$products ->orderid}}</span></td>
                                                <td><span><i>৳</i> {{$row->price}}</span></td>
                                                <td><span style="color:green"> <b>PENDING</b></span></td>
                                            </tr>
                                            @endif
                                            @endforeach

                                            @endforeach

                                            @foreach($returnapprovepro as $products)

                                            @foreach(json_decode($products->products) as $row)
                                            <tr>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail"><a href="{{url('product/invoice')}}/{{$row->product_id}}"><img src="{{asset('public/uploads/products/thumbnail/productdetails')}}/{{$row->thumbnail_img}}" alt=""></a></div>
                                                        <div class="ps-product__content"><a href="{{url('product/invoice')}}/{{$row->product_id}}">{{$row->name}}</a>
</td>
<td>
                                                            @if($row->colors)
                                                                <p>Color:<strong class="product-color" style="background: {{$row->colors}};"></strong></p>
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
                                                        </div>
                                                    </div>
                                                </td>

                                                <td><span>{{date('d-m-Y', strtotime($products ->created_at))}}</span></td>
                                                <td><span>{{$products ->order_id}}</span></td>
                                                <td><span><i>৳</i> {{$row->price}}</span></td>
                                                <td><span style="color:red"> <b>Approved</b></span></td>
                                            </tr>
                                            @endforeach
                                            @endforeach




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="ps-section__footer"><a class="ps-btn ps-btn--sm" href="#">Back to invoices</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.include.newsletter._subcribtion')
</main>
@endsection
