@extends('layouts.adminapp')
@section('title', 'Add Faq | '.$seo->meta_title)
@section('admin_content')
<link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/select2/css/select2.min.css">
      <!-- content wrpper -->
			<div class="content_wrapper">
				<!--middle content wrapper-->
				<div class="middle_content_wrapper">

				<section class="page_area">
					<div class="panel">
						<div class="panel_header">
							<div class="row">
								<div class="col-md-6">
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Faq Information Add</span></div>
								</div>
								<div class="col-md-6 text-right">
									<button class="btn btn-success"><i class="fas fa-award"></i> <a href="{{route('admin.faq.all')}}" style="color: #fff;">All Faq</a></button>
								</div>
							</div>

						</div>
						<div class="panel_body">
							<form action="{{route('admin.faq.insert')}}" method="POST" id="choice_form" enctype="multipart/form-data">
								@csrf
								  <div class="form-group row">
								    <label for="" class="col-sm-3 col-form-label text-right">Faq Ques?</label>
								    <div class="col-sm-6">
								     <input type="text" name="faq_ques" class="form-control" required>
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="" class="col-sm-3 col-form-label text-right">Faq Ans</label>
								    <div class="col-sm-6">
								     <textarea class="form-control" name="faq_ans"></textarea>
								    </div>
								  </div>
								<div class="form-group row">
									<div class="col-md-12 text-center">
										<button type="submit" class="btn btn-primary">Add Faq</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->
   <!-- script code start -->


@endsection
