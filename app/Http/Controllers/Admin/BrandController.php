<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
    	$allbrand=Brand::where('is_deleted',0)->get();
    	return view('admin.ecommerce.brand.all',compact('allbrand'));
    }
    // insert
    public function insert(Request $request){

    	$insert=Brand::insertGetId([
    		'brand_name'=>$request['brand_name'],
    		'brand_logo'=>'',
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);

    	if($request->hasFile('pic')){
                $image=$request->file('pic');
                $ImageName='brand'.'_'.time().'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(350,182)->save('public/uploads/brand/' . $ImageName);
                
                Brand::where('id',$insert)->update([
                    'brand_logo'=>$ImageName,
                ]);
            }
        if($insert){
        	$notification=array(
            'messege'=>'Brand Insert Success',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        }else{
        	$notification=array(
            'messege'=>'Brand Insert faild',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
        }

    }


    // active
    public function active($id){
    	$active=Brand::where('id',$id)->update([
			'brand_status'=>'1',
			'updated_at'=>Carbon::now()->toDateTimeString(),

			]);
    	if($active){
    		$notification=array(
            'messege'=>'Brand Active Success',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    	}else{
    		$notification=array(
            'messege'=>'Brand Insert faild',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
    	}
    }
    // deactive
    public function deactive($id){
    	$deactive=Brand::where('id',$id)->update([
			'brand_status'=>'0',
			'updated_at'=>Carbon::now()->toDateTimeString(),

			]);
    	if($deactive){
    		$notification=array(
            'messege'=>'Brand Active Success',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    	}else{
    		$notification=array(
            'messege'=>'Brand Insert faild',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
    	}
    }
    public function softdelete($id){
    	$deactive=Brand::where('id',$id)->update([
			'is_deleted'=>'1',
			'updated_at'=>Carbon::now()->toDateTimeString(),

			]);
    	if($deactive){
    		$notification=array(
            'messege'=>'Brand delete Success',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    	}else{
    		$notification=array(
            'messege'=>'Brand delete faild',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
    	}
    }
    // multi delete
    public function multidel(Request $request){
    	 $deleteid=$request->Input('delid');
         if($deleteid){
         $delet=Brand::whereIn('id',$deleteid)->update([
         		'is_deleted'=>'1',
         		'updated_at'=>Carbon::now()->toDateTimeString(),
         ]);
         if($delet){
             $notification=array(
                'messege'=>'success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
             $notification=array(
                'messege'=>'error',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
            }
         }else{
            $notification=array(
                'messege'=>'Nothing To Delete',
                'alert-type'=>'info'
                 );
             return redirect()->back()->with($notification);
         }
    }

    public function recover($id){
    	$deactive=Brand::where('id',$id)->update([
			'is_deleted'=>'0',
			'updated_at'=>Carbon::now()->toDateTimeString(),

			]);
    	if($deactive){
    		$notification=array(
            'messege'=>'Brand Recover Success',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    	}else{
    		$notification=array(
            'messege'=>'Brand Recover faild',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
    	}
    }

    public function delete($id){
    		$delete=Brand::where('id',$id)->delete();
    		if($delete){
    			$notification=array(
		            'messege'=>'Brand Delete Success',
		            'alert-type'=>'success'
		             );
		           return Redirect()->back()->with($notification);
    		}else{
	    		$notification=array(
	            'messege'=>'Brand Delete Success',
	            'alert-type'=>'error'
	             );
	           return Redirect()->back()->with($notification);
    		}
    }
    public function edit($brand_id){
          $data=Brand::where('id',$brand_id)->first();
          return json_encode($data);
    }
    public function update(Request $request){

        $id=$request->id;
        $oldicon=$request->old_image;
            $update=Brand::where('id',$id)->update([
            'brand_name'=>$request['brand_name'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
         if($request->hasFile('pic')){
                    if($oldicon){
                        unlink('public/uploads/brand/'.$oldicon);
                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/brand/'.$ImageName);
                          Image::make($image)->resize(130,90)->save('public/uploads/brand/mobile/'.$ImageName);
                        Brand::where('id',$id)->update([
                            'brand_logo'=>$ImageName,
                        ]);
                    }
                    else{
                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/brand/'.$ImageName);
                        Image::make($image)->resize(130,90)->save('public/uploads/brand/mobile/'.$ImageName);
                        Brand::where('id',$id)->update([
                            'brand_logo'=>$ImageName,
                        ]);
                    }
              }
              else{

              }

          if($update){
             $notification=array(
            'messege'=>'Brand Update Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
            }
    }
    // terms and condition
    public function termsandcondition(){
        return view('admin.termsandcondition.add');
    }
}
