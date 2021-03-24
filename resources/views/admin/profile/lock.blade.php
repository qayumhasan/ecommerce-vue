<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="assets/images/favicon.png" >
	<!--Page title-->
	<title>Admin DIT</title>
	<!--bootstrap-->
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/bootstrap.min.css') }}">
	<!--font awesome-->
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/all.min.css') }}">
	<!--Custom CSS-->
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/style.css') }}">
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>
<body id="page-top">

	<!-- wrapper -->
	<div class="wrapper without_header_sidebar">
		<!-- contnet wrapper -->
		<div class="content_wrapper">
				<!-- page content -->
				<div class="login_page center_container" style="background: url('{{ asset('public/admin/assets/images/inventory-bg.jpg') }}');">
					<div class="center_content">
						<div class="logo">
							<!-- <img src="assets/images/logo.png" alt="" class="img-fluid"> -->
							<div class="admin">
								<h3>LOCK SCREEN</h3>
								@if(Auth::user()->avatar == NULL)
								<img src="{{ asset('public/admin/assets/images/admin.jpg') }}" alt="">
								@else
								<img src="{{ asset(Auth::user()->avatar) }}" alt="">
								@endif
								
								<p>{{ Auth::user()->name }}</p>
								<p class="text-left">Enter your password to access the admin.</p>
							</div>
						</div>
						<form action="{{ route('admin.unlock.screen') }}"  method="post" class="d-block">
						    @csrf
							<div class="form-group icon_parent">
								<input type="password" placeholder="password" class="form-control bg-transparent border-0 pl-5" name="password" required="">
								<span class="icon_soon_bottom_left"><i class="fas fa-lock"></i></span>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-blue btn-block border-0">Unlock</button>
							</div>
						</form>
						<div class="footer">
							<p>Copyright &copy; 2019 <a href="https://durbarit.com/">Durbar IT</a>. All rights reserved.</p>
						</div>
					</div>
				</div>
		</div><!--/ content wrapper -->
	</div><!--/ wrapper -->
<!-- jquery -->
<script src="{{ asset('public/admin/assets/js/jquery.min.js') }}"></script>
<!-- popper Min Js -->
<script src="{{ asset('public/admin/assets/js/popper.min.js') }}"></script>
<!-- Bootstrap Min Js -->
<script src="{{ asset('public/admin/assets/js/bootstrap.min.js') }}"></script>
<!-- Fontawesome-->
<script src="{{ asset('public/admin/assets/js/all.min.js') }}"></script>
<!-- Main js -->
<script src="{{ asset('public/admin/assets/js/main.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
            @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                    case 'info':
                           toastr.info("{{ Session::get('messege') }}");
                    break;
                    case 'success':
                           toastr.success("{{ Session::get('messege') }}");
                    break;
                    case 'warning':
                            toastr.warning("{{ Session::get('messege') }}");
                    break;
                    case 'error':
                            toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif
        </script>

</body>
</html>