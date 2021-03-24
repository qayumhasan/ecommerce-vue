<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // all category
    public function index(){

    	$allcategory=Category::where('is_deleted',0)->latest()->get();
    	return view('admin.ecommerce.category.all',compact('allcategory'));
    }

    // public function add(){
    //     return view('admin.ecommerce.category.add');
    // }

    // insert
    public function insert(Request $request){

        $validatedData = $request->validate([
          'cate_name' => 'required|unique:categories|max:255',
        ]);
      	$title=strtolower($request['cate_name']);
      	$cate_slug=$request['cate_slug'];
        $inputslug=preg_replace('/[^A-Za-z0-9-]+/', '-',$cate_slug);
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);


        $data = new Category;
        $data->cate_name=$request->cate_name;

        $data->cate_tag=$request->tag;
        if($cate_slug){
            $data->cate_slug=$inputslug;
        }else{
             $data->cate_slug=$slug;
        }
        if($request->hasFile('pic')){
                $image=$request->file('pic');
                $ImageName='pic_'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(148,148)->save('public/uploads/category/'.$ImageName);
                $data->cate_image =$ImageName;
        }

        if($request->hasFile('ban')){
                $image=$request->file('ban');
                $ImageName='pic_'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1110,179)->save('public/uploads/category/banner/'.$ImageName);
                $data->cate_banner =$ImageName;
        }

        if($data->save()){
            $notification=array(
            'messege'=>'Site Banner Insert Successfully',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
       }
       else{
            $notification=array(
            'messege'=>'Site Banner Insert Faild',
            'alert-type'=>'error'
             );
            return Redirect()->back()->with($notification);
       }




   }



   public function edit($cate_id){
       $data=Category::where('id',$cate_id)->first();
        return view('admin.ecommerce.category.edit',compact('data'));
   }


// update Category
   public function update(Request $request){


        $cate_id=$request->id;
        $title=strtolower($request['cate_name']);
        $cate_slug=$request['cate_slug'];
        $inputslug=preg_replace('/[^A-Za-z0-9-]+/', '-',$cate_slug);
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
        $data = Category::findOrFail($cate_id);
        $data->cate_name=$request->cate_name;
        $data->cate_tag=$request->tag;
        if($cate_slug){
            $data->cate_slug=$inputslug;
        }else{
             $data->cate_slug=$slug;
        }

        if($request->hasFile('pic')){
                $image=$request->file('pic');
                $ImageName='pic_'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(148,148)->save('public/uploads/category/'.$ImageName);
                $data->cate_image =$ImageName;
        }

        if($request->hasFile('ban')){
                $image=$request->file('ban');
                $ImageName='pic_'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1110,179)->save('public/uploads/category/banner/'.$ImageName);
                $data->cate_banner =$ImageName;
        }



        if($data->save()){
            $notification=array(
            'messege'=>'Site Banner Update Successfully',
            'alert-type'=>'success'
               );
            return Redirect()->back()->with($notification);
          }
          else{
            $notification=array(
                'messege'=>'Category Softdelete Faild',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
          }


   }

	   // soft-delete
	   public function softdelete($id){
	   		$softdelete=Category::where('id',$id)->Update([
	   			'is_deleted'=>'1',
	   			'updated_at'=>Carbon::now()->toDateTimeString(),
	   		]);

	   		if($softdelete){
	   			$notification=array(
            	'messege'=>'Category Softdelete Success',
            	'alert-type'=>'success'
            		 );
           		return Redirect()->back()->with($notification);
	   		}else{
		   		$notification=array(
	            'messege'=>'Category Softdelete Faild',
	            'alert-type'=>'error'
	             );
	           return Redirect()->back()->with($notification);
	   		}
	   }
	   // multiple soft delete

	   public function multiplesoftdelete(Request $request){
                    $deleteid=$request->Input('delid');
                     if($deleteid){
                     $delet=Category::whereIn('id',$deleteid)->update([
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
	   public function deactive($id){
		   	$deactive=Category::where('id',$id)->update([
	            'cate_status'=>'0',
	            'updated_at'=>Carbon::now()->toDateTimeString(),

	        ]);

	        if($deactive){
	            $notification=array(
	                'messege'=>'active success',
	                'alert-type'=>'success'
	                 );
	             return redirect()->back()->with($notification);
	        }
	        else{
	            $notification=array(
	                'messege'=>'active Faild',
	                'alert-type'=>'error'
	                 );
	             return redirect()->back()->with($notification);
	        }
	   }
	   public function active($id){
	   	$deactive=Category::where('id',$id)->update([
	            'cate_status'=>'1',
	            'updated_at'=>Carbon::now()->toDateTimeString(),

	        ]);

	        if($deactive){
	            $notification=array(
	                'messege'=>'Deactive success',
	                'alert-type'=>'success'
	                 );
	             return redirect()->back()->with($notification);
	        }
	        else{
	            $notification=array(
	                'messege'=>'Deactive Faild',
	                'alert-type'=>'error'
	                 );
	             return redirect()->back()->with($notification);
	        }
	   }

	   // delete single
	   public function delete($id){

	   	$checksub=SubCategory::where('cate_id',$id)->first();
	   	$checkcatepro=Product::where('cate_id',$id)->first();
	   	if($checksub || $checkcatepro){
	   	     $notification=array(
                'messege'=>'Please Delete SubCate Or Product Under This Category',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
	   	}else{
	   	    $post=Category::where('id',$id)->first()->delete();
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
	   // restore
	   public function restore($id){
	   		$restore=Category::where('id',$id)->update([
	   			'is_deleted'=>'0',
	   			'updated_at'=>Carbon::now()->toDateTimeString(),

	   		]);
	   		if($restore){
	   			$notification=array(
                'messege'=>'Recover success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
	   		}else{
	   			$notification=array(
                'messege'=>'Recover Faild',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);

	   		}
	   }


}
