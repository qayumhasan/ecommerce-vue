@extends('layouts.adminapp')
@section('admin_content')
 <div class="content_wrapper">
      <div class="middle_content_wrapper">
	<section class="page_area">
	     <div class="row">    
	     <div class="col-lg-1"></div>
		<div class="col-lg-10">
		     <div class="panel">
			<div class="panel_header">
			     <div class="panel_title"><span class="text-center">Front Site Logo </span></div>
			</div>
			    <div class="panel_body">
	                                   <form class="py-2" action="{{ route('admin.front.logo') }}" method="post"  enctype="multipart/form-data">
	                                   	@csrf
	                                         <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Front Logo</label>
	                                             <div class="col-sm-6">
	                                                 <input class="file" type="file" name="front_logo">
	                                             </div>
	                                             <div class="col-sm-3">
	                                             	<img src="{{ asset($logo->front_logo) }}" style="height: 60px; width: 100px;">
	                                             </div>
	                                         </div>

	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Fav Icon</label>
	                                             <div class="col-sm-6">
	                                                 <input class="file" type="file"   name="favicon">
	                                             </div>
	                                              <div class="col-sm-3">
	                                             	<img src="{{ asset($logo->favicon) }}" style="height: 60px; width: 100px;">
	                                             </div>
	                                         </div>

	                                          <div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label">Preloader</label>
	                                             <div class="col-sm-6">
	                                                 <input class="file" type="file"   name="preloader">
	                                             </div>
	                                             <div class="col-sm-3">
	                                             	<img src="{{ asset($logo->preloader) }}" style="height: 60px; width: 100px;">
	                                             </div>
	                                         </div>

	                                       <input type="hidden" name="id" value="{{ $logo->id }}">
	                                      	<br>

	                                      	<div class="form-group row">
	                                             <label for="example-text-input" class="col-sm-3 col-form-label"></label>
	                                             <div class="col-sm-6">
	                                                 <button type="submit" class="btn btn-success">Update</button>   
	                                             </div>
	                                        </div>

	                                     </form>
			  </div>
		       </div>
		</div>
	 <!--        <div class="col-lg-6">-->
		<!--     <div class="panel">-->
		<!--	<div class="panel_header">-->
		<!--	     <div class="panel_title"><span class="text-center">Admin Panel Logo </span></div>-->
		<!--	</div>-->
		<!--	    <div class="panel_body">-->
	 <!--                                  <form class="py-2" action="{{ route('admin.panel.logo') }}" method="post"  enctype="multipart/form-data">-->
	 <!--                                  	@csrf-->

	 <!--                                        <div class="form-group row">-->
	 <!--                                            <label for="example-text-input" class="col-sm-3 col-form-label">Admin Logo</label>-->
	 <!--                                            <div class="col-sm-6">-->
	 <!--                                                <input class="file" type="file"  name="admin_logo">-->
	 <!--                                            </div>-->
	 <!--                                            <div class="col-sm-3">-->
	 <!--                                            	<img src="{{ asset($logo->admin_logo) }}" style="height: 60px; width: 100px;">-->
	 <!--                                            </div>-->
	 <!--                                        </div>-->

	                                         <!-- <div class="form-group row">-->
	                                         <!--    <label for="example-text-input" class="col-sm-3 col-form-label">Background Image</label>-->
	                                         <!--    <div class="col-sm-6">-->
	                                         <!--        <input class="file" type="file"   name="background">-->
	                                         <!--    </div>-->
	                                         <!--    <div class="col-sm-3">-->
	                                         <!--    	<img src="{{ asset($logo->background) }}" style="height: 60px; width: 100px;">-->
	                                         <!--    </div>-->
	                                         <!--</div>-->
	 <!--                                      <input type="hidden" name="id" value="{{ $logo->id }}">-->
	 <!--                                     	<br>-->
	 <!--                                     	<div class="form-group row">-->
	 <!--                                            <label for="example-text-input" class="col-sm-3 col-form-label"></label>-->
	 <!--                                            <div class="col-sm-6">-->
	 <!--                                                <button type="submit" class="btn btn-success">Update</button>   -->
	 <!--                                            </div>-->
	 <!--                                        </div>-->
	 <!--                                    </form>-->
		<!--	  </div>-->
		<!--       </div>-->
		<!--</div>-->
	     </div>
	</section>			
      </div>
</div>
@endsection