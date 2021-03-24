@extends('layouts.websiteapp')
@section('title', 'Viewed Products | '.$seo->meta_title)
@section('content')
<style>
    .pagination .disabled{
        display: none;
    }
</style>

<main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="">Account</a></li>
                    <li>Invoices</li>
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
                        <div class="ps-section__right mt-12">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Recent Viewed Products</h3>
                                </div>
                                <div class="ps-section__content">
                                <div class="table-responsive">
                                        <table class="table ps-table">
                                            <thead>
                                                @if($viewedproduct)
                                                <tr>
                                                    <th>Product (Recent Visited 5 Product Show)</th>

                                                </tr>
                                                @else
                                                <tr>
                                                    <th>No Product Found!</th>

                                                </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                            @if($viewedproduct)
                                            @foreach($viewedproduct as $row)

                                                <tr>

                                                    <td>
                                                        <div class="ps-product--cart">
                                                            <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$row['slug']}}/{{$row['id']}}"><img src="{{asset('public/uploads/products/thumbnail/'.$row['photo'])}}" alt=""></a></div>
                                                            <div class="ps-product__content"><a href="{{url('product/')}}/{{$row['slug']}}/{{$row['id']}}">{{$row['name']}}</a>
                                                                <p>Price:<strong> {{$row['price']}}</strong></p>
                                                            </div>
                                                        </div>
                                                    </td>


                                                </tr>
                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="ps-newsletter">
            <div class="ps-container">
                <form class="ps-form--newsletter" action="do_action" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__left">
                                <h3>Newsletter</h3>
                                <p>Subcribe to get information about products and coupons</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__right">
                                <div class="form-group--nest">
                                    <input class="form-control" type="email" placeholder="Email address">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endsection
