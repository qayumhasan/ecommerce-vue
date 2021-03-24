<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{$seo->meta_title}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/adminpanel/assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/adminpanel/assets')}}/css/all.css">
    <link rel="stylesheet" href="{{asset('public/adminpanel/assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('public/adminpanel/assets')}}/css/responsive.css">
    <link rel="stylesheet" href="{{asset('public/adminpanel/assets')}}/css/career.css">
    <link rel="stylesheet" href="{{asset('public/adminpanel/assets')}}/css/team.css">
    <link rel="stylesheet" href="{{asset('public/adminpanel/assets')}}/css/contact.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('public/adminpanel/assets')}}/css/style.css">
</head>

<body>
    <section id="log_page">
        <div class="container">
            <div class="login_box_wrapper">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="logo_login">
                            <a href="{{url('/')}}">
                                <img src="{{asset('/'.$logos->front_logo)}}" alt="no-logo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form class="login" method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <header>Admin Login</header>
                            <div class="form-group">
                                <span class="fa fa-user"></span>
                                <input type="email" name="email" id="email" class="form-control"  placeholder="Enter email">
                              </div>
                            <div class="form-group">
                                <span class="fas fa-lock"></span><input type="password" name="password" id="password"  class="form-control" placeholder="Password">
                            </div>
                            <input type="submit" class="submit" value="LOGIN"></input>
                            <div class="forgot-password text-center">
                                <a href="{{route('admin.password.request')}}">Forgot password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <style>
                section#log_page {
                    padding: 140px 0px;
                    height: 100vh;
                    background-color: #f5f5f5;
                }

                .login_box_wrapper {
                  max-width: 550px;
                    margin: 0px auto;
                    padding: 20px;
                }

                .logo_login img {
                    width: 200px;
                    height: auto;
                    margin-bottom: 40px;
                }

                .login {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin: 0px auto;
                    max-width: 100%;
                    position: relative;
                    border-radius: 10px;
                    padding: 40px 30px;
                    background-color: rgb(255 255 255 / 70%);
                    color: #353c48;
                    border: 1px solid #e6e6e6;
                }


                /* .login:before {
                    position: absolute;
                    content: '';
                    width: 100%;
                    height: 50px;
                    left: 0%;
                    bottom: 0%;
                    background-color: #26abe2;
                    border-bottom-left-radius: 5px;
                    border-bottom-right-radius: 5px;
                } */

                .login header {
                    margin-bottom: 25px;
                    font-weight: 600;
                    font-size: 28px;
                    font-weight: 600;
                    margin: 0 0 35px 0;
                }

                .form-group {
                    background-color: #fff;
                    width: 100%;
                    margin-bottom: 15px;
                    display: flex;
                }

                .form-group span {
                    color: #949494;
                    width: 40px;
                    line-height: 45px;
                    text-align: center;
                    position: absolute;
                }

                .form-group input {
                    width: 100%;
                    height: 45px;
                    font-size: 1.1rem;
                    /* padding: 18px; */
                    padding-left: 40px;
                    color: #34495e;
                    border: none;
                    border: 1px solid #dadada;
                    border-radius: 5px;
                }

                .form-group input::placeholder {
                    color: rgb(133, 133, 133);
                }

                input:focus,
                input:active,
                input:hover {
                    outline: none;
                }

                .forgot-password {
                    width: 100%;
                    margin-bottom: 10px;
                }

                .forgot-password a {
                    color: #000;
                    text-decoration: none;
                }

                .forgot-password a:hover {
                    text-decoration: underline;
                }

                .submit {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    height: 40px;
                    margin-bottom: 20px;
                    font-family: 'Poppins', sans-serif;
                    font-size: 16px;
                    border-radius: 5px;
                    color: #fff;
                    background-color: #26abe2;
                    border: 1px solid transparent;
                    border: none;
                    transition: all 0.2s linear;
                }

                .submit:hover {
                    cursor: pointer;
                    border: 1px solid #26abe2;
                    background-color: transparent;
                    color: #26abe2;
                }

                .login-form-copy {
                    margin-bottom: 15px;
                }

                .login-form__sign-up {
                    text-decoration: none;
                    color: #3498db;
                }

                .login-form__sign-up:hover {
                    text-decoration: underline;
                }

            </style>
        </div>
    </section>

    <script src="{{asset('public/adminpanel/assets')}}/js/jquery-1.12.4.min.js"></script>
    <script src="{{asset('public/adminpanel/assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('public/adminpanel/assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('public/adminpanel/assets')}}/js/jquery.filterizr.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>

    <script src="{{asset('public/adminpanel/assets')}}/js/custom.js"></script>
    <script>

    </script>
</body>

</html>
