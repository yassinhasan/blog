<?php

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

