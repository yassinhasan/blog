<?php
namespace App\Models;
use System\Model;


class LoginModel extends Model 
{
    protected $tablename = "users";

    protected $user = "";
    // i will take email and password from login by method isvaliddata in logincontroller
    // check first if user is present by email
    // then make verify to this password and password by user 
    // return true or false 
    // before return true i will make property will contain user data 
    public function isvalidlogin($email,$password)
    {

        $user = $this->where("email = ?" , $email)->fetch("users");
       if($user)
       {
           $this->user = $user;
          return \password_verify($password,$user->password);
       }

    }

    public function user()
    {
        return $this->user;
    }

    public function isloggined()
    {
       $logincode = "not avaiblebe";

       if($this->cookie->has("logincode"))
       {
        $logincode = $this->cookie->get("logincode");   
       } 
       elseif($this->session->has("logincode"))
       {
        $logincode = $this->session->get("logincode");   
       }

       
       $user = $this->where("logincode = ? ", $logincode)->fetch("users");
       $this->user = $user;
        if($user != null)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
// $t = new UsersModel();
// $t->qyery("select * from users");
// \pre($t);
