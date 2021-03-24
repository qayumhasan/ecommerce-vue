<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SiteBanner;
use App\CategoryBanner;
use Carbon\Carbon;
use Image;

class SiteBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addsiteban(){
      return view('admin.ecommerce.sitebanner.add');
    }

	public function sitebanner(){
	    $siteban=SiteBanner::where('is_deleted',0)->orderBy('id','DESC')->get();
	    return view('admin.ecommerce.sitebanner.all',compact('siteban'));
	}
  public function sitebannerinsert(Request $request){
  		 //return $request;
        $data = new SiteBanner;
         $data->section = $request->section;
         $data->link = $request->link;
         if($request->category_id){
           $data->category_id = json_encode($request->category_id);
         }else{
            $data->category_id = NULL;
         }


         // $data->save();
        if($request->section == 1){
             if($request->hasFile('pic')){
                $image=$request->file('pic');
                $ImageName='amni_'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(390,193)->save('public/uploads/sitebanner/'.$ImageName);
                $data->image =$ImageName;

              }
        }
        if($request->section == 2){
             if($request->hasFile('pic')){
                $image=$request->file('pic');
                $ImageName='cate_top_asif'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1650,399)->save('public/uploads/sitebanner/'.$ImageName);
                $data->image =$ImageName;

              }
        }
        if($request->section == 3){
             if($request->hasFile('pic')){
                $image=$request->file('pic');
                $ImageName='catehome_top_asif'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(530,285)->save('public/uploads/sitebanner/'.$ImageName);
                $data->image =$ImageName;

              }
        }
         if($request->section == 4){
             if($request->hasFile('pic')){
                $image=$request->file('pic');
                $ImageName='header_top_asif'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1090,245)->save('public/uploads/sitebanner/'.$ImageName);
                $data->image =$ImageName;

              }
        }
        if($request->section == 5){
            if($request->hasFile('pic')){
               $image=$request->file('pic');
               $ImageName='details_asif'.'_'.time().'.'.$image->getClientOriginalExtension();
               Image::make($image)->resize(530,245)->save('public/uploads/sitebanner/'.$ImageName);
               $data->image =$ImageName;

             }
       }
        if($request->section == 6){
            if($request->hasFile('pic')){
               $image=$request->file('pic');
               $ImageName='details_asif'.'_'.time().'.'.$image->getClientOriginalExtension();
               Image::make($image)->resize(570,210)->save('public/uploads/sitebanner/'.$ImageName);
               $data->image =$ImageName;

             }
       }

        $data->save();

        //
        if($request->category_id){
            if(count($request->category_id) > 0){
                foreach ($request->category_id as $item => $v) {
                   $data3=array(
                    'siteban_id'=>$data->id,
                    'category_id'=>$request->category_id[$item],
                    'section'=>$data->section,
                    'created_at'=>Carbon::now()->toDateTimeString(),

                   );
                   CategoryBanner::Insert($data3);
                }

            }
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

//     //deactive
    public function sitebannerdeactive($id){
        $deactive=SiteBanner::where('id',$id)->update([
            'status'=>'0',
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($deactive){
             $notification=array(
                'messege'=>'Site Banner Deactive Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
           }else{
             $notification=array(
                'messege'=>'Site Banner Deactive Faild',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
           }
    }
// active
 public function sitebanneractive($id){
        $deactive=SiteBanner::where('id',$id)->update([
            'status'=>'1',
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($deactive){
             $notification=array(
                'messege'=>'Site Banner active Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
           }else{
             $notification=array(
                'messege'=>'Site Banner active Faild',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
           }
    }

//     // soft delete
    public function sitebabnsoftdelete($id){
        $delete=SiteBanner::where('id',$id)->update([
            'is_deleted'=>'1',
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
             $notification=array(
                'messege'=>'Site Banner active Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
           }else{
             $notification=array(
                'messege'=>'Site Banner active Faild',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
           }
    }
//     //
    public function sitebanmultisoft(Request $request){
        $deleteid=$request->Input('delid');
                     if($deleteid){
                     $delet=SiteBanner::whereIn('id',$deleteid)->update([
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


    public function sitebabnsoftedit($id){
        $data=SiteBanner::where('id',$id)->first();
        return view('admin.ecommerce.sitebanner.edit',compact('data'));
        // return json_encode($data);
    }

//     // update
    public function sitebannerupdate(Request $request){

    //  return $request;
        $id=$request->id;
        $old_image=$request->old_image;
        // return $old_image;

        $update=SiteBanner::where('id',$id)->update([
            'section'=>$request['section'],
            'link'=>$request['link'],
            'category_id'=>NULL,

        ]);

        if($request->category_id){
            SiteBanner::where('id',$id)->update([
              'category_id'=>json_encode($request['category_id']),
          ]);
        }else{
          SiteBanner::where('id',$id)->update([
             'category_id'=>NULL,
          ]);
        }

        //
        if($request->section == 1){
             if($request->hasFile('pic')){
                unlink('public/uploads/sitebanner/'. $old_image);
                $image=$request->file('pic');
                $ImageName='th'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(570,300)->save('public/uploads/sitebanner/'.$ImageName);
                SiteBanner::where('id',$id)->update([
                      'image'=>$ImageName,
                 ]);

              }
        }
        if($request->section == 2){
             if($request->hasFile('pic')){
                unlink('public/uploads/sitebanner/'. $old_image);
                $image=$request->file('pic');
                $ImageName='th'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1120,220)->save('public/uploads/sitebanner/'.$ImageName);
                SiteBanner::where('id',$id)->update([
                            'image'=>$ImageName,
                 ]);

              }
        }
        if($request->section == 3){
             if($request->hasFile('pic')){
                 unlink('public/uploads/sitebanner/'. $old_image);
                $image=$request->file('pic');
                $ImageName='th'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(270,854)->save('public/uploads/sitebanner/'.$ImageName);
                 SiteBanner::where('id',$id)->update([
                            'image'=>$ImageName,
                 ]);

              }
        }
          if($request->section == 4){
             if($request->hasFile('pic')){
                 unlink('public/uploads/sitebanner/'. $old_image);
                $image=$request->file('pic');
                $ImageName='th'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1920,180)->save('public/uploads/sitebanner/'.$ImageName);
                 SiteBanner::where('id',$id)->update([
                        'image'=>$ImageName,
                 ]);

              }
        }
         if($request->section == 5){
             if($request->hasFile('pic')){

                unlink('public/uploads/sitebanner/'. $old_image);
                $image=$request->file('pic');
                $ImageName='th'.'_'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(270,427)->save('public/uploads/sitebanner/'.$ImageName);
                 SiteBanner::where('id',$id)->update([
                        'image'=>$ImageName,
                 ]);

              }
        }
        if($request->section == 6){
           if($request->hasFile('pic')){
               unlink('public/uploads/sitebanner/'. $old_image);
              $image=$request->file('pic');
              $ImageName='aboutus'.'_'.time().'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(1920,180)->save('public/uploads/sitebanner/'.$ImageName);
               SiteBanner::where('id',$id)->update([
                      'image'=>$ImageName,
               ]);

            }
      }

      if($request->section == 7){
         if($request->hasFile('pic')){
             unlink('public/uploads/sitebanner/'. $old_image);
            $image=$request->file('pic');
            $ImageName='warranty'.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,180)->save('public/uploads/sitebanner/'.$ImageName);
             SiteBanner::where('id',$id)->update([
                    'image'=>$ImageName,
             ]);

          }
    }
    if($request->section == 8){
       if($request->hasFile('pic')){
           unlink('public/uploads/sitebanner/'. $old_image);
          $image=$request->file('pic');
          $ImageName='support'.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(1920,180)->save('public/uploads/sitebanner/'.$ImageName);
           SiteBanner::where('id',$id)->update([
                  'image'=>$ImageName,
           ]);

        }
  }
  if($request->section == 9){
     if($request->hasFile('pic')){
         unlink('public/uploads/sitebanner/'. $old_image);
        $image=$request->file('pic');
        $ImageName='faq'.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1920,180)->save('public/uploads/sitebanner/'.$ImageName);
         SiteBanner::where('id',$id)->update([
                'image'=>$ImageName,
         ]);

      }
}
if($request->section == 10){
   if($request->hasFile('pic')){
       unlink('public/uploads/sitebanner/'. $old_image);
      $image=$request->file('pic');
      $ImageName='flashdeal_'.'_'.time().'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(1920,180)->save('public/uploads/sitebanner/'.$ImageName);
       SiteBanner::where('id',$id)->update([
              'image'=>$ImageName,
       ]);

    }
}
if($request->section == 11){
   if($request->hasFile('pic')){
       unlink('public/uploads/sitebanner/'. $old_image);
      $image=$request->file('pic');
      $ImageName='flashdeal_'.'_'.time().'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(362,495)->save('public/uploads/sitebanner/'.$ImageName);
       SiteBanner::where('id',$id)->update([
              'image'=>$ImageName,
       ]);

    }
}

      if($request->category_id){
        $cate_img=CategoryBanner::where('siteban_id',$id)->delete();
        if(count($request->category_id) > 0){
          foreach ($request->category_id as $item => $v) {
             $data3=array(
              'siteban_id'=>$id,
              'category_id'=>$request->category_id[$item],
              'section'=>$request->section,
              'created_at'=>Carbon::now()->toDateTimeString(),

             );
             CategoryBanner::Insert($data3);
          }

        }

      }
        if($update){
             $notification=array(
            'messege'=>'success',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
        }
        else{
            $notification=array(
                'messege'=>'Faild',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
        }

    }
//     // restore

    public function sitebanrestore($id){

        $deactive=SiteBanner::where('id',$id)->update([
            'is_deleted'=>'0',
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($deactive){
             $notification=array(
                'messege'=>'Site Banner Restore Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
           }else{
             $notification=array(
                'messege'=>'Site Banner Restore Faild',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
           }
    }

    // heard delete
    public function sitebahearddel($id){
      //return $id;
       $bnimage=SiteBanner::where('id',$id)->first();
       $cateimage_id=CategoryBanner::where('siteban_id', $bnimage->id)->get();
       if($cateimage_id){
          foreach($cateimage_id as $cateban){

            $cateban->delete();
          }
          $image_old=$bnimage->image;
          if ($image_old){
                unlink('public/uploads/sitebanner/'.$image_old);
                $del=SiteBanner::where('id',$id)->delete();
                if($del){
                  $notification=array(
                         'messege'=>'Site Banner Delete Successfully',
                         'alert-type'=>'success'
                          );
                        return Redirect()->back()->with($notification);
                }else{
                  $notification=array(
                         'messege'=>'Site Banner Delete Faild',
                         'alert-type'=>'error'
                          );
                        return Redirect()->back()->with($notification);
                }
          }else{
            $del=SiteBanner::where('id',$id)->delete();
            if($del){
              $notification=array(
                     'messege'=>'Site Banner Delete Successfully',
                     'alert-type'=>'success'
                      );
                    return Redirect()->back()->with($notification);
            }else{
              $notification=array(
                     'messege'=>'Site Banner Delete Faild',
                     'alert-type'=>'error'
                      );
                    return Redirect()->back()->with($notification);
            }
          }

       }else{
         $image_old=$bnimage->image;
         if ($image_old){
               unlink('public/uploads/sitebanner/'.$image_old);
               $del=SiteBanner::where('id',$id)->delete();
               if($del){
                 $notification=array(
                        'messege'=>'Site Banner Delete Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
               }else{
                 $notification=array(
                        'messege'=>'Site Banner Delete Faild',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
               }
         }else{
           $del=SiteBanner::where('id',$id)->delete();
           if($del){
             $notification=array(
                    'messege'=>'Site Banner Delete Successfully',
                    'alert-type'=>'success'
                     );
                   return Redirect()->back()->with($notification);
           }else{
             $notification=array(
                    'messege'=>'Site Banner Delete Faild',
                    'alert-type'=>'error'
                     );
                   return Redirect()->back()->with($notification);
           }
         }

       }

    }
}
