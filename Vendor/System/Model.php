<?php
namespace System;
abstract class Model 
{
    protected $app;
    protected $tablename;
    public function __construct(Application $app)
    {
        $this->app = $app;

    }

    public function __get($name)
    {
        return $this->app->getobject($name);
    }

    public function __call($mothod,$args)
    {
        return call_user_func_array([$this->app->db,$mothod],$args);
    }
    public function getall()
    {
        
      return $this->fetchall($this->tablename);
       
    }
    public function getbyid($id)
    {
        
      return $this->where("id = ? " , $id)->fetch($this->tablename);
       
    }

    public function idexists($id)
    {
      
      $id_exists = $this->select($id)->where("id = ? " , $id)->fetch($this->tablename);

    return  $id_exists ? true : false;
    }


    

    // abstract public function get_header();
}