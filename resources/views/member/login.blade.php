<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <!--<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
-->
    <meta name="apple-mobile-web-app-title" content="CodePen">
    <!--
<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
-->
    <!--
<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
-->
    <link href="{{ URL::asset('resources/pharma/hinh/logo.png') }}" rel="icon">

    <title>Login Client</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Client Panel Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>

    <style>
        body {
            background: #222D32;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            align: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-box {
            margin-top: 75px;


            height: auto;
            background: #1A2226;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .login-logo {
            height: 100px;
            font-size: 80px;
            line-height: 100px;
            background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-title {
            margin-top: 15px;
            text-align: center;
            font-size: 30px;
            letter-spacing: 2px;
            margin-top: 15px;
            font-weight: bold;
            color: #ECF0F5;
        }

        .login-form {
            margin-top: 25px;
            text-align: left;
        }

        input[type=text] {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            margin-bottom: 20px;
            padding-left: 0px;
            color: #ECF0F5;
        }

        input[type=password] {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            padding-left: 0px;
            margin-bottom: 20px;
            color: #ECF0F5;
        }

        .form-group {
            margin-bottom: 40px;
            outline: 0px;
        }

        .form-control:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-bottom: 2px solid #0DB8DE;
            outline: 0;
            background-color: #1A2226;
            color: #ECF0F5;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 0;
        }

        label {
            margin-bottom: 0px;
        }

        .form-control-label {
            font-size: 10px;
            color: #6C6C6C;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-outline-primary {
            border-color: #0DB8DE;
            color: #0DB8DE;
            border-radius: 0px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .btn-outline-primary:hover {
            background-color: #0DB8DE;
            right: 0px;
        }

        .login-btm {
            float: left;
        }

        .login-button {
            padding-right: 0px;
            text-align: right;
            margin-bottom: 25px;
        }

        .login-text {
            text-align: left;
            padding-left: 0px;
            color: #A2A4A4;
        }

        .loginbttm {
            padding: 0px;
        }

        .toggle {
            background: none;
            border: none;
            color: #337ab7;
            /*display: none;*/
            /*font-size: .9em;*/
            font-weight: 600;
            /*padding: .5em;*/
            position: absolute;
            right: .75em;
            top: 8.25em;
            z-index: 9;
        }

    </style>


</head>

<body translate="no" style="background-image:url({{ URL::asset('resources/pharma/hinh/hinh_store/bg_4.jpg') }})">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-logo">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    MEMBER PANEL

                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">EMAIL</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input id="txtPassword" type="password" class="form-control" name="password">
                                <button type="button" id="btnToggle" class="toggle"><i id="eyeIcon"
                                        class="fa fa-eye"></i></button>
                            </div>
                            <!--
                            <div class="checkbox mb-3">
                                <label class="form-control-label">
                                    <input type="checkbox" name="ghi_nho" value="remember-me"> REMEMBER ME
                                </label>
                            </div>
                            -->
                            <div class="col-lg-12 loginbttm">

                                <div class="col-lg-8 login-btm login-text">
                                    <div class="mb-4">
                                        @if (count($errors) > 0)
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-secondary  alert-dismissible">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">&times;</button>
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        @if (session('alert'))
                                            <div class="alert alert-secondary  alert-dismissible">
                                                <button type="button" class="close"
                                                    data-dismiss="alert">&times;</button>
                                                {{ session('alert') }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="mb-4">
                                        <a href="{{ url('thanh-vien/dang-ky') }}">
                                            <p class="text-primary"> Register </p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 login-btm login-button">

                                    <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
        <script
                src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-8216c69d01441f36c0ea791ae2d4469f0f8ff5326f00ae2d00e4bb7d20e24edb.js">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            window.console = window.console || function(t) {};
        </script>
        <script>
            if (document.location.search.match(/type=embed/gi)) {
                window.parent.postMessage("resize", "*");
            }
        </script>
        <script id="rendered-js">
            let passwordInput = document.getElementById('txtPassword'),
                toggle = document.getElementById('btnToggle'),
                icon = document.getElementById('eyeIcon');

            function togglePassword() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.add("fa-eye-slash");
                    //toggle.innerHTML = 'hide';
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove("fa-eye-slash");
                    //toggle.innerHTML = 'show';
                }
            }

            function checkInput() {
                //if (passwordInput.value === '') {
                //toggle.style.display = 'none';
                //toggle.innerHTML = 'show';
                //  passwordInput.type = 'password';
                //} else {
                //  toggle.style.display = 'block';
                //}
            }

            toggle.addEventListener('click', togglePassword, false);
            passwordInput.addEventListener('keyup', checkInput, false);
            //# sourceURL=pen.js
        </script>





</body>

</html>
