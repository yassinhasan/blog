<?php
namespace App\Controllers\Admin;
use System\Controller;
class ProfileController extends Controller 

{
    public function index()
    {

     $data['success'] =  $this->session->has("success") ? $this->session->pull("success") : null;
     $data['failed'] =  $this->session->has("failed") ? $this->session->pull("failed") : null;
     $this->html->settitle("Porofile");
     $this->html->setbreadcrumb("profile");

     $user  = $this->load->model("login")->user();

     $data['id'] = $user->id;
     $data['first_name'] = $user->first_name;
     $data['last_name'] = $user->last_name;
     $data['email'] = $user->email;
     $data['image'] = $user->image;
     $data['gender'] = $user->gender;
     $data['birthday'] = $user->birthday;
     $data['status'] = $user->status;
     $data['action'] = $this->url->link("admin/profile/save/".$data['id']);
    echo   $this->layout->render($this->view->render("admin/profile/profile",$data));
    }


    public function isvalid()
    {
        $this->validator->required("first_name" , "first_name  is required");
        $this->validator->required("last_name" , "last_name  is required");
        $this->validator->required("status" , "status  is required");
        $this->validator->required("email" , "email  is required");
        $this->validator->image("image" , "image error");
        return $this->validator->pass();
    }



    public function save($id)
    {
        $id = $id[0];   

        if($this->isvalid())
        {

            $user  = $this->load->model("Users");

            $user->update($id);

            $this->session->set("success","profile updated Succsefuuly");
            $this->url->redirect("admin/profile");
        }
        else
        {
          
            $this->session->set("failed",  $this->validator->getflattenmessage());
             $this->url->redirect("admin/profile");
        }

      
         
    }


    
}