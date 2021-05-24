<?php
namespace System;

class  Cookie
{
    private $app;
    public function __construct($app)
    {
        $this->app = $app;
    }
    // 3600 equal to 1 hr
    public function setcookie($key,$value , $timeinhour = 1)
    {
        \setcookie($key,$value,\time() +  $timeinhour * 3600 , "","", false ,true );
    }

    public function cookie($key)
    {
        return array_get($_COOKIE,$key);
    }

    public function remove($key)
    {
        \setcookie($key,null,\time() -  3600 , "","", false ,true );
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
}