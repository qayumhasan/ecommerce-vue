@extends('layouts.adminapp')
@section('title', 'Sms Setting | '.$seo->meta_title)
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
                                  SMS Settings
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

                                <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill"
                                    href="#v-pills-smtp" role="tab" aria-controls="v-pills-settings"
                                    aria-selected="false"><i class="fas fa-mail-bulk"></i> SMTP</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                        href="#v-pills-sms" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false"><i class="fas fa-comment-alt"></i> SMS</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                        href="#v-pills-mail" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false"><i class="fas fa-envelope"></i> MAILGUN</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-8">
                      <div class="tab_nav">
                          <div class="tab-content" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-smtp" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>SMTP Login</h4>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <form action="{{ url('admin/sociallogin/update') }}" method="POST">
                                                      @csrf
                                                        <div class="form-group">
                                                            <label>MAIL_DRIVER</label>
                                                            <input type="hidden" name="types[]" value="MAIL_DRIVER">
                                                            <input type="text" class="form-control" name="MAIL_DRIVER" value="{{ env('MAIL_DRIVER') }}" placeholder="MAIL_DRIVER" required>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>MAIL_HOST</label>
                                                           <input type="hidden" name="types[]" value="MAIL_HOST">
                                                           <input type="text" class="form-control" name="MAIL_HOST" value="{{ env('MAIL_HOST') }}" placeholder="MAIL_HOST" required>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>MAIL_PORT</label>
                                                          <input type="hidden" name="types[]" value="MAIL_PORT">
                                                         <input type="text" class="form-control" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}" placeholder="MAIL_PORT" required>

                                                        </div>

                                                        <div class="form-group">
                                                          <label>MAIL_USERNAME</label>
                                                          <input type="hidden" name="types[]" value="MAIL_USERNAME">
                                                          <input type="text" class="form-control" name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}" placeholder="MAIL_USERNAME" required>
                                                        </div>
                                                        <div class="form-group">
                                                          <label>MAIL_PASSWORD</label>
                                                          <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                                                        <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{ env('MAIL_PASSWORD') }}" placeholder="MAIL_PASSWORD" required>
                                                        </div>

                                                        <div class="form-group">
                                                          <label>MAIL_ENCRYPTION</label>
                                                         <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                                                         <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{ env('MAIL_ENCRYPTION') }}" placeholder="MAIL_ENCRYPTION" required>
                                                        </div>

                                                        <div class="form-group">
                                                          <label>MAIL_FROM_NAME</label>
                                                          <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                                                          <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{ env('MAIL_FROM_NAME') }}" placeholder="MAIL_FROM_NAME" required>
                                                        </div>

                                                        <div class="form-group">
                                                          <label>MAIL_FROM_ADDRESS</label>
                                                          <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                                                          <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{ env('MAIL_FROM_ADDRESS') }}" placeholder="MAIL_FROM_ADDRESS" required>
                                                        </div>

                                                        <button type="submit" class="btnset">Update</button>
                                                    </form>
                                                </p>

                                            </div>
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="v-pills-sms" role="tabpanel"
                                          aria-labelledby="v-pills-settings-tab">
                                          <div class="card">
                                              <div class="card-header">
                                                  <h4>SMS SETTING</h4>
                                              </div>
                                              <div class="card-body">
                                                  <p class="card-text">
                                                    @php
                                                      $smssetting=App\SmsModel::first();
                                                    @endphp
                                                      <form action="{{ route('admin.sms.update') }}" method="POST">
                                                        @csrf
                                                          <div class="form-group">
                                                              <label>SMS Link:</label>
                                                              <input class="form-control" type="hidden" name="sms_id" required="" value="{{ $smssetting->id }}">
  										                                        <input class="form-control" type="text" name="sms_url" required="" value="{{ $smssetting->sms_url }}">

                                                          </div>
                                                          <div class="form-group">
                                                              <label>UserName</label>
                                                            <input class="form-control" type="text" name="sms_username" required="" value="{{ $smssetting->sms_username }}">

                                                          </div>
                                                          <div class="form-group">
                                                              <label>Password</label>
                                                            <input class="form-control" type="password" name="sms_password" required="" value="{{ $smssetting->sms_password }}">

                                                          </div>

                                                          <div class="form-group">
                                                									<label>SMS Type:</label>

                                                										<select class="form-control" name="sms_type" id="exampleFormControlSelect1">
                                                											<option value="1">Text</option>
                                                											<option value="2">Flash</option>
                                                											<option value="3">Flash Unicode</option>
                                                											<option value="4">Unicode/Bangla</option>
                                                										</select>

                                                							</div>
                                                              <div class="form-group">
                                                                        <label>SMS Masking:</label>

                                                                          <select class="form-control" name="sms_masking" id="exampleFormControlSelect1">
                                                                            <option value="masking"@if($smssetting->sms_type == 'masking')selected @endif>Masking</option>
                                                                            <option value="non-masking" @if($smssetting->sms_type == 'non-masking')selected @endif>Non-Masking</option>
                                                                          </select>

                                                                      </div>

                                                          <button type="submit" class="btnset">Update</button>
                                                      </form>
                                                  </p>

                                              </div>
                                          </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-mail" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>MAILGUN SETTING</h4>
                                                </div>
                                                @php
                                                  $smtp=DB::table('smtp')->first();
                                                @endphp
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        <form action="{{ route('admin.mailgun.update') }}" method="post">
                                                          @csrf
                                                          <div class="form-group">
                                          									<label for="example-text-input">Mailgun Domain</label>
                                          										<input class="form-control" type="text" value="{{ $smtp->mailgun_domain }}" required="" name="mailgun_domain">

                                          								</div>
                                          								<div class="form-group">
                                          									<label for="example-text-input">Mailgun Secret </label>

                                          										<input class="form-control" type="text" value="{{ $smtp->mailgun_secret }}" name="mailgun_secret">
                                          								</div>
                                        								<div class="form-group">
                                        									<label for="example-text-input">Mailgun Endpoint </label>
                                        										<input class="form-control" type="text" value="{{ $smtp->mailgun_endpoint }}" name="mailgun_endpoint">
                                        									</div>
                                        								    <input type="hidden" name="id" value="{{ $smtp->id }}">
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
