
    <div class="ps-cart__items">

    @foreach($usercartdatas as $row)
        
        <div class="ps-product--cart-mobile" onclick=this.style.display="none">
            <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$row->attributes->slug}}/{{$row->attributes->product_id}}"><img src="{{asset('public/uploads/products/thumbnail/productdetails')}}/{{$row->attributes->thumbnail_img}}" alt=""></a></div>
            <div class="ps-product__content"><button onclick="mobilemyAddToCartDatadelete(this)" value="{{$row->id}}" class="ps-product__remove"><i class="icon-cross"></i></button><a href="{{url('product/')}}/{{$row->attributes->slug}}/{{$row->attributes->product_id}}">{{$row->name}}</a>
            <br><strong>Price:</strong><small> {{$row->quantity}} x ৳ {{$row->price}}</p></small>
            </div>
        </div>
    @endforeach
        
    </div>
    @php
        $userId = Request::ip();
        $totalprice =Cart::session($userId)->getTotal();
    @endphp
    
    @if($totalprice != 0)
        <div class="ps-cart__footer" id="total_price">
            <h3>Sub Total:<strong id="mobileproduct_price">৳ {{$totalprice}}</strong></h3>
            <figure><a class="ps-btn" href="{{route('product.cart.data')}}">View Cart</a><a class="ps-btn" href="{{route('product.cart.data')}}">Checkout</a></figure>
        </div>
        @else
        <div class="ps-cart__footer" id="hide_total_price">
            <p>Sorry !Cart is Empty! Please add some product!</p>
        </div>
        @endif
</div>



                        

<script>
    function mobilemyAddToCartDatadelete(el) {
        
        
        $.post('{{ route('mobile.cart.data.delete')}}', {_token: '{{ csrf_token() }}',user_id: el.value
            },
            function(data) {

                document.getElementById('mobilecartdatacount').innerHTML = Math.abs(data.quantity);
                document.getElementById('mobileproduct_price').innerHTML = "৳ " + Math.abs(data.price);
                if(data.price == 0){
                    
                    document.getElementById('total_price').style.display="none";
                    
                }
                
               


                iziToast.success({
                    message: 'Cart Data Deleted succesfully!',
                    'position': 'topRight'
                });


            });
    }

    // myAddToCartDatadelete();
</script>