<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> login form </title>
    <link rel="stylesheet" href= <?= mlink("admin/css/bootstrap.min.css")?>>
    <link rel="stylesheet" href= <?= mlink("admin/css/all.min.css") ?>>
    <link rel="stylesheet" href= <?= mlink("admin/css/style.css") ?>>
    
</head>
<body>

   

    <form class="login-form" method="post" action="<?= fullurl("users/login/submit") ?>" id="loginform">
        <div class="box">
         <h3> log in</h3>
                <div class="" id="results">
                </div>
        <div class="box">
            <div class="form-group">
                <label for="email"> email </label>
                <input class="form-control form-control-lg" type="text" name="email" placeholder="enter your name" autocomplete="on" id="email" >
            </div>
            <div class="form-group">
                <label for="password"> password</label>
                <input class="form-control form-control-lg" type="password" name="password" placeholder="type your password"  id="password" autocomplete="on">
            </div>
            <div class="form-check">
                <input type="checkbox" name="remember"  id="remember" class="form-check-input">
                <label for="remember" class="form-check-label"> remember me</label>

            </div>
            <button class="btn btn-outline-primary block btn-login" name="login"> Log In </button>
        </div>
        </div>
    </form>

        <script src= <?= mlink("admin/js/bootstrap.min.js.map") ?>></script>
        <script src= <?= mlink("admin/js/bootstrap.min.js") ?>></script>
        <script src= <?= mlink("admin/js/all.min.js") ?>></script>
        <script src= <?= mlink("admin/js/js.js")  ?> ></script>
    </body>
</html>