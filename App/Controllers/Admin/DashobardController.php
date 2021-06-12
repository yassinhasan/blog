<?php
namespace App\Controllers\Admin;

use System\Controller;
class DashobardController extends Controller 
{

    public function index()
    {
     return $this->view->render("admin/dashboard");
    }

    public function add()
    {
        return $this->view->render("admin/main/login");
    }

    public function submit()
    {
        
    //     $userid = 1;
    //   $this->validator->required("email")->float("email")->required("password")->float("password");
    // //    $this->validator->uniqe("email",["users","email","id",$userid]);
    // pre($this->validator->getmessages());
       
        $json = [];
        
        $json['data'] = $_FILES;
        $json['post'] = $this->request->post("email");

       
         $this->json($json);
        // $image = $this->request->file("image");

        // $target = $this->file->to("public/uploades/images");
        

        // pre($image->moveto($target));
        

        // pre($image);
     
       
    }
}
