<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\UserAddress;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function customerAccount ()
    {
        $user = User::where('id', Auth::user('web')->id)->firstOrFail();
        if ($user->id != Auth::user('web')->id) {
            return redirect()->back();
        }
        $userAddress = '';
        if (UserAddress::where('user_id', Auth::user()->id)->first()) {
            $userAddress = UserAddress::where('user_id', Auth::user()->id)->first();
        }

        $divisions = DB::table('divisions')->where('country_id', 18)->get();
        $districts = DB::table('districts')->get();
        $upazilas = DB::table('upazilas')->get();

        return view('frontend.accounts.account', compact('user', 'divisions', 'districts', 'upazilas', 'userAddress'));


    }

    public function customerAccountUpdate(Request $request)
    {
       $this->validate($request, [
           'name' => 'required',
           'phone' => 'required|unique:users,phone,'.Auth::user()->id,
       ]);

        if ($request->division_id) {
            $this->validate($request, [
                'district_id' => 'required',
                'upazila_id' => 'required',
                'postal_code' => 'required',
            ],
            [
                'district_id.required' => 'You have selected division, so now district field is required.',
                'upazila_id.required' => 'You have selected division, so now upazila field is required.',
                'postal_code.required' => 'You have selected division, so now postal code field is required.',
            ]);
        }
        User::where('id', Auth::user('web')->id)->update([
            'username' => $request->name,
            'phone' => $request->phone,
            'company' => $request->company ? $request->company : NULL,
        ]);
       $checkUserAddress = UserAddress::where('user_id', Auth::user()->id)->first();
       if ($checkUserAddress) {
            $checkUserAddress->user_address = $request->address ? $request->address : NULL;
            $checkUserAddress->user_post_office = $request->post_office ? $request->post_office : NULL;
            $checkUserAddress->user_postcode = $request->postal_code ? $request->postal_code : NULL;
            $checkUserAddress->user_country_id = $request->country_id ? $request->country_id : NULL;
            $checkUserAddress->user_division_id = $request->division_id ? $request->division_id : NULL;
            $checkUserAddress->user_district_id = $request->district_id ? $request->district_id : NULL;
            $checkUserAddress->user_upazila_id = $request->upazila_id ? $request->upazila_id : NULL;
            $checkUserAddress->save();
       }else {
           UserAddress::insert([
                'user_id' => Auth::user()->id,
                'user_address' => $request->address ? $request->address : NULL,
                'user_post_office' => $request->post_office ? $request->post_office : NULL,
                'user_postcode' => $request->postal_code ? $request->postal_code : NULL,
                'user_country_id' => $request->country_id ? $request->country_id : NULL,
                'user_division_id' => $request->division_id ? $request->division_id : NULL,
                'user_district_id' => $request->district_id ? $request->district_id : NULL,
                'user_upazila_id' => $request->upazila_id ? $request->upazila_id : NULL,
           ]);
       }


       $notification = array(
        'messege' => 'Successfully profile updated.',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }

    public function customerGetDistrictByDivision($divisionId)
    {
        $districts = DB::table('districts')->where('division_id', $divisionId)->select('name', 'id')->get();
        return response()->json($districts);
    }

    public function customerGetSubDistrictByDistrict($districtId)
    {
        $subDistricts = DB::table('upazilas')->where('district_id', $districtId)->select('name', 'id')->get();
        return response()->json($subDistricts);
    }

    

}
