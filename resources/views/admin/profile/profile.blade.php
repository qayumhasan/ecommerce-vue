@extends('layouts.adminapp')
@section('admin_content')
<div class="content_wrapper">
            <div class="middle_content_wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="head_edit">
                            <h3>Edit Profile</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Deshboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Profile
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="user_profile_box">
                            <div class="user_profile text-center">
                                <div class="user_image">
                                    <img src="{{asset('public/uploads/user/'.auth::user()->avatar)}}" alt="no-image" />
                                </div>
                                <h4>{{auth::user()->name}}</h4>

                                <span>{{auth::user()->type}}</span>
                            </div>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="tl">Username</td>
                                        <td class="tr">{{auth::user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="tl">Phone</td>
                                        <td class="tr">{{auth::user()->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td class="tl">Email</td>
                                        <td class="tr">{{auth::user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="tl">Address</td>
                                        <td class="tr">{{auth::user()->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-tab-1" data-toggle="tab" href="#nav-1"
                                    role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel"
                                aria-labelledby="nav-tab-1">
                                <div class="profile_update">
                                    <div class="card">
                                        <div class="card-header">
                                            Profile Edit
                                        </div>
                                        <div class="card-body">
                                            <form action="{{url('admin/useradmin/update/')}}" method="post" enctype="multipart/form-data">
                                              @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label for="formGroupExampleInput">Name</label>
                                                        <input name="name" type="text" class="form-control" placeholder="name" value="{{auth::user()->name}}"/>
                                                    </div>

                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-sm-6">
                                                        <label for="formGroupExampleInput">Email</label>
                                                        <input name="email" type="email" class="form-control" placeholder="Email" value="{{auth::user()->email}}" disabled/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="formGroupExampleInput">Phone</label>
                                                        <input name="phone" type="text" class="form-control" placeholder="Phone" value="{{auth::user()->phone}}"/>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-sm-6">
                                                        <label for="exampleFormControlFile1">Profile Image</label>
                                                        <input type="file" class="form-control-file" name="pic"/>
                                                        <div class="up_image">
                                                            <img src="{{asset('public/uploads/user/'.auth::user()->avatar)}}" alt="no-iamge" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="exampleFormControlTextarea1">Address</label>
                                                        <textarea name="address" class="form-control" rows="3">{{auth::user()->address}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-sm-12">
                                                        <div class="button_submit">
                                                            <button type="submit">Update Profile</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-tab-2">
                                <div class="tab_box">

                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>

                                                <th scope="col">Pay Id</th>
                                                <th scope="col">Month-Year</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Mode Of Payment</th>
                                                <th scope="col">Net Salary</th>
                                                <th scope="col">Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">01</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">02</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                <td>@fat</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">03</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                                <td>@fat</td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-tab-4">
                                <div class="tab_box">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="doc_main">
                                                <div class="doc_box">
                                                    <h4>Resume</h4>
                                                    <iframe src="https://www.w3schools.com/html/html_iframe.asp"
                                                        height="200" width="300" title="Iframe Example"></iframe>
                                                </div>
                                                <div class="doc_link">
                                                    <a href="#">See More</a>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-sm-4">
                                            <div class="doc_main">
                                                <div class="doc_box">
                                                    <h4>Document</h4>
                                                    <iframe src="https://www.w3schools.com/html/html_iframe.asp"
                                                        height="200" width="300" title="Iframe Example"></iframe>
                                                </div>
                                                <div class="doc_link">
                                                    <a href="#">See More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="doc_main">
                                                <div class="doc_box">
                                                    <h4>Resume</h4>
                                                    <iframe src="https://www.w3schools.com/html/html_iframe.asp"
                                                        height="200" width="300" title="Iframe Example"></iframe>
                                                </div>
                                                <div class="doc_link">
                                                    <a href="#">See More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <style>
                    .head_edit {
                        padding: 10px;
                        /* font-size: 18px; */
                    }

                    .breadcrumb li a {
                        text-transform: capitalize;
                        color: #26abe2;
                    }

                    .user_image img {
                        width: 130px;
                        height: 130px;
                        border-radius: 50%;
                        border: 2px solid #e6e6e6;
                        margin-bottom: 10px;
                    }

                    .user_profile {
                        margin-bottom: 10px;
                    }

                    .user_profile h4 {
                        font-size: 18px;
                        text-transform: capitalize;
                    }

                    .user_profile span {
                        font-size: 14px;
                    }

                    .user_profile_box {
                        background-color: #fff;
                        border-radius: 7px;
                        padding: 20px 10px;
                    }

                    td.tl {
                        font-weight: 600;
                        text-transform: capitalize;
                    }

                    .profile_update .card-header {
                        font-weight: 600;
                        font-size: 18px;
                        text-transform: capitalize;
                    }

                    .nav-tabs .nav-link {
                        border: 1px solid transparent;
                        border-top-left-radius: 0.25rem;
                        color: #000;
                        font-size: 16px;
                        font-weight: 600;
                        border-top-right-radius: 0.25rem;
                    }

                    .nav-tabs .nav-link.active {
                        color: #26abe2;
                        background-color: #fff;
                        border-color: #dee2e6 #dee2e6 #fff;
                    }

                    .button_submit button {
                        background: #26abe2;
                        color: #ffff;
                        border-style: none;
                        /* display: block; */
                        width: 100%;
                        padding: 7px;
                        border-radius: 5px;
                        text-transform: capitalize;
                        font-size: 16px;
                        font-weight: 600;
                    }

                    .up_image img {
                        width: 120px;
                        height: 120px;
                        border: 1px solid #e2dbdb;
                        margin-top: 10px;
                    }

                    .tab_box {
                        background-color: #fff;
                        padding: 20px;
                    }

                    .doc_box iframe {
                        width: 100%;
                        height: 400px;
                        border-style: none;
                        border-radius: 5px;
                    }

                    .doc_box h4 {
                        color: #fff;
                        background-color: #26abe2;
                        padding: 7px;
                        border-radius: 3px;
                    }

                    .doc_box h4 {
                        color: #fff;
                        background-color: #26abe2;
                        padding: 10px;
                        border-radius: 3px;
                        font-size: 16px;
                        text-transform: capitalize;
                    }

                    .doc_main {
                        position: relative;
                    }

                    .doc_link a {
                        position: absolute;
                        /* left: 10px; */
                        left: 50%;
                        top: 50%;
                        transform: translate(-50%, -50%);
                        background-color: #26abe2;
                        color: #fff;
                        padding: 8px 24px;
                        border-radius: 5px;
                        text-transform: capitalize;
                        opacity: 0;
                        visibility: hidden;
                        transition: 0.6s linear;

                    }

                    .doc_main:hover .doc_link a {
                        opacity: 1;
                        visibility: visible;
                    }
                </style>
            </div>
        </div>
@endsection
