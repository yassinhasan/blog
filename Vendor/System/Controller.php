<?php
namespace System;
abstract class Controller 
{
    protected $app;
    protected $error = [];
    protected $json = [];
    public function __construct(Application $app)
    {
        $this->app = $app;

    }

    public function __get($name)
    {
        return $this->app->getobject($name);
    }


    public function json($json)
    {
        
        echo json_encode($json);
    }



    // abstract public function get_header();
}