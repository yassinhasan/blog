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
    // //$app->route->add_route("admin/login","Admin/Login");

    // this method will return 
    // object of App\\Controllers\\Admin\\LoginController 
    // method default == index
    // it's content will send through send() by class respose
    
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
    //$app->route->add_route("admin/login","Admin/Login");
    // here controller = Login found in folder Admin
    // we will add Controller so will be LoginController
    // App\\Controllers\\Admin\\LoginController
    // adction will be index
    // so if i  make class  App\\Controllers\\Admin\\LoginController 
    // will be readen

    public function add_in_container($controller)
        {
            $controllerobj = $controller."Controller";
            $controllerobj = "App\\Controllers\\".$controllerobj;
            
            $controllerobj = new $controllerobj($this->app);
            
        $this->controller[$controller] = $controllerobj;
        }

    // it will call method in controller like index or add or delete
    public function action($controller,$action,$args)
    {
            $obj = $this->controller($controller);
            

           return call_user_func_array([$obj,$action],$args);
 
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