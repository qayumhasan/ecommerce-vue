@extends('layouts.websiteapp')
@section('title', $category->cate_name. " | ".$seo->meta_title)
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <a href="{{url('/')}}"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="">{{$category->cate_name}}</a>
           </div>
        </div>
     </div>
  </section>
  <section class="shop-list section-padding">
     <div class="container">
        <div class="row">
           <div class="col-md-3">
       <div class="shop-filters">
        <div id="accordion">
         <div class="card">
          <div class="card-header" id="headingOne">
             <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              SubCategory <span class="mdi mdi-chevron-down float-right"></span>
              </button>
             </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
             <div class="card-body card-shop-filters">

              @foreach($allsubcategory as $key => $subcategory)
                @php
                  $catpro=App\Product::where('is_deleted',0)->where('status',1)->Where('subcate_id',$subcategory->id)->count();
                @endphp
                <a href="{{url('subacete/'.$category->cate_slug.'/'.$subcategory->subcate_slug)}}">
                  <div class="custom-control custom-checkbox" style="padding-left: 0 !important;">
                   <label class="" for="{{$category->id}}">{{$subcategory->subcate_name}} <span class="badge badge-success">{{$catpro}}</span> </label>
                  </div>
              </a>
              @endforeach

             </div>
          </div>
         </div>
         <div class="card">
          <div class="card-header" id="headingTwo">
             <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Price <span class="mdi mdi-chevron-down float-right"></span>
              </button>
             </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
             <div class="card-body card-shop-filters">
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="common_selector custom-control-input price" id="1" name="price" value="1">
               <label class="custom-control-label" for="1">TK68 to TK659</label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="common_selector custom-control-input price" id="2" name="price" value="2">
               <label class="custom-control-label" for="2">TK660 to TK1014</label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="common_selector custom-control-input price" id="3" name="price" value="3">
               <label class="custom-control-label" for="3">TK1015 to TK1679</label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="common_selector custom-control-input price" id="4" name="price" value="4">
               <label class="custom-control-label" for="4">TK1680 to TK1856</label>
              </div>
             </div>
          </div>
         </div>
         <div class="card">
          <div class="card-header" id="headingThree">
             <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Brand <span class="mdi mdi-chevron-down float-right"></span>
              </button>
             </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
             <div class="card-body card-shop-filters">
              <!-- <form class="form-inline mb-3">
               <div class="form-group">
                <input type="text" class="form-control" placeholder="Search By Brand">
               </div>
               <button type="submit" class="btn btn-secondary ml-2">GO</button>
              </form> -->
              @foreach($allbrand as $key => $brand)
                @php
                                    $bproduct=App\Product::where('is_deleted',0)->where('status',1)->where('brand',$brand->id)->count();
                                @endphp

                                @php
                                    $bproductlol=App\Product::where('status',1)->where('is_deleted',0)->where('brand',$brand->id)->first();
                                @endphp

                                @if($bproductlol)
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="common_selector custom-control-input brand" id="{{$brand->id}}" name="brand" value="{{$brand->id}}">
               <label class="custom-control-label" for="{{$brand->id}}">{{$brand->brand_name}}<span class="badge badge-success">{{$bproduct}}</span></label>
              </div>
              @endif
              @endforeach



             </div>
          </div>
         </div>


        </div>
       </div>
       <div class="left-ad mt-4">
        <img class="img-fluid" src="http://via.placeholder.com/254x557" alt="">
       </div>
    </div>

           <div class="col-md-9">
              <a href="#"><img class="img-fluid mb-3" src="img/shop.jpg" alt=""></a>
              <div class="shop-head">
                 <a href="{{url('/')}}"><span class="mdi mdi-home"></span> Home</a> <span class="mdi mdi-chevron-right"></span> <a href=""></a>
                 <div class="btn-group float-right mt-2">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort by Products &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                       <a class="dropdown-item" href="#">Relevance</a>
                       <a class="dropdown-item" href="#">Price (Low to High)</a>
                       <a class="dropdown-item" href="#">Price (High to Low)</a>
                       <a class="dropdown-item" href="#">Discount (High to Low)</a>
                       <a class="dropdown-item" href="#">Name (A to Z)</a>
                    </div>
                 </div>
                 <h5 class="mb-3"></h5>
                 <br>
              </div>
              <div class="all_category_wise_product" id="all_category_wise_product">
              <div class="row no-gutters">
                @foreach($allproduct as $product)
                    @php
                        $flashdealdetail = App\FlashDealDetail::where('product_id',$product->id)->where('status',1)->get();
                      @endphp
                 <div class="col-md-4">
                    <div class="product">
                       <a href="{{url('product/'.$product->slug.'/'.$product->id)}}">
                          <div class="product-header">

                               @if(count($flashdealdetail) > 0)
                       @foreach($flashdealdetail as $row)
                                  @php $productdiscount = ($product->product_price * $row->discount) / 100; @endphp
                                   @if($row ->discount_type == 1 )

                                      <span class="badge badge-success">  TK {{$row->discount}}   </span>

                                   @elseif($row ->discount_type == 2)

                                      <span class="badge badge-success"> {{$row->discount}}%   </span>

                                   @endif
                       @endforeach
                     @endif

                             <img class="img-fluid" src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" alt="">
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

                              <input type="hidden" name="product_name" value="{{$product->product_name}}"/>
                              <input type="hidden" name="image" value="{{$product->thumbnail_img}}"/>

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
                             <p class="offer-price mb-0">

                               @if(count($flashdealdetail) > 0)
                                  @foreach($flashdealdetail as $row)
                                     <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                     @if($row ->discount_type == 1 )
                                         TK {{intval($product->product_price - $row->discount)}}

                                         <br><span class="regular-price">TK {{intval($product->product_price)}}</span>
                                     @elseif($row ->discount_type == 2)
                                     TK {{intval($product->product_price - $productdiscount)}}
                                     <br><span class="regular-price">TK {{intval($product->product_price)}}</span>
                                     @endif
                                 @endforeach
                             @else
                             TK{{intval($product->product_price)}}
                             <!-- <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">0.00</span> -->
                             @endif


                             </p>
                          </div>

                    </div>
                 </div>
                 @endforeach

              </div>



              <nav>
                 <ul class="pagination justify-content-center mt-4">

                   {{$allproduct->links()}}
                 </ul>

              </nav>
              </div>
              <div class="filter_data">

              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- <section class="product-items-slider section-padding bg-white border-top">
     <div class="container">
        <div class="section-header">
           <h5 class="heading-design-h5">Best Offers View <span class="badge badge-primary">20% OFF</span>
              <a class="float-right text-secondary" href="">View All</a>
           </h5>
        </div>
        <div class="owl-carousel owl-carousel-featured">

           <div class="item">
              <div class="product">
                 <a href="single.html">
                    <div class="product-header">
                       <span class="badge badge-success">50% OFF</span>
                       <img class="img-fluid" src="img/item/10.jpg" alt="">
                       <span class="veg text-success mdi mdi-circle"></span>
                    </div>
                    <div class="product-body">
                       <h5>Product Title Here</h5>
                       <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                    </div>
                    <div class="product-footer">
                       <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                       <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                    </div>
                 </a>
              </div>
           </div>



        </div>
     </div>
  </section> -->

  <script>

  $(document).ready(function(){
   $('.search_category_product').hide();
           $('.common_selector').click(function(){
              // alert("hoy");
               filter_data();
          });



      });
  </script>

  <script>
     function filter_data()
    {



       // alert("ok")
       $('.filter_data').html('<div id="loading" style=""></div>');
        var brand = get_filter('brand');
        var price = get_filter('price');
        // alert("brand_name");
        if (brand === "" || price==="") {
                $('.filter_data').hide();
                $('.all_category_wise_product').show();
            } else{
                $('.all_category_wise_product').hide();
                $('.filter_data').show();
            }

         $.ajax({
            url:"{{ route('foysal.product.ajaxsearchmain') }}",
            method:"get",
            data:{brand:brand,price:price},
            success:function(data)
            {

                //alert('ok');
                    $('.filter_data').empty();
                    $('.filter_data').html(data);


             }
        });

    }
</script>

<script>
      function get_filter(class_name)
    {
        var filter = [];
        // var price = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
</script>
@endsection
