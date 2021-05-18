<?php
namespace System;

class Application 
{

    private static $instance;
    /**
     * CONTAINER AS ARRAY CONTAIN KEY AND VALUE
     * 
     * @var array $container
     */
    private $container = [];
    /**
     * Constrctor
     * 
     * @param \System\File $file
     */

    private function __construct(File $file)
    {   
        $this->file = $file;
        $this->SHARE('file',$file);
        $this->REGISTER_CLASS();
        $this->helpers(); 
        static::$instance = $this;   
     
    }

    public static function getinstance($file = null)
    {
        if(is_null(static::$instance))
        {
            static::$instance = new static($file);

        }
        return static::$instance;
    }

    /**
     *  SHARE function array share key and value from container
     * 
     * @param key 
     * @param value
     * 
     * @return mixes
     */
    
    public function SHARE($key,$value)
    {
        $this->container[$key] = $value;
    }

    /**
     * REGISTER_CLASS use spl uato load function 
     * @return void
     */
    private function REGISTER_CLASS()
    {
        spl_autoload_register([$this,'load']);
    }

    /**
     * load load classes from vendor or app folder
     * @param string classes name
     * @return void
     */
    public function load($class)
    {

        if(strpos($class,"App") === 0)
        
        {
            $file = $class.'.php';
        }
        else
        {
            $file = "Vendor\\".$class.'.php';
        }
        
    
        $this->file->require($file);
    }

    /**
     * get get value from container 
     * @param string $key
     * 
     * @return $value
     */



     /**
      * __get get value dynimcialyy by get function from container
      */

      public function __get($name)
      {
          return $this->get($name);
      }
      private function helpers()
      {
        //   $this->file->require($this->file->vendor('helpers.php'));
         $this->file->require('Vendor\\helpers.php');
      }
    /*
        شةف عايز لما اكتب مثلا
        $app->session 
        يدخل علي الكونتينر
        يطلع الكي ده
        ويطلع القيمه الي اصاده
        مثلا
        system/session 
        ويعمل منها 
        كلاس جديد

    */

    public function isshare($key)
    {
        return isset($this->container[$key]);
    }

    public function coreclasses()
    {
        return [
            "session" => "System\\Session",
            "response" => "System\\Http\\Response",
            "request" => "System\\Http\\Request",
            "route"  => "System\\Route",

        ];
    }
    public function get($key)
    {

        if(!$this->isshare($key))
        {
            if($this->iscorealis($key))
            {
                $this->SHARE($key,$this->createopject($key));
            }
            else
            {
                echo "sorry this key not foudn";
            }
        }
         return $this->container[$key];
    }
    public function iscorealis($key)
    {
        $coreclasses = $this->coreclasses();
        return (array_key_exists($key,$coreclasses));
    }

    public function createopject($key)
    {
        
        $coreclasses = $this->coreclasses($this);
         $obj = $coreclasses[$key];
        return new $obj($this);
        
    }
    public function run()
    {
        $this->session->start();
        $this->file->require("App/index.php");
        $this->request->prepareurl();
        list($controller,$method,$args) =  $this->route->getproperroute();
    

    }

}
