<?php
namespace System;
class Loader 
{
    private $app;
    private $controller = [];
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function controller($controller)
    {
        if(!$this->found_in_continaer($controller))
        {
            $this->add_in_container($controller);

        }
        return $this->controller[$controller];
    }

    private function found_in_continaer($controller)
    {
        return  array_key_exists($controller,$this->controller);
    }

    public function get_obj_controller($controller)
    {
        $controller = $controller."Controller";
        $controller = "App\\Controllers\\".$controller;
        return new $controller($this->app);
    }

    public function get_controller($controller)
    {
        
        return $this->controller[$controller];
    }

    public function add_in_container($controller)
    {
        $obj = $this->get_obj_controller($controller);
       $this->controller[$controller] = $obj;
    }

    public function action($controller,$action,$args)
    {
        return call_user_func([$this->get_obj_controller($controller),$action],$args);
    }
}