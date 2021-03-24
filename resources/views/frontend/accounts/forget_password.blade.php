@extends('layouts.websiteapp')
@section('title', 'Forget passwrod | '.$seo->meta_title)
@section('content')

    <section id="logpage">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="login_page">
                     <div class="login-modal">
                        <div class="row">
                           <div class="col-lg-6 pad-right-0">
                              <div class="login-modal-left">
                                <img src="{{asset('/'.$logos->front_logo)}}">
                              </div>
                           </div>
                           <div class="col-lg-6 pad-left-0">

                              <form action="{{route('customar.email.forgot.passwrod')}}" method="post">
                                @csrf
                                 <div class="login-modal-right">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                       <div class="tab-pane active" id="login" role="tabpanel">
                                          <h5 class="heading-design-h5">Forget Password</h5>
                                          <fieldset class="form-group">
                                             <label>Enter Mobile Number</label>
                                             <input class="form-control" name="phone_email" type="text" placeholder="Enter Your Phone Number">
                                             @error('phone_email')
                                                 <strong class="text-danger">{{ $message }}</strong>
                                             @enderror
                                          </fieldset>

                                          <fieldset class="form-group">
                                             <button type="submit" class="btn btn-lg btn-secondary btn-block">Send Code</button>
                                          </fieldset>
                                       </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="text-center login-footer-tab">
                                       <ul class="nav nav-tabs" role="tablist">

                                          <li class="nav-item">
                                             <a class="nav-link" href="{{url('/customer/register')}}"><i
                                                   class="mdi mdi-pencil"></i> REGISTER</a>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <style>
            section#logpage {
               padding: 80px 0px;
            }

            .login_page {
               max-width: 850px;
               background-color: #fff;
               margin: 0px auto;
               border-radius: 5px;
               padding: 40px 40px;
            }

            .login-modal-left {
               background: rgba(0, 0, 0, 0) url(img/login.jpg) repeat scroll center center;
               float: right;
               height: 300px;
               list-style: outside none none;
               margin: 70px auto auto;
               width: 322px;
            }

            .login-modal-right {
               padding: 27px;
            }

            .form-control {
               border-radius: 2px;
               font-size: 14px;
            }

            label {
               font-size: 13px;
               margin: 0 0 3px;
            }

            .modal-content {
               border: medium none;
               border-radius: 2px;
            }

            .login-modal-right {
               padding: 27px;
            }

            .login-icons {
               border: medium none;
               border-radius: 2px;
               cursor: pointer;
               font-size: 12px;
               font-weight: 500;
               text-transform: uppercase;
            }

            .login-footer-tab .nav-link {
               background: #ececec none repeat scroll 0 0 !important;
               border: medium none;
               border-radius: 2px !important;
               margin: 10px 3px 0 2px;
               padding: 7px 20px;
            }

            .login-footer-tab .nav {
               border: medium none;
               display: inline-flex;
            }

            .btn-facebook {
               background: #395b9a none repeat scroll 0 0;
               color: #fff;
            }

            .btn-google {
               background: #c71e25 none repeat scroll 0 0;
               color: #fff;
            }

            .btn-twitter {
               background: #3a9ed8 none repeat scroll 0 0;
               color: #fff;
            }

            .login-with-sites p {
               margin: 0 0 7px;
            }

            .login-with-sites {
               margin-bottom: 10px;
            }

            .modal-backdrop.show {
               opacity: 0.7;
            }
         </style>
      </section>
@endsection
