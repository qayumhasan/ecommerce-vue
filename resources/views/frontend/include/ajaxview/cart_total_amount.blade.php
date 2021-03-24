<div class="ps-block--shopping-total">
    <div class="ps-block__header">
        <p>Subtotal <span> ৳ {{Cart::session(\Request::getClientIp(true))->getSubTotal()}}</span></p>
    </div>
    <div class="ps-block__content">
        <ul class="ps-block__product">
        @if($cupon->discount_type == 1)
            <li><span class="ps_inline_block">Coupon Discount</span><span class="pull-right">৳ {{$cupon->discount}}</span></li>
        @else
        <li><span class="ps_inline_block">Coupon Discount</span><span class="pull-right">{{$cupon->discount}} %</span></li>
        @endif
            <li><span class="ps_inline_block">Shipping Price</span><span class="pull-right">৳  0.00</span></li>
            
        </ul>
        <h3>Total <span>৳ {{Cart::session(\Request::getClientIp(true))->getTotal()}}</span></h3>
    </div>
</div>