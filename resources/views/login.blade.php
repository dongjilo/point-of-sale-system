<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jun-Ianez - Point of Sale System">
    <meta name="author" content="Group 8 - BSIT2D">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container" style="position: absolute;left: 0;right: 0;top: 50%;transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-webkit-transform: translateY(-50%);-o-transform: translateY(-50%);">
        <div class="row justify-content-center">
        <div class="col-md-10 col-lg-3 col-xl-9 col-xxl-7">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12 offset-lg-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Login</h4>
                                </div>
                                <form class="user" method="post" action="/login">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input id="user_uname" class="form-control form-control-user" type="text" aria-describedby="emailHelp" placeholder="Enter Username" name="user_uname">
                                        <label for="user_uname">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control form-control-user" type="password" placeholder="Password" name="user_password">
                                        <label for="user_password">Password</label>
                                    </div>
                                    <div class="row mb-3">
                                        <p id="errorMsg" class="text-danger" style="display: none;">Paragraph</p>
                                    </div>

                                    <button id="submitBtn" class="btn btn-primary d-block btn-user w-25 mx-auto" type="submit">Login</button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                <div class="text-center"><a class="small" href="/register">Create an Account!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
