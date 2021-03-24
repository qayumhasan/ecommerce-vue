
    @foreach($product_ids as $key => $id)
        @php
            $product = \App\Product::findOrFail($id);
        @endphp
        <tr class="text-center">
            <td>{{ $product->product_sku }}</td>
            <td>{{ $product->product_name }}</td>
            <td><img src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" height="45px"></td>

            <td>{{ $product->product_price }}</td>
            <td>
                <input required type="number" class="form-control" name="discount[{{ $product->id }}]" value="">
            </td>
            <td>
                <select required name="discount_type[]" class="form-control" id="">
                    <option value="1">Amount</option>
                    <option value="2">%</option>
                </select>
            </td>
        </tr>
    @endforeach
