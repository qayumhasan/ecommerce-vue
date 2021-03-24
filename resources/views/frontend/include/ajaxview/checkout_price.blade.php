<tr>
    <td><b>Sub Total Cost</b></td>
    <td>TK {{$totalprice}}</td>
</tr>
<tr>
  @php
      $cupundis=App\UserUsedCupon::where('user_ip',Auth::user()->id)->orderBy('id','DESC')->first();
  @endphp
  @if($cupundis)
            @php
              $cupoid=$cupundis->cupon_id;
              $cupon_discount=App\Cupon::where('id',$cupoid)->first();
            @endphp
              <!-- discount for total sell -->
              @if($cupon_discount->cupon_type==1)
                  @if($cupon_discount->discount_type==1)
                  <td><b>Discount (-)</b></td>
                  <td>TK {{$cupon_discount->discount}}</td>
                  @else
                    @php
                      $disamount = $totalprice * $cupon_discount->discount/100 ;
                    @endphp
                  <td><b>Discount (-)</b></td>
                  <td>TK {{$disamount}}</td>
                  @endif

              @elseif($cupon_discount->cupon_type==2)

                  @if($cupon_discount->discount_type==1)
                    @php
                      $userip = \Request::getClientIp(true);
                      $checkproduct=App\AddToCart::where('user_ip',$userip)->get();
                      $prodis=0;
                    @endphp
                    @foreach($checkproduct as $ckpro)
                        @foreach(json_decode($cupon_discount->product_id) as $pro)
                          @if($ckpro->product_id == $pro)
                            @php
                               $prodis = $prodis + $cupon_discount->discount;
                            @endphp
                          @endif
                        @endforeach
                    @endforeach
                  <td><b>Discount (-)</b></td>
                  <td>TK {{$prodis}}</td>

                  @elseif($cupon_discount->discount_type==2)
                    @php
                      $userip = \Request::getClientIp(true);
                      $checkproduct=App\AddToCart::where('user_ip',$userip)->get();
                      $prodis=0;
                    @endphp
                    @foreach($checkproduct as $ckpro)
                        @foreach(json_decode($cupon_discount->product_id) as $pro)
                          @if($ckpro->product_id == $pro)
                            @php
                               $prodis = $prodis + $ckpro->product_price * $cupon_discount->discount /100;
                            @endphp
                          @endif
                        @endforeach
                    @endforeach


                  <td><b>Discount (-)</b></td>
                  <td>TK {{$prodis}}</td>

                  @endif



              @endif

<!-- jodi cupon na thake -->
  @else
  <td><b>Discount (-)</b></td>
  <td>TK 0.00</td>
  @endif



</tr>
<tr>
    <td><b>Delivery Charge (+)</b></td>
    <td>TK {{$delevery_amount->amount}}</td>
</tr>
<tr>
    <td><b>VAT 0% (+)</b></td>
    <td>TK 0.00</td>
</tr>
<tr class="total">
    <td><b>TOTAL Amount</b></td>

    @if($cupundis)
          @php
            $cupoid=$cupundis->cupon_id;
            $cupon_discount=App\Cupon::where('id',$cupoid)->first();
          @endphp
          @if($cupon_discount->cupon_type==1)
              @if($cupon_discount->discount_type==1)
                <td>TK {{$totalprice + $delevery_amount->amount - $cupon_discount->discount}}</td>
                <input type="hidden" name="total_price" value="{{$totalprice + $delevery_amount->amount - $cupon_discount->discount}}">
              @elseif($cupon_discount->discount_type==2)
                @php
                  $disamount = $totalprice* $cupon_discount->discount/100 ;
                @endphp
              <td>TK {{$totalprice + $delevery_amount->amount - $disamount}}</td>
              <input type="hidden" name="total_price" value="{{$totalprice + $delevery_amount->amount - $disamount}}">
              @endif
          @elseif($cupon_discount->cupon_type==2)
              @if($cupon_discount->discount_type==1)
                  @php
                    $userip = \Request::getClientIp(true);
                    $checkproduct=App\AddToCart::where('user_ip',$userip)->get();
                    $prodis=0;
                  @endphp
                  @foreach($checkproduct as $ckpro)
                      @foreach(json_decode($cupon_discount->product_id) as $pro)
                        @if($ckpro->product_id == $pro)
                          @php
                             $prodis = $prodis + $cupon_discount->discount;
                          @endphp
                        @endif
                      @endforeach
                  @endforeach
                <td>TK {{$totalprice + $delevery_amount->amount - $prodis}}</td>
                <input type="hidden" name="total_price" value="{{$totalprice + $delevery_amount->amount - $prodis}}">
              @elseif($cupon_discount->discount_type==2)
                  @php
                    $userip = \Request::getClientIp(true);
                    $checkproduct=App\AddToCart::where('user_ip',$userip)->get();
                    $prodis=0;
                  @endphp
                  @foreach($checkproduct as $ckpro)
                      @foreach(json_decode($cupon_discount->product_id) as $pro)
                        @if($ckpro->product_id == $pro)
                          @php
                             $prodis = $prodis + $ckpro->product_price * $cupon_discount->discount /100;
                          @endphp
                        @endif
                      @endforeach
                  @endforeach
                  <td>TK {{$totalprice + $delevery_amount->amount - $prodis}}</td>
                  <input type="hidden" name="total_price" value="{{$totalprice + $delevery_amount->amount - $prodis}}">
              @endif
          @endif
    @else
    <td>TK {{$totalprice + $delevery_amount->amount}}</td>
    <input type="hidden" name="total_price" value="{{$totalprice + $delevery_amount->amount}}">
    @endif


    <input type="hidden" name="total_quantity" value="{{$allqty}}">
    <input type="hidden" name="delevery_amount" value="{{$delevery_amount->amount}}">
</tr>
