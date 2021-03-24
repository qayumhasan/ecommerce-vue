<div class="table-responsive">
                        @php
                            $clientip = Request::getClientIp(true);
                            $allproduct = App\CompareProduct::where('ip_address', $clientip)->orderBy('id','DESC')->get();
                           
                        @endphp
                        <table class="table ps-table--compare">
                            <tbody>
                                <tr>
                                    <td class="heading" rowspan="2">Product</td>
                                    @foreach($allproduct as $product)
                                    <td>
                                    	<a onclick="deletecompare(this)" id="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Compare">Remove</a>


                                    </td>
                                    @endforeach
                                  
                                </tr>
                                <tr>
                                    
                                    @foreach($allproduct as $product)
                                    <td>
                                        <div class="ps-product--compare">
                                            <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}"><img src="{{asset('public/uploads/products/thumbnail/'.$product->product->thumbnail_img)}}" alt=""></a></div>
                                            <div class="ps-product__content"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{$product->product->product_name}}</a></div>
                                         
                                        </div>
                                    </td>
                                    @endforeach

                                <!--     <td>
                                        <div class="ps-product--compare">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/3.jpg" alt=""></a></div>
                                            <div class="ps-product__content"><a href="product-default.html">Harman Kardon Onxy Studio 2.0 Wireless Bluetooth Speaker</a></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="ps-product--compare">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/8.jpg" alt=""></a></div>
                                            <div class="ps-product__content"><a href="product-default.html">ACHEER 25W Bluetooth Speaker (A320)</a></div>
                                        </div>
                                    </td> -->
                                </tr>
                              
                                
                                <tr>
                                    <td class="heading">Price</td>
                                    @foreach($allproduct as $product)
                                    <td>
                                        <h4 class="price sale">৳ {{$product->product->product_price}} <del></del> <small></small></h4>
                                    </td>
                                     @endforeach
                                
                                </tr>
                               
                                <tr>
                                    <td class="heading">Availability</td>
                                    @foreach($allproduct as $product)
                                        @if($product->product->product_qty > 0)
                                        <td><span class="in-stock">In Stock</span></td>
                                        @else
                                        <td><span class="in-stock">out of Stock</span></td>
                                        @endif

                                    @endforeach
                                  
                                </tr>
                                <tr>
                                    <td class="heading">Shipping</td>
                                    @foreach($allproduct as $product)
                                    <td>Free Shipping</td>
                                    @endforeach
                                    
                                </tr>
                                <tr>
                                    <td class="heading">sku</td>
                                     @foreach($allproduct as $product)
                                        <td><a class="sold-by" href="#">{{$product->product->product_sku}}</a></td>
                                     @endforeach
                                   
                                </tr>
                              <!--   <tr>
                                    <td class="heading">Connect Technology</td>
                                    <td>Wireless & BlueTooth</td>
                                    <td>Wireless & BlueTooth</td>
                                    <td>BlueTooth</td>
                                </tr>
                                <tr>
                                    <td class="heading">Item Dimensions</td>
                                    <td>5.51x5.51x9.53 In</td>
                                    <td>7.52 x 12.05 x 5.08 in</td>
                                    <td>11.14 x 16.54 x 9.25 in</td>
                                </tr>
                                <tr>
                                    <td class="heading">Item Weight</td>
                                    <td>6.61 lbs</td>
                                    <td>5.61 lbs</td>
                                    <td>3.87 lbs</td>
                                </tr>
                                <tr>
                                    <td class="heading">Power Source</td>
                                    <td>AC Battery</td>
                                    <td>--</td>
                                    <td>Plug-in Electric</td>
                                </tr> -->
                                <tr>
                                    <td class="heading"></td>
                                    @foreach($allproduct as $product)
                                    <td><a class="ps-btn" href="{{url('product/')}}/{{$product->product->slug}}/{{$product->product->id}}">Add To Cart</a></td>
                                    @endforeach
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
  <script>

             function deletecompare(el) {
                console.log(el.id);
                 $.post('{{ route('compare.list.del') }}', {_token: '{{ csrf_token() }}', id: el.id},

                  function(data) {
                
               $('#productcompare').html(data);
                //console.log(data);
                if (data) {
                     iziToast.success({
                            message: 'success',
                            'position':'topRight'
                        });
                    }
                    else{
                  iziToast.error({
                                message: 'Delete',
                                'position':'topRight'
                            });
                } 
                   
                });

                }



    
    </script>