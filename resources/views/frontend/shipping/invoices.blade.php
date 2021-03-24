@extends('layouts.websiteapp')
@section('title', 'Invoice| '.$seo->meta_title)
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
                                    <h3>Invoices</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="table-responsive">
                                        <table class="table ps-table ps-table--invoices">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#Code</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Delivery Status</th>
                                                    <th>Payment Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $row)
                                                <tr>
                                                    <td><a data-toggle="tooltip" class="red-tooltip" data-placement="left" title="Click here to show Invoice Details" href="{{route('customar.invoice.show.details',$row->order_id)}}">#{{$row->order_id}}</a></td>
                                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d/m/Y')}}</td>

                                                    <td>{{$row->total_price}}</td>
                                                    @if($row->delevary ==0)
                                                        <td>Pending</td>
                                                    @else
                                                        <td>Delivered</td>
                                                    @endif
                                                    @if($row->is_paid ==0)
                                                        <td>Unpaid</td>
                                                    @else
                                                        <td>Paid</td>
                                                    @endif


                                                        <!-- @if($row->payment_method_id !=Null)
                                                            @if($row->payment_status ==0)
                                                                <td><a class="effect effect-5" href="{{route('invoice.pay.now',$row->order_id)}}" title="Pay Now">Pay Now</a></td>
                                                            @endif
                                                        @endif -->

                                                        <td>
                                                    <div class="btn-group text-center">
                                                        <div class="text-center btn d-block troggle-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v d-block"></i>
                                                        </div>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item front-size" href="{{route('customar.invoice.show.details',$row->order_id)}}">Order Details</a>
                                                            @if($row->is_paid == 0)
                                                            <a class="dropdown-item front-size" href="{{route('customar.invoice.cancal',$row->order_id)}}">Cancel</a>
                                                            @endif

                                                        </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        <table>
                                        <tfoot>
                                            <tr>
                                                    <td>{{ $orders->links() }}</td>
                                                </tr>
                                            </tfoot>
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


 <script src="{{asset('public/frontend')}}/plugins/jquery.min.js"></script>
 <script>

            $(document).ready(function() {
                $('#invoicetoltip').tooltip('show');
                setTimeout(function(){ $('#invoicetoltip').tooltip('hide'); }, 6000);
            });
    </script>
    @endsection
