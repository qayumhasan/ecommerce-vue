@foreach ($courier_ids as $key => $id)
@php
    $courier = DB::table('couriers')->where('id', $id)->first();
    $check_up_courier = DB::table('upazila_couriers')->where('upazila_id', $upazila_courier_id)->where('courier_id', $id)->first();
@endphp
<tr class="text-center">
    <td>{{ $courier->courier_name }}</td>
    <td>
        @if ($check_up_courier)
        <input required type="number" class="form-control" name="fee[{{ $courier->id }}]" value="{{ $check_up_courier->fee }}">
        @else
        <input required type="number" class="form-control" name="fee[{{ $courier->id }}]" value="">
        @endif

    </td>
    <td>
        @if ($check_up_courier)
        <input type="radio" {{ $check_up_courier->is_cash_on_delivery == 0 ? "checked" : "" }} name="is_cash_on_delivery[{{ $courier->id }}]" value="0"
        >
        <i class="fa fa-times text-danger mr-2" style="font-size:16px;"></i>
        <input type="radio" {{ $check_up_courier->is_cash_on_delivery == 1 ? "checked" : "" }} name="is_cash_on_delivery[{{ $courier->id }}]" value="1">
        <i class="fas fa-check text-success" style="font-size:16px;"></i>
        @else
        <input type="radio" checked name="is_cash_on_delivery[{{ $courier->id }}]" value="0">
        <i class="fa fa-times text-danger mr-2" style="font-size:16px;"></i>
        <input type="radio" name="is_cash_on_delivery[{{ $courier->id }}]" value="1">
        <i class="fas fa-check text-success" style="font-size:16px;"></i>
        @endif
    </td>
</tr>
@endforeach
