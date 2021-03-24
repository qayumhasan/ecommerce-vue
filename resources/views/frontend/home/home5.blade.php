@extends('layouts.websiteapp')
@section('content')
<section class="carousel-slider-main text-center border-top border-bottom bg-white">
     <div class="owl-carousel owl-carousel-slider">
       @foreach($bannernew as $ban)
        <div class="item">
           <a href="{{$ban->ban_link}}"><img class="img-fluid" src="{{asset('public/uploads/banner/'.$ban->ban_image)}}" alt="First slide"></a>
        </div>
       @endforeach
     </div>
  </section>
  <section class="top-category section-padding">
     <div class="container">
        <div class="owl-carousel owl-carousel-category">
          @foreach($allcategory as $cate)
           <div class="item">
              <div class="category-item">
                 <a href="{{route('website.category',$cate->cate_slug)}}">
                    <img class="img-fluid" src="{{asset('public/uploads/category/'.$cate->cate_image)}}" alt="">
                    <h6>{{$cate->cate_name}}</h6>
                    @php
                     $product_count=App\Product::where('is_deleted',0)->where('status',1)->where('cate_id',$cate->id)->count();
                    @endphp
                    <p>{{ $product_count }} Items</p>
                 </a>
              </div>
           </div>
           @endforeach

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
  <section class="product-items-slider section-padding">
     <div class="container">
        <div class="section-header">
           <h5 class="heading-design-h5"> New Arrival<span class="badge badge-info"></span>
              <a class="float-right text-secondary" href="">View All</a>
           </h5>
        </div>
        @php
          $allproduct=App\Product::where('is_deleted',0)->where('status',1)->limit(8)->get();
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
      if(i < 6){
        $.post('{{ route('load.more.show') }}', {_token: '{{ csrf_token() }}',id:i},
            function(data) {

              $('#loadmoreproduct').html(data);

            });
      }else{
              $('#loadmoreproduct').append("<div class='col-md-12 col-xs-12 mb-4 text-center'><p class='text-center'>You have reached the end.Do a search to keep exploring! </p></div>");
              $("#loadbtn").hide();
      }
          i++;


    }
  </script>



@endsection
