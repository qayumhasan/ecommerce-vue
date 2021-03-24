@extends('layouts.adminapp')
@section('title', 'Gerneral Settings | '.$seo->meta_title)
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
                                  Gerneral Settings
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
                                  role="tab" aria-controls="v-pills-home" aria-selected="true"><span
                                      class="material-icons">
                                      engineering
                                  </span>Company Information</a>

                                  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-new"
                                      role="tab" aria-controls="v-pills-new" aria-selected="false"><span
                                          class="material-icons">
                                          pets
                                      </span> Social</a>

                              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                  role="tab" aria-controls="v-pills-profile" aria-selected="false"><span
                                      class="material-icons">
                                      pets
                                  </span> SEO Information</a>

                              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                  href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                  aria-selected="false"> <span class="material-icons">
                                      assistant
                                  </span>
                                  Logo</a>
                              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                  href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                  aria-selected="false"><span class="material-icons">
                                      movie_creation
                                  </span> Delivery Amount</a>
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
                                          <h4>Company Information</h4>
                                      </div>
                                      <div class="card-body">
                                        @php
                                          $social=DB::table('sitesetting')->first();
                                        @endphp

                                          <p class="card-text">
                                              <form action="{{ route('admin.social.update') }}" method="post">
                                                @csrf
                                                  <div class="form-group">
                                                      <label>Company Name</label>
                                                      <input class="form-control" type="text" value="{{ $social->company_name }}" required="" name="company_name">
                                                      <input type="hidden" value="{{ $social->id }}" name="id">

                                                  </div>
                                                  <div class="form-group">
                                                      <label>Phone One</label>
                                                      <input class="form-control" type="text" value="{{ $social->phone_one }}"name="phone_one">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Phone Two</label>
                                                       <input class="form-control" type="text" value="{{ $social->phone_two }}"name="phone_two">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Eamil one</label>
                                                    <input class="form-control" type="email" value="{{ $social->email_one }}"name="email_one">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Eamil Two</label>
                                                      <input class="form-control" type="email" value="{{ $social->email_two }}"name="email_two">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Address</label>
                                                      <input class="form-control" type="text" value="{{ $social->address }}"name="address">
                                                  </div>

                                                      <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Google Map</label>
                                                       <textarea class="form-control" name="google_map">{{ $social->google_map }} </textarea>
                                                    </div>

                                                  <button type="submit" class="btnset">Submit</button>
                                              </form>
                                          </p>

                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="v-pills-new" role="tabpanel"
                                  aria-labelledby="v-pills-profile-tab">
                                  <div class="card">
                                      <div class="card-header">
                                          <h4>Social</h4>
                                      </div>
                                      <div class="card-body">
                                        @php
                                          $slocial=DB::table('socials')->first();
                                        @endphp
                                          <p class="card-text">
                                              <form action="{{route('admin.socialmedia.update')}}" method="post">
                                                @csrf
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Facebook</label>
                                                        <input type="hidden" value="{{ $slocial->id }}" name="id">
                                                      <input class="form-control" type="text" value="{{ $slocial->facebook }}"name="facebook">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Instagram</label>
                                                      <input class="form-control" type="text" value="{{ $slocial->instragram }}"name="instragram">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Twitter</label>
                                                     <input class="form-control" type="text" value="{{ $slocial->twitter }}"name="twitter">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Linkedin</label>
                                                     <input class="form-control" type="text" value="{{ $slocial->linkend }}"name="linkend">
                                                  </div>

                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Google</label>
                                                    <input class="form-control" type="text" value="{{ $slocial->google }}" name="google">
                                                  </div>

                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Feed</label>
                                                       <input class="form-control" type="text" value="{{ $slocial->feed }}"  name="feed">
                                                    </div>


                                                  <button type="submit" class="btnset">Submit</button>
                                              </form>
                                          </p>

                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                  aria-labelledby="v-pills-profile-tab">
                                  <div class="card">
                                      <div class="card-header">
                                          <h4>SEO (Search Engine Optimization)</h4>
                                      </div>
                                      <div class="card-body">
                                          <p class="card-text">
                                              <form action="{{ route('admin.seo.update') }}" method="post">
                                                @csrf
                                                  <div class="form-group">
                                                      <label>Meta Title</label>
                                                      <input class="form-control" type="text" value="{{ $seo->meta_title }}"  required="" name="meta_title">

                                                  </div>
                                                  <div class="form-group">
                                                      <label>Meta Author</label>
                                                     <input class="form-control" type="text" value="{{ $seo->meta_author }}"  name="meta_author">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Meta Keyword</label>
                                                     <input class="form-control" type="text" value="{{ $seo->meta_key }}"   name="meta_key">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Meta
                                                          Description</label>
                                                      <textarea class="form-control" rows="3" name="meta_description">{{ $seo->meta_description }}</textarea>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Google Verification</label>
                                                      <input class="form-control" type="text" value="{{ $seo->google_verification }}"   name="google_verification">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Bing Verification</label>
                                                      <input class="form-control" type="text" value="{{ $seo->bing_verification }}"  name="bing_verification">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Google
                                                          Analytics</label>
                                                      <textarea class="form-control" rows="3" name="google_analytic">{{ $seo->google_analytic }}</textarea>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleFormControlTextarea1">Alexa Analytics</label>
                                                      <textarea class="form-control" rows="3" name="alexa_analytic">{{ $seo->alexa_analytic }}</textarea>
                                                      <input type="hidden" name="id" value="{{ $seo->id }}">
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
                                     @php
                                      $logo=App\Logo::first();
                                     @endphp
                                       <div class="card-header">
                                           <h4>Logo Settings</h4>
                                       </div>
                                       <div class="card-body">
                                           <p class="card-text">
                                             <form class="" action="{{ route('admin.front.logo') }}" method="post" enctype="multipart/form-data">
                                               @csrf
                                               <div class="row">
                                                   <div class="col-sm-3">
                                                       <div class="log_lab">
                                                           <h4>Logo</h4>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-5">
                                                       <div class="log_file">
                                                         <div class="form-group">
                                                             <input type="file" name="front_logo" class="form-control-file" id="exampleFormControlFile1">
                                                             <input type="hidden" name="id" value="{{ $logo->id }}">
                                                         </div>

                                                       </div>
                                                   </div>
                                                   <div class="col-sm-4 text-center">
                                                       <div class="log_img">
                                                           <img src="{{ asset($logo->front_logo) }}" class="w-100" alt="">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="row mt-3">
                                                   <div class="col-sm-3">
                                                       <div class="log_lab">
                                                           <h4>Favicon</h4>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-5">
                                                       <div class="log_file">
                                                           <div class="form-group">
                                                               <input name="favicon" type="file" class="form-control-file"
                                                                   id="exampleFormControlFile1">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-4 text-center">
                                                       <div class="log_img">
                                                           <img src="{{ asset($logo->favicon) }}" class="" height="65px" alt="">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="row mt-3">
                                                   <div class="col-sm-3">
                                                       <div class="log_lab">
                                                           <h4>Preloader</h4>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-5">
                                                       <div class="log_file">

                                                               <div class="form-group">
                                                                   <input type="file" name="preloader" class="form-control-file"
                                                                       id="exampleFormControlFile1">
                                                               </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-4 text-center">
                                                       <div class="log_img">
                                                           <img src="{{ asset($logo->preloader) }}" class="w-100" alt="" height="55px">
                                                       </div>
                                                   </div>
                                               </div>
                                               <button type="submit" class="btnset">Submit</button>
                                              </form>
                                           </p>

                                       </div>
                                   </div>
                               </div>
                              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                  aria-labelledby="v-pills-settings-tab">
                                  <div class="card">
                                      <div class="card-header">
                                          <h4>Delivery Amount</h4>
                                      </div>
                                      <div class="card-body">
                                          <p class="card-text">
                                            @php
                                              $amount=App\DeleveryCharge::first();
                                            @endphp
                                              <form  action="{{route('admin.deleveryamount.submit')}}" method="post">
                                                @csrf
                                                  <div class="form-group">
                                                      <label>Amount (TK)</label>
                                                      <input type="number" class="form-control" name="amount" value="{{$amount->amount}}">
                                  				 			      <input type="hidden" name="id" value="{{$amount->id}}">

                                                  </div>

                                                  <button type="submit" class="btnset">Update</button>
                                              </form>
                                          </p>

                                      </div>
                                  </div></div>
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
                     width: 150px !important;
                     /* margin: 0px auto; */
                 }

                  /* .log_img img {
                      width: 200px;
                      height: auto;
                  } */
                  .log_lab h4 {
                        font-size: 16px;
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
		<div class="col-lg-6 offset-3">
		     <div class="panel">
			<div class="panel_header">
			     <div class="panel_title"><span class="text-center">SEO (Search Engine Optimization) </span></div>
			</div>
			    <div class="panel_body">
	                                   <form class="py-2" action="{{ route('admin.seo.update') }}" method="post" >
	                                   	@csrf
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Meta Title</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $seo->meta_title }}"  required="" name="meta_title">
	                                             </div>
	                                         </div>
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Meta Author </label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $seo->meta_author }}"  name="meta_author">
	                                             </div>
	                                         </div>

	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Meta Keyword</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $seo->meta_key }}"   name="meta_key">
	                                             </div>
	                                         </div>
	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Meta Description</label>
	                                             <div class="col-sm-9">
	                                               <textarea class="form-control" rows="3" name="meta_description">
	                                               	{{ $seo->meta_description }}
	                                               </textarea>
	                                             </div>
	                                         </div>
	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Google verification </label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $seo->google_verification }}"   name="google_verification">
	                                             </div>
	                                         </div>
	                                           <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Bing verification </label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="text" value="{{ $seo->bing_verification }}"  name="bing_verification">
	                                             </div>
	                                         </div>
	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Google Analytics</label>
	                                             <div class="col-sm-9">
	                                               <textarea class="form-control" rows="3" name="google_analytic">
	                                               	{{ $seo->google_analytic }}
	                                               </textarea>
	                                             </div>
	                                         </div>

	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Alexa Analytics</label>
	                                             <div class="col-sm-9">
	                                               <textarea class="form-control" rows="3" name="alexa_analytic">
	                                               	{{ $seo->alexa_analytic }}
	                                               </textarea>
	                                             </div>
	                                         </div>
	                                       <input type="hidden" name="id" value="{{ $seo->id }}">
	                                      	<br>
	                                      	<div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label"></label>
	                                             <div class="col-sm-9">
	                                                 <button type="submit" class="btn btn-success">Update</button>
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
