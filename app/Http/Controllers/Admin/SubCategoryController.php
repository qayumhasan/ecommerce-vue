<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubCategory;
use App\Product;
use App\ReSubCategory;
use Carbon\Carbon;
use Image;
use DB;

class SubCategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // index
    public function index(){
    	// $allsubcate=SubCategory::where('is_deleted',0)->get();

    	$allsubcate = DB::table('sub_categories')
            ->join('categories', 'sub_categories.cate_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.cate_name')
            ->where('sub_categories.is_deleted',0)
            ->latest()
            ->get();
    	return view('admin.ecommerce.subcategory.all',compact('allsubcate'));
    }

    // insert
    public function insert(Request $request){

    	$title=strtolower($request['subcate_name']);
    	$subcate_slug=$request['subcate_slug'];

    	$inputslug=preg_replace('/[^A-Za-z0-9-]+/', '-',$subcate_slug);
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
 if($subcate_slug){
    	$insert=SubCategory::insertGetId([
    		'subcate_name'=>$request['subcate_name'],
    		'subcate_image'=>'',
            'subcate_icon'=>'',
    		'subcate_slug'=>$inputslug,
            'subcate_tag'=>$request['subcate_tag'],
            'cate_id'=>$request['cate_id'],
    		'created_at'=>Carbon::now()->toDateTimeString(),

    	]);
            if($request->hasFile('pic') && $request->hasFile('icon')){

                        $image=$request->file('pic');
                        $ImageName='subcategory_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$insert)->update([
                            'subcate_image'=>$ImageName,
                        ]);
                        $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$insert)->update([
                            'subcate_icon'=>$ImageName,
                        ]);
              }
              elseif($request->hasFile('pic')){
                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$insert)->update([
                            'subcate_image'=>$ImageName,
                        ]);
              }
              elseif($request->hasFile('icon')){
                    $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$insert)->update([
                            'subcate_icon'=>$ImageName,
                        ]);

              }else{

              }


    	if($insert){
		  $notification=array(
                'messege'=>'Category Insert Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
    	}
    	else{
    		$notification=array(
                'messege'=>'Category Insert Faild',
                'alert-type'=>'danger'
                 );
               return Redirect()->back()->with($notification);
    	}
    }else{
    	$insert=SubCategory::insertGetId([
    		'subcate_name'=>$request['subcate_name'],
    		'subcate_image'=>'',
            'subcate_icon'=>'',
    		'subcate_slug'=>$slug,
            'subcate_tag'=>$request['subcate_tag'],
            'cate_id'=>$request['cate_id'],
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
            if($request->hasFile('pic') && $request->hasFile('icon')){

                        $image=$request->file('pic');
                        $ImageName='subactegory'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$insert)->update([
                            'subcate_image'=>$ImageName,
                        ]);
                        $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$insert)->update([
                            'subcate_icon'=>$ImageName,
                        ]);
              }
              elseif($request->hasFile('pic')){
                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$insert)->update([
                            'subcate_image'=>$ImageName,
                        ]);
              }
              elseif($request->hasFile('icon')){
                    $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$insert)->update([
                            'subcate_icon'=>$ImageName,
                        ]);

              }else{

              }


    	if($insert){
		  $notification=array(
                'messege'=>'SubCategory Insert Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
    	}
    	else{
    		$notification=array(
                'messege'=>'SubCategory Insert Faild',
                'alert-type'=>'danger'
                 );
               return Redirect()->back()->with($notification);
    	}
     }
  }


// edit
   public function edit($subcate_id){
       $data=SubCategory::where('id',$subcate_id)->first();
        return json_encode($data);
   }
   // update

   public function update(Request $request){
   		$id=$request->id;
        $old=$request->old_image;
        $oldicon=$request->old_icon;

    	$title=strtolower($request['subcate_name']);
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
        $subcate_slug=$request['subcate_slug'];
        $inputslug=preg_replace('/[^A-Za-z0-9-]+/', '-', $subcate_slug);

        if($subcate_slug){
        		$update=SubCategory::where('id',$id)->update([
    		'subcate_name'=>$request['subcate_name'],
    		'subcate_slug'=>$inputslug,
            'subcate_tag'=>$request['subcate_tag_edit'],
            'cate_id'=>$request['cate_id'],
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);

         if($request->hasFile('pic') && $request->hasFile('icon')){
                    if($old){

                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_image'=>$ImageName,
                        ]);

                        $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_icon'=>$ImageName,
                        ]);
                    }
                    else{
                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_image'=>$ImageName,
                        ]);
                        $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_icon'=>$ImageName,
                        ]);
                    }
              }elseif($request->hasFile('pic')){

                 if($old){

                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_image'=>$ImageName,
                        ]);
                    }
                    else{
                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_image'=>$ImageName,
                        ]);
                    }

              }
              elseif($request->hasFile('icon')){
                    $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_icon'=>$ImageName,
                        ]);

              }else{

              }

          if($update){
	 		 $notification=array(
            'messege'=>'SubCategory Update Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
			}
    	else{
    		$notification=array(
                'messege'=>'SubCategory Update Faild',
                'alert-type'=>'danger'
                 );
               return Redirect()->back()->with($notification);
    	}

        }else{
        	$update=SubCategory::where('id',$id)->update([
    		'subcate_name'=>$request['subcate_name'],
    		'subcate_slug'=>$slug,
            'subcate_tag'=>$request['subcate_tag_edit'],
            'cate_id'=>$request['cate_id'],
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);

         if($request->hasFile('pic') && $request->hasFile('icon')){
                    if($old){

                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_image'=>$ImageName,
                        ]);

                        $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_icon'=>$ImageName,
                        ]);
                    }
                    else{
                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_image'=>$ImageName,
                        ]);
                        $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_icon'=>$ImageName,
                        ]);
                    }
              }elseif($request->hasFile('pic')){

                 if($old){

                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_image'=>$ImageName,
                        ]);
                    }
                    else{
                        $image=$request->file('pic');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(350,182)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_image'=>$ImageName,
                        ]);
                    }

              }
              elseif($request->hasFile('icon')){
                    $image=$request->file('icon');
                        $ImageName='_'.'_'.time().'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(20,20)->save('public/uploads/subcategory/'.$ImageName);
                        SubCategory::where('id',$id)->update([
                            'subcate_icon'=>$ImageName,
                        ]);

              }else{

              }

          if($update){
	 		 $notification=array(
            'messege'=>'SubCategory Update Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
			}
    	else{
    		$notification=array(
                'messege'=>'SubCategory Update Faild',
                'alert-type'=>'danger'
                 );
               return Redirect()->back()->with($notification);
    	}

        }


   }
   // active
   public function active($id){
   		$active=SubCategory::where('id',$id)->update([
   			'subcate_status'=>'1',
   			'updated_at'=>Carbon::now()->toDateTimeString(),

   		]);
   		if($active){
   			$notification=array(
            'messege'=>'SubCategory Active Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
   		}else{
   			$notification=array(
            'messege'=>'SubCategory Active Faild',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
   		}
   }
   // deactive
   public function deactive($id){
   	$deactive=SubCategory::where('id',$id)->update([
   			'subcate_status'=>'0',
   			'updated_at'=>Carbon::now()->toDateTimeString(),

   		]);
   		if($deactive){
   			$notification=array(
            'messege'=>'SubCategory DeActive Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
   		}else{
   			$notification=array(
            'messege'=>'SubCategory DeActive Faild',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
   		}
   }
   // soft delete
   public function softdelete($id){
   	$softdelete=SubCategory::where('id',$id)->update([
            'is_deleted'=>'1',
   			'updated_at'=>Carbon::now()->toDateTimeString(),
   		]);
   	if($softdelete){
   		$notification=array(
            'messege'=>'SubCategory Delete Success',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
       }else{
       	$notification=array(
            'messege'=>'SubCategory Delete Success',
            'alert-type'=>'eror'
             );
           return Redirect()->back()->with($notification);
       }
   }

   // multiple soft delete
   public function multiplesoftdelete(Request $request){
    	$deleteid=$request->Input('delid');
             if($deleteid){
             $delet=SubCategory::whereIn('id',$deleteid)->update([
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
// restore
   public function restore($id){
   	$restore=SubCategory::where('id',$id)->update([
            'is_deleted'=>'0',
   			'updated_at'=>Carbon::now()->toDateTimeString(),
   		]);
   	if($restore){
   		$notification=array(
            'messege'=>'SubCategory Restore Success',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
       }else{
       	$notification=array(
            'messege'=>'SubCategory Restore Success',
            'alert-type'=>'eror'
             );
           return Redirect()->back()->with($notification);
       }
   }

   // single heard delete
     public function delete($id){


            $checkpro=Product::where('subcate_id',$id)->first();
            $checkresub=ReSubCategory::where('subcate_id',$id)->first();
            if($checkpro || $checkresub){
                $notification=array(
                'messege'=>'Please Delete First Under product or ResubCate',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
            }else{
            $post=SubCategory::where('id',$id)->first()->delete();
            if($post){
            $notification=array(
                'messege'=>'Heard delete success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
            }else{
            $notification=array(
                'messege'=>'Heard delete Faild',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);

            }

            }


	   }


}
