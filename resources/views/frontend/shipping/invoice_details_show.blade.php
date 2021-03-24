@extends('layouts.websiteapp')
@section('title', 'Order-List | '.$seo->meta_title)
@section('content')

<section class="account-page section-padding">
        <div class="container">
           <div class="row">
              <div class="col-lg-12 mx-auto">
                 <div class="row no-gutters">
                @include('frontend.include.accounts.menu')
                <div class="col-lg-8 col-md-8">
                                <div class="dashboard-right">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12">

                                            <div class="pdpt-bg">
                                                <div class="track-order">
                                                    <h4>Track Order</h4>
                                                    <div class="bs-wizard" style="border-bottom:0;">
                                                        <div class="bs-wizard-step complete">
                                                            <div class="text-center bs-wizard-stepnum">Ordered</div>
                                                            <div class="progress">
                                                                <div class="progress-bar"></div>
                                                            </div>
                                                            <a href="#" class="bs-wizard-dot"></a>
                                                        </div>
                                                        <div @if($orderPlace->dalevary==1) class="bs-wizard-step complete" @else  class="bs-wizard-step" @endif>
                                                            <!-- complete -->
                                                            <div class="text-center bs-wizard-stepnum">Packed</div>
                                                            <div class="progress">
                                                                <div class="progress-bar"></div>
                                                            </div>
                                                            <a href="#" class="bs-wizard-dot"></a>
                                                        </div>
                                                        <div @if($orderPlace->dalevary==2) class="bs-wizard-step complete" @else  class="bs-wizard-step" @endif>
                                                            <!-- complete -->
                                                            <div class="text-center bs-wizard-stepnum">On Delevery</div>
                                                            <div class="progress">
                                                                <div class="progress-bar"></div>
                                                            </div>
                                                            <a href="#" class="bs-wizard-dot"></a>
                                                        </div>
                                                        <div @if($orderPlace->dalevary==3) class="bs-wizard-step complete" @else  class="bs-wizard-step" @endif>
                                                            <!-- complete -->
                                                            <div class="text-center bs-wizard-stepnum">Delivered</div>
                                                            <div class="progress">
                                                                <div class="progress-bar"></div>
                                                            </div>
                                                            <a href="#" class="bs-wizard-dot"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pdpt-title">
                                                    <h6>Delivery Timing {{$orderPlace->delevery_date}} {{$orderPlace->delevery_time}}</h6>
                                                </div>
                                                <div class="order-body10">
                                                    <div class="in_tb">

                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Image</th>
                                                                    <th scope="col">SKU</th>
                                                                    <th scope="col">Quantity</th>
                                                                    <th scope="col">Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              @php
                                                                $subtotal=0;
                                                              @endphp
                                                              @foreach(json_decode($orderPlace->product) as $data)
                                                                <tr>
                                                                    <td>
                                                                        <div class="in_image">
                                                                            <img src="{{asset('public/uploads/products/thumbnail/'.$data->image)}}" alt="">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="in_name">
                                                                            <h4>{{$data->sku}}</h4>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="in_qty">
                                                                            <span>{{$data->quantity}}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <div class="in_price">
                                                                            <span>TK {{$data->price}}</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $subtotal=$subtotal+ $data->quantity*$data->price;
                                                                @endphp
                                                                @endforeach



                                                            </tbody>
                                                        </table>
                                                        <div class="foot_tab">

                                                            <table class="table">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>

                                                                            <div class="cart-total-dil">
                                                                                <h4>Sub Total</h4>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div class="in_price">
                                                                                <span>TK {{$subtotal}}</span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>

                                                                            <div class="cart-total-dil">
                                                                                <h4>Delivery Charges</h4>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div class="in_price">
                                                                                <span>TK {{$orderPlace->delevery_charge}}</span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>

                                                                            <div class="cart-total-dil">
                                                                                <h2>Total</h2>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div class="in_price">
                                                                                <span>TK {{$orderPlace->total_price}}</span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>



                                                    <div class="call-bill">
                                                        <!--<div class="delivery-man">-->
                                                        <!--    Delivery will soon - <a href="#"><i class="uil uil-phone"></i> Call-->
                                                        <!--        Us</a>-->
                                                        <!--</div>-->

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                 </div>
              </div>
           </div>
        </div>
     </section>
     <style>
                      .pdpt-title h6 {
                          border-bottom: 1px solid #efefef;
                          padding: 15px 20px;
                          font-size: 14px;
                          font-weight: 400;
                          color: #2b2f4c;
                          margin-bottom: 0;
                      }

                      td.in_image {
                          width: 10%;
                      }

                      .alert-offer span.material-icons {
                          position: relative;
                          top: 8px;
                          color: #ff934b;
                      }

                      .in_tb table {
                          width: 95%;
                      }

                      td.in_name {
                          width: 40%;
                      }

                      .cart-total-dil h4 {
                          font-size: 14px;
                          font-weight: 600;
                      }

                      .foot_tab .table td,
                      .table th {
                          padding: 12px;
                          vertical-align: top;
                          border-top: 0px solid #dee2e6;
                      }

                      .cart-total-dil h2 {
                          font-size: 16px;
                          font-weight: 600;
                      }

                      .in_image img {
                          width: 100px;
                          height: 70px;
                      }

                      .order-body10 {}

                      .order-dtsll {
                          padding: 20px;
                      }

                      .order-dtsll li {
                          display: inline-block;
                          vertical-align: top;
                      }

                      .order-dt-img {
                          background: #f9f9f9;
                          padding: 10px;
                          border: 1px solid #efefef;
                          border-radius: 5px;
                      }

                      .order-dt-img img {
                          width: 50px;
                      }

                      .order-dt47 {
                          margin-left: 15px;
                      }

                      .order-dt47 h4 {
                          font-size: 16px;
                          color: #2b2f4c;
                          margin-bottom: 5px;
                          line-height: 24px;
                          text-align: left;
                          font-weight: 700;
                      }

                      .order-dt47 p {
                          font-size: 14px;
                          font-weight: 400;
                          text-align: left;
                          color: #3e3f5e;
                          margin-bottom: 7px;
                      }

                      .track-order {
                          padding: 20px 0 20px;
                      }

                      .track-order h4 {
                          margin-left: 20px;
                          margin-bottom: 20px;
                          font-weight: 700;
                          color: #2b2f4c;
                          text-align: left;
                      }

                      .bs-wizard {
                          margin-top: 0;
                          display: flex;
                          width: 100%;
                      }

                      /*Form Wizard*/
                      .bs-wizard {
                          border-bottom: solid 1px #e0e0e0;
                          padding: 0;
                      }

                      .bs-wizard>.bs-wizard-step {
                          padding: 0;
                          position: relative;
                          width: 100%;
                      }

                      .bs-wizard>.bs-wizard-step+.bs-wizard-step {}

                      .bs-wizard>.bs-wizard-step .bs-wizard-stepnum {
                          color: #2b2f4c;
                          font-size: 14px;
                          margin-bottom: 5px;
                          font-weight: 400;
                      }

                      .bs-wizard>.bs-wizard-step .bs-wizard-info {
                          color: #999;
                          font-size: 14px;
                      }

                      .bs-wizard>.bs-wizard-step>.bs-wizard-dot {
                          position: absolute;
                          width: 30px;
                          height: 30px;
                          display: block;
                          background: #ffcfc0;
                          top: 45px;
                          left: 50%;
                          margin-top: -15px;
                          margin-left: -15px;
                          border-radius: 50%;
                      }

                      .bs-wizard>.bs-wizard-step>.bs-wizard-dot:after {
                          content: ' ';
                          width: 14px;
                          height: 14px;
                          background: #f55d2c;
                          border-radius: 50px;
                          position: absolute;
                          top: 8px;
                          left: 8px;
                      }

                      .in_name h4 {
                          font-size: 14px;
                      }

                      .bs-wizard>.bs-wizard-step>.progress {
                          position: relative;
                          border-radius: 0px;
                          height: 6px;
                          box-shadow: none;
                          margin: 22px 0;
                          bottom: 5px;
                      }

                      .bs-wizard>.bs-wizard-step>.progress>.progress-bar {
                          width: 0px;
                          box-shadow: none;
                          background: #ffcfc0;
                      }

                      .bs-wizard>.bs-wizard-step.complete>.progress>.progress-bar {
                          width: 100%;
                      }

                      .bs-wizard>.bs-wizard-step.active>.progress>.progress-bar {
                          width: 50%;
                      }

                      .bs-wizard>.bs-wizard-step:first-child.active>.progress>.progress-bar {
                          width: 0%;
                      }

                      .bs-wizard>.bs-wizard-step:last-child.active>.progress>.progress-bar {
                          width: 100%;
                      }

                      .bs-wizard>.bs-wizard-step.disabled>.bs-wizard-dot {
                          background-color: #efefef;
                      }

                      .bs-wizard>.bs-wizard-step.disabled>.bs-wizard-dot:after {
                          opacity: 0;
                      }

                      .bs-wizard>.bs-wizard-step:first-child>.progress {
                          left: 50%;
                          width: 50%;
                      }

                      .bs-wizard>.bs-wizard-step:last-child>.progress {
                          width: 50%;
                      }

                      .bs-wizard>.bs-wizard-step.disabled a.bs-wizard-dot {
                          pointer-events: none;
                      }

                      .progress {
                          background-color: #efefef !important;
                      }

                      /*END Form Wizard*/


                      .alert-offer img {
                          width: 30px;
                          margin-right: 10px;
                      }

                      .alert-offer {
                          padding: 20px;
                          border-top: 1px solid #efefef;
                          font-weight: 400;
                          color: #3e3f5e;
                          text-align: left;
                          line-height: 24px;
                      }

                      .call-bill {
                          padding: 15px 20px;
                          display: flex;
                          border-top: 1px solid #efefef;
                          align-items: center;
                      }

                      .delivery-man {
                          font-size: 14px;
                          color: #2b2f4c;
                          font-weight: 400;
                          text-align: left;
                          line-height: 24px;
                      }

                      .delivery-man a {
                          margin-left: 5px;
                          color: #f55d2c;
                      }

                      .delivery-man a:hover {
                          color: #f55d2c !important;
                          text-decoration: underline !important;
                      }

                      .order-bill-slip {
                          margin-left: auto;
                      }

                      .bill-btn5 {
                          display: block;
                          background: #f55d2c;
                          color: #fff;
                          padding: 10px 15px;
                          font-weight: 500;
                          border-radius: 5px;
                      }

                      /* --- My Rewards --- */

                      .reward-body-dtt {
                          padding: 30px;
                          text-align: center;
                      }

                      .reward-img-icon {
                          width: 80px;
                          height: 80px;
                          display: inline-block;
                          background: #f9f9f9;
                          border-radius: 100%;
                          border: 2px solid #efefef;
                          padding: 18px 0;
                      }

                      .reward-img-icon img {
                          width: 40px;
                          text-align: center;
                      }

                      .rewrd-title {
                          display: block;
                          margin-top: 20px;
                          font-weight: 500;
                          color: #3e3f5e;
                          font-size: 14px;
                          text-align: center;
                      }

                      .cashbk-price {
                          color: #2b2f4c;
                          margin-top: 12px;
                          font-weight: 700;
                          font-size: 18px;
                          margin-bottom: 0;
                          text-align: center;
                      }

                      .reward-body-all {
                          display: flex;
                          text-align: center;
                      }

                      .reward-body-all li {
                          display: inline-block;
                          width: 33.333%;
                          padding: 30px 10px;
                          border-right: 1px solid #efefef;
                      }

                      .reward-body-all li:last-child {
                          border-right: 0;
                      }

                      .tt-icon {
                          width: 45px;
                          height: 45px;
                          display: inline-block;
                          background: #f55d2c;
                          border-radius: 100%;
                          padding: 11px 0;
                      }

                      .tt-icon i {
                          color: #fff;
                          font-size: 24px;
                      }

                      .total-rewards span {
                          display: block;
                          margin-top: 20px;
                          font-weight: 600;
                          color: #3e3f5e;
                          font-size: 14px;
                          text-align: center;
                      }

                      .total-rewards h4 {
                          color: #2b2f4c;
                          margin-top: 12px;
                          font-weight: 600;
                          font-size: 18px;
                          margin-bottom: 0;
                          text-align: center;
                      }

                      .date-reward {
                          display: inline-block;
                          margin-top: 20px;
                          font-weight: 500;
                          background: #f9f9f9;
                          border: 1px dashed #efefef;
                          padding: 2px 15px;
                          border-radius: 5px;
                          font-size: 12px;
                          color: #2b2f4c;
                      }

                      .rewards-coupns {
                          position: relative;
                      }

                      .top-coup-code {
                          position: absolute;
                          top: 0;
                          right: 0;
                          padding: 3px 10px;
                          font-weight: 500;
                          font-size: 12px;
                          color: #fff;
                          background: #f55d2c;
                          border-radius: 0 5px 0 3px;
                          cursor: pointer;
                          border: 1px dashed #fff;
                      }

                      .gambo-body-cash {
                          padding: 30px 20px;
                          text-align: center;
                      }

                      .gambo-body-cash p {
                          font-size: 14px;
                          font-weight: 500;
                          color: #3e3f5e;
                          margin-top: 20px;
                          line-height: 24px;
                      }

                      .rotate-img {
                          transform: rotate(260deg);
                      }

                      .table-responsive {
                          border: 0;
                          border-radius: 0 0 5px 5px;
                          margin-bottom: 0;
                          overflow-x: inherit;
                      }

                      table.table.ucp-table {
                          margin-bottom: 0px;
                      }

                      .ucp-table {
                          height: auto;
                          overflow: hidden;
                          border-radius: 0;
                      }

                      .ucp-table thead {
                          font-weight: 500;
                          padding: 14px !important;
                          border-radius: 0;
                          color: #2b2f4c !important;
                      }


                      .ucp-table thead tr th:first-child {
                          border-bottom-left-radius: 0;
                      }

                      .ucp-table thead tr th {
                          color: #2b2f4c;
                          font-size: 14px;
                          background-color: #ffecec;
                          font-weight: 500;
                      }

                      .ucp-table tfoot {
                          font-weight: 400;
                          padding: 14px !important;
                          border-radius: 4px;
                          font-family: 'Roboto', sans-serif;
                          color: #2b2f4c !important;
                      }

                      .ucp-table tfoot td {
                          color: #fff;
                          font-size: 14px;
                          background-color: #2b2f4c;
                          padding: .75rem !important;
                      }

                      .ucp-table.earning__table td {
                          padding: 1rem !important;
                      }

                      table {
                          margin: 0px auto 0px;
                          font-size: 14px;
                          width: 100%;
                      }

                      .ucp-table tbody {
                          background: #fff;
                      }

                      .ucp-table td,
                      .ucp-table th {
                          border-top: 1px solid #efefef !important;
                      }

                      .ucp-table td {
                          padding: 1.5rem .75rem !important;
                          vertical-align: top;
                          border-top: 1px solid #dee2e6;
                      }

                      .ucp-table th:first-child {
                          border-top: 0 !important;
                      }

                      .ucp-table thead th {
                          vertical-align: bottom;
                          border-bottom: 0 !important;
                      }

                      .course_active {
                          color: #ed2a26;
                      }

                      .ucp-table tbody tr td {
                          font-size: 14px;
                          vertical-align: middle;
                          font-weight: 400;
                          color: #3e3f5e;
                      }

                      .offer_active {
                          color: #f55d2c;
                          font-weight: 700;
                      }

                      .add-cash-body {
                          padding: 20px;
                      }


                      .history-body {
                          height: 360px;
                          overflow-y: auto;
                      }

                      .history-list li {
                          display: block;
                          padding: 20px;
                          border-bottom: 1px solid #efefef;
                      }

                      .history-list li:last-child {
                          border-bottom: 0;
                      }

                      .purchase-history {
                          display: flex;
                          align-items: center;
                      }

                      .purchase-history-right {
                          margin-left: auto;
                      }

                      .purchase-history-left h4 {
                          font-size: 16px;
                          color: #2b2f4c;
                          margin-bottom: 8px;
                          text-align: left;
                          font-weight: 500;
                      }

                      .purchase-history-left p {
                          font-size: 14px;
                          font-weight: 500;
                          color: #3e3f5e;
                          text-align: left;
                          margin-bottom: 8px;
                          line-height: 24px;
                      }

                      .purchase-history-left p ins {
                          text-decoration: none;
                          text-transform: uppercase;
                          color: #f55d2c;
                      }

                      .purchase-history-left span {
                          font-weight: 400;
                          font-size: 13px;
                          color: #3e3f5e;
                          text-align: left;
                          display: block;
                      }

                      .purchase-history-right span {
                          display: block;
                          font-size: 16px;
                          font-weight: 600;
                          color: #f55d2c;
                          text-align: center;
                      }

                      .purchase-history-right {
                          text-align: center;
                      }

                      .purchase-history-right a {
                          font-size: 14px;
                          font-weight: 500;
                          margin-top: 9px;
                          display: block;
                          color: #2b2f4c;
                      }

                      .purchase-history-right a:hover {
                          color: #f55d2c !important;
                      }

                        .in_image img {
                            width: 40px;
                            height: 30px;
                        }

                  </style>
@endsection
