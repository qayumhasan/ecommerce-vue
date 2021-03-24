@php
$logo=DB::table('logos')->first();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="{{ asset('public/adminpanel/assets/css/bootstrap.min.css') }}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{ asset('public/adminpanel/assets/css/all.min.css') }}">
    <!-- metis menu -->
    <link rel="stylesheet" href="{{ asset('public/adminpanel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminpanel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css') }}">
    <!-- datable -->
    <link href="{{asset('public/adminpanel')}}/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css">

    <!-- tag -->
    <link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/multi_select_Suggestags/css/amsify.suggestags.css">
    <!-- Amsify Plugin -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- select -->
    <link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/select2/css/select2.min.css">
    <!-- tag -->
    <link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css">
    <!--Custom CSS-->
    <link href="{{asset('public/adminpanel')}}/assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/adminpanel/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Styles -->
    {{-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> --}}
</head>

<body id="page-top">


    @guest
    @else

    <div class="wrapper">
        <!-- header area -->
        <header class="header_area">
            <!-- logo -->
            <div class="sidebar_logo">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset($logo->front_logo) }}" alt="" class="img-fluid logo1">
                    <img src="{{ asset($logo->favicon) }}" alt="" class="img-fluid logo2">
                </a>
            </div>
            <div class="sidebar_btn">
                <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
            </div>
            <ul class="header_menu">
                <li><a href="#" class="search_btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></a>
                    <div class="modal fade search_box" id="myModal">
                        <button type="button" class="close m-2 text-white float-right" data-dismiss="modal">&times;</button>
                        <form action="#" class="modal-dialog modal-lg">

                            <div class="modal-content bg-transparent">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input class="form-control bg-transparent text-white form-control-lg" type="text" placeholder="Search...">
                                    <button class="btn btn-lg submit-btn" type="submit">Search</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </li>
                <!-- <li><a href="http://localhost/phpmyadmin/" target="_blank">DB</a></li> -->
                <li><a href="{{url('/')}}" target="_blank">Live Project</a></li>
                @php
                  $totalmessage=App\Contract::where('is_seen',0)->count();
                @endphp
                <li><a data-toggle="dropdown" href="#"><i class="far fa-envelope"></i><span>{{$totalmessage}}</span></a>
                    <div class="dropdown_wrapper messages_item dropdown-menu dropdown-menu-right">
                        <div class="dropdown_header">
                            <p>you have {{$totalmessage}} messages</p>
                        </div>
                        <ul class="dropdown_body nice_scroll scrollbar">
                          @php
                            $totalmessagelist=App\Contract::where('is_seen',0)->get();
                            $date=Carbon\Carbon::now();

                          @endphp
                          @foreach($totalmessagelist as $message)
                            <li>
                                <a href="{{route('admin.subscriber.mail.details',$message->id)}}">
                                    <div class="img-part">
                                        <img src="{{asset('public/adminpanel/')}}/assets/images/user1.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="text-part">
                                        <h6>{{$message->visitor_name}} <span><i class="far fa-clock"></i>@if($date==$message->created_at)today @else  @endif</span></h6>
                                        <p>{{Str::limit($message->visitor_message,25)}}</p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="dropdown_footer">
                            <a href="{{ route('admin.subscriber.send.section') }}">See All Messages</a>
                        </div>
                    </div>
                </li>
                @php
                  $pending_order=App\OrderFinal::where('dalevary',0)->count();
                @endphp
                <li><a href="#" data-toggle="dropdown"><i class="far fa-bell"></i><span>{{$pending_order}}</span></a>
                    <div class="dropdown_wrapper notification_item dropdown-menu dropdown-menu-right">

                        <div class="dropdown_header">
                          @if($pending_order)
                            <p>You have {{$pending_order}} Pending Order</p>
                          @else
                            <p>You have 0 Pending Order</p>
                          @endif
                        </div>
                        <ul class="dropdown_body scrollbar nice_scroll">
                          @php
                            $allpendingorder=App\OrderFinal::where('dalevary',0)->orderBy('id','DESC')->get();
                          @endphp
                          @foreach($allpendingorder as $key => $val)
                            <li>
                                <a href="{{url('admin/product/order/invoice/'.$val->id)}}">
                                    <div class="img-part">
                                        <span class="">{{++$key}}</span>
                                    </div>
                                    <div class="text-part">
                                        <p>#{{$val->invoice_id}}</p>
                                    </div>
                                </a>
                            </li>
                          @endforeach

                        </ul>
                        <div class="dropdown_footer">
                            <a href="{{route('admin.productorder')}}">view All</a>
                        </div>
                    </div>
                </li>
                <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                    <div class="user_item dropdown-menu dropdown-menu-right">
                        <div class="admin">
                            @if(Auth::user()->avatar == NULL)
                            <a href="#" class="user_link"><img src="{{ asset('public/admin/assets/images/admin.jpg') }}" alt=""></a>
                            @else
                            @php
                              $image=Auth::user()->avatar;
                            @endphp
                            <a href="" class="user_link"><img src="{{asset('public/uploads/user/'.auth::user()->avatar)}}" alt=""></a>
                            @endif

                        </div>
                        <ul>
                            <li><a href="{{ route('admin.profile') }}"><span><i class="fas fa-user"></i></span> User Profile</a> </li>
                            <li><a href="{{ route('admin.edit.profile') }}"><span><i class="fas fa-cogs"></i></span> Settings</a> </li>
                            <li><a href="{{ route('admin.password.change') }}"><span><i class="fas fa-cogs"></i></span> Password Change</a> </li>
                            <!-- <li><a href="{{ route('admin.lock.screen') }}"><span><i class="fas fa-cogs"></i></span> Lock Screen</a> </li> -->
                            <li> <a href="{{ route('admin.logout') }}"> <span><i class="fas fa-unlock-alt"></i></span> Logout </a> </li>
                        </ul>
                    </div>
                </li>
                <li><a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
            </ul>
        </header><!-- / header area -->
        <!-- sidebar area -->
        <aside class="sidebar-wrapper ">
            <nav class="sidebar-nav">
                <ul class="metismenu" id="menu1">
                    <li class="single-nav-wrapper">
                        <a href="{{ route('admin.dashboard') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-home"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    @if(Auth::user()->blog==1)
                    <!-- blog menu start from here -->
                    <li class="single-nav-wrapper">
                            <a class="has-arrow menu-item" href="#" aria-expanded="false">
                                <span class="left-icon"><i class="fa fa-copy"></i></span>
                                <span class="menu-text">Posts</span>
                            </a>
                            <ul class="dashboard-menu">
                            <li><a href="{{ route('admin.blog.all') }}">All Posts</a></li>
                            <li><a href="{{ route('admin.blog.add') }}">Add Posts</a></li>
                            <li><a href="{{ route('admin.blog.category') }}">Add PostCategory</a></li>


                            </ul>
                        </li>
                    @else
                    @endif
                    <li class="single-nav-wrapper">
                            <a class="has-arrow menu-item" href="#" aria-expanded="false">
                                <span class="left-icon"><i class="fas fa-map-marker-alt"></i></span>
                                <span class="menu-text">Location</span>
                            </a>
                            <ul class="dashboard-menu">
                            <li><a href="#">All Location</a></li>
                            <li><a href="#">All Area</a></li>

                            </ul>
                        </li>
                    @if(Auth::user()->category==1)
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-copyright"></i></span>
                            <span class="menu-text">Categories</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="{{route('admin.category.all')}}">All Categories</a></li>
                            <li><a href="{{route('admin.subcategory.all')}}">All SubCategories</a></li>
                            <!-- <li><a href="{{route('admin.resubcategory.all')}}">All ReSubCategory</a></li> -->
                        </ul>
                    </li>
                    @else
                    @endif
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-store"></i></span>
                            <span class="menu-text">Shops</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="#">Add shops</a></li>
                            <li><a href="#">All Shop</a></li>
                            <!-- <li><a href="{{route('admin.resubcategory.all')}}">All ReSubCategory</a></li> -->
                        </ul>
                    </li>


                    @if(Auth::user()->product==1)
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-cart-plus"></i></span>
                            <span class="menu-text">Product</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="{{route('admin.product.add')}}">Add Product</a></li>
                            <li><a href="{{route('admin.product.all')}}">All Product</a></li>
                            <!-- <li><a href="{{route('admin.customar.return.product')}}">Return Product</a></li>
                            <li><a href="{{route('admin.approved.return.product')}}">Approved Return Product</a></li> -->
                        </ul>
                    </li>
                    @else
                    @endif
                    <li class="single-nav-wrapper">
                        @php
                        $allo=App\OrderFinal::where('dalevary',0)->count();
                        $pending=App\OrderPlace::where('delevary',1)->count();
                        @endphp
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-luggage-cart"></i></span>
                            <span class="menu-text">Order @if($allo > 0)<span class="badge badge-secondary">New</span> @else @endif</span>
                        </a>
                        <ul class="dashboard-menu">
                             <li><a href="{{url('admin/product/allorder')}}">All Orders <span class="badge badge-light">{{$allo}}</span></a></li>

                          @if(Auth::user()->process_order==1)
                            @php
                              $onprocess=App\OrderFinal::where('dalevary',1)->count();
                            @endphp
                            <li><a href="{{route('admin.productprocess')}}">Processing Orders <span class="badge badge-light">{{$onprocess}}</span></a></li>
                          @else
                          @endif
                          @if(Auth::user()->on_delevery==1)
                            @php
                            $ondevelery=App\OrderFinal::where('dalevary',2)->count();
                            @endphp
                            <li><a href="{{route('admin.ondevelery')}}">On Delevery Orders <span class="badge badge-light">{{$ondevelery}}</span></a></li>
                          @else
                          @endif
                            <li><a href="{{route('admin.complateorder')}}">Compleate Orders</a></li>
                          <!-- @if(Auth::user()->reject_order==1)
                            <li><a href="{{route('admin.rejecteorder')}}">Reject Orders<span class="badge badge-light"></span></a></li>
                          @else
                          @endif -->
                        </ul>
                    </li>
                    @if(Auth::user()->customer==1)
                    <li class="single-nav-wrapper">
                        <a href="{{route('admin.custommer.all')}}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-user-tie"></i></span>
                            <span class="menu-text">Customer</span>
                        </a>
                    </li>
                    @else
                    @endif
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-gift"></i></span>
                            <span class="menu-text">Offers</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="{{route('admin.cupon.all')}}">Cupon</a></li>
                            <li><a href="{{ route('admin.flash.deal.index') }}">Flash Deal</a></li>
                            <!-- <li><a href="{{route('admin.customar.return.product')}}">Return Product</a></li>
                            <li><a href="{{route('admin.approved.return.product')}}">Approved Return Product</a></li> -->
                        </ul>
                    </li>
                    <li class="single-nav-wrapper">
                        <a href="{{route('admin.page.all')}}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-book-open"></i></span>
                            <span class="menu-text">Pages</span>
                        </a>
                    </li>
                    @if(Auth::user()->user==1)
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-users"></i></span>
                            <span class="menu-text">User</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="{{route('admin.user.add')}}">Add User</a></li>
                            <li><a href="{{route('admin.user.all')}}">All User</a></li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->reports==1)
                    <li class="single-nav-wrapper">
                            <a class="has-arrow menu-item" href="#" aria-expanded="false">
                              <span class="left-icon"><i class="fas fa-file"></i></span>
                                <span class="menu-text">Reports</span>
                            </a>
                            <ul class="dashboard-menu">
                                <li><a href="{{ route('admin.product.stock') }}">Product Stock</a></li>
                                <li><a href="{{ route('admin.bestsell')}}">Best Sell Product</a></li>
                                <!-- <li><a href="{{route('admin.product.wishlistpro')}}">Product Wish Report</a></li> -->

                            </ul>
                      </li>
                      @else
                      @endif
                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                              <span class="left-icon"><i class="fab fa-buysellads"></i></span>
                              <span class="menu-text">Banner</span>
                          </a>
                          <ul class="dashboard-menu">
                              <li><a href="{{route('admin.banner.all')}}">Slider</a></li>
                              <li><a href="{{route('admin.sitebanner.all')}}">Banner</a></li>
                          </ul>
                      </li>
                    @if(Auth::user()->messaging==1)
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-envelope-open-text"></i></span>
                            <span class="menu-text">Messaging</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="{{ route('admin.subscriber.send.section') }}">Newsletter</a></li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->frontend_setup==1)
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-desktop"></i></span>
                            <span class="menu-text">Forntend Setup</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="{{route('admin.faq.all')}}">Faq</a></li>
                            <!-- <li><a href="{{route('admin.themecolor.all')}}">Theme Color</a></li> -->
                            <li><a href="{{ route('theme.selector.show') }}">Theme Option</a></li>
                        </ul>
                    </li>
                    @else
                    @endif

                <!--     @if(Auth::user()->courier_setting==1)
                    <li class="single-nav-wrapper">
                            <a class="has-arrow menu-item" href="#" aria-expanded="false">
                                <span class="left-icon"><i class="fas fa-truck"></i></span>
                                <span class="menu-text">Courier Settings</span>
                            </a>
                            <ul class="dashboard-menu">
                            <li><a href="{{ route('courier.sync.view') }}">Add Courier</a></li>
                            <li><a href="{{ route('courier.all') }}">All Courier</a></li>
                            <li><a href="{{ route('courier.index') }}">Courier Info</a></li>
                            </ul>
                        </li>
                      @else
                      @endif -->

                    @if(Auth::user()->settings==1)
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-cogs"></i></span>
                            <span class="menu-text">Settings</span>
                        </a>
                        <ul class="dashboard-menu">
                             <li><a href="{{ route('admin.seo.setting') }}">Gerneral Setting</a></li>
                             <li><a href="{{ route('admin.message.get') }}">Payment Setting</a></li>
                             <li><a href="{{ route('admin.payment.gateway') }}">SMS Setting</a></li>
                             <li><a href="{{ route('admin.activation') }}">Activation</a></li>

                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->extra==1)
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-external-link-alt"></i></span>
                            <span class="menu-text">Extra</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="{{route('admin.brand.all')}}">All Brand</a></li>
                            <li><a href="{{route('admin.color.all')}}">All Color</a></li>
                            <li><a href="{{route('admin.measurement.all')}}">All Measurement</a></li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->trash==1)
                    <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-trash-alt"></i></span>
                            <span class="menu-text">Trash</span>
                        </a>
                        <ul class="dashboard-menu">
                            <li><a href="{{route('admin.trash.product')}}">Product</a></li>

                        </ul>
                    </li>
                    @else
                    @endif
                </ul>
            </nav>
        </aside><!-- /sidebar Area-->
        @endguest

        @yield('admin_content')

    </div>











    <!-- jquery -->
    <script src="{{ asset('public/adminpanel/assets/js/jquery.min.js') }}"></script>
    <!-- popper Min Js -->
    <script src="{{ asset('public/adminpanel/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('public/adminpanel/assets/js/bootstrap.min.js') }}"></script>
    <!-- Fontawesome-->
    <script src="{{ asset('public/adminpanel/assets/js/all.min.js') }}"></script>
    <!-- metis menu -->
    <script src="{{ asset('public/adminpanel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js') }}"></script>
    <script src="{{ asset('public/adminpanel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js') }}"></script>
    <!-- nice scroll bar -->
    <script src="{{ asset('public/adminpanel/assets/plugins/scrollbar/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('public/adminpanel/assets/plugins/scrollbar/scroll.active.js') }}"></script>
    <!-- counter -->
    <script src="{{ asset('public/adminpanel/assets/plugins/counter/js/counter.js') }}"></script>
    <!-- chart -->
   {{-- <script src="{{ asset('public/adminpanel/assets/plugins/chartjs-bar-chart/Chart.min.js') }}"></script>

        <script src="{{ asset('public/adminpanel/assets/plugins/chartjs-bar-chart/chart.js') }}"></script>  --}}
    <!-- pie chart -->
    <script src="{{ asset('public/adminpanel/assets/plugins/pie_chart/chart.loader.js') }}"></script>
    {{-- <script src="{{ asset('public/adminpanel/assets/plugins/pie_chart/pie.active.js') }}"></script>  --}}

    <script>
    (function($){
'use strict'

$.fn.printElement = function(options){
  let settings = $.extend({
    title	: jQuery('title').text(),
    css		: 'extend',
    ecss	: null,
    lcss	: [],
    keepHide: [],
    wrapper : {
          wrapper: null,
          selector: null,
        }
  }, options);

  const element = $(this).clone();
  let html = document.createElement('html');

  let head = document.createElement('head');
  if(settings.title != null && settings.title != ''){
    head = $(head).append($(document.createElement('title')).text(settings.title));
  }
  else{
    head = $(head);
  }

  if(settings.css == 'extend' || settings.css == 'link'){
    $('link[rel=stylesheet]').each(function(index, linkcss){
      head = head.append($(document.createElement('link')).attr('href', $(linkcss).attr('href')).attr('rel', 'stylesheet').attr('media', 'print'));
    })
  }

  for(var i = 0; i < settings.lcss.length; i++){
    head = head.append($(document.createElement('link')).attr('href', settings.lcss[i]).attr('rel', 'stylesheet').attr('media', 'print'));
  }

  if(settings.css == 'extend' || settings.css == 'style'){
    head.append($(document.createElement('style')).append($('style').clone().html()));
  }

  if(settings.ecss != null){
    head.append($(document.createElement('style')).html(settings.ecss));
  }

  if (settings.wrapper.wrapper === null){
    var body = document.createElement('body');
    body = $(body).append(element);
  }
  else{
    var body = $(settings.wrapper.wrapper).clone();
    body.find(settings.wrapper.selector).append(element);
  }

  for(let i = 0; i < settings.keepHide.length; i++){
    $(body).find(settings.keepHide[i]).each(function(index, data){
      $(this).css('display', 'none');
    })
  }

  html = $(html).append(head).append(body);

  const fn_window = document.open('', settings.title, 'width='+$(document).width()+',height=' + $(document).width() + '');
  fn_window.document.write(html.clone().html());
  setTimeout(function(){fn_window.print();fn_window.close()}, 250);

  return $(this);
}
}(jQuery));


    </script>
    <script>
      $('.print').click(function(){
        $('.container').printElement({
        });
      })
    </script>

    <!-- <script src="{{asset('public/adminpanel')}}/assets/plugins/print/divjs.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/print/print.active.js"></script> -->

    <!-- <script src="{{asset('public/adminpanel')}}/assets/plugins/js/jquery.PrintArea.js"></script>

        <script>
           $(function () {
               $(".print").on('click', function () {
                   var mode = 'popup'; //popup
                   var close = mode == "popup";
                   var options = {
                       // mode: mode,
                       // popClose: close
                   };
                   $("div.printableArea").printArea(options);
               });
           });
         </script> -->
		<!-- basic-donut-chart -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>
    @php
      $total_complate_or=App\OrderPlace::where('delevary',3)->count();
      $totalcustommer=App\User::count();
      $total_pending_produc=App\OrderPlace::where('delevary',1)->count();
      $total_sell=App\OrderPlace::sum('total_quantity');
    @endphp
    <script>
    var dataset = [
        { name: 'Total order', percent: {{$total_complate_or}}},
        { name: 'Custommer', percent: {{$totalcustommer}} },
        { name: 'Pending order', percent: {{$total_pending_produc}} },
        { name: 'Total Sell', percent: {{$total_sell}} },

    ];

    var pie=d3.layout.pie()
            .value(function(d){return d.percent})
            .sort(null)
            .padAngle(.03);

    var w=300,h=400;

    var outerRadius=w/2;
    var innerRadius=100;

    var color = d3.scale.category10();

    var arc=d3.svg.arc()
            .outerRadius(outerRadius)
            .innerRadius(innerRadius);

    var svg=d3.select("#chart")
            .append("svg")
            .attr({
                width:w,
                height:h,
                class:'shadow'
            }).append('g')
            .attr({
                transform:'translate('+w/2+','+h/2+')'
            });
    var path=svg.selectAll('path')
            .data(pie(dataset))
            .enter()
            .append('path')
            .attr({
                d:arc,
                fill:function(d,i){
                    return color(d.data.name);
                }
            });

    path.transition()
            .duration(1000)
            .attrTween('d', function(d) {
                var interpolate = d3.interpolate({startAngle: 0, endAngle: 0}, d);
                return function(t) {
                    return arc(interpolate(t));
                };
            });


    var restOfTheData=function(){
        var text=svg.selectAll('text')
                .data(pie(dataset))
                .enter()
                .append("text")
                .transition()
                .duration(200)
                .attr("transform", function (d) {
                    return "translate(" + arc.centroid(d) + ")";
                })
                .attr("dy", ".4em")
                .attr("text-anchor", "middle")
                .text(function(d){
                    return d.data.percent+"%";
                })
                .style({
                    fill:'#fff',
                    'font-size':'10px'
                });

        var legendRectSize=20;
        var legendSpacing=7;
        var legendHeight=legendRectSize+legendSpacing;


        var legend=svg.selectAll('.legend')
                .data(color.domain())
                .enter()
                .append('g')
                .attr({
                    class:'legend',
                    transform:function(d,i){
                        //Just a calculation for x & y position
                        return 'translate(-35,' + ((i*legendHeight)-65) + ')';
                    }
                });
        legend.append('rect')
                .attr({
                    width:legendRectSize,
                    height:legendRectSize,
                    rx:20,
                    ry:20
                })
                .style({
                    fill:color,
                    stroke:color
                });

        legend.append('text')
                .attr({
                    x:30,
                    y:15
                })
                .text(function(d){
                    return d;
                }).style({
                    fill:'#929DAF',
                    'font-size':'14px'
                });
    };

    setTimeout(restOfTheData,1000);


    </script>
    <!-- data table js -->
    <!-- DataTable Js -->
      <script src="{{asset('public/adminpanel')}}/assets/js/main.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/datatables/dataTables.min.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/datatables/dataTables-active.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <script type="text/javascript" src="{{asset('public/adminpanel')}}/assets/plugins/multi_select_Suggestags/js/jquery.amsify.suggestags.js"></script>

    <script src="{{asset('public/adminpanel')}}/assets/plugins/spartan-multi-images/dist/js/spartan-multi-image-picker.js"></script>

    <!-- ckeditor Js -->
    <script src="{{asset('public/adminpanel')}}/assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/ckeditor/ckeditor-active.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/icheck/icheck.min.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/icheck/icheck-active.js"></script>
    {{-- TestJs --}}

    <!-- nice scroll bar -->
    {{-- <script src="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.min.js"></script> --}}
    <!-- Specific Page Scripts Put Here -->
    <!-- <script type="text/javascript" src="assets/plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js"></script> -->
    <script src="{{asset('public/adminpanel')}}/assets/plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js"></script>
    <script src="{{asset('public/adminpanel')}}/assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <!-- summernote -->
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js'></script> --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js'></script>
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.js'></script> --}}



    {{-- TestJs --}}
    <script>
        CKEDITOR.replace('editor2');
    </script>
    <script>
        CKEDITOR.replace('editor3');
    </script>
    <script>
        CKEDITOR.replace('aboutus');
    </script>
    <script>
        CKEDITOR.replace('our_mission');
    </script>
    <script>
        CKEDITOR.replace('our_vission');
    </script>

    <script src="{{asset('public/adminpanel')}}/assets/plugins/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>
    <!-- Main js -->
    <script src="{{ asset('public/adminpanel/assets/js/main.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>  -->
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
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
    <script type="text/javascript">
        $(function() {

            $('.select2').select2()

        });
    </script>

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
    <script>
        $('input[name="subcate_tag"]').amsifySuggestags({
            type: 'materialize'
        });

        $('input[name="cate_tag"]').amsifySuggestags({
            type: 'materialize',
            suggestions: ['Category', 'Ecommerce', 'Shirt', 'Pant', 'Product']
        });


        $('input[name="resubcate_tag"]').amsifySuggestags({
            type: 'materialize',
            suggestionsAction: {
                suggestions: ['Category', 'Ecommerce', 'Shirt', 'Pant', 'Product']
            }
        });
        $('input[name="meta_tag"]').amsifySuggestags({
            type: 'materialize',
        });
        $('.choice_tag').amsifySuggestags({
            type: 'materialize',

        });
    </script>



    <script>
        $(function() {

            $("#coba").spartanMultiImagePicker({
                fieldName: 'fileUpload[]',
                directUpload: {
                    status: true,
                    loaderIcon: '<i class="fas fa-sync fa-spin"></i>',
                    url: '../c.php',
                    additionalParam: {
                        name: 'My Name'
                    },
                    success: function(data, textStatus, jqXHR) {},
                    error: function(jqXHR, textStatus, errorThrown) {}
                }
            });
        });

        $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');

        $("#photos").spartanMultiImagePicker({
            fieldName: 'photos[]',
            maxCount: 4,
            rowHeight: '115px',
            groupClassName: 'col-lg-3 col-md-4 col-sm-4 col-xs-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });


        var i = 0;


        $(document).ready(function() {
            $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');


            $("#thumbnail_img").spartanMultiImagePicker({
                fieldName: 'thumbnail_img',
                maxCount: 1,
                rowHeight: '115px',
                groupClassName: 'col-lg-3 col-md-4 col-sm-4 col-xs-6',
                maxFileSize: '',
                dropFileLabel: "Drop Here",
                onExtensionErr: function(index, file) {
                    console.log(index, file, 'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr: function(index, file) {
                    console.log(index, file, 'file size too big');
                    alert('File size too big');
                }
            });


            $("#t_img").spartanMultiImagePicker({
                fieldName: 't_img',
                maxCount: 1,
                rowHeight: '200px',
                groupClassName: 'col-xl-2 col-lg-3 col-md-4 col-sm-4 col-xs-6',
                maxFileSize: '',
                dropFileLabel: "Drop Here",
                onExtensionErr: function(index, file) {
                    console.log(index, file, 'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr: function(index, file) {
                    console.log(index, file, 'file size too big');
                    alert('File size too big');
                }
            });
        });
    </script>



<!--  -->



</body>

</html>
