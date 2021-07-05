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


    // this class will return view files


    public function __construct(Application $app,$viewpath,$data)
    {
        
         $this->app = $app;
        $this->prepareviewpath($viewpath);
        $this->data = $data;
        
 
    }

    // this function will prepare view paoth file and return it to $this->viewpath;

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


    // i need this view will convert to string and this method will call automatic 
    // when i write echo object from this class
    // how to do this 
    // first convert output from this class to string
    // this output will be all output fromm view file and $data 
    // then retutn it to this->output 
    // no this->output contain string of all output of view file 
    // now in function __tostring() i will echo this->output 

    public function getoutput()
    {

        if(is_null($this->output))
        {
            ob_start();
            // must extract data before require
            
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