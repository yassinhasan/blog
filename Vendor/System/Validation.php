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
        return array_values($this->error);
    }

    // if already error exists with this input before

    public function haserror($input)
    {
        return array_key_exists($input,$this->error);
    }

    // required
    public function required($input,$custommessage = null)
    {
        if($this->haserror($input))
        {
            return $this;
        }
        
        $inputvalue = $this->inputvalue($input);
        if($inputvalue == "")
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

    public function ismatched($firstinput,$secondinput,$custommessage =null)
    {
        $firstvalue = $this->inputvalue($firstinput);
        $secondvalue = $this->inputvalue($secondinput);

        if($firstvalue !== $secondvalue)
        {
            $message = isset($custommessage) ? $custommessage : sprintf(" %s is not matched with  %s" , $firstinput,$secondinput);
            
            $this->adderror($secondinput,$message);
        }
    }

    public function uniqe($input , array $database,$custommessage = null)
    {
        $tablename = null;
        $column = null;
        $excpeition = null;
        $exception_value = null;
        $inputvalue = $this->inputvalue($input);
        if(count($database) == 2)
        {
            list($tablename , $column) = $database;
            $result = $this->app->db->select($input)->where("$column = ?" , $inputvalue)->fetch($tablename);
        }
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

    public function pass()
    {
        return empty($this->error);
    }
    public function fail()
    {
        return !$this->pass();
    }

    public function getflattenmessage()
    {
        $errors = array_values($this->error);
        return implode("<br>",$errors);
    }
}
