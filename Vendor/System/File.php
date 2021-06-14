<?php
namespace System;
class File 
{
    const DS  =DIRECTORY_SEPARATOR;

    /**
     * ROOT path
     * @var string
     */
    private $root;

    /**
     * CONSTRUCTOR
     * @param string $root
     */
    public function __construct($root)
    {
          $this->root = $root;  
          
          
    }
    /**
     * exists file if exists or no
     * 
     * @param string $file
     * @return bool 
     */

     public function exists($file)
     {
         return \file_exists($this->to($file));
     }
    /**
     * require file if exists or no
     * 
     * @param string $file
     * @return void 
     */

     public function requirefile($file)
     {
         if($this->exists($file))
         {
            return require($this->to($file));
         }
     }

    //  public function vendor($path)
    //  {
    //      return $this->to('Vendor/'.$path);
    //  }
     public function to($path)
     {
         
         return $this->root.self::DS.str_replace('/',self::DS,$path);
     }
     public function topublic($path)
     {
         
         return $this->root.self::DS."App".self::DS."public".self::DS.str_replace('/',self::DS,$path);
     }
     public function toupload($path)
     {
         
         return $this->root.self::DS."public".self::DS."uploades".self::DS.str_replace('/',self::DS,$path);
     }


}