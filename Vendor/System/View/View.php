<?php
namespace System\View;
use System\File;
class View  implements ViewInterface
{
    private $file;
    private $output;
    private $data = [];
    private $viewpath;



    public function __construct(File $file,$viewpath,$data)
    {
        
        $this->file = $file;
        $this->prepareviewpath($viewpath);
        $this->data = $data;
        
 
    }

    public function prepareviewpath($viewpath)
    {
        $relativepath = "App\\Views\\".$viewpath.".php";
         if($this->file->exists($relativepath))
        {
           return $this->viewpath = $this->file->to($relativepath);
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