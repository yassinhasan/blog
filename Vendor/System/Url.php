<?php
namespace System;
class Url 
{
    private $app;
    function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function link($path)
    {

        $path = \trim($path,"/");
        $path = str_replace("\\", "/" , $path);
        
        $path =  $this->app->request->baseurl().$path;
        return $path;
    }
    public function redirect($path)
    {

        \header("location:".$this->link($path));
        exit;
    }

}