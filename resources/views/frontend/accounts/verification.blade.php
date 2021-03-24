@extends('layouts.websiteapp')
@section('title', 'Verification| '.$seo->meta_title)
@section('content')
<style>

ul.code-alrt-inputs input {
    width: 90px;
}
.code-alrt-inputs li {
    display: inline-block;
    margin-right: 3px;
    vertical-align: middle;
}

.form-dt {
    margin-top: 50px;
    border: 1px solid #efefef;
    position: relative;
    border-radius: 5px;
    background: #fff;
}
.send a {
    display: block;
    text-align: center;
}
.chck-btn {
    height: 33px;
    display: inline-block;
    background: #f55d2c;
    color: #fff !important;
    padding: 8px 15px;
    font-weight: 500;
    border-radius: 5px;
}
</style>

<section class="section-padding bg-dark inner-header">
    <div class="container">
       <div class="row">
          <div class="col-md-12 text-center">
             <h1 class="mt-0 mb-3 text-white">Verification</h1>
             <div class="breadcrumbs">
                <p class="mb-0 text-white"><a class="text-white" href="{{url('/')}}">Home</a>  /  <span class="text-success">Verification Code</span></p>
             </div>
          </div>
       </div>
    </div>
 </section>

<div class="sign-inup">
		<div class="container">
      @if(Session::has('errorMsg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('errorMsg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="sign-form">
						<div class="sign-inner">
							<div class="sign-logo" id="logo">
								<a href="index.html"><img src="images/logo.svg" alt=""></a>
								<a href="index.html"><img class="logo-inverse" src="images/dark-logo.svg" alt=""></a>
							</div>
					
							<form class="form-inline" action="{{route('customar.verification')}}" method="post">
							     @csrf
                                         
                                  <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputPassword2" class="sr-only">Code</label>
                                    <input class="form-control" value="{{$token}}" name="token" type="hidden" placeholder="token">
                                    <input class="form-control" name="code" type="text" placeholder="Enter Your Verifcation Code">
                                  </div>
                                  <button type="submit" class="btn btn-secondary mb-2">Confirm identity</button>
                             </form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
