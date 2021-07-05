<?php
namespace System;
use closure;

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
        // first i will call helper class will return helper file contain all file
        // this class before everthing

        $this->helpers(); 

        // here i call load class 

        $this->REGISTER_CLASS();

        // this retun ro object that call this class

        static::$instance = $this;   
     
    }

    // selftone object call only one object from this class
    // how i will make $app  = application::getinstance(file class);
    // here $app call function getinstance will check if static::instance is null
    /// here is null so i will make static::instance = new instance(file class)
    // and return this class
    // second time when i make object frim this class i already call this class
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
        if($value instanceof closure)
        {
            $value = \call_user_func($value,$this);
        }
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
        
    
        $this->file->requirefile($file);
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
      public function getobject($key)
      {
  
            // check if this classes is found in continaer or nor
            // if found so return it's value == class
            // if not found 
            // check if found in coreclasses if found add it to share 
            // fenish return this->container['key']

          if(!$this->isshare($key))
          {
              if($this->iscorealis($key))
              {
                  $this->SHARE($key,$this->createopject($key));
              }
              else
              {
                  echo "sorry this key $key not foudn";
              }
          }
           return $this->container[$key];
      }

      // return value that found in container 
      // this value has added by share function wchic return object
      // when i said $this->route 
      // i need to search for route in container if not found
      // check if found in coreclasses if found make object and return it so here i
      // said when i write $propert nout found in this class
      // please call this method $this->getobject()//

      public function __get($name)
      {
          return $this->getobject($name);
      }
      
      private function helpers()
      {
        //   $this->file->require($this->file->vendor('helpers.php'));
         $this->file->requirefile('Vendor\\helpers.php');
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
            "load" => "System\\Loader",
            "view"   => "System\\View\\ViewFactory",
            "db"    =>  "System\\DataBase",
            "cookie" => "System\\Cookie",
            "html"   => "System\\Html",
            "url"     => "System\\Url",
            "validator"  => "System\\Validation"

        ];
    }

    public function iscorealis($key)
    {
        $coreclasses = $this->coreclasses();
        return (array_key_exists($key,$coreclasses));
    }

    public function createopject($key)
    {
        
        $coreclasses = $this->coreclasses();
         $obj = $coreclasses[$key];
        return new $obj($this);
        
    }
    public function run()
    {

        // first start sessnio
        $this->session->start();
        // then load index file which contain all routes file and access controller

        $this->file->requirefile("App/index.php");

        // then prepare url from prepareurl function 
        $this->request->prepareurl();

        // then from routes i will get all routes then make lloop to catch $controller,$action,$args

        list($controller,$method,$args) =  $this->route->getproperroute();

        
        // then this controller to load class to call this function index or other function
        // by this object from this controller
        // like  $app->route->add_route("admin/dashboard/add","Admin/Dashobard@add");
        // i will send Admin/Dashobard to load class to make object
        // by App\Controllers\Admin\DashobardContrller
        // and make function which i need to call 
        // add()

        // these function i need it to return string then this string will send as output to
        // response 
        // respone class will echo this outupt 
        // by function setoutput so now will show every thing in controller class
        // then send header as  header("header: value")



        $output = (string)$this->load->action($controller,$method,$args);
        
        $this->response->setoutput($output);
        $this->response->send();     

    }

}
