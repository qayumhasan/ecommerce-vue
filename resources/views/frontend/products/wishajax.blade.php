<table class="table ps-table--whishlist">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product name</th>
                                    <th>Unit Price</th>
                                    <th>Stock Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allwishlist as $product)
                                <tr>
                                    <td><a onclick="deletewish(this)" id="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-cross"></i></a></td>

                                    <td>
                                        <div class="ps-product--cart">
                                            <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->product->slug}}/{{$product->product->id}}"><img src="{{asset('/public/uploads/products/thumbnail/'.$product->product->thumbnail_img)}}" alt=""></a></div>
                                            <div class="ps-product__content"><a href="{{url('product/')}}/{{$product->product->slug}}/{{$product->product->id}}">{{$product->product->product_name}}</a></div>
                                        </div>
                                    </td>
                                    <td class="price">{{$product->product->product_price}}</td>
                                    <td><span class="ps-tag ps-tag--in-stock">@if($product->product->product_qty > 0) In-stock  @else Out of Stock  @endif</span></td>
                              
                                    <td><a class="ps-btn" href="{{url('product/')}}/{{$product->product->slug}}/{{$product->product->id}}">Add to cart</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
  <script>

             function deletewish(el) {
                console.log(el.id);
                 $.post('{{ route('wish.list.del') }}', {_token: '{{ csrf_token() }}', id: el.id},

                  function(data) {
                
               $('#wishlisttable').html(data);
                console.log(data);
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