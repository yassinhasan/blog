<?php
namespace System;
class Loader 
{
    private $app;
    private $controller = [];
    private $model = [];
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    // return controller object from url 
    public function controller($controller)
    {
       
        if(!$this->found_in_continaer($controller))
        {
            $this->add_in_container($controller);

        }
        return $this->controller[$controller];
    }

    // check if found 
    private function found_in_continaer($controller)
    {
        return  array_key_exists($controller,$this->controller);
    }

    // get obj to use it in func_user_array(cllable)
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

    // it will call method in controller like index or add or delete
    public function action($controller,$action,$args)
    {
   
        $obj  = $this->get_obj_controller($controller);
        if(isset($obj))
        {
            return call_user_func_array([$obj,$action],$args);
        }  
    }







    // return controller object from url 
    public function model($model)
    {
       
        if(!$this->found_in_model($model))
        {
            $this->add_in_model($model);

        }
        return $this->model[$model];
    }
    // get obj to use it in func_user_array(cllable)
    private function preparename($model)
    {
            $newmodel = $model."Model";
            $newmodel = "App\\Models\\".$newmodel;
            return $newmodel;
    }

    // check if found 
    private function found_in_model($model)
    {
        return  array_key_exists($model,$this->model);
    }

    public function add_in_model($model)
    {

        $obj = $this->preparename($model);
        $obj = new $obj($this->app);
       $this->model[$model] = $obj;
    }

}