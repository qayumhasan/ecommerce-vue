@extends('layouts.adminapp')
@section('title', 'Update Faq | '.$seo->meta_title)
@section('admin_content')
<!-- content wrpper -->
<div class="content_wrapper">
    <!--middle content wrapper-->
    <!-- page content -->
    <div class="middle_content_wrapper">
        <section class="page_content">
            <!-- panel -->
            <div class="panel mb-0">
                <div class="panel_header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel_title">
                                <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Theme Setup</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">

                        </div>
                    </div>

                </div>


                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>image</th>
                                        <th>status</th>
                                        <th>manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($themselect as $key => $data)
                                    <tr>

                                        <td>{{++$key}}</td>
                                        <td>{{$data->theme_name}}</td>
                                         <td>
                                            <img src="{{asset('public/uploads/'.$data->image)}}" height="45px;">
                                        </td>
                                        <td>
                                            @if($data->status==1)
                                            <button class="btn-sm btn-success">Active</button>
                                            @else
                                            <button class="btn-sm btn-default">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                             @if($data->status==1)
                                            <a href="" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
                                            @else

                                            <a href="{{url('admin/theme/selector/active/'.$data->id)}}" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="Deactive"><i class="far fa-thumbs-down"></i></a>
                                            @endif

                                      <!--       <a href="" class="btn btn-default btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="edit"><i class="fas fa-pencil-alt"></i></a> -->

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<!-- modal start-->
@endsection
