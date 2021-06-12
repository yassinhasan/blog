<?php
namespace System\View;
use System\File; 
use  System\View\Viewer;
use  System\Application;
use  System\Controller;
class View  extends Controller implements ViewInterface 
{
    protected $app;
    private $output;
    private $data = [];
    private $viewpath;



    public function __construct(Application $app,$viewpath,$data)
    {
        
         $this->app = $app;
        $this->prepareviewpath($viewpath);
        $this->data = $data;
        
 
    }

    public function prepareviewpath($viewpath)
    {
        $relativepath = "App\\Views\\".$viewpath.".php";
         if($this->app->file->exists($relativepath))
        {
           return $this->viewpath = $this->app->file->to($relativepath);
        }
        else
        {
            die("<b>".$viewpath."</b> View  not exists");
        }
      
    }

    public function getoutput()
    {

        if(is_null($this->output))
        {
            ob_start();
            extract($this->data);
            require $this->viewpath;
            $this->output = ob_get_clean();
        }
        return  $this->output;

    }

    public function __toString()
    {
     return $this->getoutput();  
    }


}