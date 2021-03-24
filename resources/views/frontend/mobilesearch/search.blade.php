@extends('layouts.websiteapp')
@section('title', 'Search | '.$seo->meta_title)
@section('content')
<section class="section-padding bg-dark inner-header">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <h1 class="mt-0 mb-3 text-white">Search</h1>
               <div class="breadcrumbs">
                  <p class="mb-0 text-white"><a class="text-white" href="{{url('/')}}">Home</a>  /  <span class="text-success">Search Result</span></p>
               </div>
            </div>
         </div>
      </div>
  </section>
@if($searchproduct->count() > 0)
  <section class="product-items-slider section-padding">
    <div class="container">
       <div class="section-header">
          <h5 class="heading-design-h5">Search Product Found
             <!-- <a class="float-right text-secondary" href="shop.html">View All</a> -->
          </h5>
       </div>
       <div class="row">

        @foreach($searchproduct as $product)
          <div class="col-md-3 col-xs-12 mb-4">
             <div class="product">
                <a href="{{url('product/'.$product->slug.'/'.$product->id)}}">
                   <div class="product-header">
                      <span class="badge badge-success">50% OFF</span>
                      <img class="img-fluid" src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" alt="">
                      <span class="veg text-success mdi mdi-circle"></span>
                   </div>
                   <div class="product-body">
                      <h5>{{ Str::limit($product->product_name,15)}}</h5>
                      <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                   </div>
                   <div class="product-footer">
                      <p class="offer-price mb-0">৳{{$product->product_price}}  <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p><button type="button"
                         class="btn btn-secondary btn-sm"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                   </div>
                </a>
             </div>
          </div>
          @endforeach
        </div>
    </div>
 </section>
 @else
 <section class="product-items-slider section-padding">
   <div class="container">
      <div class="section-header">
         <h5 class="heading-design-h5">Search Product Not Found
            <!-- <a class="float-right text-secondary" href="shop.html">View All</a> -->
         </h5>
      </div>
   </div>
 </section>
 @endif
@endsection
