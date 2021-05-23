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

    private function get_obj_controller($controller)
    {
        
        if(isset($controller))
        {
            $newcontroller = $controller."Controller";
            $newcontroller = "App\\Controllers\\".$newcontroller;
          
            return new $newcontroller($this->app);
        }
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
   
        $obj  = $this->get_obj_controller($controller);
        if(isset($obj))
        {
            return call_user_func([$obj,$action],$args);
        } 
        
        
    }
}