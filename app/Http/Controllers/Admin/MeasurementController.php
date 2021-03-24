<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mesurement;
use App\DeleveryAmount;
use App\DeleveryCharge;
use Carbon\Carbon;

class MeasurementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // all
    public function index(){
    	$allmesurement=Mesurement::where('is_deleted',0)->get();
    	return view('admin.ecommerce.measurement.all',compact('allmesurement'));
    }
    // insert
    public function insert(Request $request){
    	$insert=Mesurement::insertGetId([
    		'm_name'=>$request['m_name'],
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($insert){
    		$notification=array(
	            'messege'=>'Insert Success',
	            'alert-type'=>'success'
	             );
	            return Redirect()->back()->with($notification);
	        }else{
	        	$notification=array(
                'messege'=>'Insert Faild',
                'alert-type'=>'error'
                 );
                return Redirect()->back()->with($notification);
	        }
    }

    public function active($id){
    	$active=Mesurement::where('id',$id)->update([
    		'm_status'=>'1',
    	]);
    	if($active){
    		$notification=array(
	            'messege'=>'Active Success',
	            'alert-type'=>'success'
	             );
	            return Redirect()->back()->with($notification);
	        }else{
	        	$notification=array(
                'messege'=>'Active Faild',
                'alert-type'=>'error'
                 );
                return Redirect()->back()->with($notification);
	        }
    }
    public function deactive($id){
    	$active=Mesurement::where('id',$id)->update([
    		'm_status'=>'0',
    	]);
    	if($active){
    		$notification=array(
	            'messege'=>'Deactive Success',
	            'alert-type'=>'success'
	             );
	            return Redirect()->back()->with($notification);
	        }else{
	        	$notification=array(
                'messege'=>'Deactive Faild',
                'alert-type'=>'error'
                 );
                return Redirect()->back()->with($notification);
	        }
    }
    public function edit($m_id){
    	$edit=Mesurement::where('id',$m_id)->first();
    	return json_encode($edit);
    }

    // update
    public function update(Request $request){
    	  $id=$request->id;
    	  $update=Mesurement::where('id',$id)->update([
    	  	'm_name'=>$request['m_name'],
    	  	'updated_at'=>Carbon::now()->toDateTimeString(),
    	  ]);
    	  if($update){
    	  	$notification=array(
	            'messege'=>'update Success',
	            'alert-type'=>'success'
	             );
	            return Redirect()->back()->with($notification);
	        }else{
	        	$notification=array(
	            'messege'=>'update Faild',
	            'alert-type'=>'error'
	             );
	            return Redirect()->back()->with($notification);
	        }
    }

    // softdelete
      public function softdelete($id){
    	$Delete=Mesurement::where('id',$id)->update([
    		'is_deleted'=>'1',
    	]);
    	if($Delete){
    		$notification=array(
	            'messege'=>'Delete Success',
	            'alert-type'=>'success'
	             );
	            return Redirect()->back()->with($notification);
	        }else{
	        	$notification=array(
                'messege'=>'Delete Faild',
                'alert-type'=>'error'
                 );
                return Redirect()->back()->with($notification);
	        }
    }
    // multisoft delete
   public function multisoftdelete(Request $request){
   		$deleteid=$request->Input('delid');
             if($deleteid){
             $delet=Mesurement::whereIn('id',$deleteid)->update([
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
    // Delete
    public function recover($id){
    	$Delete=Mesurement::where('id',$id)->update([
    		'is_deleted'=>'0',
    	]);
    	if($Delete){
    		$notification=array(
	            'messege'=>'Recover Success',
	            'alert-type'=>'success'
	             );
	            return Redirect()->back()->with($notification);
	        }else{
	        	$notification=array(
                'messege'=>'Recover Faild',
                'alert-type'=>'error'
                 );
                return Redirect()->back()->with($notification);
	        }
    }
    public function delete($id){
    	$Delete=Mesurement::where('id',$id)->delete();
    	if($Delete){
    		$notification=array(
	            'messege'=>'Delete Success',
	            'alert-type'=>'success'
	             );
	            return Redirect()->back()->with($notification);
	        }else{
	        	$notification=array(
                'messege'=>'Delete Faild',
                'alert-type'=>'error'
                 );
                return Redirect()->back()->with($notification);
	        }
    }

    // delevery paymet
    public function deleverypayment(){
      $amount=DeleveryCharge::first();
      return view('admin.ecommerce.deleveryamount.all',compact('amount'));
    }
    // update amount
    public function deleverysubmit(Request $request){

       $id=$request->id;
       $update=DeleveryCharge::where('id',$id)->update([
         'amount'=>$request['amount'],
         'updated_at'=>Carbon::now()->toDateTimeString(),
       ]);
       if($update){
     		$notification=array(
 	            'messege'=>'Update Success',
 	            'alert-type'=>'success'
 	             );
 	            return Redirect()->back()->with($notification);
 	        }else{
 	        	$notification=array(
                 'messege'=>'Update Faild',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
 	        }
    }

}
