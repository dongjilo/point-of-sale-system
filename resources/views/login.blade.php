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

        body{
            font-family: 'Ubuntu', sans-serif;
            color: #6A6A6A;
            overflow-x: hidden;
            background-color: #616763;
            background-size: cover;

        }
        .logo{
            width: 90px;
            height: 90px;

        }
        .login-card{
            background-color: #2e2114;
            float: none;
            width: 60%;
            margin: auto;
            box-shadow: 0 1px 15px rgba(0,0,0,0.4), 0 1px 6px rgba(0,0,0,0.4);
            margin-top: 16%;
            margin-bottom: 5%;
            border-radius: 10px;
        }
        .left-pic{
            background-image: url(images/login-left.jpg);
            padding: 30px;
            background-size: 100%;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .login-form{
            padding: 30px;
        }

        .form-cover h6{
            margin-bottom: 30px;
        }
        .form-cover input{
            color: white;
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

        .form-animation {
            background-color: #2e2114;
            float: none;
            width: 60%;
            margin: auto;
            box-shadow: 0 1px 15px rgba(0,0,0,0.4), 0 1px 6px rgba(0,0,0,0.4);
            margin-top: 16%;
            margin-bottom: 5%;
            border-radius: 10px;
            -webkit-animation: glow-form linear 8s infinite;
            animation: glow-form linear 8s infinite;
        }
        @-webkit-keyframes glow-form {
            50% { background-color: #2e2114; }
            100% { background-color: #31304D; }

        }
        @keyframes glow-form {
            0% { background-color: #2e2114; }
            50% { background-color: #31304D ; }
            100% { background-color: #161A30; }
        }

        .body-animation {
            -webkit-animation: glow linear 8s infinite;
            animation: glow linear 8s infinite;
        }
        @-webkit-keyframes glow {
            50% { background-color: #F0ECE5; }
            100% { background-color: #B6BBC4; }

        }
        @keyframes glow {
            0% { background-color: #616763; }
            50% { background-color: #F0ECE5 ; }
            100% { background-color: #B6BBC4; }
        }

    </style>
</head>
<body id="body-animation">

<div class="container-fluid position-relative bg-login">
@if($errors->any())
    @foreach($errors->all() as $error)
      <div class="alert alert-danger position-absolute w-100 alert-dismissible fade show" role="alert">
        <i class="fa fa-fw fa-warning text-black"></i>
        <strong class="text-black">Error!</strong> {{$error}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endforeach
@endif
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 login-card" id="form-animation">
                <div class="row">
                    <div class="col-md-5 left-pic">
                    </div>

                    <div class="col-md-7 login-form">
                                <div class="logo mx-auto">
                                    <img src="images/logo-removebg.png" alt="logo">

                                </div>
                                <form method="post" action="/login" id="form" autocomplete="off"/>
                                    @csrf
                                <div class="form-cover">
                                    <input name="user_uname" placeholder="Enter Username" type="text" class="form-control"/>
                                    <input name="user_password" Placeholder="Enter Password" type="password" class="form-control"/>
                                <div class="row form-footer">
                                <div class="col-md-6 float-end">
                                     <button id="btnLogin" onclick="ani()" type="submit" class="btn btn-outline-light">LOGIN</button>
                                </div>
                                </div>
                                </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}" crossorigin="anonymous"></script>
    <script>

        function ani(){
            document.getElementById('form-animation').className = 'form-animation';
            document.getElementById('body-animation').className = 'body-animation';

        }
        // Cache your Form Elements
        const EL_form = document.querySelector("#form");
        const EL_formSubmitBtn = EL_form.querySelector("#btnLogin");

        const Progress = (evt) => {
          evt.preventDefault(); // Prevent Browser Submit action

          EL_formSubmitBtn.disabled = true; // Disable the submit button

          setTimeout(function() {
            EL_form.submit(); // Or do AJAX stuff here
            EL_formSubmitBtn.disabled = false; // Enable the submit button
          }, 6200);
        };

        EL_form.addEventListener("submit", Progress);



    </script>
</body>
</html>
