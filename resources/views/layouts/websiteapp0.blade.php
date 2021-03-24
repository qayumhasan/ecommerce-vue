<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="{{$seo->meta_author}}">
    <meta name="keywords" content="{{$seo->meta_key}}">
    <meta name="description" content="{{$seo->meta_description}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{$logos->favicon}}" type="image/gif" sizes="16x16">
    
    <title>@yield('title',$seo->meta_title)</title>
    @yield('meta')

    @if($themecheck->id==1)
         @include('frontend.include.home1.header1css')
    @elseif($themecheck->id==2)
        @include('frontend.include.home2.header2css')
    @elseif($themecheck->id==3)
         @include('frontend.include.home3.header3css')
    @elseif($themecheck->id==4)
       @include('frontend.include.home4.css')
    @elseif($themecheck->id==5)
       @include('frontend.include.home5.css')
    @elseif($themecheck->id==6)
    @include('frontend.include.home6.css')
     @elseif($themecheck->id==7)
    @include('frontend.include.home7.css')
     @elseif($themecheck->id==8)
    @include('frontend.include.home8.css')
    @elseif($themecheck->id==9)
    @include('frontend.include.home9.css')
     @elseif($themecheck->id==10)
    @include('frontend.include.home10.css')
      @elseif($themecheck->id==11)
    @include('frontend.include.home11.css')
    @endif
<link rel="stylesheet" href="{{asset('public/frontend')}}/css/izitost.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--  <script src="{{asset('public/frontend/js/jquery-1.12.4.min.js')}}"></script> -->
 <script src="{{asset('public/frontend/js/lazy_loader.js')}}"></script>
<!-- <script src="{{asset('public/frontend/js/main.js')}}"></script> -->




</head>

<body>
    @php
        $color=App\ThemeColor::where('is_deleted',0)->where('status',1)->first();
    @endphp
@if($color)
<style>

.main_box {
    background-color: {{ $color->color_code }};

}
.pagination li > a:hover {

    background-color: {{ $color->hover_code }};
}
.page-item.active .page-link {

    background-color: {{ $color->color_code }};
    border-color: {{ $color->color_code }};

}
.header--mobile.organic .ps-search--mobile {
    background-color: {{ $color->color_code }};
}
.ps-block--container-hightlight .ps-section__header {

    background-color:{{ $color->color_code }};
}

.header .header__top {
    background-color: {{ $color->color_code }};
}
.navigation {
    background-color: {{ $color->color_code }};
}
.sub-menu > li > a:hover {
    color: {{ $color->hover_code }};
}
.mega-menu .mega-menu__list li a:hover {
    color: {{ $color->hover_code }};
}
.menu--dropdown > li:hover {
    background-color: {{ $color->hover_code }};
    color:white;
}
.ps-product .ps-product__progress-bar .ps-progress__value > span {

    background-color: {{ $color->color_code }};

}
.ps-btn, button.ps-btn {
    background-color: {{ $color->color_code }};
}
.ps-btn:hover, .ps-btn:active, button.ps-btn:hover, button.ps-btn:active {
    background-color: {{ $color->color_code }};
    color: #fff;
}
.widget_contact-us .widget_content h3 {
    color: {{ $color->color_code }};
}
.ps-product .ps-product__title:hover {
    color: {{ $color->hover_code }};
}
.noUi-connect {
    background-color: {{ $color->color_code }};
}
.noUi-handle{
    border: 3px solid {{ $color->color_code }};
}
.ps-block--site-features .ps-block__left i {

    color: {{ $color->color_code }};
}
.ps-shopping-cart .ps-section__footer .ps-btn--outline:hover {
    background-color: {{ $color->hover_code }};
    border-color: {{ $color->hover_code }};
    color:{{ $color->color_code }};

}
.ps-shopping-cart .ps-section__cart-actions .ps-btn--outline:hover {
    background-color: {{$color->hover_code}};
    border-color: {{$color->hover_code}};
    color:{{$color->color_code}};
}
.ps-block--payment-method .ps-tab-list li.active .ps-btn {
    background-color: {{$color->color_code}};
    color: #fff;
}
.ps-block--payment-method .ps-tab-list li .ps-btn:hover {
    background-color: {{$color->hover_code}};
}
.header--mobile {

    background-color: {{$color->color_code}};

}
.header--mobile.header--sticky .navigation--mobile {

    background-color: {{$color->color_code}};
}
.ps-panel--sidebar .ps-panel__header {

    background-color: {{$color->color_code}};
}
.navigation--list .navigation__item.active span {
    color: {{$color->color_code}};
}
.navigation--list .navigation__item.active i {
    color: {{$color->color_code}};
}
</style>
@endif


    <!-- main header1 -->
    @if($themecheck->id==1)
     @include('frontend.include.home1.headertop1')
    @elseif($themecheck->id==2)
        @include('frontend.include.home2.headertop2')
    @elseif($themecheck->id==3)
         @include('frontend.include.home3.headertop3')
    @elseif($themecheck->id==4)
        @include('frontend.include.home4.headertop')
    @elseif($themecheck->id==5)
        @include('frontend.include.home5.headertop')
    @elseif($themecheck->id==6)
    @include('frontend.include.home6.headertop')
    @elseif($themecheck->id==7)
    @include('frontend.include.home7.headertop')
     @elseif($themecheck->id==8)
    @include('frontend.include.home8.headertop')
      @elseif($themecheck->id==9)
    @include('frontend.include.home9.headertop')
    @elseif($themecheck->id==10)
    @include('frontend.include.home10.headertop')
    @elseif($themecheck->id==11)
    @include('frontend.include.home11.headertop')
    @endif
    <!-- main header1 end -->

    <!-- mobile -->
    @if($themecheck->id==1)
    @include('frontend.include.home1.mobile_h1')
     @elseif($themecheck->id==2)
         @include('frontend.include.home2.mobile_h2')
    @elseif($themecheck->id==3)
        @include('frontend.include.home3.mobile_h3')
    @elseif($themecheck->id==4)
       @include('frontend.include.home4.mobile')
    @elseif($themecheck->id==5)
       @include('frontend.include.home5.mobile')
    @elseif($themecheck->id==6)
   @include('frontend.include.home6.mobile')
    @elseif($themecheck->id==7)
   @include('frontend.include.home7.mobile')
   @elseif($themecheck->id==8)
   @include('frontend.include.home8.mobile')
    @elseif($themecheck->id==9)
   @include('frontend.include.home9.mobile')
    @elseif($themecheck->id==10)
   @include('frontend.include.home10.mobile')
   @elseif($themecheck->id==11)
   @include('frontend.include.home11.mobile')
    @endif
    <!-- mobile end -->

    <!-- maincntent -->

    @yield('content')



    <!-- maincontentend -->

    <!-- add footerh1 -->
    @if($themecheck->id==1)
        @include('frontend.include.home1.footerh1')
    @elseif($themecheck->id==2)
        @include('frontend.include.home2.footerh2')
    @elseif($themecheck->id==3)
         @include('frontend.include.home3.footerh3')
    @elseif($themecheck->id==4)
        @include('frontend.include.home4.footer')
    @elseif($themecheck->id==5)
        @include('frontend.include.home5.footer')
     @elseif($themecheck->id==6)
        @include('frontend.include.home6.footer')
    @elseif($themecheck->id==7)
    @include('frontend.include.home7.footer')
    @elseif($themecheck->id==8)
    @include('frontend.include.home8.footer')
        @elseif($themecheck->id==9)
    @include('frontend.include.home9.footer')
     @elseif($themecheck->id==10)
    @include('frontend.include.home10.footer')
     @elseif($themecheck->id==11)
    @include('frontend.include.home11.footer')
    @endif
     <!-- add footerh1 end-->

    <!-- add version1 js -->
    @if($themecheck->id==1)
        @include('frontend.include.home1.header1js')
    @elseif($themecheck->id==2)
        @include('frontend.include.home2.header2js')
    @elseif($themecheck->id==3)
        @include('frontend.include.home3.header3js')
    @elseif($themecheck->id==4)
        @include('frontend.include.home4.js')
    @elseif($themecheck->id==5)
        @include('frontend.include.home5.js')
    @elseif($themecheck->id==6)
        @include('frontend.include.home6.js')
    @elseif($themecheck->id==7)
        @include('frontend.include.home7.js')
    @elseif($themecheck->id==8)
        @include('frontend.include.home8.js')
    @elseif($themecheck->id==9)
        @include('frontend.include.home9.js')
    @elseif($themecheck->id==10)
        @include('frontend.include.home10.js')
    @elseif($themecheck->id==11)
        @include('frontend.include.home11.js')
    @endif
    <!-- add version1 js -->


<div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="false">
                            <div class="ps-product__images" data-arrow="true" >

                                <div class="item" id="img">

                                </div>

                            </div>
                        </div>
                        <div class="ps-product__info">
                            <div class="name"></div>
                             <input type="hidden" name="id" id="id">
                            <div class="ps-product__meta">
                                <!-- <p>Brand:<a href="">Sony</a></p> -->
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>(1 review)</span>
                                </div>
                            </div>
                            <div class="price">

                            </div>

                            <div class="ps-product__desc" id="des">

                            </div>
                            <form id="option-choice-form">
                                        <!-- product information -->
                                        <input type="hidden" id="product_total" name="product_price" value="">
                                        <input type="hidden" id="product_id" name="product_id" value="">
                                        <input type="hidden"  name="quantity" value="1">

                            <div class="ps-product__shopping"><button type="button" class="ps-btn ps-btn--black" href="#" id="addtocartmodal">Add to cart</button><a class="ps-btn" href="{{route('product.cart.data')}}">Buy Now</a>

                                <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                            </div>
                             </form>
                        </div>
                    </div>
                </article>
            </div>
        </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
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

<script>
    $(document).ready(function(){

        $('#input-search').on('keyup', function(){
            var product_name = $(this).val();
            var category_id = $('#category_id').val();


            $.ajax({
                url:"{{URL::to('search/product/by/category')}}"+"/"+category_id+"/"+product_name,
                type:'get',
                success:function(data){
                   $('#search-result').empty();
                    $('#search-result').html(data);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){

        $('#msearchp').on('keyup', function(){

            var product_name = $(this).val();
            $.ajax({
                url:"{{url('/search/mobile/product/ajax/')}}"+"/"+product_name,
                type:'get',
                success:function(data){
                   $('#search_product_ajax').empty();
                    $('#search_product_ajax').html(data);
                }
            });
        });
    });
</script>

<script type="text/javascript">

      $(document).ready(function() {
         $('.quickview').on('click', function(){
             var p_id = $(this).data('id');
             //alert(p_id);
             if(p_id) {
                 $.ajax({
                     url: "{{ url('/get/product/quickview/') }}/"+p_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                            document.getElementById('product_id').value = data.id;
                            document.getElementById('product_total').value = data.product_price;

                            $(".name").html("<h1>"+ data.product_name +"</h1>");
                            $("#des").html("<h1>"+ data.product_description +"</h1>");
                            $(".price").html("<h4 class='ps-product__price'>"+ data.product_price +"</h4>");
                            $("#id").val(data.id);
                            //$("#descrip").val(data.subcate_slug);
                            // $("#subcate_tag_edit").val(data.subcate_tag);
                            // $("#cate_id").val(data.cate_id).select;
                             $("#img").html("<img src={{asset('')}}public/uploads/products/thumbnail/"+data.thumbnail_img +"/>");
                            // $("#store-img").append("<input type='hidden' name='old_image' value='"+data.subcate_image+"' />");
                            // $("#icon").html("<img src={{asset('')}}public/uploads/subcategory/"+data.subcate_icon+" height='70px'/>");
                            // $("#store-icon").append("<input type='hidden' name='old_icon' value='"+data.subcate_icon+"' />");

                        }
                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>

<script>
    window.onload = function(){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/show/total/price') }}",

                success: function(data) {
                    var totalPrice = data.total;
                    var totalPrice = totalPrice.toFixed(2);
                    document.getElementById('cartdatacount').innerHTML = data.quantity;
                    document.getElementById('product_price').innerHTML = totalPrice;

                }
            });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.mywishlist').on('click', function () {
            var id = $(this).data('id');
            //alert(id);
            if (id) {

                $.ajax({
                    url: "{{ url('/product/add/wishlist/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    processData: false,
                    success: function (data) {
                        //console.log(data);
                         // $('#countwish').html();
                        if (data.check) {
                              iziToast.error({
                                    message: 'This Product All ready Add wishlist',
                                    'position':'topRight'
                                });

                        } else {
                                iziToast.success({
                                    message: 'Product Add to wishlist ',
                                    'position':'topRight'
                                });
                        }
                    }
                });
            } else {
                alert('danger');
            }
        });
        //
        $('.mywishlist').on('click', function () {
            var id = $(this).data('id');
            //alert(id);
            if (id) {

                $.ajax({
                    url: "{{ url('/product/add/wishlist/count') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    processData: false,
                    success: function (data) {
                        //console.log(data);
                        document.getElementById('countwish').innerHTML = data.data;

                          //$('#countwish').html(data);
                    }
                });
            } else {
                alert('danger');
            }
        });



    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.compare').on('click', function () {
            var com_id = $(this).data('id');
           //alert(com_id);
            if (com_id) {
                $.ajax({
                    url: "{{ url('/product/add/compare/') }}/" + com_id,
                    type: "GET",
                    dataType: "json",
                    processData: false,
                    success: function (data) {

                        if (data.checkip) {
                              iziToast.error({
                                    message: 'This Product All ready Add compare',
                                    'position':'topRight'
                                });
                              document.getElementById('countcompare').innerHTML = data.comcount;

                        } else {
                                iziToast.success({
                                    message: 'Product Add to compare ',
                                    'position':'topRight'
                                });
                                document.getElementById('countcompare').innerHTML = data.comcount;
                        }

                    }
                });
            } else {
                alert('danger');
            }
        });
        //
        $('.compare').on('click', function () {
            var id = $(this).data('id');
            //alert(id);
            if (id) {

                $.ajax({
                    url: "{{ url('/product/add/compare/comcount/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    processData: false,
                    success: function (data) {

                        document.getElementById('coutncompa').innerHTML = data.data;


                    }
                });
            } else {
                alert('danger');
            }
        });



    });
</script>




<script>
    window.onmouseup = function(){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/show/total/price') }}",

                success: function(data) {
                    var totalPrice = data.total;
                    var totalPrice = totalPrice.toFixed(2);
                    document.getElementById('cartdatacount').innerHTML = data.quantity;
                    document.getElementById('mobilecartdatacount').innerHTML = data.quantity;


                }
            });
    }
</script>

<script>
    window.onload = function(){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/show/total/price') }}",

                success: function(data) {
                    var totalPrice = data.total;
                    var totalPrice = totalPrice.toFixed(2);
                    document.getElementById('cartdatacount').innerHTML = data.quantity;
                    document.getElementById('mobilecartdatacount').innerHTML = data.quantity;


                }
            });
    }
</script>

<script>
    $(document).ready( function () {
    $('#return_product').DataTable({
        "searching": false,
        "ordering": false,
        "info":     false,
        "bInfo": false,
    });
} );
</script>


<!-- compare -->


</body>



</html>
