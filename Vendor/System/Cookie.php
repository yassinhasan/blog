<?php
namespace System;

class  Cookie
{
    private $app;
    private $domainpath;
    public function __construct($app)
    {
        $this->app = $app;
    }
    // 3600 equal to 1 hr
    public function setcookie($key,$value , $time )
    {
        $time = $time == -1 ? -1 : time() + $time * 3600;
        \setcookie($key,$value, $time,"/","", false ,true );
    }

    public function get($key)
    {
        return array_get($_COOKIE,$key);
    }

    public function remove($key)
    {
        
        $this->setcookie($key,$_COOKIE['$key'] ,-1);
        if(isset($_COOKIE[$key]))
        {
            unset($_COOKIE[$key]);
        }
    }

    public function all()
    {
        return $_COOKIE;
        
    }
    public function removeall()
    {
        foreach(array_keys($this->all()) as $key)
        {
            $this->remove($key);
        }
      
    }

    public function has($key)
    {
        return isset($_COOKIE[$key]);
    }

    public function domainpath()
    {
        return $this->domainpath = dirname($this->app->request->server("SCRIPT_NAME"));
    }
}