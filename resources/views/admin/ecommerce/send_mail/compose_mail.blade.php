@extends('layouts.adminapp')
@section('title', 'Compose Mail | '.$seo->meta_title)
@section('admin_content')
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 pr-md-0">
                        <div class="p-0 inbox-nav">
                            <div class="mailbox-sideber">
                                <div class="profile-usermenu">
                                    <h6>Mailbox</h6>
                                    <ul class="nav">
                                        <li><a href="{{ route('admin.subscriber.send.section') }}"><i class="fa fa-inbox"></i><span class="pl-2">Inbox</span><small class="float-right label p-1 rounded bg-danger text-white">{{ $unseen_mail }}</small></a></li>
                                        <li class="active"><a href="#"><i class="far fa-paper-plane"></i><span class="pl-2">Send Mail</span></a></li>
                                        <li><a href="{{ route('admin.mail.all.draft') }}"><i class="fa fa-archive"></i><span class="pl-2">Drafts</span></a></li>
                                        <li><a href="{{ route('admin.trash.mail') }}"><i class="fa fa-trash"></i><span class="pl-2">Trash</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
                        <div class="p-0 inbox-mail">
                            <form class="form-validate-summernote" action="{{route('admin.subscriber.send.mail')}}" method="POST">
                                @csrf
                                <div class="row p-2">
                                    <div class="col-sm-2">
                                          <label>To</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                         <input id="email-input" name="subscriber_email" type="text" class="form-control" placeholder="someone@example.com" required="required">
                                        </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-sm-2">
                                          <label>Subject</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                         <input class="form-control" name="mail_subject" type="text" data-msg="Please enter your name"/>
                                         <span class="text-danger">{{ $errors->first('mail_subject') }}</span>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="form-group">
                                        <label>Text</label>
                                        <textarea class="summernote" name="mail_content"  id="aboutus" data-msg="Please write something :)"></textarea>
                                        <span class="text-danger">{{ $errors->first('mail_content') }}</span>
                                    </div>
                                </div>
                                <div class="form-group p-2">
                                  <a href="#" class="btn btn-warning">Save to Draft</a>
                                  <button class="btn btn-blue" type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="p-2">
                      <h3 class="panel-title"> <span class="menu-icon"> <i class="glyphicon glyphicon-book"></i> </span> Address Book </h3>
                    </div>
                    <!-- vd_panel-heading -->

                    <div class="panel-body">
                      <div class="form-group pr-1 icon_parent">
                        <input type="text" class="form-control" id="filter-text" placeholder="Name Filter">
                        <span class="icon_soon_bottom_right"><i class="fa fa-search"></i></span>
                            </div>
                    <br/>
                    <form class="form-horizontal" role="form" action="#">

                      <a href="#" id="check-all">Check All</a> <span class="mgl-10 mgr-10">/</span> <a href="#" id="uncheck-all">Uncheck All</a>

                      <hr class=""/>
                      <div class="form-group clearfix" style="height: 250px; overflow-y:scroll;">
                        <div class="col-md-12">
                          <div class="content-list content-menu" id="email-list">
                            <div class="list-wrapper wrap-25 isotope">
                                @foreach ($subscriber_emails as $email)
                                <div class="email-item">
                                    <div class="vd_checkbox checkbox-success">
                                      <input type="checkbox" id="checkbox-1" value="{{ $email->email }}">
                                      <label class="filter-name" for="checkbox-1"><em class="font-normal">{{ $email->email }}</em> </label>
                                    </div>
                                  </div>
                                @endforeach
                          
                          </div>
                          <!-- list-wrapper -->
                        </div>
                        <!-- content-list -->
                      </div>
                      <!-- col-md-12 -->
                    </div>
                    <!-- form-group -->


                    <hr/>
                    <div class="form-group">
                        <button type="button" id="insert-email-btn" class="btn btn-blue"><i class="fa fa-angle-double-left append-icon"></i> INSERT</button>
                    </div>
                  </form>

              </div>
              <!-- panel -->
            </div>
                </div>
            </section>



            </div><!--/middle content wrapper-->
            </div><!--/ content wrapper -->
            {{-- <script src="{{ asset('public/adminpanel/assets/js/jquery.min.js') }}"></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.js'></script> --}}
            <script type="text/javascript">
                $(function () {
                  "use strict";

                  $('#message').wysihtml5();

                  // init Isotope
                  var $container = $('.isotope').isotope({
                    itemSelector: '.isotope .email-item',
                    layoutMode: 'vertical'
                  });

                  // User types in search box - call our search function and supply lower-case keyword as argument
                  $('#filter-text').bind('keyup', function () {
                    var filterValue = this.value.toLowerCase();
                    isotopeFilter();
                  });

                  var filterFns = function () {
                    var kwd = $('#filter-text').val().toLowerCase();
                    var re = new RegExp(kwd, "gi");
                    var name = $(this).find('.filter-name').text();
                    return name.match(re);
                  }

                  function isotopeFilter() {
                    $container.isotope({ filter: filterFns });
                  }


                  $('#check-all').click(function () {
                    $('.email-item input').prop('checked', true);
                  });
                  $('#uncheck-all').click(function () {
                    $('.email-item input').prop('checked', false);
                  });

                  $('#insert-email-btn').click(function (e) {
                    e.preventDefault();
                    var emails = '';
                    emails = $('.email-item input:checked').map(function (n) {  //map all the checked value to tempValue with `,` seperated
                      return this.value;
                    }).get().join(' , ');
                    var comma = $('#email-input').val() ? ' , ' : '';
                    if (emails) {
                      $('#email-input').val($('#email-input').val() + comma + emails);
                    }
                  });

                });
              </script>

@endsection
