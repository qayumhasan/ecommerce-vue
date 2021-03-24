
@php
$theme=App\ThemeSelector::where('status',1)->first();
@endphp
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
   @if($theme->id==1)
   <link href="{{asset('public/frontend')}}/css/home1/osahan.css" rel="stylesheet">
   @elseif($theme->id==2)
  <link href="{{asset('public/frontend')}}/css/home2/osahan.css" rel="stylesheet">
  @elseif($theme->id==3)
  <link href="{{asset('public/frontend')}}/css/home3/osahan2.css" rel="stylesheet">
  @elseif($theme->id==4)
  <link href="{{asset('public/frontend')}}/css/home4/osahan.css" rel="stylesheet">
  @elseif($theme->id==5)
  <link href="{{asset('public/frontend')}}/css/home5/osahan.css" rel="stylesheet">
  @elseif($theme->id==6)
  <link href="{{asset('public/frontend')}}/css/home6/osahan.css" rel="stylesheet">
   @endif
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



  @if($theme->id==1)
    @include('frontend.include.home1.header')
  @elseif($theme->id==2)
    @include('frontend.include.home2.header')
  @elseif($theme->id==3)
    @include('frontend.include.home3.header')
  @elseif($theme->id==4)
    @include('frontend.include.home4.header')
  @elseif($theme->id==5)
    @include('frontend.include.home5.header')
  @elseif($theme->id==6)
    @include('frontend.include.home6.header')
  @endif

    @yield('content')

   <!-- Footer -->
  @if($theme->id==1)
    @include('frontend.include.home1.footer')
  @elseif($theme->id==2)
    @include('frontend.include.home2.footer')
  @elseif($theme->id==3)
    @include('frontend.include.home3.footer')
  @elseif($theme->id==4)
    @include('frontend.include.home4.footer')
  @elseif($theme->id==5)
    @include('frontend.include.home5.footer')
  @elseif($theme->id==6)
      @include('frontend.include.home6.footer')
  @endif

   <div class="cart-sidebar">
     <div class="cart-sidebar-header">
       @php
       $cartcountall =App\AddToCart::where('user_ip',\Request::ip())->get();
       $cartcount = $cartcountall->sum('qty');
       @endphp
        <h5>
           My Cart <span class="text-success" id="cartdatacount"></span> <a data-toggle="offcanvas" class="float-right"
              href="#"><i class="mdi mdi-close"></i>
           </a>
        </h5>
     </div>
     <div id="addtocartshow">

     </div>
      <!-- cart data -->
   </div>
   <!-- Bootstrap core JavaScript -->
   <script src="{{asset('public/frontend')}}/vendor/jquery/jquery.min.js"></script>
   <script src="{{asset('public/frontend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- select2 Js -->
   <script src="{{asset('public/frontend')}}/vendor/select2/js/select2.min.js"></script>
   <!-- Owl Carousel -->
   <script src="{{asset('public/frontend')}}/vendor/owl-carousel/owl.carousel.js"></script>


   <!-- Custom -->
   <script src="{{asset('public/frontend')}}/js/custom.js"></script>
   <script src="{{asset('public/frontend')}}/js/izitost.js"></script>
<script>

        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'success':

                iziToast.success({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                brack;
            case 'info':
                iziToast.info({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                brack;
            case 'warning':
                iziToast.warning({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                break;
            case 'error':
                iziToast.error({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                break;
        }
        @endif
</script>
 <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                 'positionClass': "toast-center",

                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script> -->

    <!-- add to cart -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script>

            $(document).ready(function() {
                $('#purchase-now').on('click', function() {
                  // alert('ok');
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('product.add.cart') }}",
                        data: $('#option-choice-form').serializeArray(),

                        success: function(data) {
                            //console.log("ok");
                            iziToast.success({  message: 'AddtoCart success ',
                                                    'position':'topCenter'
                                                });
                             document.getElementById('cartdatacount').innerHTML = data.count;
                             document.getElementById('checkoutid').innerHTML = data.count;
                             // $('#allcartproduct').html(data);
                        }
                    });

                });
            });
    </script>
  <script>
    function myAddToCartData() {
      //alert("ok");
        var userip =$("#cartdataid").data("id");
        $.post('{{ route('add.cart.show') }}', {_token: '{{ csrf_token() }}',user_id: userip},
            function(data) {
			   $('#addtocartshow').html(data);

            });
	}

	myAddToCartData();
</script>
<script>
    function cartheaderdelete(el) {

          // alert("ok");
        $.post('{{ route('cart.header.delete') }}', {_token: '{{ csrf_token() }}',user_id: el.value},
            function(data) {
                $('#addtocartshow').html(data);

                if (data) {
                  iziToast.success({  message: 'Delete success ',
                                          'position':'topCenter'
                                      });
                }


            });
allcartmain();
	}
	cartheaderdelete();
</script>
<script>
  function addtocart(id){
    // console.log($('#option-choice-form'+id).serializeArray());
    $.ajax({
        type: 'GET',
        url: "{{ route('product.add.cart') }}",
        data: $('#option-choice-form'+id).serializeArray(),

        success: function(data) {
            //console.log("ok");
            iziToast.success({  message: 'AddToCart success ',
                                    'position':'topCenter'
                                });
             // toastr.success(data.data);
             document.getElementById('cartdatacount').innerHTML = data.count;
             document.getElementById('checkoutid').innerHTML = data.count;
             // $('#allcartproduct').html(data);
        }
    });
  }
</script>
<script>
function allcartmain(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ route('get.allcatmain.getnew') }}",
         // {_token: '{{ csrf_token() }}',
        success: function(data) {
          // console.log(data);
            $('#cartdatacount').html(data);
        }
    });
}
allcartmain();

</script>


   <script src="{{asset('public/frontend')}}/js/hc-offcanvas-nav.js?ver=4.1.1"></script>
   <link rel="stylesheet" href="{{asset('public/frontend')}}/js/demo.css?ver=3.4.0">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <script>
      (function($) {
        var $main_nav = $('#main-nav');
        var $toggle = $('.toggle');

        var defaultOptions = {
          disableAt: false,
          customToggle: $toggle,
          levelSpacing: 40,
          navTitle: 'All Categories',
          levelTitles: true,
          levelTitleAsBack: true,
          pushContent: '#container',
          insertClose: 2
        };

        // call our plugin
        var Nav = $main_nav.hcOffcanvasNav(defaultOptions);

        // add new items to original nav
        $main_nav.find('li.add').children('a').on('click', function() {
          var $this = $(this);
          var $li = $this.parent();
          var items = eval('(' + $this.attr('data-add') + ')');

          $li.before('<li class="new"><a href="#">'+items[0]+'</a></li>');

          items.shift();

          if (!items.length) {
            $li.remove();
          }
          else {
            $this.attr('data-add', JSON.stringify(items));
          }

          Nav.update(true);
        });

        // demo settings update

        const update = (settings) => {
          if (Nav.isOpen()) {
            Nav.on('close.once', function() {
              Nav.update(settings);
              Nav.open();
            });

            Nav.close();
          }
          else {
            Nav.update(settings);
          }
        };

        $('.actions').find('a').on('click', function(e) {
          e.preventDefault();

          var $this = $(this).addClass('active');
          var $siblings = $this.parent().siblings().children('a').removeClass('active');
          var settings = eval('(' + $this.data('demo') + ')');

          update(settings);
        });

        $('.actions').find('input').on('change', function() {
          var $this = $(this);
          var settings = eval('(' + $this.data('demo') + ')');

          if ($this.is(':checked')) {
            update(settings);
          }
          else {
            var removeData = {};
            $.each(settings, function(index, value) {
              removeData[index] = false;
            });

            update(removeData);
          }
        });
      })(jQuery);
    </script>






</body>

</html>
