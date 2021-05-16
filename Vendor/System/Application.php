<?php
namespace System;

class Application 
{
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

    public function __construct(File $file)
    {   
        $this->SHARE('file',$file);
        $this->REGISTER_CLASS();
        $this->helpers();
        

        
        
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
            $file = $this->file->to($class.'.php');
        }
        else
        {
            $file = $this->file->vendor($class.'.php');
        }
        if($this->file->exists($file))
        {
            $this->file->require($file);
        }
    }

    /**
     * get get value from container 
     * @param string $key
     * 
     * @return $value
     */

     public function get($key)
     {
         if(array_key_exists($key,$this->container))
         {
             return $this->container[$key];
         }
         else
         {
             return null;
         }
     }

     /**
      * __get get value dynimcialyy by get function from container
      */

      public function __get($name)
      {
          return $this->get($name);
      }
      private function helpers()
      {
          $this->file->require($this->file->vendor('helpers.php'));
      }
}
