<?php


use System\Application;
use System\File;
use System\Route;

require __DIR__."\Vendor\System\Application.php";
require __DIR__."\Vendor\System\File.php";
// require __DIR__."\App\index.php";


$file  = new File(__DIR__);


$app  = Application::getinstance($file);


$app->route->add_route("/","HOME/MAIN");
$app->route->add_route("/post/:text/:id","POST/POST");
$app->route->add_route("/404","Error\\NotFound");

$app->run();



// pre($_SERVER);
// list($controller,$method,$args) =  $app->route->getproperroute();
// echo $controller;
// // echo $app->request->url();






 






