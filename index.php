<?php


use System\Application;
use System\File;
use System\Route;

require __DIR__."\Vendor\System\Application.php";
require __DIR__."\Vendor\System\File.php";
// require __DIR__."\App\index.php";


$file  = new File(__DIR__);


$app  = Application::getinstance($file);


// every controller will be call when url matches this
// if url = "/" class homecontroller will be call
// if url = "/admin/login" class logincontroller in admin folder will call




$app->run();







 






