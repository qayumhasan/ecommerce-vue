@extends('layouts.adminapp')
@section('admin_content')
<div class="content_wrapper">
    <div class="middle_content_wrapper">
        <section class="page_area">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="panel">
                        <div class="panel_header">
                            <div class="panel_title"><span class="text-center">Footer Option </span></div>
                        </div>
                        <div class="panel_body">
                            <form class="py-2" action="{{ route('admin.footer.option.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Company Address:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$footeroption->address}}" require="" name="address">
                                        <small class="text-danger">
                                            @error('address')
                                                    {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Company Phone:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$footeroption->phone}}" required="" name="phone">
                                        <small class="text-danger">
                                            @error('phone')
                                                    {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Company Email:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$footeroption->email}}" required="" name="email">
                                        <small class="text-danger">
                                            @error('email')
                                                    {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Company Copyright Text:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$footeroption->copyright}}" required="" name="copyright">
                                        <small class="text-danger">
                                            @error('copyright')
                                                    {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Accepted Payment Methods:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" value=""name="payment_image">
                                        <small class="text-danger">
                                            @error('payment_image')
                                                    {{$message}}
                                            @enderror
                                        </small>
                                        <img src="{{asset('public/uploads/footerpayment/')}}/{{$footeroption->payment_image}}" width="330px" height="33px">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Accepted Payment Methods:</label>
                                    <div class="col-sm-9">
                                        <textarea rows="3" class="form-control" name="footer_text">{{$footeroption->footer_text}}</textarea>
                                        <small class="text-danger">
                                            @error('footer_text')
                                                    {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
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


<script>
    $(document).ready(function() {
        $('.modalbtn').click(function(params) {
            var room_id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/hostel/room/edit') }}",
                data: {
                    room_id: room_id
                },
                success: function(data) {


                }
            });
        });
    });
</script>
