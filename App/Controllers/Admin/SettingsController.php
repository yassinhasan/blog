<?php
namespace App\Controllers\Admin;
use System\Controller;
class SettingsController extends Controller 

{
    public function index()
    {

    
    $data['success'] =  $this->session->has("success") ? $this->session->pull("success") : null;
    $data['failed'] =  $this->session->has("failed") ? $this->session->pull("failed") : null;
     $this->html->settitle("Settings");
     $this->html->setbreadcrumb("settings");

     $settings  = $this->load->model("Settings")->getbyid(1);
     $data['id'] = $settings->id;
     $data['sitename'] = $settings->sitename;
     $data['siteemail'] = $settings->siteemail;
     $data['status'] = $settings->status;
     $data['message'] = $settings->message;
     $data['action'] = $this->url->link("admin/settings/save/".$data['id']);
    echo   $this->layout->render($this->view->render("admin/settings/settings",$data));
    }

        // edit

    




    // validata data of catgoery before add it to dayabase

    public function isvalid()
    {
        $this->validator->required("sitename" , "sitename  is required");
        $this->validator->required("siteemail" , "siteemail  is required");
        $this->validator->required("status" , "status  is required");
        $this->validator->required("message" , "message  is required");
        return $this->validator->pass();
    }



    public function save($id)
    {
        $id = $id[0];   
        $json = [];

        if($this->isvalid())
        {

            $settings  = $this->load->model("settings");

            $settings->save($id);

            $this->session->set("success","settings updated Succsefuuly");
            $this->url->redirect("admin/settings");
        }
        else
        {
          
            $this->session->set("failed",  $this->validator->getflattenmessage());
             $this->url->redirect("admin/settings");
        }
      
         
    }


    
}