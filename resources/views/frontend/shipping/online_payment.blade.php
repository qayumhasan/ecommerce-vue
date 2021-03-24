@extends('layouts.websiteapp')
@section('title', 'Online Payment | '.$seo->meta_title)
@section('content')
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="shop-default.html">Shop</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
    <div class="ps-checkout ps-section--shopping">
        <div class="container">
            <div class="ps-section__header">
                <h1>Payment</h1>
            </div>
            <div class="ps-section__content">
                <form class="ps-form--checkout" action="{{route('payment.make.payment')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">


                            <!-- payment method area start -->
                            <div class="ps-form__billing-info">
                                <div id="diff_address">
                                    <h3 class="ps-form__heading">Payment Methods</h3>

                                    <div class="form-group">
                                        <div class="ps">

                                            <input class="form-control" type="radio" name="payment_method_id" value="3" id="pay_method">


                                            <input type="hidden" name="payment_secure_id" value="{{ $orderPlace->payment_secure_id }}">
                                            <input type="hidden" name="order_id" value="{{ $orderPlace->order_id }}">
                                            <label for="paypal">Payment with Paypal</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="ps">
                                            <input class="form-control" type="radio" name="payment_method_id" value="2" id="pay_method">
                                            <label for="stripe">Payment with Stripe</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="ps">
                                            <input class="form-control" type="radio" name="payment_method_id" value="4" id="pay_method">
                                            <label for="ssl">Payment with SSLCOMMERZ</label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- payment  method area end from here -->




                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                            <div class="ps-form__total">
                                <h3 class="ps-form__heading">Order Information</h3>
                                <div class="content">
                                    <div class="ps-block--checkout-total">

                                        <div class="ps-block__content">

                                            <h4 class="ps-block__title">Order Number :<span>{{$orderPlace -> order_id}}</span></h4>
                                            <h4 class="ps-block__title">Total Price :<span>{{$orderPlace -> total_price}}</span></h4>
                                            <h4 class="ps-block__title">Total Quentity :<span>{{$orderPlace -> total_quantity}}</span></h4>
                                        </div>
                                        <div class="ps-block__shippings">
                                        <h4 class="ps-block__title">Address:
                                                <small>
                                                    {{$address->address}}
                                                </small>
                                        </h4>
                                            </div>
                                    </div><button type="submit" class="ps-btn ps-btn--fullwidth">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('frontend.include.newsletter._subcribtion')
@endsection
