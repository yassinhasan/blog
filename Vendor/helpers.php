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