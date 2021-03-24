@extends('layouts.adminapp')
@section('title', 'Send Mail | '.$seo->meta_title)
@section('admin_content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <section>
            <div class="mailbox">
                <div class="mailbox-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="inbox-avatar">
                                <img src="{{asset('public/uploads/user/'.auth::user()->avatar)}}"
                                    class="img-circle border-green" alt="img">
                                <a href="{{ route('admin.subscriber.mail.details', $draft->contract_id) }}"
                                    class="btn btn-sm btn-success float-right">See The Mail</a>
                                <div class="inbox-avatar-text">
                                <div class="avatar-name">{{ $draft->reply_name }}</div>
                                    <div><small>Send Draft Mail</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 pr-md-0">
                        <div class="p-0 inbox-nav">
                            <div class="mailbox-sideber">
                                <div class="profile-usermenu">
                                    <h6>Mailbox</h6>
                                    <ul class="nav">
                                        <li><a href="{{ route('admin.subscriber.send.section') }}"><i
                                                    class="fa fa-inbox"></i><span class="pl-2">Inbox</span><small
                                                    class="float-right label p-1 rounded bg-danger text-white">{{ $unseen_mail }}</small></a>
                                        </li>
                                        <li class="active"><a href="#"><i class="far fa-paper-plane"></i><span
                                                    class="pl-2">Send Mail</span></a></li>
                                        <li class=""><a href="{{ route('admin.mail.all.draft') }}"><i
                                                    class="fa fa-archive"></i><span class="pl-2">Drafts</span></a></li>
                                        <li><a href="{{ route('admin.trash.mail') }}"><i class="fa fa-trash"></i><span
                                                    class="pl-2">Trash</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 offset-1 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
                        <div class="p-0 inbox-mail">
                            <form class="form-validate-summernote"
                                action="{{route('admin.mail.reply.or.draft.from.draft', $draft->id)}}" method="POST">
                                @csrf
                                <div class="row p-2">
                                    <div class="col-sm-2">
                                        <label>To</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input readonly id="email-input" name="reply_email" type="text"
                                            value="{{ $draft->reply_email }}" class="form-control"
                                            placeholder="someone@example.com" required="required">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-sm-2">
                                        <label>Name</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input readonly id="email-input" name="reply_name" type="text"
                                            value="{{ $draft->reply_name }}" class="form-control"
                                            placeholder="Visitor name" required="required">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-sm-2">
                                        <label>Subject</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input class="form-control" name="reply_subject" value="{{ $draft->reply_subject }}" type="text"
                                            data-msg="Please enter your name" />
                                        <span class="text-danger">{{ $errors->first('reply_subject') }}</span>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="summernote" name="reply_content" id="aboutus"
                                    data-msg="Please write something :)">{!! $draft->reply_content !!}</textarea>
                                        <span class="text-danger">{{ $errors->first('reply_content') }}</span>
                                    </div>
                                </div>
                                <div class="form-group p-2">
                                    <button name="submit" type="submit" value="update_draft_mail" class="btn btn-warning">Save to Draft</button>
                                    <button name="submit" value="send_mail" class="btn btn-blue" type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>

    </div>
    <!--/middle content wrapper-->
</div>
<!--/ content wrapper -->
@endsection
