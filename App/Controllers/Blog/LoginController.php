<?php
namespace App\Controllers\Blog;

use System\Controller;
class LoginController extends Controller 
{
    protected $data = [];


    public function index()
    {
        $loginmode = $this->load->model("login");
        
        if( $loginmode->isloggined() )
        {
        
          $this->url->redirect("/");
        }
       $this->html->settitle("login form"); 

       $this->html->setbreadcrumb("LOGIN");

        echo $this->bloglayout->render($this->view->render("blog/loginform",$this->data) , ['main','sidebar','container','slider']);
    
    }

    public function submit()
    {

        if( $this->isvaliddata())
        {   
            $json = [];
            $loginmode = $this->load->model("login");
            $user = $loginmode->user();
            
            $remember = $this->request->post("remember");

            if($remember == "on")
            {

              $this->cookie->setcookie("logincode",$user->logincode , 1);
            }
            else
            {
  
                $this->session->set("logincode",$user->logincode);
            }

            $json['users'] = $user;
          
            
            if($user->user_group_id == 1)
            {
                $json['redirect'] =  $this->url->link("/admin");;
            }
            else
            {
                $json['redirect'] =  $this->url->link("/");;
            }
            $json['success'] = "Users register Succsefuuly";  
    

          
             
        }
        else
        {
        
            $json['error'] = implode("<br>" , $this->error);

        }
         $this->json($json);


      
    }


    public function isvaliddata()
    {
        $email = $this->request->post("email");
        $password = $this->request->post("password");
        
//$hashedpassword =  password_hash($password,PASSWORD_DEFAULT);
        
        if(!$email)
        {
            $this->error[] = " soory email is empty";
        }
        if(!$password)
        {
            $this->error[] = " soory password is empty";
        }
        if(! \filter_var($email ,FILTER_VALIDATE_EMAIL))
        {
            $this->error[] = " soory email is not valid";
        }

        // if data enter is just valid so i need to get user by loading model like login
        // this model will return object
        // this object will contains methods like isvalidlogin to check for user
        // and when is valid return true so redirect to admin page or dashboard
        if(empty($this->error))
        {

            $loginmode = $this->load->model("login");
            
          // return pre($loginmode->isvalidlogin($email,$hashedpassword));
            if(!$loginmode->isvalidlogin($email,$password))
            {
                $this->error[] = "soory data is invalid";
            }
        }

        return empty($this->error);
    }


}
