
@extends('layouts.websiteapp')
@section('title', 'Order-List | '.$seo->meta_title)
@section('content')

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
                                   my Wallet
                                </h5>
                             </div>
                             <div class="order-list-tabel-main table-responsive">
                                <table class="datatabel table table-striped table-bordered order-list-tabel" width="100%" cellspacing="0">
                                   <thead>
                                      <tr>
                                         <th>Order #</th>
                                         <th>Date Purchased</th>
                                         <th>Status</th>
                                         <th>Total</th>

                                      </tr>
                                   </thead>
                                   <tbody>
                                     @foreach(App\OrderFinal::where('user_id',Auth::user()->id)->latest()->paginate(5)  as  $key => $data)
                                      <tr>
                                         <td>#{{$data->invoice_id}}</td>
                                         <td>{{$data->created_at}}</td>
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
                                         <td>{{$data->total_price}}tk</td>
                                        
                                      </tr>
                                    @endforeach


                                   </tbody>
                                </table>
                                {{App\OrderFinal::where('user_id',Auth::user()->id)->latest()->paginate(5)->links()}}
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection
