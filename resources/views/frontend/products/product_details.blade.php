@extends('layouts.websiteapp')
@section('title', $productdetails->product_name .' | '.$seo->meta_title)
@section('content')
@section('meta')
   <meta property="og:url" content="{{URL::current()}}"/>
   <meta property="og:type" content="website"/>
   <meta property="og:title" content="{{$productdetails->product_name}}"/>
   <meta property="og:description" content="{{$productdetails->meta_description}}"/>
   <meta property="og:tag" content="{{$productdetails->meta_tag}}"/>
   <meta property="og:image" content="{{asset('public/uploads/products/thumbnail_img/'.$productdetails->thumbnail_img)}}" />
@endsection

<section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                 @php
                  $cate_id=App\Category::where('id',$productdetails->cate_id)->select(['id','cate_name','cate_slug'])->first();
                 @endphp
                  <a href="{{url('/')}}"><strong><span class="mdi mdi-home"></span> Home</strong></a>
                  @if($cate_id)
                   <span class="mdi mdi-chevron-right"></span>
                  <a href="{{route('website.category',$cate_id->cate_slug)}}">{{$cate_id->cate_name}}</a>
                  @endif
               </div>
            </div>
         </div>
      </section>
      <section class="shop-single section-padding pt-3">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="shop-detail-left">
                     <div class="shop-detail-slider">
                        <!-- <div class="favourite-icon">
                           <a class="fav-btn" title="" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="59% OFF"></a>
                        </div> -->
                        <div id="sync1" class="owl-carousel">
                          @foreach (json_decode($productdetails->photos) as $key => $photo)
                           <div class="item"><img alt="" src="{{url('storage/app/public/'.$photo) }}" class="img-fluid img-center"></div>
                           @endforeach

                        </div>
                        <div id="sync2" class="owl-carousel">
                            @foreach (json_decode($productdetails->photos) as $key => $photo)
                           <div class="item"><img alt="" src="{{url('storage/app/public/'.$photo) }}" class="img-fluid img-center"></div>
                           @endforeach

                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="shop-detail-right">
                    <!-- flash deal -->
                      @php
                         $flashdealdetail = App\FlashDealDetail::where('product_id',$productdetails->id)->where('status',1)->get();
                       @endphp

                        @if(count($flashdealdetail) > 0)
                         @foreach($flashdealdetail as $row)
                                    <?php $productdiscount = ($productdetails->product_price * $row->discount) / 100; ?>
                                     @if($row ->discount_type == 1 )
                                       <span class="badge badge-success"> TK {{$row->discount}} </span>
                                     @elseif($row ->discount_type == 2)
                                         <span class="badge badge-success">{{$row->discount}}% </span>
                                     @endif
                         @endforeach
                       @endif



                    <!-- flashdealend -->

                     <h2>{{$productdetails->product_name}}</h2>

                     @if($productdetails->product_measurement !=NULL)
                     @php
                      $mesurement=App\Mesurement::where('id',$productdetails->product_measurement)->first();
                     @endphp
                     <h6><strong><span class="mdi mdi-approval"></span> Available in: </strong>{{$mesurement->m_name}}</h6>
                     @else
                      <h6><strong><span class="mdi mdi-approval"></span> Available in: </strong> </h6>
                     @endif
                     <h6><strong><span class="mdi mdi-approval"></span>SKU: </strong>{{$productdetails->product_sku}}</h6>
                     @if($productdetails->product_type == 2)
                      <h6><strong><span class="mdi mdi-approval"></span>Drug Type:</strong>
                        @if($productdetails->grug_type == 1)
                        No-Prescrip
                        @elseif($productdetails->grug_type ==2)
                          Prescrip
                        @endif
                      </h6>
                     @endif




                          @if(count($flashdealdetail) > 0)
                                 @foreach($flashdealdetail as $row)
                                    <?php $productdiscount = ($productdetails->product_price * $row->discount) / 100; ?>
                                    @if($row ->discount_type == 1 )
                                        <p class="regular-price"><i class="mdi mdi-tag-outline"></i> Price : TK{{intval($productdetails->product_price)}}</p>
                                       <p class="offer-price mb-0">Discounte Price : <span class="">TK {{intval($productdetails->product_price - $row->discount)}}</span></p>

                                    @elseif($row ->discount_type == 2)
                                      <p class="regular-price"><i class="mdi mdi-tag-outline"></i> Price : TK{{intval($productdetails->product_price)}}</p>
                                      <p class="offer-price mb-0">Discounte Price : <span class="">TK{{$productdetails->product_price - $productdiscount}}</span></p>
                                    @endif
                                @endforeach
                            @else
                            <p class="offer-price mb-0">Price : <span class="">TK{{$productdetails->product_price}}</span></p>
                            @endif


                           <form id="option-choice-form">
                                  <input type="hidden" name="product_name" value="{{$productdetails->product_name}}"/>
                                  <input type="hidden" name="image" value="{{$productdetails->thumbnail_img}}"/>
                                  <input type="hidden" name="product_id" value="{{$productdetails->id}}"/>
                                  <input type="hidden" name="product_type" value="{{$productdetails->product_type}}"/>
                                  <input type="hidden" name="grug_type" value="{{$productdetails->grug_type}}"/>
                                  <input type="hidden" name="quantity" value="1"/>
                                  <input type="hidden" name="sku" value="{{$productdetails->product_sku}}"/>
                                  @if(count($flashdealdetail) > 0)
                                         @foreach($flashdealdetail as $row)
                                            <?php $productdiscount = ($productdetails->product_price * $row->discount) / 100; ?>
                                            @if($row ->discount_type == 1 )
                                            <input type="hidden" name="dis_price" value="{{$row->discount}}"/>
                                            <input type="hidden" name="product_price" value="{{$productdetails->product_price - $row->discount}}"/>
                                            @elseif($row ->discount_type == 2)
                                            <input type="hidden" name="dis_price" value="{{$productdiscount}}"/>
                                            <input type="hidden" name="product_price" value="{{$productdetails->product_price - $productdiscount}}"/>
                                            @endif
                                        @endforeach
                                    @else
                                     <input type="hidden" name="dis_price" value="0"/>
                                     <input type="hidden" name="product_price" value="{{$productdetails->product_price}}"/>
                                    @endif
                                 <button type="button" id="purchase-now" class="btn btn-secondary btn-lg"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                              </form>
                     <div class="short-description">
                        <h5>
                           Quick Overview
                           <p class="float-right">Availability: @if( $productdetails->product_qty > 0) <span class="badge badge-success">In Stock</span> @else <span class="badge badge-danger">In Stock</span> @endif</p>
                        </h5>
                        <p>{!! $productdetails->product_description !!}</p>
                        <p class="mb-0"> </p>
                     </div>
                     <h6 class="mb-3 mt-4">Why shop from {{ $continfor->company_name }}?</h6>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="feature-box">
                              <i class="mdi mdi-truck-fast"></i>
                              <h6 class="text-info">Free Delivery</h6>
                              <p>For all oders over 300TK</p>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="feature-box">
                              <i class="mdi mdi-basket"></i>
                              <h6 class="text-info">Secure Payment</h6>
                              <p>100% Secure Payment</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="product-items-slider section-padding bg-white border-top">
         <div class="container">
            <div class="section-header">
               <h5 class="heading-design-h5">Related Product <span class="badge badge-primary"></span>
                  <a class="float-right text-secondary" href="{{route('website.category',$cate_id->cate_slug)}}">View All</a>
               </h5>
            </div>
            <div class="owl-carousel owl-carousel-featured">
              @foreach( App\Product::where('is_deleted',0)->where('status',1)->where('cate_id',$cate_id->id)->latest()->limit(10)->get() as $product )
               <div class="item">
                 @php
                      $flashdealdetail = App\FlashDealDetail::where('product_id',$product->id)->where('status',1)->get();
                @endphp
                  <div class="product">
                     <a href="{{url('product/'.$product->slug.'/'.$product->id)}}">
                        <div class="product-header">

                             @if(count($flashdealdetail) > 0)
                         @foreach($flashdealdetail as $row)
                                    <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                     @if($row ->discount_type == 1 )

                                       <span class="badge badge-success"> TK {{$row->discount}}OFF</span>

                                     @elseif($row ->discount_type == 2)

                                          <span class="badge badge-success">{{$row->discount}}%OFF</span>

                                     @endif
                         @endforeach
                       @endif


                           <img class="img-fluid" src="{{asset('public/uploads/products/thumbnail/productdetails/'.$product->thumbnail_img)}}" alt="">
                           <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                           <h5>{{Str::limit($product->product_name,15)}}</h5>
                           @if($product->product_measurement !=NULL)
                           @php
                            $mesurement=App\Mesurement::where('id',$product->product_measurement)->first();
                           @endphp
                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> -{{$mesurement->m_name}}</h6>
                           @else
                            <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> 00</h6>
                           @endif
                        </div>
                      </a>
                        <div class="product-footer">
                          <form id="option-choice-form{{$product->id}}">

                            <input type="hidden" name="product_id" value="{{$product->id}}"/>
                            <input type="hidden" name="quantity" value="1"/>
                            <input type="hidden" name="sku" value="{{$product->product_sku}}"/>
                            <input type="hidden" name="product_type" value="{{$product->product_type}}"/>
                            <input type="hidden" name="grug_type" value="{{$product->grug_type}}"/>
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
                           <p class="offer-price mb-0">
                             @if(count($flashdealdetail) > 0)
                                        @foreach($flashdealdetail as $row)
                                           <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                           @if($row ->discount_type == 1 )
                                               TK {{$product->product_price - $row->discount}}
                                                <i class="mdi mdi-tag-outline"></i><span class="regular-price">TK{{intval($product->product_price)}}</span>
                                           @elseif($row ->discount_type == 2)
                                           TK {{$product->product_price - $productdiscount}}
                                             <i class="mdi mdi-tag-outline"></i><span class="regular-price">TK{{intval($product->product_price)}}</span>
                                           @endif
                                       @endforeach
                                   @else
                                   TK{{$product->product_price}}
                                    <!-- <i class="mdi mdi-tag-outline"></i><span class="regular-price">TK 0.00</span> -->
                                   @endif

                           </p>
                        </div>

                  </div>
               </div>
               @endforeach

            </div>
         </div>
      </section>




@endsection
