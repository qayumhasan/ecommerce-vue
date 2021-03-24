@extends('layouts.adminapp')
@section('title', 'Dashboard | '.$seo->meta_title)
@section('admin_content')

            <!-- content wrpper -->
            <div class="content_wrapper">
                <!--middle content wrapper-->
                <div class="middle_content_wrapper">
                    <!-- counter_area -->
                    <!-- <section class="counter_area">
                        <div class="row">
                          <div class="col-lg-3 col-sm-6">
                              <div class="counter">
                                @php
                                  $admin=App\Admin::count();
                                @endphp
                                  <div class="counter_item">
                                       <span><i class="fas fa-user-tie"></i></span>
                                       @if($admin)
                                       <h2 class="timer count-number" data-to="{{$admin}}" data-speed="1500"></h2>
                                      @else
                                        <h2 class="timer count-number" data-to="700" data-speed="1500"></h2>
                                      @endif
                                  </div>
                                 <p class="count-text ">Total Staffs</p>
                              </div>
                          </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter">
                                  @php
                                    $total_product=App\Product::count();
                                  @endphp
                                    <div class="counter_item">
                                         <span><i class="fab fa-product-hunt"></i></span>

                                         <h2 class="timer count-number" data-to="{{$total_product}}" data-speed="1500"></h2>

                                    </div>
                                   <p class="count-text ">Total Product</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="counter">
                                    <div class="counter_item">
                                      @php
                                        $total_category=App\Category::count();
                                      @endphp
                                        <span><i class="fas fa-copyright"></i></span>

                                         <h2 class="timer count-number" data-to="{{$total_category}}" data-speed="1500"></h2>

                                    </div>
                                    <p class="count-text ">Total Catgeory</p>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter">
                                  @php
                                    $subcate=App\SubCategory::count();
                                  @endphp
                                    <div class="counter_item">
                                        <span><i class="fab fa-bandcamp"></i></span>

                                         <h2 class="timer count-number" data-to="{{$subcate}}" data-speed="1500"></h2>

                                    </div>
                                    <p class="count-text ">Total SubCategory</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter">
                                  @php
                                    $cutomer=App\User::count();
                                  @endphp
                                    <div class="counter_item">
                                        <span><i class="fa fa-user"></i></span>

                                         <h2 class="timer count-number" data-to="{{$cutomer}}" data-speed="1500"></h2>

                                    </div>
                                    <p class="count-text ">Total Customer</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="counter">
                                  @php
                                    $amount=App\OrderFinal::sum('total_quantity');
                                  @endphp
                                    <div class="counter_item">
                                        <span><i class="fas fa-luggage-cart"></i></span>

                                         <h2 class="timer count-number" data-to="{{$amount}}" data-speed="1500"></h2>

                                    </div>
                                    <p class="count-text ">Total Sell Product</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter">
                                  @php
                                    $total_pending_product=App\OrderFinal::where('dalevary',0)->count();
                                  @endphp
                                    <div class="counter_item">
                                        <span><i class="fas fa-cart-plus"></i></span>
                                         <h2 class="timer count-number" data-to="{{$total_pending_product}}" data-speed="1500"></h2>

                                    </div>
                                    <p class="count-text ">Pending Order</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="counter">
                                    <div class="counter_item">
                                      @php
                                        $total_complate_order=App\OrderFinal::where('dalevary',3)->count();
                                      @endphp
                                        <span><i class="fas fa-mug-hot"></i></span>
                                         <h2 class="timer count-number" data-to="{{$total_complate_order}}" data-speed="1500"></h2>
                                    </div>
                                     <p class="count-text ">Total Compleate Order</p>
                                </div>
                            </div>
                        </div>

                    </section> -->
          <style>
                    .countera1 {
  background-color: #117a8b;
  padding: 30px;
  border-radius: 10px;
  color: #fff;
  -webkit-box-shadow: 0px 5px 9px -2px #A5A5A5;
box-shadow: 0px 5px 9px -2px #A5A5A5;
}
.countera2 {
  background-color: #053361;
  padding: 30px;
  border-radius: 10px;
  color: #fff;
  -webkit-box-shadow: 0px 5px 9px -2px #A5A5A5;
  box-shadow: 0px 5px 9px -2px #A5A5A5;
}
.countera3 {
  background-color: #1b80c1;
  padding: 30px;
  border-radius: 10px;
  color: #fff;
  -webkit-box-shadow: 0px 5px 9px -2px #A5A5A5;
  box-shadow: 0px 5px 9px -2px #A5A5A5;
}
.countera4 {
  background-color: #000000;
  padding: 30px;
  border-radius: 10px;
  color: #fff;
  -webkit-box-shadow: 0px 5px 9px -2px #A5A5A5;
  box-shadow: 0px 5px 9px -2px #A5A5A5;
}
.numc h4 {
  font-size: 16px;
  text-transform: capitalize;
  font-weight: 600;
  color: #fff;
}
.num1 span {
  font-size: 18px;
  font-weight: 700;
  color: #fff;
}
.num1icon .material-icons {
  background-color: rgb(255 255 255);
  color: #26abe2;
  width: 45px;
  height: 45px;
  line-height: 45px;
  text-align: center;
  /* border-radius: 50%; */
  border-radius: 5px;
}
</style>



	<section class="counter_area">
				<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="countera1">
								<div class="row">
									<div class="col-sm-6">
                    @php
                      $total_product=App\Product::count();
                    @endphp
										<div class="numc">
											<h4>Total Product</h4>
										</div>
										<div class="num1">
											<span>{{$total_product}}</span>
										</div>
									</div>
									<div class="col-sm-6 text-right">
										<div class="num1icon">
											<span class="material-icons">
												support
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="countera2">
								<div class="row">
									<div class="col-sm-6">
                    @php
                      $admin=App\Admin::count();
                    @endphp
										<div class="numc">
											<h4>Total Staffs</h4>
										</div>
										<div class="num1">
											<span>{{$admin}}</span>
										</div>
									</div>
									<div class="col-sm-6 text-right">
										<div class="num1icon">
											<span class="material-icons">
												fiber_smart_record
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="countera3">
								<div class="row">
									<div class="col-sm-6">
                    @php
                      $amount=App\OrderFinal::sum('total_quantity');
                    @endphp
										<div class="numc">
											<h4>Total Sell</h4>
										</div>
										<div class="num1">
											<span>{{$amount}}</span>
										</div>
									</div>
									<div class="col-sm-6 text-right">
										<div class="num1icon">
											<span class="material-icons">
												hvac
											</span>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="countera4">
								<div class="row">
									<div class="col-sm-6">
                    @php
                      $cutomer=App\User::count();
                    @endphp
										<div class="numc">
											<h4>Total Customer</h4>
										</div>
										<div class="num1">
											<span>{{$cutomer}}</span>
										</div>
									</div>
									<div class="col-sm-6 text-right">
										<div class="num1icon">
											<span class="material-icons">
												filter_vintage
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

                    <!--/ counter_area -->
                    <!-- table area -->
                    <section class="table_area">
                      <div class="row">
                          <div class="col-lg-8">
                              <div class="panel chart_area">
                                  <div class="panel_header">
                                      <div class="panel_title">
                                          <span class="panel_icon"><i class="far fa-chart-bar"></i></span>
                                          <span>Product Sell Chart</span>
                                      </div>
                                  </div>
                                  <div class="panel_body">
                                      <div id="app">
                                          {!! $chart->container() !!}
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="panel">
                                  <div class="panel_header">
                                      <div class="panel_title">
                                          <span class="panel_icon"><i class="fas fa-chart-pie"></i></span>
                                          <span>Ecommerce Information</span>
                                      </div>
                                  </div>
                                  <div class="panel_body">
                                    <div id="chart" class="chart-container d-flex justify-content-center"></div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                        <div class="panel">
                            <div class="panel_header">
                                <div class="panel_title">
                                    <span class="panel_icon"><i class="fas fa-cart-plus"></i></span>
                                  <span>New Order</span>
                                </div>
                            </div>

                                <div class="panel_body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Order Code</th>
                                                  <th>Order Quantity</th>
                                                  <th>Amount</th>
                                                  <th>Delevery Status</th>
                                                  <th data-hide="all">Manage</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            @php
                                              $pendingorder=App\OrderFinal::where('dalevary',0)->orderBy('id','DESC')->limit(5)->get();
                                            @endphp
                                            @foreach($pendingorder as $key => $pending)
                                              <tr>
                                                  <td>{{++$key}}</td>
                                                  <td>{{$pending->invoice_id}}</td>
                                                  <td>{{$pending->total_quantity}}</td>
                                                  <td>{{$pending->total_price}}</td>
                                                  <td>
                                                    @if($pending->dalevary==0)
                                                    <span class="btn btn-danger">Pending</span>
                                                    @else
                                                    @endif
                                                  </td>
                                                  <td>
                                                      <a href="{{url('admin/product/order/invoice/'.$pending->id)}}" class="btn btn-default btn-sm text-white"><i class="fa fa-eye"></i></a>
                                                  </td>
                                              </tr>
                                            @endforeach

                                          </tbody>
                                        </table>
                                    </div>
                                </div>

                            <!--  -->
                              </div>
                            </div>
                            <!--  -->

                        </div> <!-- /table -->
                        <!-- chart area -->

                    </section>
                </div><!--/middle content wrapper-->
            </div><!--/ content wrapper -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@endsection
