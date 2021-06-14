<?php
namespace System\Http;
use System\Http\UploadFile;
class Request
{

    private $url;
    private $baseurl;
    private $file = [];

    public function prepareurl()
    {
        $request_uri = $this->server("REQUEST_URI");
        // $script_name = $this->server("SCRIPT_NAME");
        if(strpos($request_uri,"?") !== false)
        {

            list($request_uri,$query_string) = explode("?",$request_uri);
            
        }

        
        if(\strlen($request_uri) > 1 )
        {
            $request_uri = \rtrim($request_uri,"/");
           
        }
       
     
       
        $this->url = $request_uri;
       
        $baseurl = $this->server("REQUEST_SCHEME")."://".$this->server("HTTP_HOST")."/";
        
        $this->baseurl = $baseurl;
    
       
    }
    public function url()
    {
       return $this->url;
    }
    public function baseurl()
    {

        return $this->baseurl;
    }

    
    public function server($key,$default=null)
    {
       return array_get($_SERVER,$key,$default);
    }
    public function get($key,$default=null)
    {
       return array_get($_GET,$key,$default);
    }
    public function post($key,$default=null)
    {
       return array_get($_POST,$key,$default);
    }
    public function method($key,$default=null)
    {
      return array_get($_POST,$key,$default);
    }


    
    public function file($input)
    {
        if(array_key_exists($input,$this->file))
        {
            return $this->file[$input];
        }

        $this->file[$input] = new UploadFile($input);
        return $this->file[$input];
    }

    



}