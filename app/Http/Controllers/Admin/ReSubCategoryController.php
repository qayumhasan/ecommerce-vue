<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubCategory;
use App\ReSubCategory;
use App\Product;
use Carbon\Carbon;
use Image;
use DB;

class ReSubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $allresubcate = DB::table('re_sub_categories')
            ->join('categories', 're_sub_categories.cate_id', '=', 'categories.id')
            ->join('sub_categories', 're_sub_categories.subcate_id', '=', 'sub_categories.id')
            ->select('re_sub_categories.*', 'categories.cate_name', 'sub_categories.subcate_name')
            ->where('re_sub_categories.is_deleted', 0)
            ->get();
        return view('admin.ecommerce.resubcategory.all', compact('allresubcate'));
    }
    public function subcate($cate_id)
    {
        $data = SubCategory::where('cate_id', $cate_id)->get();

        return json_encode($data);
    }

    public function insert(Request $request)
    {
        $title = strtolower($request['resubcate_name']);
        $resubcate_slug = $request['resubcate_slug'];

        $inputslug = preg_replace('/[^A-Za-z0-9-]+/', '-', $resubcate_slug);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $title);

        if ($resubcate_slug) {
            $insert = ReSubCategory::insertGetId([
                'resubcate_name' => $request['resubcate_name'],
                'cate_id' => $request['cate_id'],
                'resubcate_slug' => $inputslug,
                'subcate_id' => $request['subcate_id'],
                'resubcate_icon' => '',
                'resubcate_tag' => $request['resubcate_tag'],
                'created_at' => Carbon::now()->toDateTimeString(),

            ]);
            if ($request->hasFile('icon')) {

                $image = $request->file('icon');
                $ImageName = 'category_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(32, 32)->save('public/uploads/resubcategory/' . $ImageName);
                ReSubCategory::where('id', $insert)->update([
                    'resubcate_icon' => $ImageName,
                ]);
            } else {
            }
            if ($insert) {
                $notification = array(
                    'messege' => 'ReSubCategory Insert Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'ReSubCategory Insert Faild',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $insert = ReSubCategory::insertGetId([
                'resubcate_name' => $request['resubcate_name'],
                'cate_id' => $request['cate_id'],
                'resubcate_slug' => $slug,
                'subcate_id' => $request['subcate_id'],
                'resubcate_icon' => '',
                'resubcate_tag' => $request['resubcate_tag'],
                'created_at' => Carbon::now()->toDateTimeString(),

            ]);
            if ($request->hasFile('icon')) {
                $image = $request->file('icon');
                $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(32, 32)->save('public/uploads/resubcategory/' . $ImageName);
                ReSubCategory::where('id', $insert)->update([
                    'resubcate_icon' => $ImageName,
                ]);
            } else {
            }


            if ($insert) {
                $notification = array(
                    'messege' => 'ReSubCategory Insert Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'ReSubCategory Insert Faild',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        }
    }
    // active
    public function active($id)
    {
        $active = ReSubCategory::where('id', $id)->update([
            'resubcate_status' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'ReSubCategory Active Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'ReSubCategory DeActive Success',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function deactive($id)
    {
        $deactive = ReSubCategory::where('id', $id)->update([
            'resubcate_status' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'ReSubCategory Active Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'ReSubCategory DeActive Success',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function softdelete($id)
    {
        $softdelete = ReSubCategory::where('id', $id)->update([
            'is_deleted' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($softdelete) {
            $notification = array(
                'messege' => 'ReSubCategory delete Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'ReSubCategory delete Success',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // multuple soft delete
    public function multisoftdel(Request $request)
    {
        $deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = ReSubCategory::whereIn('id', $deleteid)->update([
                'is_deleted' => '1',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            if ($delet) {
                $notification = array(
                    'messege' => 'success',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'error',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Nothing To Delete',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }

    // edit
    public function edit($resubcate_id)
    {
        $data = ReSubCategory::where('id', $resubcate_id)->first();
        return json_encode($data);
    }
    // update
    public function update(Request $request)
    {
        $id = $request->id;
        $oldicon = $request->old_icon;

        $title = strtolower($request['resubcate_name']);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $title);

        $inputslug = strtolower($request['resubcate_slug']);
        $sluginput = preg_replace('/[^A-Za-z0-9-]+/', '-', $inputslug);

        if ($inputslug) {
            $update = ReSubCategory::where('id', $id)->update([
                'resubcate_name' => $request['resubcate_name'],
                'cate_id' => $request['cate_id'],
                'subcate_id' => $request['subcate_id'],
                'resubcate_slug' => $sluginput,
                'resubcate_icon' => '',
                'resubcate_tag' => $request['resubcate_tag_edit'],
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            if ($request->hasFile('icon')) {
                if ($oldicon) {
                    unlink('public/uploads/resubcategory/' . $oldicon);
                    $image = $request->file('icon');
                    $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(32, 32)->save('public/uploads/resubcategory/' . $ImageName);
                    ReSubCategory::where('id', $id)->update([
                        'resubcate_icon' => $ImageName,
                    ]);
                } else {
                    $image = $request->file('icon');
                    $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(32, 32)->save('public/uploads/resubcategory/' . $ImageName);
                    ReSubCategory::where('id', $id)->update([
                        'resubcate_icon' => $ImageName,
                    ]);
                }
            } else {
            }

            if ($update) {
                $notification = array(
                    'messege' => 'Category Update Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Category Update Faild',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $update = ReSubCategory::where('id', $id)->update([
                'resubcate_name' => $request['resubcate_name'],
                'cate_id' => $request['cate_id'],
                'subcate_id' => $request['subcate_id'],
                'resubcate_slug' => $slug,
                'resubcate_icon' => '',
                'resubcate_tag' => $request['resubcate_tag_edit'],
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            if ($request->hasFile('icon')) {
                if ($oldicon) {
                    unlink('public/uploads/resubcategory/' . $oldicon);
                    $image = $request->file('icon');
                    $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(32, 32)->save('public/uploads/resubcategory/' . $ImageName);
                    ReSubCategory::where('id', $id)->update([
                        'resubcate_icon' => $ImageName,
                    ]);
                } else {
                    $image = $request->file('icon');
                    $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(32, 32)->save('public/uploads/resubcategory/' . $ImageName);
                    ReSubCategory::where('id', $id)->update([
                        'resubcate_icon' => $ImageName,
                    ]);
                }
            } else {
            }

            if ($update) {
                $notification = array(
                    'messege' => 'Category Update Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Category Update Faild',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        }
    }
    // restore
    public function restore($id)
    {
        $restore = ReSubCategory::where('id', $id)->update([
            'is_deleted' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($restore) {
            $notification = array(
                'messege' => 'ReSubCategory delete Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'ReSubCategory delete Success',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    //
    public function delete($id)
    {
        $del = ReSubCategory::where('id', $id)->first();
        $pro = Product::where('resubcate_id', $id)->first();
   
        if ($pro) {
                $notification = array(
                    'messege' => 'Please Delete under this Resusubcate',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            
        } else {
            $delete = ReSubCategory::where('id', $id)->delete();
            if ($delete) {
                $notification = array(
                    'messege' => 'delete Success',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'delete Success',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        }
    }
}
