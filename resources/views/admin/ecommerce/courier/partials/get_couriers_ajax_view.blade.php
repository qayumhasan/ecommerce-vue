@foreach ($courier_ids as $key => $id)
@php
    $courier = DB::table('couriers')->where('id', $id)->first();
@endphp
<tr class="text-center">
    <td>{{ $courier->courier_name }}</td>
    <td>
        <input required type="number" class="form-control" name="fee[{{ $courier->id }}]" value="">
    </td>
    <td>
        <input type="radio" checked name="is_cash_on_delivery[{{ $courier->id }}]" value="0">
        <i class="fa fa-times text-danger mr-2" style="font-size:16px;"></i>
        <input type="radio" name="is_cash_on_delivery[{{ $courier->id }}]" value="1">
        <i class="fas fa-check text-success" style="font-size:16px;"></i>
    </td>
</tr>
@endforeach
