<?php

use App\Controllers\test;
use System\Application;
use System\File;

require __DIR__."\Vendor\System\Application.php";
require __DIR__."\Vendor\System\File.php";


$file  = new File(__DIR__);
$app  = new Application( $file);

