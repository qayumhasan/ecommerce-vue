
  @php
  $total=0;

  @endphp
  @if($countcartitems->count() > 0)

  @foreach($countcartitems as $pro)
  <tr>
    @php
      $productcart=App\Product::where('id',$pro->product_id)->select(['id','slug','product_name','product_measurement','thumbnail_img'])->first();
    @endphp
     <td class="cart_product"><a href="{{url('product/'.$productcart->slug.'/'.$productcart->id)}}"><img class="img-fluid" src="{{asset('public/uploads/products/thumbnail/'.$productcart->thumbnail_img)}}" alt=""></a></td>
     <td class="cart_description">
        <h5 class="product-name"><a href="{{url('product/'.$productcart->slug.'/'.$productcart->id)}}">{{Str::limit($productcart->product_name,20)}} </a></h5>

        <!-- <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 50 gm</h6> -->
        @if($productcart->product_measurement !=NULL)
        @php
         $mesurement=App\Mesurement::where('id',$productcart->product_measurement)->first();
        @endphp
        <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> {{$mesurement->m_name}}</h6>
        @else
         <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> </h6>
        @endif

     </td>
     <td class="availability in-stock"><span class="badge badge-success">In stock</span></td>
     <td class="price"><span>TK {{$pro->product_price}}</span></td>
     <td class="qty">
        <div class="input-group">
           <span class="input-group-btn"><button class="btn btn-theme-round btn-number" type="button" onClick="decrement_quantity({{$pro->id}})">-</button></span>

           <input type="text" max="10" min="1" value="{{ $pro->qty}}" class="form-control border-form-control form-control-sm input-number" name="quant" id="input-quantity-{{$pro->id}}">

           <span class="input-group-btn"><button class="btn btn-theme-round btn-number" type="button" onClick="increment_quantity({{$pro->id}})">+</button>
           </span>
        </div>
     </td>
     <td class="price"><span>TK {{$pro->product_price * $pro->qty}}</span></td>
     <td class="action">
        <!-- <a class="btn btn-sm btn-danger" data-original-title="Remove" href="#" title="" data-placement="top" data-toggle="tooltip"><i class="mdi mdi-close-circle-outline"></i></a> -->
       <button type="submit" onclick="cartDatadelete(this)" data-toggle="tooltip" title="" class="btn btn-sm btn-danger" value="{{$pro->id}}" data-original-title="Remove"><i class="mdi mdi-close-circle-outline"></i></button>
     </td>
  </tr>
  @php
    $total=$total+ $pro->product_price * $pro->qty;
  @endphp
  @endforeach
  @else
  <p>No cart Data</p>
  @endif





<script>
    function cartDatadelete(el) {
        //alert("ok");
        $.post('{{ route('cart.data.delete') }}', {_token: '{{ csrf_token() }}',user_id: el.value},
            function(data) {
                $('#cartdata').html(data);

                if (data) {
                  iziToast.success({  message: 'AddtoCart Deleted ',
                                          'position':'topCenter'
                                      });
                }
            });
        gettotalpricedatanew();
        prescive();
        allcartmain();
	}
	cartDatadelete();
</script>


<script>
    var myVar;
    function myUpdatecart(el) {

        myVar = setTimeout(function(){

            $.post('{{ route('product.cart.update') }}',
            {_token: '{{ csrf_token() }}',
            quantity: el.value,rowid:el.id},
            function(data) {
              iziToast.success({  message: 'update success ',
                                      'position':'topCenter'
                                  });
                $('#cartdata').html(data);


            });


        }, 1500);



    }

    myUpdatecart();

</script>
