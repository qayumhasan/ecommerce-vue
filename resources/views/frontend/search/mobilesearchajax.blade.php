@if ($products->count() > 0)
@foreach($products as $pro)
<a href="{{url('http://www.kineninshop.com/m/product/'.$pro->slug.'/'.$pro->id)}}" class="text-dark">
   <div class="d-flex align-items-center border-bottom p-3">
      <img src="{{asset('http://www.kineninshop.com/public/uploads/products/thumbnail/'.$pro->thumbnail_img)}}" class="rounded shadow-sm mr-3" height="25px">
      <span class="font-weight-bold">
         {{$pro->product_name}}
         <p class="small text-muted m-0">Price:{{$pro->product_price}}</p>
      </span>
   </div>
</a>
@endforeach
@else
<p>Opps! No Data Found</p>
@endif
