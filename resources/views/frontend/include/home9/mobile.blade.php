  <header class="header header--mobile organic" data-sticky="true">
        <div class="header__top">
            <div class="header__left">
                <p>Welcome to Martfury Online Shopping Store !</p>
            </div>
            <div class="header__right">
                <ul class="navigation__extra">
                    <li><a href="#">Sell on Martfury</a></li>
                    <li><a href="#">Tract your order</a></li>
                    <li>
                        <div class="ps-dropdown"><a href="#">BDT</a>
                            <ul class="ps-dropdown-menu">
                                <!-- <li><a href="#">BDT</a></li>
                                <li><a href="#">Euro</a></li> -->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="ps-dropdown language"><a href="#"><img src="{{asset('public/frontend')}}/img/flag/en.png" alt="">English</a>
                         
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navigation--mobile">
            <div class="navigation__left"><a class="ps-logo" href="{{url('/')}}"><img src="{{asset('/'.$logos->front_logo)}}" alt=""></a></div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-cart--mini"><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span onclick="mobilemenucartDataShow(this)"></span></a>
                        <!--<a class="header__extra" href="#" onclick="cartDataShow(this)"><i class="icon-bag2"></i><span><i id="mobilecartdatacount">0</i></span></a>-->
                        <div class="ps-cart__content" id="mobileaddtocartshow">
                         
                        

                        </div>
                    </div>
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><a href="{{route('customar.login.form')}}"><i class="icon-user"></i></a></div>
                        <div class="ps-block__right"><a href="{{route('customar.login.form')}}">Login</a><a href="{{route('customar.login.form')}}">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-search--mobile">
            <form class="ps-form--search-mobile" action="{{url('mobile/product/search')}}" method="get">
                @csrf
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="Search something..." name="search">
                    <button type="submit"><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
    </header>
    <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
            <h3>Shopping Cart</h3>
        </div>
        <div class="navigation__content" id="mobilemenuaddtocartshow">
            
        </div>
    </div>
    <div class="ps-panel--sidebar" id="navigation-mobile">
        <div class="ps-panel__header">
            <h3>Categories</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                <li><a href="{{route('hot.deal.products')}}">Hot Promotions</a>
                </li>
                     @foreach($allcategory as $category)
                    @php
                        $check = App\SubCategory::where('cate_id',$category->id)->first();
                    @endphp
                    @if($check)
                         <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="{{url('product/page/'.$category->cate_slug)}}">{{$category->cate_name}}</a><span class="sub-toggle"></span>
                            @php
                                $allsub=App\SubCategory::where('cate_id',$category->id)->where('is_deleted',0)->where('subcate_status',1)->get();
                            @endphp
                            
                            <div class="mega-menu">
                            @foreach($allsub as $subcate)  
                                <div class="mega-menu__column">
                                    @php
                                        $resubcheck=App\ReSubCategory::where('is_deleted',0)->where('subcate_id',$subcate->id)->first();
                                    @endphp
                                    @if($resubcheck)
                                    <h4>{{ $subcate->subcate_name}}<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                         @php
                                            $resubcate = App\ReSubCategory::where('is_deleted',0)->where('subcate_id',$subcate->id)->get();
                                                @endphp
                                         @foreach($resubcate as $rcate)
                                        <li class="current-menu-item "><a href="{{url('resubacetegory/'.$category->cate_slug.'/'.$subcate-> subcate_slug.'/'.$rcate->resubcate_slug)}}">{{$rcate->resubcate_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                     <h4>{{ $subcate->subcate_name}}</h4>
                                    @endif
                                </div>
                            @endforeach
                            </div>
                            
                        </li>
                    @else
                        <li class="current-menu-item"><a href="{{url('product/page/'.$category->cate_slug)}}">{{$category->cate_name}}</a></li>
                    @endif
                
                @endforeach
             
            </ul>
        </div>
    </div>
    <div class="navigation--list">
    <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span onclick="mobilemenucartDataShow(this)"> Cart</span></a></div>
    </div>
    <div class="ps-panel--sidebar" id="search-sidebar">
        <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="index.html" method="get">
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="Search something..." name="msearchp" id="msearchp">
                    <button><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
        <div class="navigation__content">
            <div class="search_product_ajax" id="search_product_ajax">
                
            </div>
        </div>
    </div>
    <div class="ps-panel--sidebar" id="menu-mobile">
        <div class="ps-panel__header">
            <h3>Menu</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                 <li class="current-menu-item"><a href="{{ route('hot.deal.products') }}">Flash Deal</a>
                </li>
                <li><a href="{{url('/shop')}}">Shop</a></li>
                <li><a href="#">Gift Card</a></li>
                <!--<li class="menu-item-has-children has-mega-menu"><a href="">Pages</a><span class="sub-toggle"></span>-->
                <!--    <div class="mega-menu">-->
                <!--        <div class="mega-menu__column">-->
                <!--            <h4>Basic Page<span class="sub-toggle"></span></h4>-->
                <!--            <ul class="mega-menu__list">-->
                <!--             <li><a href="{{url('/faq')}}">Faqs</a></li>-->
                <!--            <li><a href="{{url('/warranty')}}">warranty</a></li>-->
                <!--            <li><a href="{{url('/tracking/page')}}">Order Traking</a></li>-->
                <!--            </ul>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</li>-->
            </ul>
        </div>
    </div>

    <script>
        function cartDataShow(el){
              

                    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('get.mobile.cart.data') }}",
                
                success: function(data) {
                    $('#mobileaddtocartshow').html(data);
                    
                }
            });
        }
    </script>

<script>
        function mobilemenucartDataShow(el){
              
            
                    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('get.menu.mobile.cart.data') }}",
                
                success: function(data) {
                    $('#mobilemenuaddtocartshow').html(data);
                    
                }
            });
        }
    </script>
<!-- <script>
    $(document).ready(function(){
      
        $('#msearchp').on('keyup', function(){
            var product_name = $(this).val();
            //alert(product_name);
            $.ajax({
                url:"search/mobile/product/ajax/theme9"+"/"+product_name,
                type:'get',
                success:function(data){
                   $('#search_product_ajax').empty();
                    $('#search_product_ajax').html(data);
                }
            });
        });
    });
</script> -->