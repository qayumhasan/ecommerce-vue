@extends('layouts.websiteapp')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="osahan-carousel-two  border-top py-4">
  <div class="container">
     <div class="row">
        <div class="col-lg-3">
           <div class="category-list-sidebar">
              <div class="category-list-sidebar-header">
                 <button class="btn btn-link badge-success" type="button" data-toggle="collapse"
                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    All Categories <i class="mdi mdi-menu" aria-hidden="true"></i>
                 </button>
              </div>
              <div class="collapse show" id="collapseExample">
                 <div class="category-list-sidebar-body">
                   @foreach($allcategory as $cate)
                    <div class="item">
                       <div class="sidebar-category-item">
                          <a href="{{route('website.category',$cate->cate_slug)}}">
                             <img class="img-fluid" src="{{asset('public/uploads/category/'.$cate->cate_image)}}" alt="">
                             <h6>{{$cate->cate_name}}</h6>
                             <p>{{  $procount=App\Product::where('status',1)->where('cate_id', $cate->id)->count() }}</p>
                          </a>
                       </div>
                    </div>
                    @endforeach

                 </div>
              </div>
           </div>
        </div>
        <div class="col-lg-9">
           <div class="carousel-slider-main text-center">
              <div class="owl-carousel owl-carousel-slider rounded overflow-hidden shadow-sm">
                @foreach($allbanner as $banner)
                 <div class="item">
                    <a href="{{$banner->ban_link}}"><img class="img-fluid" src="{{asset('public/uploads/banner/'.$banner->ban_image)}}" alt="First slide"></a>
                 </div>
                 @endforeach

              </div>
           </div>
        </div>
     </div>
  </div>
</section>

@if($hotdeal)

<section class="product-items-slider section-padding">
   <div class="container">
      <div class="section-header">
         <!-- <h5 class="heading-design-h5">Flash Deal Today <span class="badge badge-success">20% OFF</span>
            <a class="float-right text-secondary" href="{{url('flashdeal/products')}}">View All</a>
         </h5> -->
         <h5 class="heading-design-h5">Flash Deal Today <span
                         id="date" class="badge badge-success"></span>
                        <a class="float-right text-secondary" href="{{url('flashdeal/products')}}">View All</a>
                   </h5>
         <script>
            // Set the date we're counting down to
            var countDownDate = new Date("{{$hotdeal->end_date->format('F d Y')}}").getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

               // Get today's date and time
               var now = new Date().getTime();

               // Find the distance between now and the count down date
               var distance = countDownDate - now;

               // Time calculations for days, hours, minutes and seconds
               var days = Math.floor(distance / (1000 * 60 * 60 * 24));
               var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
               var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
               var seconds = Math.floor((distance % (1000 * 60)) / 1000);

               // Output the result in an element with id="demo"
               document.getElementById("date").innerHTML = days + "d " + hours + "h " +
                  minutes + "m " + seconds + "s ";

               // If the count down is over, write some text
               if (distance < 0) {
                  clearInterval(x);
                  document.getElementById("date").innerHTML = "EXPIRED";
               }
            }, 1000);
         </script>

      </div>
      <div class="row">
         @foreach($hotdeal->flash_deal_details as $flasdetail)
         <div class="col-md-3 col-xs-12 mb-4">
            <div class="product">
               <a href="{{url('product/')}}/{{$flasdetail->product->slug}}/{{$flasdetail->product->id}}">
                  <div class="product-header">
                     <span class="badge badge-success"> @if($flasdetail->discount_type==1) {{$flasdetail->discount}}TK  @else {{$flasdetail->discount}}% @endif OFF</span>
                     <img class="img-fluid" src="{{asset('public/uploads/products/thumbnail/'.$flasdetail->product->thumbnail_img)}}" alt="">
                     <span class="veg text-success mdi mdi-circle"></span>
                  </div>
                  <div class="product-body">
                     <h5>{{Str::limit($flasdetail->product->product_name,15)}}</h5>
                     @if($flasdetail->product->product_measurement !=NULL)
                     @php
                      $mesurement=App\Mesurement::where('id',$flasdetail->product->product_measurement)->first();
                     @endphp
                     <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> -{{$mesurement->m_name}}</h6>
                     @else
                      <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> 00</h6>
                     @endif
                  </div>
                  </a>
                  <div class="product-footer">
                          @if($flasdetail->discount_type==1)
                             <p class="offer-price mb-0">TK{{intval($flasdetail->product->product_price - $flasdetail->discount)}} <span class="regular-price">TK{{ intval($flasdetail->product->product_price) }}</span></p>
                             @elseif($flasdetail->discount_type==2)
                                @php
                                   $dis=($flasdetail->discount * $flasdetail->product->product_price)/100;
                               @endphp
                             <p class="offer-price mb-0">TK{{intval($flasdetail->product->product_price - $dis)}}<span class="regular-price">TK{{intval($flasdetail->product->product_price) }}</span></p>
                              @endif


                              <form id="option-choice-form{{$flasdetail->product->id}}">

                                <input type="hidden" name="product_id" value="{{$flasdetail->product->id}}"/>
                                <input type="hidden" name="product_name" value="{{$flasdetail->product->product_name}}"/>
                                <input type="hidden" name="image" value="{{$flasdetail->product->thumbnail_img}}"/>
                                <input type="hidden" name="quantity" value="1"/>
                                <input type="hidden" name="sku" value="{{$flasdetail->product->product_sku}}"/>
                                <input type="hidden" name="product_type" value="{{$flasdetail->product->product_type}}"/>
                                <input type="hidden" name="grug_type" value="{{$flasdetail->product->grug_type}}"/>
                                  @if($flasdetail->discount_type==1)
                                          <input type="hidden" name="dis_price" value="1"/>
                                          <input type="hidden" name="product_price" value="{{$flasdetail->product->product_price - $flasdetail->discount}}"/>
                                      @else
                                          <input type="hidden" name="dis_price" value="1"/>
                                          <input type="hidden" name="product_price" value="{{$flasdetail->product->product_price - $dis}}"/>
                                    @endif
                              <button type="button" class="btn btn-secondary btn-sm" onclick="addtocart({{$flasdetail->product->id}})" id="purchase-no"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                            </form>
                  </div>

            </div>
         </div>
         @endforeach


      </div>



   </div>
</section>
@endif
<!-- @foreach($allcategory as $cate)
<section class="offer-product">
   <div class="container">
      <div class="row no-gutters text-center">
         <div class="col-sm-12">
            <a href="#"><img class="img-fluid" src="{{asset('public/uploads/category/banner/'.$cate->cate_banner)}}" alt=""></a>
         </div>

      </div>
   </div>
</section>
<section class="product-items-slider section-padding">
   <div class="container">
      <div class="section-header">
         <h5 class="heading-design-h5"> {{$cate->cate_name}} <span class="badge badge-info"></span>
            <a class="float-right text-secondary" href="{{route('website.category',$cate->cate_slug)}}">View All</a>
         </h5>
      </div>
      @php
        $allproduct=App\Product::where('is_deleted',0)->where('status',1)->where('cate_id', $cate->id)->get();
      @endphp
      <div class="owl-carousel owl-carousel-featured">
        @foreach($allproduct as $product)
         <div class="item">
            <div class="product">
               <a href="{{url('product/'.$product->slug.'/'.$product->id)}}">
                  <div class="product-header">
                    @php
                      $flashdealdetail = App\FlashDealDetail::where('product_id',$product->id)->where('status',1)->get();
                    @endphp

                     @if(count($flashdealdetail) > 0)
                      @foreach($flashdealdetail as $row)
                                 <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                  @if($row ->discount_type == 1 )
                                     <span class="badge badge-success"> TK {{$row->discount}} </span>
                                  @elseif($row ->discount_type == 2)
                                     <span class="badge badge-success"> {{$row->discount}}% </span>
                                  @endif
                      @endforeach
                    @endif

                     <img class="lazy img-fluid" src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" data-src="{{asset('public/forntend/lazy_loader/home-banner.gif')}}"  alt="">
                     <span class="veg text-success mdi mdi-circle"></span>
                  </div>
                  <div class="product-body">
                     <h5>{{ Str::limit($product->product_name,15)}}</h5>

                     @if($product->product_measurement !=NULL)
                     @php
                      $mesurement=App\Mesurement::where('id',$product->product_measurement)->first();
                     @endphp
                     <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> -{{$mesurement->m_name}}</h6>
                     @else
                      <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> </h6>
                     @endif
                  </div>
                  </a>
                  <div class="product-footer">
                     <p class="offer-price mb-0">
                       @if(count($flashdealdetail) > 0)
                                  @foreach($flashdealdetail as $row)
                                     <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                     @if($row ->discount_type == 1 )
                                         TK {{$product->product_price - $row->discount}}
                                          <span class="regular-price">TK{{intval($product->product_price)}}</span>
                                     @elseif($row ->discount_type == 2)
                                     TK {{$product->product_price - $productdiscount}}
                                       <span class="regular-price">TK{{intval($product->product_price)}}</span>
                                     @endif
                                 @endforeach
                             @else
                             TK{{intval($product->product_price)}}
                             @endif
                       </p>

                       <form id="option-choice-form{{$product->id}}">
                         <input type="hidden" name="product_name" value="{{$product->product_name}}"/>
                         <input type="hidden" name="image" value="{{$product->thumbnail_img}}"/>
                         <input type="hidden" name="product_id" value="{{$product->id}}"/>

                         <input type="hidden" name="product_type" value="{{$product->product_type}}"/>
                         <input type="hidden" name="grug_type" value="{{$product->grug_type}}"/>

                         <input type="hidden" name="quantity" value="1"/>
                         <input type="hidden" name="sku" value="{{$product->product_sku}}"/>
                         @if(count($flashdealdetail) > 0)
                                @foreach($flashdealdetail as $row)
                                   <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                   @if($row ->discount_type == 1 )
                                   <input type="hidden" name="dis_price" value="{{$row->discount}}"/>
                                   <input type="hidden" name="product_price" value="{{$product->product_price - $row->discount}}"/>
                                   @elseif($row ->discount_type == 2)
                                   <input type="hidden" name="dis_price" value="{{$productdiscount}}"/>
                                   <input type="hidden" name="product_price" value="{{$product->product_price - $productdiscount}}"/>
                                   @endif
                               @endforeach
                           @else
                            <input type="hidden" name="dis_price" value="0"/>
                            <input type="hidden" name="product_price" value="{{$product->product_price}}"/>
                           @endif

                        <button type="button" class="btn btn-secondary btn-sm" onclick="addtocart({{$product->id}})" id="purchase-no"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                      </form>
                  </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endforeach -->

<!-- new arrival -->

<section class="offer-product">
   <div class="container">
      <div class="row no-gutters text-center">
         <div class="col-sm-12">
            <a href="#"><img class="img-fluid" src="" alt=""></a>
         </div>

      </div>
   </div>
</section>
<section class="product-items-slider section-padding">
   <div class="container">
      <div class="section-header">
         <h5 class="heading-design-h5"> New Arrival<span class="badge badge-info"></span>
            <a class="float-right text-secondary" href="">View All</a>
         </h5>
      </div>
      @php
        $allproduct=App\Product::where('is_deleted',0)->where('status',1)->latest()->limit(8)->get();
      @endphp
      <div class="row">
        @foreach($allproduct as $product)
         <div class="col-md-3 col-xs-12 mb-4">
            <div class="product">
               <a href="{{url('product/'.$product->slug.'/'.$product->id)}}">
                  <div class="product-header">
                    @php
                      $flashdealdetail = App\FlashDealDetail::where('product_id',$product->id)->where('status',1)->get();
                    @endphp

                     @if(count($flashdealdetail) > 0)
                      @foreach($flashdealdetail as $row)
                                 <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                  @if($row ->discount_type == 1 )
                                     <span class="badge badge-success"> TK {{$row->discount}} </span>
                                  @elseif($row ->discount_type == 2)
                                     <span class="badge badge-success"> {{$row->discount}}% </span>
                                  @endif
                      @endforeach
                    @endif

                     <img class="lazy img-fluid" src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" data-src="{{asset('public/forntend/lazy_loader/home-banner.gif')}}"  alt="">
                     <span class="veg text-success mdi mdi-circle"></span>
                  </div>
                  <div class="product-body">
                     <h5>{{ Str::limit($product->product_name,15)}}</h5>

                     @if($product->product_measurement !=NULL)
                     @php
                      $mesurement=App\Mesurement::where('id',$product->product_measurement)->first();
                     @endphp
                     <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> -{{$mesurement->m_name}}</h6>
                     @else
                      <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> </h6>
                     @endif
                  </div>
                  </a>
                  <div class="product-footer">
                     <p class="offer-price mb-0">
                       @if(count($flashdealdetail) > 0)
                                  @foreach($flashdealdetail as $row)
                                     <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                     @if($row ->discount_type == 1 )
                                         TK {{$product->product_price - $row->discount}}
                                          <span class="regular-price">TK{{intval($product->product_price)}}</span>
                                     @elseif($row ->discount_type == 2)
                                     TK {{$product->product_price - $productdiscount}}
                                       <span class="regular-price">TK{{intval($product->product_price)}}</span>
                                     @endif
                                 @endforeach
                             @else
                             TK{{intval($product->product_price)}}
                             @endif
                       </p>

                       <form id="option-choice-form{{$product->id}}">
                         <input type="hidden" name="product_name" value="{{$product->product_name}}"/>
                         <input type="hidden" name="image" value="{{$product->thumbnail_img}}"/>
                         <input type="hidden" name="product_id" value="{{$product->id}}"/>

                         <input type="hidden" name="product_type" value="{{$product->product_type}}"/>
                         <input type="hidden" name="grug_type" value="{{$product->grug_type}}"/>

                         <input type="hidden" name="quantity" value="1"/>
                         <input type="hidden" name="sku" value="{{$product->product_sku}}"/>
                         @if(count($flashdealdetail) > 0)
                                @foreach($flashdealdetail as $row)
                                   <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                   @if($row ->discount_type == 1 )
                                   <input type="hidden" name="dis_price" value="{{$row->discount}}"/>
                                   <input type="hidden" name="product_price" value="{{$product->product_price - $row->discount}}"/>
                                   @elseif($row ->discount_type == 2)
                                   <input type="hidden" name="dis_price" value="{{$productdiscount}}"/>
                                   <input type="hidden" name="product_price" value="{{$product->product_price - $productdiscount}}"/>
                                   @endif
                               @endforeach
                           @else
                            <input type="hidden" name="dis_price" value="0"/>
                            <input type="hidden" name="product_price" value="{{$product->product_price}}"/>
                           @endif

                        <button type="button" class="btn btn-secondary btn-sm" onclick="addtocart({{$product->id}})" id="purchase-no"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                      </form>
                  </div>
            </div>
         </div>
         @endforeach
      </div>
      <!-- load more product -->

      <div class="row" id="loadmoreproduct">



      </div>
      <div class="dots text-center" id="searchPreloader" style="display:none">
                 <!-- <img src="{{asset('public/uploads/Rainbow.gif')}}" alt=""> -->
                 <img src="{{asset('public/uploads/Pinwheel.gif')}}" alt="" width="10%" height="45px">

      </div>
   </div>
</section>
<section class="offer-product" style="padding-bottom:20px;" id="loadbtn">
   <div class="container">
      <div class="row text-center">
         <div class="col-sm-12" >
           <button type="button" name="button" class="btn btn-success" onclick="add_more()">Load More</button>
         </div>
      </div>
   </div>
</section>


<script>
  var i=1;
  function add_more(){
    $('#searchPreloader').show();
    if(i < 6){
      $.post('{{ route('load.more.show') }}', {_token: '{{ csrf_token() }}',id:i},
          function(data) {
            $('#searchPreloader').hide();
            $('#loadmoreproduct').html(data);

          });
    }else{
            $('#loadmoreproduct').append("<div class='col-md-12 col-xs-12 mb-4 text-center'><p class='text-center'>You have reached the end.Do a search to keep exploring! </p></div>");
            $("#loadbtn").hide();
    }
        i++;


  }
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
</script>
@endsection
