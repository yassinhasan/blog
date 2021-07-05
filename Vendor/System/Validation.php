<?php
namespace System;
use System\Application;

class Validation 
{
    private $app;
    private $error= [];
    public function __construct(Application $app )
    {
        $this->app = $app;
    }

    // get value from input

    public function inputvalue($input)
    {
        return $this->app->request->post($input);
    }

    // add error message

    // if already error exists with this input before

    public function haserror($input)
    {
        return array_key_exists($input,$this->error);
    }
    public function adderror($input,$message)
    {
        // if it has error before dont add it 
        if(! $this->haserror($input))
        {
            $this->error[$input] = $message;
        }
    }

    // get all error messages

    public function getmessages()
    {
       if(!empty($this->error))
       {
        return array_values($this->error);
       }
    }
    public function getflattenmessage()
    {
        $errors = array_values($this->error);
        return implode("<br>",$errors);
    }


    // required
    public function required($input,$custommessage = null)
    {
        if($this->haserror($input))
        {
            return $this;
        }
        
        $inputvalue = $this->inputvalue($input);
        if($inputvalue == "" or $inputvalue == null)
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" %s is required" , $input);
            
            $this->adderror($input,$message);
          
        }
          return $this;
    }

    public function email($input)
    {
        if($this->haserror($input))
        {
            return $this;
        }
        $inputvalue = $this->inputvalue($input);
        if(! filter_var($inputvalue,FILTER_VALIDATE_EMAIL))
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" %s is not valid email" , $input);
            
            $this->adderror($input,$message);
           
        }
        return $this;
    }
    public function image($input)
    {
        $image = $this->app->request->file($input);
        if($image->errorupload())
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" no file uploaded" );
            $this->adderror($input,$message);
        }

        if(! $image->isimage())
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" this  is not valid image" );
            
            $this->adderror($input,$message);
           
        }
        return $this;
    }
    public function ismatched($firstinput,$secondinput,$custommessage =null)
    {
        $firstvalue = $this->inputvalue($firstinput);
        $secondvalue = $this->inputvalue($secondinput);

        if($firstvalue !== $secondvalue)
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" %s is not matched with  %s" , $firstinput,$secondinput);
            
            $this->adderror($secondinput,$message);
        }
        return $this;
    }


    // $this->validator->("email" , ["users" , "emai"]);
    // first email i will get value from it 
    // sendocd users this is table name
    // "last email " this is column
    public function uniqe($input , array $database,$custommessage = null)
    {
        $tablename = null;
        $column = null;
        $excpeition = null;
        $exception_value = null;
        $inputvalue = $this->inputvalue($input);
        if(count($database) == 2)
        {
            // $this->validator->("email" , ["users" , "emai"]);
            list($tablename , $column) = $database;
            $result = $this->app->db->select($input)->where("$column = ?" , $inputvalue)->fetch($tablename);
        }
         // $this->validator->("email" , ["users" , "email" , "id" , "id"]);
        elseif(count($database) == 4)
        {
            //  $this->validator->uniqe("email",["users","email","userid",$userid]);
            list($tablename , $column , $excpeition , $exception_value) = $database;
            $result = $this->app->db->select($input)->where(" $column = ? AND $excpeition != ? " , $inputvalue,$exception_value)->fetch($tablename);
        }



        if($result)
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" %s is exists" , $input);
            
            $this->adderror($input,$message);
        }
        return $this;

    }

    public function min($input,$min,$custommessage = null)
    {
        if($this->haserror($input))
        {
            return $this;
        }
        $inputvalue = $this->inputvalue($input);

        if(\strlen($inputvalue) < $min)
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" %s shoud more than %d" , $input,$min);
            
            $this->adderror($input,$message);
        }
        return $this;
    }
    public function maxn($input,$max,$custommessage = null)
    {
        if($this->haserror($input))
        {
            return $this;
        }
        $inputvalue = $this->inputvalue($input);

        if(\strlen($inputvalue) > $max)
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" %s shoud less than %d" , $input,$max);
            
            $this->adderror($input,$message);
        }
        return $this;
    }
    public function float($input,$custommessage = null)
    {
        if($this->haserror($input))
        {
            return $this;
        }
        $inputvalue = $this->inputvalue($input);

        if(! filter_var($inputvalue,FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION))
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" %s shoud be float number " , $input);
            
            $this->adderror($input,$message);
        }
        return $this;
    }

    public function range($input , $min , $max,$custommessage= null,$ifdate=null)
    {
        if($this->haserror($input))
        {
            return $this;
        }
        $inputvalue = $this->inputvalue($input);

        if($ifdate != null)
        {
            $inputvalue = strtotime($inputvalue);
            $min = strtotime($min);
            $max = strtotime($max);
        }
        if($inputvalue < $min || $inputvalue > $max)
        {
            $message = "";
            if(isset($custommessage))
            {
                $message = $custommessage;
            }
            elseif($ifdate != null)
            {
              $message =  sprintf(" %s shoud be between %d and %d " , $input , date("Y-d-m",$min) , date("Y-m-d",$max));
            }
            else

            {
                $message = sprintf(" %s shoud be between %d and %d " , $input , $min , $max);
            }



            
            $this->adderror($input,$message);
        }
        return $this;
    }

    public function pass()
    {
        return empty($this->error);
    }

    public function fail()
    {
        return !$this->pass();
    }


}
