<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @include('components.cdn')
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container login">
        <h1 class=" text-center text-white mb-5 ">Login:</h1> 
            <form action="operation/checklogin.php" method="POST">
                <div class="row mb-3">
                    <input type="text" class="form-control" name="txtUsername" placeholder="ENTER YOUR USERNAME" required>
                </div>
                <div class="row mb-3">
                    <input type="password" class="form-control" name="txtPassword" placeholder="ENTER YOUR PASSWORD" required>
                </div> 
                    <div class="row mb-3">
                    <input type="submit" value="Login" name="btnLogin" class=" btn btn-primary my-2 h6">
                </div>

                  
            </form>
</div>

                    
</body>
</html>