<?php
namespace App\Controllers\Admin;
use System\Controller;
class UsersController extends Controller 

{
    public function index()
    {

    $data['session_results'] =  $this->session->has("success") ? $this->session->pull("success") : null;
    $this->html->settitle("users");
     $this->html->setbreadcrumb("users");

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
        $this->html->setbreadcrumb("active");
    
        // load all users to add them in lists

        /**
        * todo // check id if exists ok if not redirect to main users page
        */
        $usersmodel = $this->load->model("users");
        $users =  $usersmodel->getusers($id);
        return $this->form($users);
    }
    

    public function form($users = null)
    {
        if($users !=null)
        {
            /*
             [id] => 1
            [user_group_id] => 1
            [first_name] => yassin
            [last_name] => hasan
            [email] => yassin781@gmail.com
            [password] => $2y$10$mNkSK1GDZjqHB6Vyp0saiu53Wr39gJa499qMvJkwqazXftZaskHsG
            [image] => 
            [gender] => 
            [birthday] => 0
            [created] => 0
            [status] => enabled
            [ip] => 
            [logincode] => 
            [name] => superadmin
            */
            $usersmodel = $this->load->model("users");
            $data['users_groups'] =  $usersmodel->getusers_groups();
            $data['id'] = $users->id;
            $data['first_name'] = $users->first_name;
            $data['last_name'] = $users->last_name;
            $data['email'] = $users->email;
            $data['image'] = $users->image;
            $data['gender'] = $users->gender;
            $data['birthday'] = $users->birthday;
            $data['created'] = $users->created;
            $data['status'] = $users->status;
            $data['name'] = $users->name;
            $data['action'] = $this->url->link("admin/users/save/".$data['id']);
            return   $this->view->render("admin/users/form",$data);
        }
        else
        {
            $users  = $this->load->model("users");
            $users_groups =  $users->getusers_groups();
            $data['users_groups'] =  $users_groups;
            $data['action'] = $this->url->link("admin/users/submit");
            return $this->view->render("admin/users/form",$data);
        }
    }


    public function submit()
    {
        $json = [];

        
        if($this->isvalid())
        {

            $users  = $this->load->model("users");

            if($users->insertnewusers())
            {
             $json['success'] = "Users added Succsefuuly";               
            }


        }
        else
        {
     
            $json['error'] = $this->validator->getflattenmessage();
        }
        $this->json($json);
         
    }


    // validata data of catgoery before add it to dayabase

    public function isvalid($id = null)
    {
        $this->validator->required("first_name" , "users name is required")
                        ->required("last_name" , "users name is required")
                        ->required("email" , "email name is required")
                        ->email("email" , "email name is required")
                        ->required("password" , "password name is required")
                        ->ismatched("password" ,"cpassword")
                        ->required("birthday")
                        ->required("status")
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



    public function save($id)
    {
        $id = $id[0];

        $json = [];
        // first get data and check if valid or no
        // if valid so insert it into table users

        if($this->isvalid($id))
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