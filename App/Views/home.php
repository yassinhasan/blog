<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href= <?= mlink("admin/css/all.min.css") ?>>
    <link rel="stylesheet" href= <?= mlink("admin/css/style.css") ?>>
</head>
<body>
        <h1> hello worlod  and i love </h1>
        <i class="fas fa-sign-in-alt"></i>
        <a href="<?= fullurl("users/login")?>"><span>login</span></a>
        <br>
        <i class="fas fa-power-off"></i>
        <a href="<?= fullurl("users/logout")?>"><span>logout</span></a>
        <br>
        <i class="fas fa-home"></i>
        <a href="<?= fullurl("admin")?>"><span>admin page</span></a>
</body>
</html>

