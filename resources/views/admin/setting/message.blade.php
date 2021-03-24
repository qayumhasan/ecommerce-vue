@extends('layouts.adminapp')
@section('title', 'Payment Setting | '.$seo->meta_title)
@section('admin_content')
<div class="content_wrapper">
          <div class="middle_content_wrapper">
              <div class="row">
                  <div class="col-sm-12">

                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Deshboard</a></li>
                              <li class="breadcrumb-item active" aria-current="page">
                                  Payment Settings
                              </li>
                          </ol>
                      </nav>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <div class="tab_side_nav">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                              aria-orientation="vertical">
                              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                  role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-money-check-alt"></i> SSLCOMMERZ</a>
                              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                  role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fab fa-cc-stripe"></i> STRIPE</a>
                              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                  href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                  aria-selected="false"> <i class="fas fa-dove"></i>
                                  BKASH</a>
                              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                  href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                  aria-selected="false"><i class="fab fa-cc-paypal"></i> PAYPAL</a>

                          </div>
                      </div>
                  </div>
                  <div class="col-sm-8">
                      <div class="tab_nav">
                          <div class="tab-content" id="v-pills-tabContent">
                              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                  aria-labelledby="v-pills-home-tab">
                                  <div class="card">
                                      <div class="card-header">
                                          <h4>SSLCOMMERZ</h4>
                                      </div>
                                      <div class="card-body">

                                          <p class="card-text">
                                              <form action="{{ url('admin/sociallogin/update') }}" method="POST">
                                                @csrf
                                                  <div class="form-group">
                                                    <input type="hidden" name="types[]" value="SSLCOMMERZ_STORE_ID">
                                                      <label>SSL STORE ID</label>
                                                      <input type="text" class="form-control" name="SSLCOMMERZ_STORE_ID" value="{{ env('SSLCOMMERZ_STORE_ID') }}" placeholder="Stripe Key" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>SSL STORE PASSWORD</label>
                                                       <input type="hidden" name="types[]" value="SSLCOMMERZ_STORE_PASSWORD">
                                                       <input type="text" class="form-control" name="SSLCOMMERZ_STORE_PASSWORD" value="{{ env('SSLCOMMERZ_STORE_PASSWORD') }}" placeholder="STRIPE Secret" required>
                                                  </div>
                                                  <button type="submit" class="btnset">Update</button>
                                              </form>
                                          </p>

                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                  aria-labelledby="v-pills-profile-tab">
                                  <div class="card">
                                      <div class="card-header">
                                          <h4>STRIPE</h4>
                                      </div>
                                      <div class="card-body">
                                          <p class="card-text">
                                              <form action="{{ url('admin/sociallogin/update') }}" method="POST">
                                                @csrf
                                                  <div class="form-group">
                                                      <label>STRIPE KEY</label>
                                                       <input type="hidden" name="types[]" value="STRIPE_KEY">
                                                      <input type="text" class="form-control" name="STRIPE_KEY" value="{{ env('STRIPE_KEY') }}" placeholder="Stripe Key" required>

                                                  </div>
                                                  <div class="form-group">
                                                      <label>STRIPE SECRET</label>
                                                       <input type="hidden" name="types[]" value="STRIPE_SECRET">
                                                      <input type="text" class="form-control" name="STRIPE_SECRET" value="{{ env('STRIPE_SECRET') }}" placeholder="STRIPE Secret" required>
                                                  </div>
                                                  <button type="submit" class="btnset">Submit</button>
                                              </form>
                                          </p>

                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                  aria-labelledby="v-pills-messages-tab">
                                  <div class="card">
                                      <div class="card-header">
                                          <h4>BKASH</h4>
                                      </div>
                                      <div class="card-body">
                                          <p class="card-text">
                                            <form action="{{ url('admin/sociallogin/update') }}" method="POST">
                                              @csrf
                                                <div class="form-group">
                                                    <label>Key</label>
                                                    <input type="text" class="form-control">

                                                </div>
                                                <div class="form-group">
                                                    <label>password</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <button type="submit" class="btnset">Submit</button>
                                            </form>
                                          </p>

                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                  aria-labelledby="v-pills-settings-tab">     <div class="card">
                                      <div class="card-header">
                                          <h4>PAYPAL</h4>
                                      </div>
                                      <div class="card-body">
                                          <p class="card-text">
                                              <form action="{{ url('admin/sociallogin/update') }}" method="POST">
                                                @csrf
                                                  <div class="form-group">
                                                      <label>USERNAME</label>
                                                      <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_USERNAME">
                                                      <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_USERNAME" value="{{ env('PAYPAL_SANDBOX_API_USERNAME') }}" placeholder="Stripe Key" required>

                                                  </div>
                                                  <div class="form-group">
                                                      <label>PASSWORD</label>
                                                      <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_PASSWORD">
                                                      <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_PASSWORD" value="{{ env('PAYPAL_SANDBOX_API_PASSWORD') }}" placeholder="STRIPE Secret" required>

                                                  </div>
                                                  <div class="form-group">
                                                      <label>SECRET</label>
                                                    <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_SECRET">
                                                    <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_SECRET" value="{{ env('PAYPAL_SANDBOX_API_SECRET') }}" placeholder="STRIPE Secret" required>

                                                  </div>

                                                  <button type="submit" class="btnset">Update</button>
                                              </form>
                                          </p>

                                      </div>
                                  </div>
                                </div>





                          </div>
                      </div>
                  </div>
              </div>


              <style>
                  .tab_side_nav {
                      background-color: #ffff;
                  }

                  .tab_side_nav span.material-icons {
                      background-color: transparent;
                      position: relative;
                      top: 4px;
                      margin-right: 8px;
                  }

                  .tab_nav {
                      background-color: #ffff;
                      padding: 30px;
                  }

                  .nav-pills .nav-link.active,
                  .nav-pills .show>.nav-link {
                      color: #fff;
                      background-color: #26abe2 !important;
                  }

                  .nav-link {
                      display: block;
                      padding: .5rem 1rem;
                      color: #000;
                      font-size: 16px;
                  }

                  .card-header h4 {
                      font-size: 14px;
                  }

                  .card-header h4 {
                      font-size: 14px;
                      position: relative;
                      top: 6px;
                  }

                  button.btnset {
                      background-color: #26abe2;
                      border-style: none;
                      color: #fff;
                      width: 100%;
                      padding: 5px;
                      border-radius: 4px;
                      font-size: 16px;
                  }

                  .log_img img {
                      width: 200px;
                      height: auto;
                  }

                  .log_del span.material-icons {
                      background-color: #26abe2 !important;
                      color: #fff;
                      padding: 5px;
                      border-radius: 3px;
                  }

                  .log_btn {
                      margin-top: 28px;
                  }

                  button.btnpic {
                      background-color: #26abe2;
                      border-style: none;
                      color: #fff;
                      padding: 8px 30px;
                      border-radius: 3px;
                  }
              </style>
          </div>

          <footer>
              <div class="row">
                  <div class="col-md-6">
                      <p>Copyright &copy; 2019 Durbar IT. All rights reserved.</p>
                  </div>
                  <div class="col-md-6">
                      <span class="my-0 developby"><span>Develop by:</span><a href="https://www.durbarit.com"
                              target="_blank">
                              Durbar IT</a></span>
                  </div>
              </div>
          </footer>
      </div>







 <!-- <div class="content_wrapper">
      <div class="middle_content_wrapper">
	<section class="page_area">
	     <div class="row">
        		<div class="col-lg-6">
        		     <div class="panel">
              			<div class="panel_header">
              			     <div class="panel_title"><span class="text-center">Stripe Gatwway</span></div>
              			</div>
            			    <div class="panel_body">
                        <form class="form-horizontal" action="{{ url('admin/sociallogin/update') }}" method="POST">
                         @csrf
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="STRIPE_KEY">
                                <div class="col-md-1"></div>
                                <div class="col-lg-2">
                                    <label class="control-label">STRIPE Key</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="STRIPE_KEY" value="{{ env('STRIPE_KEY') }}" placeholder="Stripe Key" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="STRIPE_SECRET">
                                <div class="col-md-1"></div>
                                <div class="col-lg-2">
                                    <label class="control-label">STRIPE Secret</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="STRIPE_SECRET" value="{{ env('STRIPE_SECRET') }}" placeholder="STRIPE Secret" required>
                                </div>
                			    </div>
                          <div class="form-group row">
                              <div class="col-lg-12 text-center">
                                  <button class="btn btn-success" type="submit">Update</button>
                              </div>
                          </div>
                    </form>
        		       </div>
        	    	</div>
              </div>
        	    <div class="col-lg-6">
          		     <div class="panel">
                			<div class="panel_header">
                			     <div class="panel_title"><span class="text-center">Paypal Gateway </span></div>
                			</div>
                			    <div class="panel_body">
                            <form class="form-horizontal" action="{{ url('admin/sociallogin/update') }}" method="POST">
                             @csrf
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_USERNAME">
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-2">
                                        <label class="control-label">USERNAME NAME</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_USERNAME" value="{{ env('PAYPAL_SANDBOX_API_USERNAME') }}" placeholder="Stripe Key" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_PASSWORD">
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-2">
                                        <label class="control-label">PASSWORD</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_PASSWORD" value="{{ env('PAYPAL_SANDBOX_API_PASSWORD') }}" placeholder="STRIPE Secret" required>
                                    </div>
                              </div>
                              <div class="form-group row">
                                  <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_SECRET">
                                  <div class="col-md-1"></div>
                                  <div class="col-lg-2">
                                      <label class="control-label">SECRET</label>
                                  </div>
                                  <div class="col-lg-6">
                                      <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_SECRET" value="{{ env('PAYPAL_SANDBOX_API_SECRET') }}" placeholder="STRIPE Secret" required>
                                  </div>
                            </div>
                              <div class="form-group row">
                                  <div class="col-lg-12 text-center">
                                      <button class="btn btn-success" type="submit">Update</button>
                                  </div>
                              </div>
                        </form>

                			  </div>
          		       </div>
        		</div>

     </div>
    <div class="row">
	     	<div class="col-lg-6">
	     	     <div class="panel">
      	     		<div class="panel_header">
      	     		     <div class="panel_title"><span class="text-center">SSl Payment Gatwway</span></div>
      	     		</div>
      	     		    <div class="panel_body">
                      <form class="form-horizontal" action="{{ url('admin/sociallogin/update') }}" method="POST">
                       @csrf
                          <div class="form-group row">
                              <input type="hidden" name="types[]" value="SSLCOMMERZ_STORE_ID">
                                <div class="col-md-1"></div>
                              <div class="col-lg-2">
                                  <label class="control-label">SSl Store id</label>
                              </div>
                              <div class="col-lg-6">
                                  <input type="text" class="form-control" name="SSLCOMMERZ_STORE_ID" value="{{ env('SSLCOMMERZ_STORE_ID') }}" placeholder="Stripe Key" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <input type="hidden" name="types[]" value="SSLCOMMERZ_STORE_PASSWORD">
                                <div class="col-md-1"></div>
                              <div class="col-lg-2">
                                  <label class="control-label">Password</label>
                              </div>
                              <div class="col-lg-6">
                                  <input type="text" class="form-control" name="SSLCOMMERZ_STORE_PASSWORD" value="{{ env('SSLCOMMERZ_STORE_PASSWORD') }}" placeholder="STRIPE Secret" required>
                              </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12 text-center">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </div>
                  </form>
	     		          </div>
	     	       </div>
	     	</div>
    </div>
	</section>
</div>
</div> -->
@endsection
