@extends('layouts.adminapp')
@section('admin_content')
 <div class="content_wrapper">
      <div class="middle_content_wrapper">
	<section class="page_area">
	     <div class="row">     						
		<div class="col-lg-6 offset-3">
		     <div class="panel">
			<div class="panel_header">
			     <div class="panel_title"><span class="text-center">Password Change</span></div>
			</div>
			
			    <div class="panel_body">
	                                   <form class="py-2" action="{{ Route('admin.password.update') }}" method="post" >
	                                   	@csrf
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Old Password</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="password"  required="" name="oldpass" id="oldpass">
	                                             </div>
	                                         </div><br>
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">New Password</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="password"   required="" name="password" id="pass1" onkeyup="checkPass(); return false;" >
	                                             </div>
	                                             <label for="example-text-input" class="col-sm-3 col-form-label"></label>
	                                             <div class="col-sm-9" style="color: red;">{{ $errors->first('password') }}</div>
	                                              <label for="example-text-input" class="col-sm-3 col-form-label"></label>
	                                             <div class="col-sm-9" style="color: red;"><small id="error-nwl"></small></div>
	                                         </div>
	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Confirm Password</label>
	                                             <div class="col-sm-9">
	                                                 <input class="form-control" type="password"   required="" name="password_confirmation" id="pass2" onkeyup="checkPass(); return false;">
	                                             </div>
	                                         </div>
	                                        
	                                      	<br>
	                                      	<div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label"></label>
	                                             <div class="col-sm-9">
	                                                 <button type="submit" class="btn btn-info">Change Password</button>   
	                                             </div>
	                                         </div>
	                                      	
	                                     </form>
			  </div>
		       </div>
		</div>
	     </div>
	</section>			
      </div>
</div>
<!--password validation-->
<script type="text/javascript">
function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
 	
    if(pass1.value.length > 7)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 8 digit!"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Newpassword and confirm password matched"
    }
else
    {
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        // message.innerHTML = " These passwords don't match"
    }
}
</script>
@endsection