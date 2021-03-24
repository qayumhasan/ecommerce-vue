@extends('layouts.adminapp')
@section('admin_content')
<div class="content_wrapper">
	<div class="middle_content_wrapper">
		<section class="page_area">
			<div class="row">









				<div class="col-lg-6">
					<div class="panel">
						<div class="panel_header">
							<div class="panel_title"><span class="text-center">SMS Setting</span></div>
						</div>
						<div class="panel_body">
							<form class="py-2" action="{{ route('admin.sms.update') }}" method="post">
								@csrf
								<div class="form-group row">
									<label for="example-text-input" class="col-sm-3 col-form-label">SMS Link:</label>
									<div class="col-sm-7">
										<input class="form-control" type="hidden" name="sms_id" required="" value="{{ $smssetting->id }}">
										<input class="form-control" type="text" name="sms_url" required="" value="{{ $smssetting->sms_url }}">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-sm-3 col-form-label">User Name:</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="sms_username" required="" value="{{ $smssetting->sms_username }}">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-sm-3 col-form-label">Password:</label>
									<div class="col-sm-7">
										<input class="form-control" type="password" name="sms_password" required="" value="{{ $smssetting->sms_password }}">
									</div>
								</div>

								<div class="form-group row">
									<label for="example-text-input" class="col-sm-3 col-form-label">SMS Type:</label>
									<div class="col-sm-7">
										<select class="form-control" name="sms_type" id="exampleFormControlSelect1">
											<option value="1">Text</option>
											<option value="2">Flash</option>
											<option value="3">Flash Unicode</option>
											<option value="4">Unicode/Bangla</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="example-text-input" class="col-sm-3 col-form-label">SMS Masking:</label>
									<div class="col-sm-7">
										<select class="form-control" name="sms_masking" id="exampleFormControlSelect1">
											<option value="masking"@if($smssetting->sms_type == 'masking')selected @endif>Masking</option>
											<option value="non-masking" @if($smssetting->sms_type == 'non-masking')selected @endif>Non-Masking</option>
										</select>
									</div>
								</div>

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















				<div class="col-lg-6">
					<div class="panel">
						<div class="panel_header">
							<div class="panel_title"><span class="text-center">Mailgun Setting </span></div>
						</div>
						<div class="panel_body">
							<form class="py-2" action="{{ route('admin.mailgun.update') }}" method="post">
								@csrf
								<div class="form-group row">
									<label for="example-text-input" class="col-sm-3 col-form-label">Mailgun Domain</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" value="{{ $smtp->mailgun_domain }}" required="" name="mailgun_domain">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-sm-3 col-form-label">Mailgun Secret </label>
									<div class="col-sm-9">
										<input class="form-control" type="text" value="{{ $smtp->mailgun_secret }}" name="mailgun_secret">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-sm-3 col-form-label">Mailgun Endpoint </label>
									<div class="col-sm-9">
										<input class="form-control" type="text" value="{{ $smtp->mailgun_endpoint }}" name="mailgun_endpoint">
									</div>
								</div>
								<input type="hidden" name="id" value="{{ $smtp->id }}">
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
			</div>
		</section>
	</div>
</div>
@endsection