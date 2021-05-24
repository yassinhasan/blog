<?php
 use System\Application;

if(!function_exists("pre"))
{
    function pre($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
}
if(!function_exists("array_get"))
{
    function array_get($array,$key,$defulat = null)
    {
        if(isset($array[$key]))
        {
            return $array[$key];
        }
        else
        {
            return $defulat;
        }
    }
}

if(!function_exists("_e"))
{
    function _e($value)
    {
        return htmlspecialchars($value);
    }
}


if(!function_exists("assets"))
{
    function assets($public_path)
    {
       
    //     $app = Application::getinstance();

    //   $public_path =  $app->request->baseurl()."public/".$public_path;
    //   $public_path  = str_replace("\\","/", $public_path);

        global $app;
        $public_path = $app->url->link("public/".$public_path);
        header("location: $public_path");
        exit;
    }
}
