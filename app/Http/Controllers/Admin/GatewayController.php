<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Activation;
use App\VerificationOption;

class GatewayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function PaymentGateway()
    {
        return view('admin.setting.gateway');
    }



    public function update(Request $request)
    {
        $id = $request->id;
        $update = DB::table('gateway')->where('id', $id)->update([
            'client_id' => $request['client_id'],
            'secret_id' => $request['secret_id'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Gateway Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Gateway Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    //
    public function sociallogin()
    {
        return view('admin.setting.social');
    }


    // smtp
    public function smtp()
    {
        return view('admin.setting.smtp');
    }




    public function socialloginupdate(Request $request)
    {

        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }
        return back();
    }

    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . $type . '=' . $val);
            }
        }
    }


    public function activation()
    {
        return view('admin.activation.all');
    }

    //deacitve
    public function fbupdate($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'facebook' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    //fb  active
    public function fbupdatedeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'facebook' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // google active
    public function googleactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'google' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // google deactive

    public function googledeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'google' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // smtp active
    public function smtpactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'smtp' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // smtp deactive
    public function smtpdeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'smtp' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // paypal active
    public function paypalactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'paypal' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    //paypal deactive
    public function paypaldeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'paypal' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

// surjo
       public function surjoactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'surjopay' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function surjodeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'surjopay' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // stripe
    public function stripeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'stripe' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // stripe
    public function stripedeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'stripe' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // ssl
    public function sslactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'ssl_commercez' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    //ssl
    public function ssldeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'ssl_commercez' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // cash
    public function cashactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'cashondelevery' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // deactive
    public function cashdeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'cashondelevery' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // sms
    public function smsactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'sms' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function smsdeactive($id)
    {
        $deactive = Activation::where('id', 1)->update([
            'sms' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function changeVerificationOption($verifyId)
    {
        $changeVerifyOption =   VerificationOption::where('id', $verifyId)->first();
        if ($changeVerifyOption->verify_with == 1) {
            $changeVerifyOption->update([
                'verify_with' => 0
            ]);
        } else {
            $changeVerifyOption->update([
                'verify_with' => 1
            ]);
        }

        $notification = array(
            'messege' => 'Update Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
