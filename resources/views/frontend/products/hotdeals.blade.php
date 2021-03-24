@extends('layouts.websiteapp')
@section('title', 'FlashDeal | '.$seo->meta_title)
@section('content')
@if($flash_deal)
<section class="product-items-slider section-padding">
    <div class="container">
       <div class="section-header">
         <h5 class="heading-design-h5">Flash Deal Today <span
                         id="date" class="badge badge-success"></span>
                        <a class="float-right text-secondary" href="{{url('flashdeal/products')}}">View All</a>
                   </h5>
         <script>
            // Set the date we're counting down to
            var countDownDate = new Date("{{$flash_deal->end_date->format('F d Y')}}").getTime();

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
          @foreach ($flash_deal_details as $flasdetail)
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
                              <p class="offer-price mb-0">TK{{intval($flasdetail->product->product_price - $dis)}}<span class="regular-price">TK{{ intval($flasdetail->product->product_price) }}</span></p>
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
@endsection
