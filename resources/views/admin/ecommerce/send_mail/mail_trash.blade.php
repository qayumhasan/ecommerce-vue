@extends('layouts.adminapp')
@section('title', 'Mail Trash | '.$seo->meta_title)
@section('admin_content')
<form action="{{ route('admin.mail.delete.or.restore') }}" method="POST">
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
                                    <a href="{{ route('admin.subscriber.mail.compose') }} " class="btn btn-blue"><i class="far fa-edit"></i> Compose Email</a>
                                </div>
                                <div class="btn-group ml-1">
                                    <button name="submit" value="delete" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                                    <button name="submit" value="restore" class="btn btn-success ml-2"><span class="fa fa-trash"></span> Restore</button>
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
                                        <li><a href="{{ route('admin.subscriber.send.section') }}"><i class="fa fa-inbox"></i><span class="pl-2">Inbox</span><small class="float-right label p-1 rounded bg-danger text-white">{{ $unseen_mail }}</small></a></li>
                                        <li><a href="#"><i class="far fa-paper-plane"></i><span class="pl-2">Send Mail</span></a></li>
                                    <li class=""><a href="{{ route('admin.mail.all.draft') }}"><i class="fa fa-archive"></i><span class="pl-2">Drafts</span></a></li>
                                        <li class="active"><a href="{{ route('admin.trash.mail') }}"><i class="fa fa-trash"></i><span class="pl-2">Tresh</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
                        <div class="p-0 inbox-mail">
                            <div class="mailbox-content">
                            {{-- <form action="{{ route('admin.mail.delete.and.submit') }}" method="POST" id="draftDeleteForm"> --}}
                                @csrf
                                @foreach ($trash_mails as $mail)
                                <div class="mailbox_inner">
                                    <div class="i-check mail-check">
                                        <div class="pl-0 checkbox checkbox-success">
                                        <input id="delId" name="mailId[]" value="{{ $mail->id }}" type="checkbox">
                                            <label for="mailid2"></label>
                                        </div>
                                    </div>
                                        <a href="#" class="inbox_item unread">
                                        <div class="inbox-avatar">
                                            @php
                                            $user = \App\User::where('email', $mail->visitor_email)->first();
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
                                            <div class="avatar-name">{{ $mail->visitor_name }}</div>
                                            <div>
                                                <small>
                                                    <span>
                                                        <strong>Subject: </strong>
                                                        <span> {{ $mail->subject }} </span>
                                                    </span>
                                                </small>
                                            </div>
                                            </div>
                                                <div class="inbox-date d-none d-lg-block">
                                                    <div><small>Deleted At: {{ $mail->updated_at }}</small></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                </div>
                                <div class="d-flex justify-content-end m-2">
                                    <ul class="pagination">
                                        {!!  $trash_mails->links() !!}
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </section>



            </div><!--/middle content wrapper-->
            </div><!--/ content wrapper -->
        </form>
<!--/ content wrapper -->
@endsection
