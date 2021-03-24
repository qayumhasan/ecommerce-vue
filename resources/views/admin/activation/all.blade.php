@extends('layouts.adminapp')
@section('title', 'Activation | '.$seo->meta_title)
@section('admin_content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <!-- page content -->
    <div class="middle_content_wrapper">
        <section class="page_content">
            <!-- panel -->
            <div class="panel mb-2 row">
                <div class="row">
                    <!--  -->
                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>Facebook Login Activation</span>
                                    </div>
                                </div>

                            </div>

                        </div>
                        @php
                        $update=App\Activation::where('id',1)->first();
                        @endphp

                        <div class="panel_body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover mb-2">

                                    <thead>
                                        <tr>
                                            <td>Facebook</td>
                                            <td>
                                                @if($update->facebook==1)
                                                <span class="btn btn-success">Active</span>
                                                @else
                                                <span class="btn btn-danger">DeActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($update->facebook==1)
                                                <a href="{{url('admin/facebook/update/deactive/'.$update->id)}}"
                                                    class="btn btn-success btn-sm text-white"><i
                                                        class="fa fa-thumbs-up"></i></a>
                                                @else
                                                <a href="{{url('admin/facebook/update/active/'.$update->id)}}"
                                                    class="btn btn-danger btn-sm text-white"><i
                                                        class="far fa-thumbs-down"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>Google Login Activation</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">

                                        <thead>
                                            <tr>
                                                <td>Google</td>
                                                <td>
                                                    @if($update->google==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($update->google==1)
                                                    <a href="{{url('admin/google/update/active/'.$update->id)}}"
                                                        class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                    @else
                                                    <a href="{{url('admin/google/update/deactive/'.$update->id)}}"
                                                        class="btn btn-danger btn-sm text-white"><i
                                                            class="far fa-thumbs-down"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>SMTP Activation</span>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">
                                        <thead class="text-center">
                                            <tr>
                                                <td>SMTP</td>
                                                <td>
                                                    @if($update->smtp==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif</td>
                                                <td>
                                                    @if($update->smtp==1)
                                                    <a href="{{url('admin/smtp/update/active/'.$update->id)}}"
                                                        class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                    @else
                                                    <a href="{{url('admin/smtp/update/deactive/'.$update->id)}}"
                                                        class="btn btn-danger btn-sm text-white"><i
                                                            class="far fa-thumbs-down"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>PayPal Activation</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">
                                        <thead class="text-center">
                                            <tr>
                                                <td>PayPal</td>
                                                <td>
                                                    @if($update->paypal==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif</td>
                                                <td>
                                                    @if($update->paypal==1)
                                                    <a href="{{url('admin/paypal/update/active/'.$update->id)}}"
                                                        class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                    @else
                                                    <a href="{{url('admin/paypal/update/deactive/'.$update->id)}}"
                                                        class="btn btn-danger btn-sm text-white"><i
                                                            class="far fa-thumbs-down"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>Stripe Activation</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">

                                        <thead class="text-center">
                                            <tr>
                                                <td>Stripe</td>
                                                <td>
                                                    @if($update->stripe==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($update->stripe==1)
                                                    <a href="{{url('admin/stripe/update/deactive/'.$update->id)}}"
                                                        class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                    @else
                                                    <a href="{{url('admin/stripe/update/active/'.$update->id)}}"
                                                        class="btn btn-danger btn-sm text-white"><i
                                                            class="far fa-thumbs-down"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>SSL Activation</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">

                                        <thead class="text-center">
                                            <tr>

                                                <td>SSL</td>
                                                <td>
                                                    @if($update->ssl_commercez==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif</td>
                                                <td>
                                                    @if($update->ssl_commercez==1)
                                                    <a href="{{url('admin/ssl/update/deactive/'.$update->id)}}"
                                                        class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                    @else
                                                    <a href="{{url('admin/ssl/update/active/'.$update->id)}}"
                                                        class="btn btn-danger btn-sm text-white"><i
                                                            class="far fa-thumbs-down"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>Cash On Deliviry Activation</span>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">

                                        <thead class="text-center">
                                            <tr>
                                                <td>Cash on Delevery</td>
                                                <td> @if($update->cashondelevery==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif</td>
                                                <td>
                                                    @if($update->cashondelevery==1)
                                                    <a href="{{url('admin/cash/update/deactive/'.$update->id)}}"
                                                        class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                    @else
                                                    <a href="{{url('admin/cash/update/active/'.$update->id)}}"
                                                        class="btn btn-danger btn-sm text-white"><i
                                                            class="far fa-thumbs-down"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>SMS Activation</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">
                                        <thead>
                                            <tr>
                                                <td>SMS</td>
                                                <td>@if($update->sms==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif</td>
                                                <td>
                                                    @if($update->sms==1)
                                                    <a href="{{url('admin/sms/update/deactive/'.$update->id)}}"
                                                        class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                    @else
                                                    <a href="{{url('admin/sms/update/active/'.$update->id)}}"
                                                        class="btn btn-danger btn-sm text-white"><i
                                                            class="far fa-thumbs-down"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>User Verification Option</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">
                                        <thead>
                                            <tr>
                                                @php
                                                    $opt = App\VerificationOption::first();
                                                @endphp
                                                <td>{!! $opt->verify_with == 0 ? "<b>Email</b>" : "<b>Phone</b>"  !!}</td>
                                                <td>@if($update->sms==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif</td>
                                                <td>
                                                    @if($opt->verify_with == 0)
                                                    <a href="{{route('verification.option', $opt->id)}}"
                                                        class="btn btn-success btn-sm">Active <i class="fas fa-mobile-alt"></i></a>
                                                    @else
                                                    <a href="{{route('verification.option', $opt->id)}}"
                                                        class="btn btn-success btn-sm">Active <i class="fas fa-at"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                     <div class="col-md-3">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"></span><span>Surjo Pay</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                          <form action="" method="post">
                            @csrf

                            <div class="panel_body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-2">

                                        <thead class="text-center">
                                            <tr>

                                                <td>Surjo Pay</td>
                                                <td>
                                                    @if($update->surjopay==1)
                                                    <span class="btn btn-success">Active</span>
                                                    @else
                                                    <span class="btn btn-danger">DeActive</span>
                                                    @endif</td>
                                                <td>
                                                    @if($update->surjopay==1)
                                                    <a href="{{url('admin/surjo/update/deactive/'.$update->id)}}"
                                                        class="btn btn-success btn-sm text-white"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                    @else
                                                    <a href="{{url('admin/surjo/update/active/'.$update->id)}}"
                                                        class="btn btn-danger btn-sm text-white"><i
                                                            class="far fa-thumbs-down"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--  -->
                </div>
            </div>
        </section>
    </div>
</div>
<!-- add modal -->


@endsection
