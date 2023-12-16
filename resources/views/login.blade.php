
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @include('components.cdn')

    <style>
        * {
            margin: 0px;
            padding: 0px;
            list-style: none;
            color: #E8DEDE;
        }

        img {
            max-width: 100%;
        }
        ::placeholder {
            color: white !important;
            font-size: 13px;
            opacity: .5 !important;
        }
        .container-fluid{
            padding: 0px;
        }
        strong{
            font-family: 'Ubuntu', sans-serif;
        }
        body{
            font-family: 'Ubuntu', sans-serif;
            color: #6A6A6A;
            overflow-x: hidden;
        }
        .logo{
            width: 90px;
            height: 90px;

        }
        .login-card{
            background-color: #30255A;
            float: none;
            margin: auto;
            box-shadow: 0 1px 15px rgba(0,0,0,.04), 0 1px 6px rgba(0,0,0,.04);
            margin-top: 8%;
            margin-bottom: 5%;

        }
        .left-pic{
            background-image: url(images/login-left.jpg);
            padding: 30px;
            background-size: 100%;
        }

        .login-form{
            padding: 30px;
        }
        .logo-cover img{
            margin-bottom: 30px;
        }
        .form-cover h6{
            margin-bottom: 30px;
        }
        .form-cover input{
            margin-bottom: 30px;
            border-radius: 0px;
            background-color: #cccccc38;

        }

        .form-footer .forget-paswd{
            text-align: left;
        }
        .{
            text-align: right;
        }
        .form-footer{
            margin-bottom: 50px;
        }

        @media (max-width: 768px) {
            .left-pic{
                display: none;
            }
        }

    </style>
</head>
<body>
<div class="container-fluid bg-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 login-card">
                <div class="row">
                    <div class="col-md-5 left-pic"></div>
                        <div class="col-md-7 login-form">
                        <div class="row">
                            <div class="col-lg-10 col-md-12 mx-auto">
                                <div class="logo mx-auto">
                                    <img src="images/logo-removebg.png" alt="logo">
                                </div>
                                <form method="post" action="/login">
                                    @csrf
                                <div class="form-cover">
                                    <input name="user_name" placeholder="Enter Username" type="text" class="form-control" autocomplete=""/>
                                    <input name="user_password" Placeholder="Enter Password" type="password" class="form-control" autocomplete="off"/>
                                <div class="row form-footer">
                                <div class="col-md-6 float-end">
                                     <button class="btn btn-outline-light">LOGIN</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
