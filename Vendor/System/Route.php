<?php
namespace System;

class Route 
{
    private $app;
    private $routes = [];
    private $notfound;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }


    public function add_route($url,$action,$request_method = 'GET')
    {
        $routes = [
            "url"        => $url, // ALL URL MAY BE  MAIN\\HOME@INDEX   OR POSTS\\POST@ADD  OR 404
            "pattern"   =>$this->generate_pattern($url),
            "action"    =>$this->getAction($action), // controller\\action  like  POSTS\\POST@ADD   CLASS NAME = POSTS\\POST   ACTION =ADD  
            "method"    => $request_method

        ];

        $this->routes[] = $routes;
    }

    public function generate_pattern($url)
    {
        $pattern = "#^";
        $pattern .= str_replace([":text",":id"],["([a-zA-Z0-9-]+)","(\d+)"],$url);
        $pattern .= "$#";
        return $pattern;


    }
    public function getAction($action)
    {
        $action = str_replace("/","\\",$action);
        $action = (strpos($action,"@") !== false ) ? $action : strtoupper($action."@index"); 
        return $action;
    }
    public function notFound($url)
    {
        $this->notfound = $url;
    }
    public function getproperroute()
    { 
        foreach($this->routes as $route)
        {
    
            if($this->ismatching($route['pattern']))
            {
               
                $args = $this->argumentfrom($route['pattern']);
                
                list($controller,$method) = explode("@",$route['action']);
                return [$controller,$method,$args];
                         
            }
        } 
    }

    public function ismatching($pattern)
    {
       return preg_match($pattern,$this->app->request->url());

    }
    public function argumentfrom($pattern)
    {
         preg_match_all($pattern,$this->app->request->url(),$matches);
         array_shift($matches);
         return $matches;
    }
}
