@if ($products->count() > 0)
@foreach($products as $pro)
<div class="ps-panel__content">
    <div class="ps-product ps-product--wide ps-product--search-result">
        <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$pro->slug}}/{{$pro->id}}"><img src="{{asset('public/uploads/products/thumbnail/'.$pro->thumbnail_img)}}" alt=""></a></div>
        <div class="ps-product__content"><a class="ps-product__title" href="{{url('product/')}}/{{$pro->slug}}/{{$pro->id}}">{{$pro->product_name}}</a>
            <div class="ps-product__rating">
                <!-- <select class="ps-rating" data-read-only="true">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                </select> --><span></span>
            </div>
            <p class="ps-product__price">{{$pro->product_price}}</p>
        </div>
    </div>

</div>
@endforeach
@else
<p>Opps! No Data Found</p>
@endif

