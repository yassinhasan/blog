<?php
namespace App\Controllers\Admin;
use System\Controller;
class AdsController extends Controller 

{
    public function index()
    {
        
    $data['session_results'] =  $this->session->has("success") ? $this->session->pull("success") : null;
    $this->html->settitle("ads");
     $this->html->setbreadcrumb("ads");

     // load all ads to add them in lists
     $data['allads']  = $this->load->model("ads")->getall();

    echo   $this->layout->render($this->view->render("admin/ads/ads",$data));
    }

    public function add()
    {
        return $this->form();
    }

    // edi
    public function edit($id)
    {
        $id = $id[0];
        // pre($this->route->currentroute());
        $this->html->settitle("Update ads");
        $this->html->setbreadcrumb("active");
        $ads = $this->load->model("ads")->getbyid($id);
        return $this->form($ads);
    }
    
    public function form($ads = null)
    {

        $pages = $this->load->model("ads")->getadspages();

        if($ads)
        {
           
            
            $data['id'] = $ads->id;
            $data['name'] = $ads->name;
            $data['link'] = $ads->link;
            $data['image'] = $ads->image;
            $data['pages'] = $pages;
            $data['selectedpages'] =explode(",",$ads->pages);
            $data['start_at'] = date("Y-m-d" , $ads->start_at);
            $data['end_at'] = date("Y-m-d" , $ads->end_at);
            $data['status'] = $ads->status;
            $data['action'] = $this->url->link("admin/ads/save/".$data['id']);
            return   $this->view->render("admin/ads/form",$data);
        }
        else
        {
            $data['action'] = $this->url->link("admin/ads/submit");
            $data['pages'] = $pages;
            return $this->view->render("admin/ads/form",$data);
        }
    }

    public function isvalid()
    {
        $this->validator->required("name" , "catgory name is required");
        $this->validator->required("status" , "status name is required");
        return $this->validator->pass();
    }

    public function submit()
    {
        $json = [];

        if($this->isvalid())
        {
            $ads  = $this->load->model("ads");
            $ads->insertnewads();
            
            $json['success'] = "Ads added Succsefuuly";
        }
        else
        {
            $json['error'] = $this->validator->getflattenmessage();
        }
        $this->json($json);      
    }


    public function save($id)
    {
        $id = $id[0];   
        $json = [];

        if($this->isvalid())
        { 
            $ads  = $this->load->model("ads");
            $ads->save($id);
            $json['success'] = "Ads updated Succsefuuly";
            $json['redirect'] = fullurl("admin/ads");
        }
        else
        {
            $json['error'] = $this->validator->getflattenmessage();
        }
        $this->json($json);      
    }

    public function delete($id)
    {
        $id = $id[0];
        $ads  = $this->load->model("ads");
        if( $ads->delete($id))
           {
            $this->session->set('success',"Ads deleted Succsefuuly");
            $json['redirect'] = fullurl("admin/ads");   
        }
        else
        {
            $json['error'] = "error";
        }
        $this->json($json);
         
    }

    
}