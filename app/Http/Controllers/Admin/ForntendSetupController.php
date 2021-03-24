<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutUs;
use App\TermsAndCondition;
use App\Faq;
use Carbon\Carbon;
use Image;


class ForntendSetupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    }
    // about us
    public function aboutus()
    {
        $data = AboutUs::where('id', 1)->first();
        return view('admin.forntendsetup.aboutus.add', compact('data'));
    }
    // update aboutus
    public function aboutusupdate(Request $request)
    {
        $id = $request->id;
        $oldpic = $request->oldpic;

        $update = AboutUs::where('id', $id)->update([
            'about_text' => $request['about_text'],
            'our_mission' => $request['our_mission'],
            'our_vission' => $request['our_vission'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('pic')) {
            if ($oldpic) {
                unlink('public/uploads/aboutus/' . $oldpic);
                $image = $request->file('pic');
                $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(600,504)->save('public/uploads/aboutus/' . $ImageName);
                AboutUs::where('id', $id)->update([
                    'image' => $ImageName,
                ]);
            } else {
                $image = $request->file('pic');
                $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(600,504)->save('public/uploads/aboutus/' . $ImageName);
                AboutUs::where('id', $id)->update([
                    'image' => $ImageName,
                ]);
            }
        }
        if ($update) {
            $notification = array(
                'messege' => 'AboutUs Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'AboutUs Update Faild',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function termsandcondition()
    {
        $data = TermsAndCondition::where('id', 1)->first();
        return view('admin.forntendsetup.termsandcondition.add', compact('data'));
    }
    // update terms and condition
    public function termsandconditionupdate(Request $request)
    {
        $id = $request->id;
        $update = TermsAndCondition::where('id', $id)->update([
            'termsandcondition' => $request['termsandcondition'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
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
    // faq
    public function faq()
    {
        return view('admin.forntendsetup.faq.add');
    }
    // insert
    public function faqinsert(Request $request)
    {
        $insert = Faq::insertGetId([
            'faq_ques' => $request['faq_ques'],
            'faq_ans' => $request['faq_ans'],
        ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Insert Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // all faq
    public function allfaq()
    {
        $allfaq = Faq::where('is_deleted', 0)->get();
        return view('admin.forntendsetup.faq.all', compact('allfaq'));
    }
    //deactive
    public function faqdeactive($id)
    {
        $deactive = Faq::where('id', $id)->update([
            'faq_status' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Deactive Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Deactive Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // active
    public function faqactive($id)
    {
        $active = Faq::where('id', $id)->update([
            'faq_status' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Active Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Active Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // faq edit
    public function faqedit($faq_id)
    {
        $data = Faq::where('id', $faq_id)->first();
        return json_encode($data);
    }
    // faq update
    public function faqupdate(Request $request)
    {
        $id = $request->id;
        $update = Faq::where('id', $id)->update([
            'faq_ques' => $request['faq_ques'],
            'faq_ans' => $request['faq_ans'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'messege' => 'update Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'update Faild',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // faq softdelete
    public function faqsoftdelete($id)
    {
        $delete = Faq::where('id', $id)->update([
            'is_deleted' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($delete) {
            $notification = array(
                'messege' => 'softdelete Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'softdelete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // multiple soft delete
    public function faqmultidelete(Request $request)
    {
        $deleteid = $request['delid'];

        if ($deleteid) {
            $delet = Faq::whereIn('id', $deleteid)->update([
                'is_deleted' => '1',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            if ($delet) {
                $notification = array(
                    'messege' => 'Multiple Delete Success',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Multiple Delete Faild',
                    'alert-type' => 'errors'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Nothing To Delete',
                'alert-type' => 'info'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // restore faq
    public function faqrecover($id)
    {
        $recover = Faq::where('id', $id)->update([
            'is_deleted' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($recover) {
            $notification = array(
                'messege' => 'Recover Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Recover Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function faqhearddelete($id)
    {
        $delete = Faq::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Recover Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Recover Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
