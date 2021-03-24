@foreach ($product_ids as $key => $id)
@php
    $product = \App\Product::findOrFail($id);
@endphp
<tr class="text-center">
    {{-- <td colspan="2"><img src="{{ asset('public/uploads/products/thumbnail/cartthum/'.$product->thumbnail_img) }}" height="45px"><span class="ml-2"></span>{{ $product->product_name }}</td> --}}
    <td>{{ $product->product_sku }}</td>
    <td>{{ $product->product_name }}</td>
    <td><img src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" height="45px"></td>
    <td>{{ $product->product_price }}</td>
    <td>
        @php
            $flashDealDetails = \App\FlashDealDetail::where('product_id', $product->id)->where('flash_deal_id', $flash_deal_id)->first();
        @endphp
        @if ($flashDealDetails)
        <input required type="number" class="form-control" name="discount[{{ $product->id }}]" value="{{ $flashDealDetails->discount }}">
        @else
        <input required type="number" class="form-control" name="discount[{{ $product->id }}]" value="">
        @endif

    </td>
    <td>
        @if ($flashDealDetails)
            <select required name="discount_type[]" class="form-control" id="">
                <option {{ $flashDealDetails->discount_type == 1 ? 'SELECTED' : ''  }} value="1">Amount</option>
                <option {{ $flashDealDetails->discount_type == 2 ? 'SELECTED' : ''  }} value="2">%</option>
            </select>
        @else
            <select required name="discount_type[]" class="form-control" id="">
                <option value="1">Amount</option>
                <option value="2">%</option>
            </select>
        @endif

    </td>
</tr>
@endforeach
