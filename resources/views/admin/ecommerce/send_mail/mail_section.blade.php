@extends('layouts.adminapp')
@section('title', 'All Mail | '.$seo->meta_title)
@section('admin_content')
{{-- <link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/select2/css/select2.min.css"> --}}
<link rel="stylesheet" href="{{ asset('public/adminpanel/assets/css/bootstrap-select.min.css') }}">
      <!-- content wrpper -->
      <div class="content_wrapper">
		<!--middle content wrapper-->
		<div class="middle_content_wrapper">
			<section>
				<div class="mailbox">
					<div class="mailbox-header">
						<div class="row">
							<div class="col-sm-4">
								<div class="inbox-avatar"><img src="{{asset('public/uploads/user/'.auth::user()->avatar)}}" class="img-circle border-green" alt="img">
									<div class="inbox-avatar-text">
									<div class="avatar-name">{{auth::user()->name}}</div>
										<div><small>Mailbox</small></div>
									</div>
								</div>
							</div>
							<div class="col-sm-8 float-right">
								<div class="inbox-toolbar btn-toolbar text-right">
									<div class="btn-group">
										<a href="{{ route('admin.subscriber.mail.compose') }}" class="btn btn-blue"><i class="far fa-edit"></i> Compose Email</a>
									</div>
									<div class="btn-group ml-1">
                                        <a href="" onclick="
                                                event.preventDefault();
                                                document.getElementById('multipleDeleteForm').submit();
                                            " type="button" class="btn btn-danger">
                                            <span class="fa fa-trash"></span> Delete
                                        </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 pr-md-0">
							<div class="p-0 inbox-nav">
								<div class="mailbox-sideber">
									<div class="profile-usermenu">
										<h6>Mailbox</h6>
										<ul class="nav">
											<li class="active"><a href="{{ route('admin.subscriber.send.section') }}"><i class="fa fa-inbox"></i><span class="pl-2">Inbox</span><small class="float-right label p-1 rounded bg-danger text-white">{{ $unseen_mail }}</small></a></li>
											<li><a href="#"><i class="far fa-paper-plane"></i><span class="pl-2">Send Mail</span></a></li>
											<li><a href="{{ route('admin.mail.all.draft') }}"><i class="fa fa-archive"></i><span class="pl-2">Drafts</span></a></li>
											<li><a href="{{ route('admin.trash.mail') }}"><i class="fa fa-trash"></i><span class="pl-2">Trash</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-9 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
							<div class="p-0 inbox-mail">
								<div class="mailbox-content">
                                <form action="{{ route('contract.multiple.delete') }}" id="multipleDeleteForm" method="post">
                                    @csrf
                                    @foreach ($messages as $message)
                                    <div class="mailbox_inner">
										<div class="i-check mail-check">
											<div class="pl-0 checkbox checkbox-success">
                                            <input id="mailid1" name="contract_delete_id[]" value="{{ $message->id }}" type="checkbox">
												<label for="mailid1"></label>
											</div>
										</div>
										<a href="{{ route('admin.subscriber.mail.details', $message->id) }}" class="inbox_item unread">
											<div class="inbox-avatar">
                                                @php
                                                    $user = \App\User::where('email', $message->visitor_email)->first();
                                                @endphp
                                                @if ($user)
                                                    @if ($user->avater)
                                                        <img src="{{asset('public/adminpanel/uploads/user_photo/', $user->avater)}}" alt="img">
                                                    @else
                                                        <img src="{{asset('public/adminpanel/assets/images/user1.jpg')}}" alt="img">
                                                    @endif
                                                @else
                                                    <img src="{{asset('public/adminpanel/assets/images/user1.jpg')}}" alt="img">
                                                @endif
												<div class="inbox-avatar-text">
                                                    <div class="avatar-name">{{ $message->visitor_name }}</div>
                                                        <div>
                                                            <small>
                                                                <span>
                                                                    <strong>Message: </strong>
                                                                    <span> {{ $message->visitor_message }}</span>
                                                                </span>
                                                            </small>
                                                        </div>
												</div>
												<div class="inbox-date d-none d-lg-block">
                                                    @if ($message->is_seen == 0)
                                                    <span class="badge-danger rounded px-2">Not-Seen</span>
                                                    @else
                                                    <span class="badge-success rounded px-2">SEEN</span>
                                                    @endif
                                                    @if ($message->is_replied == 0)
                                                    <span class="badge-danger rounded px-2">Not Replied</span>
                                                    @else
                                                    <span class="badge-success rounded px-2">Replied</span>
                                                    @endif

                                                    <div class="date">9:27 AM</div>
													<div><small>{{ $message->created_at }}</small></div>
												</div>
											</div>
										</a>
									</div>
                                    @endforeach
									<div class="d-flex justify-content-end m-2">
										<ul class="pagination">
											{{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
											<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                                            {!! $messages->links() !!}
										</ul>
									</div>
                                </form>
								</div>
							</div>
						</div>
					</div>
				</section>

				</div><!--/middle content wrapper-->
				</div><!--/ content wrapper -->

@endsection
