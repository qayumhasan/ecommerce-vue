@extends('layouts.adminapp')
@section('title', 'Update User | '.$seo->meta_title)
@section('admin_content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- content wrpper -->
			<div class="content_wrapper">
				<!--middle content wrapper-->
				<div class="middle_content_wrapper">

				<section class="page_area">
					<div class="panel">
						<div class="panel_header">
							<div class="row">
								<div class="col-md-6">
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Update User</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button type="submit" class="btn btn-primary"><i class="fas fa-undo-alt"></i> <a href="{{route('admin.user.all')}}" style="color: #fff;"> Back</a></button>


								</div>
							</div>
						</div>
						<div class="panel_body">
						<form class="form-horizontal" action="{{route('admin.userlist.update')}}" method="POST" enctype="multipart/form-data" >
						          	@csrf
									 <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name<span style="color:red">*<span></label>
									    <div class="col-sm-6">
									      <input type="text" class="form-control" name="name" required value="{{$data->name}}">
									      <input type="hidden" name="id"  value="{{$data->id}}">
									      <input type="hidden" name="old_pic"  value="{{$data->avatar}}">
									    </div>
									  </div>
									  <div class="form-group row">
					                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Email<span style="color:red">*<span></label>
					                <div class="col-sm-6">
					                   <input class="form-control" type="email" name="email" value="{{$data->email}}" disabled>
					                </div>
						         </div>
									  <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone<span style="color:red">*<span></label>
									    <div class="col-sm-6">
									      <input type="text" name="phone" class="form-control" value="{{$data->phone}}">
									    </div>
									  </div>
                    <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Address</label>
									    <div class="col-sm-6">
									      <textarea name="address" class="form-control">{{$data->address}}</textarea>
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Role<span style="color:red">*<span></label>
									    <div class="col-sm-6">
									      <select  name="type" class="form-control">
                          <option value="Admin" @if($data->type=='Admin') selected @else @endif>Admin</option>
                          <option value="Editor"@if($data->type=='Editor') selected @else @endif>Editor</option>
                          <option value="Delevery" @if($data->type=='Delevery') selected @else @endif>Delevery</option>
                        </select>
									    </div>
									  </div>
                    <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">pic</label>
									    <div class="col-sm-2">
									      <input type="file" name="avatar">
									      <p>(120px*100px)</p>
									    </div>
                      <div class="col-sm-4">
									      <img src="{{asset('public/uploads/user/'.$data->avatar)}}" height="55px">
									    </div>
									  </div>
                    <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-4 col-form-label text-right"></label>
									    <div class="col-sm-6">
									      <label for="inputEmail3" class="col-sm-4 col-form-label text-right"><h4>Access:</h4></label>
									    </div>
									  </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="category" type="checkbox" value="1" @if($data->category==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">User</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="user" type="checkbox" value="1" @if($data->user==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Extra</label>
                      <div class="col-sm-2">
                        <label class="switch"><input  name="extra" type="checkbox" value="1" @if($data->extra==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Product</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="product" type="checkbox" value="1" @if($data->product==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">E-commerce Setup</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="ecommerce_setup" type="checkbox" value="1" @if($data->ecommerce_setup==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Pending Order</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="pending_order" type="checkbox" value="1" @if($data->pending_order==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Process Order</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="process_order" type="checkbox" value="1" @if($data->process_order==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">On Delevery Order</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="on_delevery" type="checkbox" value="1" @if($data->on_delevery==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Reject Order</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="reject_order" type="checkbox" value="1" @if($data->reject_order==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Blog</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="blog" type="checkbox" value="1" @if($data->blog==1) checked @else @endif><span class="slider round"></span></label>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Reports</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="reports" type="checkbox" value="1" @if($data->reports==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Messaging</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="messaging" type="checkbox" value="1" @if($data->messaging==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Frontend Setup</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="frontend_setup" type="checkbox" value="1" @if($data->frontend_setup==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Flash Deal</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="flash_deal" type="checkbox" value="1" @if($data->flash_deal==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Courier Setting</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="courier_setting" type="checkbox" value="1" @if($data->courier_setting==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Settings</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="settings" type="checkbox" value="1" @if($data->settings==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Trash</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="trash" type="checkbox" value="1" @if($data->trash==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Customer</label>
                      <div class="col-sm-2">
                        <label class="switch"><input name="customer" type="checkbox" value="1" @if($data->customer==1) checked @else @endif><span class="slider round"></span></label>
                      </div>
                    </div>



								    <div class="form-group text-center">
								    	<button type="submit" class="btn btn-blue">Update User</button>
								    </div>

							</form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->



@endsection
