@extends('layouts.adminapp')
@section('admin_content')
<div class="content_wrapper">
      <!--middle content wrapper-->
      <div class="middle_content_wrapper">


      <section class="invoice_area">
        <div class="panel mb-0">
          <div class="panel_header">
            <div class="panel_title">
              <div class="row">
                <div class="col-md-6">
                  <span>Invoice</span>
                </div>
                <div class="col-md-6 text-right">
                 <!--  <a href="#" class="btn btn-info">Back</a> -->
                </div>
            </div>
            </div>
          </div>
        </br>

        <form action="{{url('admin/delevary/status')}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
              <input type="hidden" name="orderplaceid" value="{{$invoice->id}}">
              <select class="form-control" name="delevary">
                @if($invoice->delevary==1)
                <option value="1" @if($invoice->delevary==1) selected @else @endif>Pending</option>
                <option value="4" @if($invoice->delevary==4) selected @else @endif>On Process</option>
                <option value="5" @if($invoice->delevary==5) selected @else @endif>Reject Product</option>
                @elseif($invoice->delevary==4)
                  <option value="4" @if($invoice->delevary==4) selected @else @endif>On Process</option>
                <option value="2" @if($invoice->delevary==2) selected @else @endif>On Delevery</option>
                @elseif($invoice->delevary==2)
                  <option value="2" @if($invoice->delevary==2) selected @else @endif>On Delevery</option>
                <option value="3" @if($invoice->delevary==3) selected @else @endif>Develared</option>
                @elseif($invoice->delevary==3)
                <option value="3" @if($invoice->delevary==3) selected @else @endif>Develared</option>
                @elseif($invoice->delevary==5)
                <option value="5" @if($invoice->delevary==5) selected @else @endif>Reject Product</option>
                <option value="4" @if($invoice->delevary==1) selected @else @endif>Pending</option>
                @endif
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-success">Develary Status</button>
            </div>
          </div>
        </form>

        </br>
          <div class="panel_body print_element">

                          <div class="logo">
                            <img src="{{asset('public/adminpanel')}}/assets/images/logo.png" class="img-fluid" alt="">
                          </div>
                           <div class="row">
                              <div class="col-sm-6">
                                  <br>
                                  <address class="fs-13">
                                      <strong>Full Name: {{$invoice->usermain->first_name}} {{$invoice->usermain->last_name}}</strong><br>
                                      <a href="mailto:#">{{$invoice->usermain->email}}</a><br>
                                      <a href="">{{$invoice->usermain->phone}}</a>
                                  </address>
                                  @php
                                    $userid=$invoice->user_id;
                                    $address=App\UserAddress::where('user_id',$userid)->orderBy('id','DESC')->first();
                                  @endphp
                                  @if($address->is_shipping_address == 1)
                                  <address class="fs-13">
                                      <strong>Address:</strong><br>{{$address->user_address}}<br> <strong>Post-office:</strong> {{$address->user_post_office}}<br><strong>Post-Code:</strong> {{$address->user_postcode}}

                                      <abbr title=""></abbr>
                                  </address>
                                  @else

                                  <address class="fs-13">
                                      <strong>Address:</strong>
                                      <abbr title=""></abbr>
                                  </address>
                                  @endif
                              </div>
                              <div class="col-sm-6 item_right text-right">
                                  <h3 class="mt-0">Invoice #{{$invoice->order_id}}</h3>
                                  <div class="fs-13">Order Date & Time: {{$invoice->created_at}}</div>
                                  <div class="fs-13">Total Amount: {{$invoice->total_price}} ৳</div>
                                  <div class="fs-13">Total Quanty: {{$invoice->total_quantity}}</div>
                                  <!-- <div class="text-danger fs-13">Payment Date: April 21th, 2019</div> -->
                                  <div class="fs-13">Payment Method: Paypal</div>
                                  <!-- <address class="fs-13 mt-3">
                                      <strong>Address</strong><br>
                                      1355 Market Street, Suite 900<br>
                                      San Francisco, CA 94103<br>
                                      <abbr title="Phone">P:</abbr> (123) 456-7890
                                  </address> -->
                              </div>
                          </div>
                          <hr>
                          <div class="table-responsive mb-3">
                              <table class="table table-striped">
                                  <thead>
                                      <tr>
                                          <th class="border-top-0">Item List</th>
                                          <th class="border-top-0">Quantity</th>
                                          <th class="border-top-0">Unit Price</th>

                                          <th class="border-top-0">Total Price</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @php
                                      $cartid=$invoice->order_id;
                                      $allproduct=App\ProductStorage::where('order_id',$cartid)->first();
                                    @endphp

                                      @foreach (json_decode($allproduct->product_details) as $key => $data)
                                      <tr>
                                          <td>
                                            <div>
                                              <strong>{{$data->name}}</strong>
                                            </div>
                                          </td>
                                          <td>{{$data->quantity}}</td>
                                          <td>৳ {{$data->price}}</td>
                                          <td>৳ {{($data->price)*($data->quantity) }}</td>
                                      </tr>
                                    @endforeach


                                  </tbody>
                              </table>
                          </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <!-- <strong>Sub - Total amount:</strong> $9265 </li> -->
                                    <!-- <li>
                                        <strong>Discount:</strong> 12.9%
                                    </li> -->
                                    <li>
                                        <strong>VAT:</strong> ----- </li>
                                    <li>
                                        <strong>Grand Total:</strong> ৳ {{$invoice->total_price}}</li>
                                </ul>
                              </div>
                              <div class="col-sm-6 item_right paypal">
                                <img src="{{asset('public/adminpanel')}}/assets/images/paypal.png" class="img-fluid" alt="">
                              </div>
                            </div>
          </div>
          <div class="panel_footer text-right">
            <button type="button" class="btn btn-info print"><span class="fa fa-print"></span></button>
            <button type="button" class="btn btn-blue"><i class="fas fa-dollar-sign"></i> Make A Payment</button>
          </div>
        </div>
      </section>


      </div><!--/middle content wrapper-->
    </div><!--/ content wrapper -->


@endsection
