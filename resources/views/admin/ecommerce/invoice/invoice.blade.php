@extends('layouts.adminapp')
@section('title', 'Invoice | '.$seo->meta_title)
@section('admin_content')
@php
$logo=DB::table('logos')->first();
@endphp
<div class="content_wrapper">
				 <div class="middle_content_wrapper">



						 <div class="row">
								 <div class="col-sm-12">

										 <div class="invoice_box">
											 <form action="{{url('admin/delevary/status')}}" method="post">
												 @csrf
												 <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
											 <div class="row">

												 <div class="col-md-2"></div>
													<div class="col-sm-6">
														<select class="form-control" name="dalevary">
															<option value="0" @if($invoice->dalevary==0) selected @endif>Ordered</option>
															<option value="1" @if($invoice->dalevary==1) selected @endif>On Process</option>
															<option value="2" @if($invoice->dalevary==2) selected @endif>On Delevery</option>
															<option value="3" @if($invoice->dalevary==3) selected @endif>Delevery</option>
														</select>
													</div>
													<div class="col-md-2">
														<button type="submit" class="btn btn-success">Submit</button>
													</div>

											</div>
										</form>
											<br>
											<div class="container">
												 <div class="row">
														 <div class="col-sm-6 text-left">
																 <div class="in_logo">
																		 <img src="{{ asset($logo->front_logo) }}" alt="no-logo">
																 </div>
														 </div>
														 <div class="col-sm-6 text-right">
																 <div class="in_head">
																		 <h4>Invoice</h4>
																 </div>
														 </div>
												 </div>
												 <div class="inbot">
														 <div class="row mt-4">
																 <div class="col-sm-6 text-left">
																		 <div class="in_date">
																				 <h4><b>Date:</b> {{$invoice->created_at}}</h4>
																		 </div>
																 </div>
																 <div class="col-sm-6 text-right">
																		 <div class="in_no">
																				 <h4><b>Invoice No:</b>#{{$invoice->invoice_id}}</h4>
																		 </div>
																 </div>

														 </div>
												 </div>
												 <div class="in_pay">
														 <div class="row">
																 <div class="col-sm-6 text-left">
																		 <div class="in_left">
																				 <h5>Invoice to:</h5>
																				 <span>{{$continfor->company_name}}</span><br>
																				 <span>{{$continfor->address}}</span><br>
																				 <span>{{$continfor->phone_one}}</span><br>
																		 </div>
																 </div>
																 <div class="col-sm-6 text-right">
																		 <div class="in_right">
																				 <h5>Shipping Information:</h5>
																				 <span>{{$invoice->shipping_name}}</span><br>
																				 <span>{{$invoice->shipping_address}}</span><br>
																				 <span>{{$invoice->shipping_phone}}</span><br>
																				 @if($invoice->payment_type==1)
																				 <span>Payment Method: CashOnDelevery</span><br>
																				 @elseif($invoice->payment_type==2)
																				  <span>Payment Method: SSLCOMMERZ</span><br>
																				 @endif
																		 </div>
																 </div>
														 </div>
												 </div>
												 <div class="in_tab">
														 <div class="row">
																 <div class="col-sm-12">
																		 <table class="table">
																				 <thead class="thead-light">
																						 <tr>
																								 <th class="t_h">#</th>
																								 <th class="t_h_2">Name</th>
																								 <th class="t_h_3">Sku</th>
																								 <th class="t_h_4">Qty</th>
																								 <th class="t_h_5">Amount</th>
																						 </tr>
																				 </thead>
																				 <tbody>
																					 @php
																					 	$sub=0;
																					 @endphp
																					 @foreach(json_decode($invoice->product) as $key => $data)
																						 <tr>
																								 <td>{{++$key}}</td>
																								 <td>{{$data->name}}</td>
																								 <td>{{$data->sku}}</td>
																								 <td>{{$data->quantity}}</td>
																								 <td>{{$data->price}}</td>
																						 </tr>
																						 @php
																						 	$sub=$sub + $data->quantity*$data->price;
																							@endphp
																						 @endforeach

																				 </tbody>
																		 </table>
																		 <table class="table">

																				 <tbody>
																						 <tr class="in_bottom">

																								 <td>
																										 <h5><span>Subtotal:</span> {{$sub}}</h5>
																								 </td>
																						 </tr>
																						 <tr class="in_bottom">


																								 <td>
																										 <h5><span>Delevery Charge:</span> {{$invoice->delevery_charge}}</h5>
																								 </td>
																						 </tr>
																						 <tr class="in_bottom">

																								 <td>
																										 <h5><span>Total:</span>{{$invoice->total_price}}</h5>
																								 </td>
																						 </tr>
																				 </tbody>
																		 </table>
																 </div>
														 </div>
												 </div>

												 <!-- print -->
											 </div>


										 </div>
								 </div>
						 </div>
						 <div class="nb">
								 <div class="row">
										 <div class="col-sm-12 text-center">
												 <div class="nb_m">
														 <span><b>NOTE:</b> Click Print Button And Get This Invoice.</span>
												 </div>
										 </div>
								 </div>
						 </div>
						 <div class="nb_button">
								 <div class="row">
										 <div class="col-sm-12 text-center">
												 <div class="nb_m">
														 <button class="btn btn-primary print" id="print">Print</button>

														 <!-- <a href="#">Download</a> -->
												 </div>
										 </div>
								 </div>
						 </div>
						 <style>
								 .invoice_box {
										 width: 70%;
										 margin: 0px auto;
										 background-color: #fff;
										 padding: 60px;
								 }

								 .in_logo img {
										 width: 150px !important;
										 height: auto;
								 }

								 .in_head h4 {
										 font-weight: 600;
										 font-size: 24px;
								 }

								 .in_date h4 {
										 font-size: 14px;
										 position: relative;
										 bottom: 6px;
								 }

								 .in_no h4 {
										 font-size: 14px;
										 position: relative;
										 bottom: 6px;
								 }

								 .inbot {
										 border-top: 1px solid #e8e8e8;
										 border-bottom: 1px solid #e8e8e8;
										 margin-top: 24px;
								 }

								 .in_pay {
										 margin-top: 10px;
								 }

								 .in_left h5 {
										 font-weight: 600;
										 text-transform: capitalize;
								 }

								 .in_right h5 {
										 font-weight: 600;
										 text-transform: capitalize;
								 }

								 .in_tab {
										 margin-top: 20px;
										 border: 1px solid #efefef;
										 border-radius: 5px;
								 }

								 th.t_h {
										 text-transform: capitalize;
										 font-size: 16px !important;
										 font-weight: 600;
										 width: 35%;
								 }

								 th.t_h_2 {
										 text-transform: capitalize;
										 font-size: 16px !important;
										 font-weight: 600;
										 width: 25%;
								 }

								 th.t_h_3 {
										 text-transform: capitalize;
										 font-size: 16px !important;
										 font-weight: 600;
										 width: 15%;
								 }

								 th.t_h_4 {
										 text-transform: capitalize;
										 font-size: 16px !important;
										 font-weight: 600;
										 width: 15%;

								 }

								 th.t_h_5 {
										 text-transform: capitalize;
										 font-size: 16px !important;
										 font-weight: 600;
										 width: 10%;
								 }

								 tr.in_bottom {
										 background-color: #efefef;
										 text-align: right;
								 }

								 tr.in_bottom span {
										 font-size: 16px;
										 font-weight: 600;
								 }

								 tr.in_bottom h5 {
										 display: inline-block;
										 position: relative;
										 right: 43px;
										 font-size: 14px;
								 }

								 .nb_m {
										 margin-top: 20px;
								 }


								 .nb_m a {
										 background-color: #dadada;
										 color: #000;
										 padding: 7px 20px;
										 border-radius: 4px;
										 font-weight: 600;
								 }
						 </style>
				 </div>
		 </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
@endsection
