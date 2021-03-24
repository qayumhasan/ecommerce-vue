@extends('layouts.adminapp')
@section('title', 'Mail Details | '.$seo->meta_title)
@section('admin_content')
{{-- <link rel="stylesheet" href="{{asset('public/adminpanel')}}/assets/plugins/select2/css/select2.min.css"> --}}
<link rel="stylesheet" href="{{ asset('public/adminpanel/assets/css/bootstrap-select.min.css') }}">
<!-- content wrpper -->
<!-- content wrpper -->
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <section>
            <div class="mailbox">
                <div class="mailbox-header">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="inbox-avatar"><img src="{{asset('public/uploads/user/'.auth::user()->avatar)}}"class="img-circle border-green"
                                    alt="img">
                                <div class="inbox-avatar-text">
                                    <div class="avatar-name">{{auth::user()->name}}</div>
                                    <div><small>Mailbox</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 float-right">
                            <div class="inbox-toolbar btn-toolbar text-right">
                                <div class="btn-group">
                                    <a href="{{ route('admin.subscriber.mail.compose') }}" class="btn btn-blue"><i class="far fa-edit"></i> Compose
                                        Email</a>
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
                                        <li class="active"><a href="{{ route('admin.subscriber.send.section') }}"><i class="fa fa-inbox"></i><span
                                                    class="pl-2">Inbox</span><small
                                                    class="float-right label p-1 rounded bg-danger text-white">{{ $unseen_mail }}</small></a>
                                        </li>
                                        <li><a href="#"><i class="far fa-paper-plane"></i><span
                                                    class="pl-2">Send Mail</span></a></li>
                                        <li><a href="{{ route('admin.mail.all.draft') }}"><i class="fa fa-archive"></i><span
                                                    class="pl-2">Drafts</span></a></li>
                                        <li><a href="{{ route('admin.trash.mail')  }}"><i class="fa fa-trash"></i><span
                                                    class="pl-2">Trash</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
                        <div class="inbox-mail">
                            <div class="inbox-avatar p-3 border-top-0 border-left-0 border-right-0 border">
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
                                    <div class="avatar-name"><strong>From: </strong>
                                        {{ $mail->visitor_name }} - <em> {{ $mail->visitor_email }}</em>
                                    </div>
                                    <div><small><strong>Subject: </strong> {{ $mail->subject }} </small></div>
                                </div>
                                <div class=" text-right">
                                    <div><span class="bg-green badge"><small>OPPORTUNITIES</small></span></div>
                                    <div><small>{{ $mail->created_at }}</small></div>
                                </div>
                            </div>
                            <div class="inbox-mail-details fs-13 p-3">
                                <div>
                                    {!! $mail->visitor_message  !!}
                                </div>

                                @if ($mail->contract_images->count() > 0)
                                @php

                                @endphp
                                <hr>
                                <h4> <i class="fa fa-paperclip"></i> Attachments <span>({{$mail->contract_images->count()}})</span> </h4>
                                <div class="row">
                                    @foreach ($mail->contract_images as $image)
                                    <div class="col-sm-2">
                                    <a href="#" class="m-1 d-block"><img class="img-thumbnail img-fluid" alt="attachment" src="{{ asset('public/uploads/visitor_attach_files/'.$image->image) }}"> </a>
                                    </div>
                                    @endforeach

                                </div>
                                @endif


                                <div class="mt-3 border p-3 text-right">
                                <p class="pb-3 fs-13">click here to <a href="{{ route('admin.contract.reply.mail', $mail->id) }}">Reply</a> or <a
                                href="{{ route('admin.contract.reply.mail', $mail->id) }}">Forward</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>



    </div>
    <!--/middle content wrapper-->
</div>
<!--/ content wrapper -->

@endsection
