@if($newproduct->count() > 0)
@foreach($newproduct as $product)
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

                       <span class="badge badge-success"> TK {{$row->discount}} </span>

                   @elseif($row ->discount_type == 2)

                     <span class="badge badge-success">   {{$row->discount}}% </span>

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

                         <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">TK {{intval($product->product_price)}}</span>
                     @elseif($row ->discount_type == 2)
                     TK {{intval($product->product_price - $productdiscount)}}
                     <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">TK {{intval($product->product_price)}}</span>
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
 @else
<p>No Product</p>

 @endif
