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


// function get full path of puplic folder
// anything will be wite will be assets("admin") == public/admin
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

if(!function_exists("mlink"))
{
    function mlink($public_path)
    {
       
    //     $app = Application::getinstance();

    //   $public_path =  $app->request->baseurl()."public/".$public_path;
    //   $public_path  = str_replace("\\","/", $public_path);

        global $app;
        $public_path = $app->url->link("public/".$public_path);

        return $public_path ;
    }
}
if(!function_exists("fullurl"))
{
     function fullurl($path)
    {

        global $app;

        $path = \trim($path,"/");
        $path = str_replace("\\", "/" , $path);
        
        $path =  $app->request->baseurl().$path;
        return $path;
    }
}

if(!function_exists("read_more"))
{
    function read_more($string , $number_0f_words)
    {
        $totalwords = array_filter(explode(" ",$string));

        
        if(count($totalwords) <= $number_0f_words)
        {
            return $string;
        }
        else
        {
            return implode(" ",array_splice($totalwords,0,$number_0f_words))." ... ";
        }
    }
}