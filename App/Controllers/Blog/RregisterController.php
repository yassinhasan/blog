<?php
namespace App\Controllers\Blog;

use DateTime;
use System\Controller;

class RregisterController extends Controller
{

    public function index()
    {
        $this->html->settitle("register acount");
  

        $this->html->setbreadcrumb("register acount");

         // load all users to add them in lists
         $data['allusers']  = $this->load->model("users")->getall();
         $data['action'] = $this->url->link("/blog/register/submit");
        
         echo $this->bloglayout->render($this->view->render("blog/registerform",$data) , ['main','sidebar','container','slider']);
    }



    public function submit()
    {
        $json = [];
        
        if($this->isvalid())
        {

            $users  = $this->load->model("users");

            if($users->insertnewusers($register = true))
            {

            $this->session->set("success","Users register Succsefuuly");  

             //   make autologin and redirect to home page
                $autologin = $this->load->model("settings")->getvalue("autologin");
                
                if($autologin == "enabled")
                {
                    $userid  = $this->load->model("users")->lastid();
                    $regiestred_user = $this->load->model("users")->getbyid($userid);

                    $this->session->set("logincode",$regiestred_user->logincode);
                    $json['redirect'] = fullurl("/");
                }
                else
                {
                    $json['redirect'] = fullurl("/blog/login");  
                }
      
            $json['success'] = "Users register Succsefuuly";               
             
            }


        }
        else
        {
            $json['error'] = $this->validator->getflattenmessage();
        }
        $this->json($json);
         
    }

    public function isvalid($id = null)
    {
        $this->validator->required("first_name" , "first name is required")
                        ->required("last_name" , "last name is required")
                        ->required("email" , "email name is required")
                        ->email("email" , "email name is required")
                        ->required("password" , "password name is required")
                        ->ismatched("password" ,"cpassword")
                        ->required("birthday")
                        ->required("gender");

        if($id != null)
        {
            $this->validator->uniqe("email",["users","email","id",$id]);
        }
        else
        {
            $this->validator->uniqe("email",["users","email"]);
        }
        return $this->validator->pass();
    }


    // on key up of input like email  i will send data to this controller 
    // so i need to fetch this controller 
    // how to do this i need to add fetch url("blog/register/checkexistsdata")
    // i need to send data input value by body { body : inputvalue}
    //  so here i will get $this->request->input(value);
    // after this i will make validtor unique
    // $this->validator->unique("email" , "users")
    // if error i will add this to $json
    // thedn $this->json($json) // that will decode json 

    // it will return json and convert it to innerhtml to div that will appear after that

    // i will add this tex
    public function checkexistsdata()
    
    {
        $json= [];
        if($this->check_valid_data_onkeyup())
        {
             $json['success'] = "data is ok ";              

        }
        else
        {
     
            $json['error'] = $this->validator->getflattenmessage();
        }
        $this->json($json);

    }

    public function check_valid_data_onkeyup()
    {
        $postname = array_key_first($_POST);
        $postvalue = $_POST[$postname];

        if($postname === "email")
        {
            $this->validator->required("email" , "email  is required")
            ->email("email" , "email  is required")
            ->uniqe("email" , ["users","email"]);
        }
        elseif($postname == "birthday")
        {

            $this->validator->required($postname)->range("birthday" , "1-1-1988" , "1-1-2022",null,true);
            
        }
        else
        {
            $this->validator->required($postname, "$postname is required"); 
        }

        return $this->validator->pass();
    }
} 
