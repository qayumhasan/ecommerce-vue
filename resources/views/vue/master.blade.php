<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="author" content="{{$seo->meta_author}}">
   <title>@yield('title',$seo->meta_title)</title>
   <meta name="keywords" content="{{$seo->meta_key}}">
   <meta name="description" content="{{$seo->meta_description}}">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   @yield('meta')
   <!-- Favicon Icon -->
    <link rel="icon" href="{{$logos->favicon}}" type="image/gif" sizes="16x16">
   <link href="{{asset('public/frontend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="{{asset('public/frontend')}}/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
   <link href="{{asset('public/frontend')}}/vendor/select2/css/select2-bootstrap.css" />
   <link href="{{asset('public/frontend')}}/vendor/select2/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/izitost.css">
 
  <link href="{{asset('public/frontend')}}/css/home6/osahan.css" rel="stylesheet">
  <link href="{{asset('public/frontend')}}/css/osahan.css" rel="stylesheet">
   
   <!-- <link href="{{asset('public/frontend')}}/css/osahan.css" rel="stylesheet"> -->

   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('public/frontend')}}/vendor/owl-carousel/owl.carousel.css">
   <link rel="stylesheet" href="{{asset('public/frontend')}}/vendor/owl-carousel/owl.theme.css">
   <script src="{{asset('public/frontend/js/lazy_loader.js')}}"></script>
   <script type="text/javascript" src="{{asset('public/frontend')}}/js/redirection-mobile.js">
   </script><script type="text/javascript">
    SA.redirection_mobile ({
    mobile_url : "www.kineninshop.com/m/",
    });
   </script>
</head>

<body>
   <div id="app">
      

<masterarea></masterarea>
 
   <!-- End Footer -->
   <!-- Copyright -->
   <section class="pt-4 pb-4 footer-bottom">
      <div class="container">
         <div class="row no-gutters">
            <div class="col-lg-6 col-sm-6">
               <p class="mt-1 mb-0">&copy; Copyright 2020 <strong class="text-dark">Groci</strong>. All Rights
                  Reserved<br>
                  <small class="mt-0 mb-0">Made with <i class="mdi mdi-heart text-danger"></i> by <a
                        href="https://askbootstrap.com/" target="_blank" class="text-primary">Ask Bootstrap</a>
                  </small>
               </p>
            </div>
            <div class="col-lg-6 col-sm-6 text-right">
               <img alt="osahan logo" src="img/payment_methods.png">
            </div>
         </div>
      </div>
   </section>
   <!-- End Copyright -->
   







   <cartarea></cartarea>
   </div>

   <script src="{{asset('public/')}}/js/app.js"></script>

   <script src="{{asset('public/js/plugin.js')}}"></script>

   <script src="{{asset('public/frontend')}}/js/hc-offcanvas-nav.js?ver=4.1.1"></script>
   <link rel="stylesheet" href="{{asset('public/frontend')}}/js/demo.css?ver=3.4.0">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</body>

</html>