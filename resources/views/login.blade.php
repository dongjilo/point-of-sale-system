<x-layout>
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
    <div></div>
</div>
</x-layout>
