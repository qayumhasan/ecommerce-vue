<?php

namespace App\Http\Controllers\Admin;


use App\SmsModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Seo()
    {
        $seo = DB::table('seo')->first();
        return view('admin.setting.seo', compact('seo'));
    }

    public function SeoUpdate(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_key'] = $request->meta_key;
        $data['meta_description'] = $request->meta_description;
        $data['google_verification'] = $request->google_verification;
        $data['bing_verification'] = $request->bing_verification;
        $data['google_analytic'] = $request->google_analytic;
        $data['alexa_analytic'] = $request->alexa_analytic;
        DB::table('seo')->where('id', $id)->update($data);
        $notification = array(
            'messege' => 'Successfully SEO Updated ',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Social()
    {
        $social = DB::table('sitesetting')->first();
        return view('admin.setting.sitesetting', compact('social'));
    }

    public function SocialUpdate(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['company_name'] = $request->company_name;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['email_one'] = $request->email_one;
        $data['email_two'] = $request->email_two;
        $data['address'] = $request->address;
        $data['facebook'] = $request->facebook;
        $data['feed'] = $request->feed;
        $data['instagram'] = $request->instagram;
        $data['twitter'] = $request->twitter;
        $data['linkedin'] = $request->linkedin;
        $data['youtube'] = $request->youtube;
        $data['google'] = $request->google;
        $data['google_map'] = $request->google_map;
        DB::table('sitesetting')->where('id', $id)->update($data);
        $notification = array(
            'messege' => 'Successfully Setting Updated ',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function LogoSetting()
    {
        $logo = DB::table('logos')->first();
        return view('admin.setting.logo', compact('logo'));
    }

    public function AdminLogoUpdate(Request $request)
    {
        $id = $request->id;
        $admin_logo = $request->admin_logo;
        $background = $request->background;
        $data = array();
        if ($admin_logo && $background) {
            $adminpanellogo = hexdec(uniqid()) . '.' . $admin_logo->getClientOriginalExtension();
            Image::make($admin_logo)->resize(200, 50)->save('public/adminpanel/logos/' . $adminpanellogo);
            $data['admin_logo'] = 'public/adminpanel/logos/' . $adminpanellogo;
            $favicons = hexdec(uniqid()) . '.' . $background->getClientOriginalExtension();
            Image::make($background)->resize(2000, 1333)->save('public/adminpanel/logos/' . $favicons);
            $data['background'] = 'public/adminpanel/logos/' . $favicons;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } elseif ($admin_logo) {
            $adminpanellogo = hexdec(uniqid()) . '.' . $admin_logo->getClientOriginalExtension();
            Image::make($admin_logo)->resize(200, 50)->save('public/adminpanel/logos/' . $adminpanellogo);
            $data['admin_logo'] = 'public/adminpanel/logos/' . $adminpanellogo;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } elseif ($background) {
            $favicons = hexdec(uniqid()) . '.' . $background->getClientOriginalExtension();
            Image::make($background)->resize(2000, 1333)->save('public/adminpanel/logos/' . $favicons);
            $data['background'] = 'public/adminpanel/logos/' . $favicons;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Nothing To Update ',
                'alert-type' => 'info'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function AdminFrontLogoUpdate(Request $request)
    {
        $id = $request->id;
        $front_logo = $request->front_logo;
        $favicon = $request->favicon;
        $preloader = $request->preloader;
        $data = array();

        if ($front_logo && $favicon && $preloader) {
            $adminpanellogo = hexdec(uniqid()) . '.' . $front_logo->getClientOriginalExtension();
            Image::make($front_logo)->resize(230,60)->save('public/adminpanel/logos/' . $adminpanellogo);

            $data['front_logo'] = 'public/adminpanel/logos/' . $adminpanellogo;
            $favicons = hexdec(uniqid()) . '.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(32, 32)->save('public/adminpanel/logos/' . $favicons);
            $data['favicon'] = 'public/adminpanel/logos/' . $favicons;
            $website = hexdec(uniqid()) . '.' . $preloader->getClientOriginalExtension();
            Image::make($preloader)->resize(400, 300)->save('public/adminpanel/logos/' . $website);
            $data['preloader'] = 'public/adminpanel/logos/' . $website;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } elseif ($front_logo && $favicon) {
            $adminpanellogo = hexdec(uniqid()) . '.' . $front_logo->getClientOriginalExtension();
            Image::make($front_logo)->resize(230, 60)->save('public/adminpanel/logos/' . $adminpanellogo);

            $data['front_logo'] = 'public/adminpanel/logos/' . $adminpanellogo;
            $favicons = hexdec(uniqid()) . '.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(32, 32)->save('public/adminpanel/logos/' . $favicons);
            $data['favicon'] = 'public/adminpanel/logos/' . $favicons;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } elseif ($front_logo && $preloader) {
            $favicons = hexdec(uniqid()) . '.' . $front_logo->getClientOriginalExtension();
            Image::make($front_logo)->resize(32, 32)->save('public/adminpanel/logos/' . $favicons);

            $data['front_logo'] = 'public/adminpanel/logos/' . $favicons;
            $website = hexdec(uniqid()) . '.' . $preloader->getClientOriginalExtension();
            Image::make($preloader)->resize(400, 300)->save('public/adminpanel/logos/' . $website);

            $data['preloader'] = 'public/adminpanel/logos/' . $website;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } elseif ($favicon  && $preloader) {
            $adminpanellogo = hexdec(uniqid()) . '.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(32, 32)->save('public/adminpanel/logos/' . $adminpanellogo);
            $data['favicon'] = 'public/adminpanel/logos/' . $adminpanellogo;
            $website = hexdec(uniqid()) . '.' . $preloader->getClientOriginalExtension();
            Image::make($preloader)->resize(400, 300)->save('public/adminpanel/logos/' . $website);
            $data['preloader'] = 'public/adminpanel/logos/' . $website;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } elseif ($front_logo) {
            $adminpanellogo = hexdec(uniqid()) . '.' . $front_logo->getClientOriginalExtension();
            Image::make($front_logo)->resize(230, 60)->save('public/adminpanel/logos/' . $adminpanellogo);

            $data['front_logo'] = 'public/adminpanel/logos/' . $adminpanellogo;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } elseif ($favicon) {
            $favicons = hexdec(uniqid()) . '.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(32, 32)->save('public/adminpanel/logos/' . $favicons);
            $data['favicon'] = 'public/adminpanel/logos/' . $favicons;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } elseif ($preloader) {
            $website = hexdec(uniqid()) . '.' . $preloader->getClientOriginalExtension();
            Image::make($preloader)->resize(32, 32)->save('public/adminpanel/logos/' . $website);
            $data['preloader'] = 'public/adminpanel/logos/' . $website;
            $product = DB::table('logos')->where('id', $id)
                ->update($data);
            $notification = array(
                'messege' => 'Successfully Update',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Nothing To Update ',
                'alert-type' => 'info'
            );
            return Redirect()->back()->with($notification);
        }
    }

    //mmail setting
    public function MailSetting()
    {
        $smtp = DB::table('smtp')->first();
        $smssetting = SmsModel::first();
        return view('admin.setting.mail', compact('smtp', 'smssetting'));
    }

    public function smtpUpdate(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['driver'] = $request->driver;
        $data['host'] = $request->host;
        $data['port'] = $request->port;
        $data['from_address'] = $request->from_address;
        $data['from_name'] = $request->from_name;
        $data['encryption'] = $request->encryption;
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        DB::table('smtp')->where('id', $id)->update($data);
        // $smtp=DB::table('smtp')->first();

        //  Config::set('services.mail',[
        //    "driver" =>  $smtp->driver,
        //    "host" => $smtp->host,
        //    "port" => $smtp->port,
        //    "encryption" => $smtp->encryption,
        //    "from[address]" => $smtp->from_address,
        //    "from[name]" => $smtp->from_name,
        //    "username" => $smtp->username,
        //    "password" => $smtp->password,
        //    "sendmail" => "/usr/sbin/sendmail -bs"
        //  ]);
        $notification = array(
            'messege' => 'Successfully  Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function mailgunUpdate(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['mailgun_domain'] = $request->mailgun_domain;
        $data['mailgun_secret'] = $request->mailgun_secret;
        $data['mailgun_endpoint'] = $request->mailgun_endpoint;
        DB::table('smtp')->where('id', $id)->update($data);

        //  $mgn=DB::table('smtp')->first();
        // Config::set('services.mailgun',[
        //     "domain" =>  $mgn->mailgun_domain,
        //     "secret" => $mgn->mailgun_secret,
        //     "endpoint" => $mgn->mailgun_endpoint
        //   ]);
        $notification = array(
            'messege' => 'Successfully  Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function SocialmediaUpdate(Request $request){
      $id= $request->id;
      $update=DB::table('socials')->where('id',$id)->update([
        'facebook'=>$request->facebook,
        'twitter'=>$request->twitter,
        'youtube'=>$request->youtube,
        'instragram'=>$request->instragram,
        'google'=>$request->google,
        'linkend'=>$request->linkend,
        'feed'=>$request->feed,
      ]);
      if($update){
        $notification = array(
            'messege' => 'Successfully  Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
      }else{
        $notification = array(
            'messege' => 'updated Faild',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
      }

    }



    public function messagenew()
    {
        return view('admin.setting.message');
    }
}
