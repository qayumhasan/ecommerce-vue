<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\User;
use App\Wallet;
use App\UserAddress;
use Carbon\Carbon;
use Image;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function wallet(){
        $allwallet=Wallet::orderBy('id','DESC')->get();
        return view('admin.ecommerce.customer.wallet',compact('allwallet'));
    }
    public function walletdelete($id){
        $delete=Wallet::where('id',$id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function walletactive($id){

        $update=Wallet::where('id',$id)->update([
            'payment_status'=>1,

        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function index()
    {
        $alluser = Admin::where('is_superadmin', 0)->orderBy('id', 'ASC')->get();
        return view('admin.ecommerce.user.all', compact('alluser'));
    }

    public function add()
    {
        return view('admin.ecommerce.user.add');
    }
    public function insert(Request $request)
    {
        $insert = Admin::insertGetId([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'avatar' => '',
            'password' => Hash::make($request['password']),
            'type' => $request['type'],
            'category' => $request['category'],
            'user' => $request['user'],
            'extra' => $request['extra'],
            'product' => $request['product'],
            'ecommerce_setup' => $request['ecommerce_setup'],
            'pending_order' => $request['pending_order'],
            'process_order' => $request['process_order'],
            'on_delevery' => $request['on_delevery'],
            'reject_order' => $request['reject_order'],
            'reports' => $request['reports'],
            'messaging' => $request['messaging'],
            'frontend_setup' => $request['frontend_setup'],
            'flash_deal' => $request['flash_deal'],
            'courier_setting' => $request['courier_setting'],
            'settings' => $request['settings'],
            'blog' => $request['blog'],
            'customer' => $request['customer'],
            'trash' => $request['trash'],
            'created_at' => Carbon::now()->todateTimeString(),
        ]);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(350, 182)->save('public/uploads/user/' . $ImageName);
            Admin::where('id', $insert)->update([
                'avatar' => $ImageName,
            ]);
        }
        if ($insert) {
            $notification = array(
                'messege' => 'User Add Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'User Add Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function edit($id)
    {
        $data = Admin::where('id', $id)->first();
        return view('admin.ecommerce.user.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $oldimage = $request->old_pic;
        $update = Admin::where('id', $id)->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'type' => $request['type'],
            'category' => $request['category'],
            'user' => $request['user'],
            'extra' => $request['extra'],
            'product' => $request['product'],
            'ecommerce_setup' => $request['ecommerce_setup'],
            'pending_order' => $request['pending_order'],
            'process_order' => $request['process_order'],
            'on_delevery' => $request['on_delevery'],
            'reject_order' => $request['reject_order'],
            'reports' => $request['reports'],
            'messaging' => $request['messaging'],
            'frontend_setup' => $request['frontend_setup'],
            'flash_deal' => $request['flash_deal'],
            'courier_setting' => $request['courier_setting'],
            'settings' => $request['settings'],
            'customer' => $request['customer'],
            'blog' => $request['blog'],
            'trash' => $request['trash'],
            'updated_at' => Carbon::now()->todateTimeString(),
        ]);
        if ($request->hasFile('avatar')) {
            if ($oldimage) {
                unlink('public/uploads/user/' . $oldimage);
                $image = $request->file('avatar');
                $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(350, 182)->save('public/uploads/user/' . $ImageName);
                Admin::where('id', $id)->update([
                    'avatar' => $ImageName,
                ]);
            } else {
                $image = $request->file('pic');
                $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(350, 182)->save('public/uploads/user/' . $ImageName);
                Admin::where('id', $id)->update([
                    'avatar' => $ImageName,
                ]);
            }
        }



        if ($update) {
            $notification = array(
                'messege' => 'User Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'User Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($id)
    {
        $delet = Admin::where('id', $id)->delete();
        if ($delet) {
            $notification = array(
                'messege' => 'User Delete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'User Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // customer
    public function customer()
    {
        $allcustommer = User::orderBy('id', 'DESC')->get();
        return view('admin.ecommerce.customer.all', compact('allcustommer'));
    }
    // customer delete
    public function customerdelete($id)
    {
        $deladdreess = UserAddress::where('user_id', $id)->orderBy('id', 'DESC')->delete();
        $deluser = User::where('id', $id)->orderBy('id', 'DESC')->delete();
        if ($deluser) {
            $notification = array(
                'messege' => 'Customer Delete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Customer Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // custommer view
    public function customerview($id)
    {
        $profile = User::where('id', $id)->first();
        return view('admin.ecommerce.customer.profile', compact('profile'));
    }

    public function adminupdate(Request $request){
          $id=Auth::user()->id;
          $update=Admin::where('id',$id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
          ]);
            if($request->hasFile('pic'))  {
             $image = $request->file('pic');
             $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
             Image::make($image)->resize(350, 182)->save('public/uploads/user/' . $ImageName);
             Admin::where('id', $id)->update([
                 'avatar' => $ImageName,
             ]);
         }
         if($update){
             $notification = array(
                 'messege' => 'update success',
                 'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
         }else{
             $notification = array(
                 'messege' => 'update faild',
                 'alert-type' => 'error'
             );
             return Redirect()->back()->with($notification);
         }

    }


    public function customerupdate(Request $request){
      $id=$request->id;
      $update=User::where('id',$id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
      ]);
        if($request->hasFile('pic'))  {
         $image = $request->file('pic');
         $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
         Image::make($image)->resize(350, 182)->save('public/uploads/customer/' . $ImageName);
         User::where('id', $id)->update([
             'avatar' => $ImageName,
         ]);
     }
     if($update){
         $notification = array(
             'messege' => 'update success',
             'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
     }else{
         $notification = array(
             'messege' => 'update faild',
             'alert-type' => 'error'
         );
         return Redirect()->back()->with($notification);
     }
    }
}
