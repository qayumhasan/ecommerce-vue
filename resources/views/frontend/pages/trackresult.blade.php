@extends('layouts.websiteapp')
@section('title', 'Traking Result | '.$seo->meta_title)
@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop-default.html">Shop</a></li>
                    <li> Order Tracking</li>
                </ul>
            </div>
        </div>
        <div class="ps-order-tracking">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Tracking Result</h3>
                    @if($trackingresult)
                   <p><b>Order ID:</b>{{$trackingresult->order_id}}</p>
                   <p><b>Payment Method:</b>@if($trackingresult->payment_method_id==1)Cash on Delevery
                                @elseif($trackingresult->payment_method_id==2) Stripe
                                @elseif($trackingresult->payment_method_id==3) PayPal
                                @elseif($trackingresult->payment_method_id==4) SSLCommercz
                                @else
                                @endif</p>
                 <p><b>Delevery Status:</b>@if($trackingresult->delevary==1)Pending
                                @elseif($trackingresult->delevary==4) On Process
                                @elseif($trackingresult->delevary==2)On Delevery
                                @elseif($trackingresult->delevary==3)Delevered
                                @else
                                @endif</p>

                   @else
                   <p>Your Order Id DoesNot Match ! Thank You</p>
                   @endif
                </div>
                <div class="ps-section__content">




                    <form class="ps-form--order-tracking" action="" method="get">
                        <div class="form-group">
                           <!--  <label>Order ID</label>
                            <input name="order_id" class="form-control" type="text" placeholder="Found in your order confimation Order Id"> -->
                        </div>
                        <div class="form-group">
                            <a href="{{url('/tracking/page')}}" type="submit" class="ps-btn ps-btn--fullwidth">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
