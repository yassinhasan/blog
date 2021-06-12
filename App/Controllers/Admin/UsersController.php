<?php
namespace App\Controllers\Admin;
use System\Controller;
class UsersController extends Controller 

{
    public function index()
    {
    //     // pre($this->layout);
    //     $this->load->controller("Admin/Common/Header")->index();
    //     $this->load->controller("Admin/Common/Nav")->index();
    //     $this->load->controller("Admin/Common/Sidebar")->index();
    //    // return $this->view->render("admin/users/users");
    //     $this->load->controller("Admin/Common/Footer")->index();

    // here i will send object that conatin view of content of users 
    // then layout objecy will recieve this object and save it containr of data
    // so in layoutpage i will write content of this page


    //load session messages

    $data['session_results'] =  $this->session->has("success") ? $this->session->pull("success") : null;
    $this->html->settitle("users");
     $this->html->setclass("users");

     // load all users to add them in lists
     $data['allusers']  = $this->load->model("users")->getall();

    echo   $this->layout->render($this->view->render("admin/users/users",$data));
    }

    public function add()
    {
        return $this->form();
    }

        // edit

    public function edit($id)
    {
        $id = $id[0];

        $this->html->settitle("Update users");
        $this->html->setclass("active");
    
        // load all users to add them in lists

        /**
        * todo // check id if exists ok if not redirect to main users page
        */
        $users = $this->load->model("users")->getbyid($id);

        return $this->form($users);
    }
    

    public function form($users = null)
    {
        if($users)
        {
            $data['name'] = $users->first_name;
            $data['id'] = $users->id;
            $data['status'] = $users->status;
            $data['action'] = $this->url->link("admin/users/save/".$data['id']);
            return   $this->view->render("admin/users/form",$data);
        }
        else
        {
            $data['action'] = $this->url->link("admin/users/submit");
            return $this->view->render("admin/users/form",$data);
        }
    }
    public function submit()
    {
        $json = [];

      
        
        // first get data and check if valid or no
        // if valid so insert it into table users

        if($this->isvalid())
        {
            // here data is alrady valid so insert it into model class
            // model class will creat new row of data 
            $users  = $this->load->model("users");

            $users->insertnewusers();

            $json['success'] = "Users added Succsefuuly";
        }
        else
        {

            $json['error'] = $this->validator->getflattenmessage();
        }
        $this->json($json);
         
    }


    // validata data of catgoery before add it to dayabase

    public function isvalid()
    {
        $this->validator->required("first_name" , "users name is required");
        $this->validator->required("status" , "status name is required");
        return $this->validator->pass();
    }



    public function save($id)
    {
        $id = $id[0];

        
        $json = [];

      
        
        // first get data and check if valid or no
        // if valid so insert it into table users

        if($this->isvalid())
        {
            // here data is alrady valid so insert it into model class
            // model class will creat new row of data 
            $users  = $this->load->model("users");

            $users->save($id);

            $json['success'] = "Users updated Succsefuuly";
            $json['redirect'] = fullurl("admin/users");
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
        // first get data and check if valid or no
        // if valid so insert it into table users
            // here data is alrady valid so insert it into model class
            // model class will creat new row of data 
            $users  = $this->load->model("users");

           if( $users->delete($id))
           {
            $this->session->set('success',"Users deleted Succsefuuly");
            $json['redirect'] = fullurl("admin/users");   
           }
           else
           {
            $json['error'] = "error";
           }



            $this->json($json);
         
    }

    
}