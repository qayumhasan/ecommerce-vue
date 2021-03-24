
@extends('layouts.websiteapp')
@section('content')
@section('title', 'Account | '.$seo->meta_title)
<section class="account-page section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 mx-auto">
            <div class="row no-gutters">
            @include('frontend.include.accounts.menu')
            <div class="col-md-8">
                   <div class="card card-body account-right">
                      <div class="widget">
                         <div class="section-header">
                            <h5 class="heading-design-h5">
                               <!-- My Wallet -->
                            </h5>
                         </div>
                         <div class="row">
                            <div class="col-sm-4 text-center">
                               <div class="main_box">
                                  <span class="material-icons">
                                     donut_small
                                  </span>
                                  <h4>Demo</h4>
                               </div>
                            </div>
                            <div class="col-sm-4 text-center">
                               <div class="main_box">
                                  <span class="material-icons">
                                     offline_bolt
                                  </span>
                                  <h4>Demo</h4>
                               </div>

                            </div>
                            <div class="col-sm-4 text-center">
                               <div class="main_box">
                                  <span class="material-icons">
                                     fiber_smart_record
                                  </span>
                                  <h4>Demo</h4>
                               </div>
                            </div>

                         </div>
                         <div class="row">
                            <div class="col-sm-12">
                               <div class="wallet_table">

                                  <table class="table table-bordered">
                                     <thead class="thead-light">
                                        <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">Invoice Id</th>
                                           <th scope="col">Total Price</th>
                                           <th scope="col">Quantity</th>
                                           <th scope="col">Status</th>

                                        </tr>
                                     </thead>
                                     <tbody>

                                       @foreach(App\OrderFinal::where('user_id',Auth::user()->id)->latest()->limit(5)->get()  as  $key => $data)
                                        <tr>
                                           <th scope="row">{{++$key}}</th>
                                           <td>#{{$data->invoice_id}}</td>
                                           <td>{{$data->total_price}}</td>
                                           <td>{{$data->total_quantity}}</td>

                                           <td>
                                             @if($data->dalevary==0)
                                             <span class="badge badge-danger">ordered</span>
                                            @elseif($data->dalevary==1)
                                            <span class="badge badge-info">In Progress</span>
                                            @elseif($data->dalevary==2)
                                              <span class="badge badge-info">On Delevery</span>
                                            @elseif($data->dalevary==3)
                                                <span class="badge badge-success">Delivered</span>
                                            @endif
                                           </td>
                                        </tr>
                                        @endforeach

                                     </tbody>
                                  </table>
                               </div>
                            </div>
                         </div>

                      </div>
                   </div>
                </div>
                <style>
                  .main_box {
                     background: linear-gradient(135deg, #ff934b 0%, #ff5e62 100%);
                     padding: 20px;
                     border-radius: 10px;
                     box-shadow: 0px 13px 18px -17px rgba(0, 0, 0, 0.75);
                     -webkit-box-shadow: 0px 13px 18px -17px rgba(0, 0, 0, 0.75);
                     -moz-box-shadow: 0px 13px 18px -17px rgba(0, 0, 0, 0.75);
                  }

                  .main_box h4 {
                     color: #fff;
                     font-size: 18px;
                  }

                  .main_box span.material-icons {
                     color: #fff;
                     font-size: 32px;
                  }

                  .wallet_table {
                     margin-top: 20px;
                  }

                  td.linkm .material-icons {
                     background-color: #ff8453;
                     color: #fff;
                     border-radius: 3px;
                     margin-right: 2px;
                     font-size: 18px;
                  }
               </style>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
