<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Blog;
use App\BlogComment;
use Image;
use Auth;
use DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
    	$all=Blog::where('is_deleted',0)->OrderBy('id','DESC')->get();
    	return view('admin.ecommerce.blog.all',compact('all'));
    }
    // insert blog
    public function add(){
    	return view('admin.ecommerce.blog.add');
    }
    // insert
    public function insert(Request $request){
        // return $request;
    	 $creatorname=Auth::user()->name;
    	 $month= Carbon::now()->format('F');
    	 $date= Carbon::now()->format('d');
       $title=$request->blog_title;
       $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);

    	$insert=Blog::insertGetId([
    		'blog_title'=>$request['blog_title'],
    		'description'=>$request['description'],
    		'meta_description'=>$request['meta_description'],
    		'meta_tag'=>$request['m_tag'],
    		'cate_id'=>$request['cate_id'],
    		'slug'=>$slug,
    		'image'=>'',
    		'date'=>$date,
    		'month'=>$month,
    		'creator_name'=>$creatorname,
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($request->hasFile('thumbnail_img')){
                $image=$request->file('thumbnail_img');
                $ImageName='blog'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1170,855)->save('public/uploads/blog/'.$ImageName);
                Blog::where('id',$insert)->update([
                    'image'=>$ImageName,
                ]);
            }

    	if($insert){
            $notification = array(
                'messege' => 'Insert success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Insert error',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // deactive
    public function deactive($id){
    	$deactive=Blog::where('id',$id)->update([
    		'status'=>'0',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($deactive){
            $notification = array(
                'messege' => 'Deactive success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Deactive error',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
       public function active($id){
    	$deactive=Blog::where('id',$id)->update([
    		'status'=>'1',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($deactive){
            $notification = array(
                'messege' => 'active success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'active error',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function softdelete($id){
    	$deactive=Blog::where('id',$id)->update([
    		'is_deleted'=>'1',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($deactive){
            $notification = array(
                'messege' => 'Deleted success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Deleted error',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function multiplesoftdelete(Request $request){
    	$deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = Blog::whereIn('id', $deleteid)->update([
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

    public function recycle($id){
    	$deactive=Blog::where('id',$id)->update([
    		'is_deleted'=>'0',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($deactive){
            $notification = array(
                'messege' => 'success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'error',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    //
     public function delete($id){
     	//return $id;
     	$deactive=Blog::where('id',$id)->first();
     	// if(public_path('uploads/blog/'.$deactive->image)){
      //     unlink('public/uploads/blog/'.$deactive->image);
		  // unlink('public/uploads/blog/mobile/'.$deactive->image);
		  // //dd(public_path('uploads/blog/'.$deactive->image));
     	// }
     	$deactive->delete();
        $commentdelete=BlogComment::where('blog_id',$id)->get();
        foreach ($commentdelete as $key => $value) {
            $comm=$value->delete();

        }
    	if($deactive){
            $notification = array(
                'messege' => 'success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'error',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    //
    public function edit($id){
    	$data=Blog::where('id',$id)->first();
    	return view('admin.ecommerce.blog.edit',compact('data'));
    }
    // update
    public function update(Request $request){

      // return $request;
      $title=$request->blog_title;
      $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);

    	 $id = $request->id;
    	 $creatorname=Auth::user()->name;
    	 $month= Carbon::now()->format('F');
    	 $date= Carbon::now()->format('d');

    	$update=Blog::where('id',$id)->update([
    		'blog_title'=>$request['blog_title'],
    		'description'=>$request['description'],
    		'meta_description'=>$request['meta_description'],
    		'meta_tag'=>$request['m_tag'],
    		'cate_id'=>$request['cate_id'],
    		'slug'=>$slug,
    		'date'=>$date,
    		'month'=>$month,
    		'creator_name'=>$creatorname,
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);

    	if($request->hasFile('thumbnail_img')){
	      		$image = $request->file('thumbnail_img');
	            $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
	            Image::make($image)->resize(1170,855)->save('public/uploads/blog/'.$ImageName);
	            Blog::where('id', $id)->update([
	                  'image' => $ImageName,
	            ]);
        }

    	if($update){
                $notification = array(
                    'messege' => 'success',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else {
                $notification = array(
                    'messege' => 'error',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

    }

    public function blogcommen(){
    	$allcomment=BlogComment::OrderBy('id','DESC')->get();
    	return view('admin.ecommerce.blog.blogcomment',compact('allcomment'));
    }
    // delete
    public function blogcommentdelete($id){
    	$delete=BlogComment::where('id',$id)->delete();
    	if($delete){
                $notification = array(
                    'messege' => 'success',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else {
                $notification = array(
                    'messege' => 'error',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
    }
    // multidel
     public function blogcommentmultidelete(Request $request){
    	$deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = BlogComment::whereIn('id', $deleteid)->delete();
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
    // reply comment
    public function blogreply($id){
        $data=BlogComment::where('id',$id)->first();
        return json_encode($data);
    }

    //
    public function replySubmit(Request $request){
        $id=$request->id;
        $user=Auth::user();

        $reply=BlogComment::where('id',$id)->update([
            'reply'=>$request['reply'],
            'replyhost'=>$user->type,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      if($reply) {
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
    }

    // active
    public function comactive($id){
           $active=BlogComment::where('id',$id)->update([
            'is_active'=>'0',
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
         if($active) {
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
    }
    public function comdeactive($id){
        $active=BlogComment::where('id',$id)->update([
            'is_active'=>'1',
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
         if($active) {
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
    }
// category
  public function catecreate(){
    $allcate=DB::table('post_categoris')->get();
    return view('admin.ecommerce.blog.blog_category.create',compact('allcate'));
  }

  public function catesubmit(Request $request){
        $title=$request->name;
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
        $insert= DB::table('post_categoris')->insert([
          'name'=>$request->name,
          'slug'=>$slug,
        ]);
        if($insert) {
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

  }
  public function cateactive($id){
    $active=DB::table('post_categoris')->where('id',$id)->update([
      'status'=>1,
    ]);
    if($active) {
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
  }

  public function catedeactive($id){
    $active=DB::table('post_categoris')->where('id',$id)->update([
      'status'=>0,
    ]);
    if($active) {
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
  }

  // edit
  public function editcateblog($subcate_id){
    $data=DB::table('post_categoris')->where('id',$subcate_id)->first();
    return response()->json($data);
  }

  // upadte
  public function updatecateblog(Request $request){
     $id=$request->id;
     $title=$request->name;
     $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
     $update=DB::table('post_categoris')->where('id',$id)->update([
       'name'=>$request->name,
       'slug'=>$slug,
     ]);

     if($update) {
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
  }

  public function catedelete($id){

      $deleteall=DB::table('post_categoris')->where('id',$id)->delete();
      if($deleteall) {
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
  }




}
