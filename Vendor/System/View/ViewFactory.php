<?php
namespace System\View;

use System\Application;

class ViewFactory 
{
    private $app;
    
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    // whey data=[] not =null beacuse i will extract it so if i make it null 
    // exctract will return error
    
    public function render($viewpath,$data = [])
    {
        
      
       return new View($this->app,$viewpath,$data);
    }
}