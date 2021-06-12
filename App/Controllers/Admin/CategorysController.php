<?php
namespace App\Controllers\Admin;
use System\Controller;
class CategorysController extends Controller 

{
    public function index()
    {
    //     // pre($this->layout);
    //     $this->load->controller("Admin/Common/Header")->index();
    //     $this->load->controller("Admin/Common/Nav")->index();
    //     $this->load->controller("Admin/Common/Sidebar")->index();
    //    // return $this->view->render("admin/category/category");
    //     $this->load->controller("Admin/Common/Footer")->index();

    // here i will send object that conatin view of content of category 
    // then layout objecy will recieve this object and save it containr of data
    // so in layoutpage i will write content of this page


    //load session messages

    $data['session_results'] =  $this->session->has("success") ? $this->session->pull("success") : null;
    $this->html->settitle("categoires");
     $this->html->setclass("categoires");

     // load all category to add them in lists
     $data['allcategoryes']  = $this->load->model("category")->getall();

    echo   $this->layout->render($this->view->render("admin/category/category",$data));
    }

    public function add()
    {
        return $this->form();
    }

        // edit

    public function edit($id)
    {
        $id = $id[0];

        $this->html->settitle("Update categoires");
        $this->html->setclass("active");
    
        // load all category to add them in lists

        /**
        * todo // check id if exists ok if not redirect to main category page
        */
        $category = $this->load->model("category")->getbyid($id);

        return $this->form($category);
    }
    

    public function form($category = null)
    {
        if($category)
        {
            $data['name'] = $category->name;
            $data['id'] = $category->id;
            $data['status'] = $category->status;
            $data['action'] = $this->url->link("admin/categorys/save/".$data['id']);
            return   $this->view->render("admin/category/form",$data);
        }
        else
        {
            $data['action'] = $this->url->link("admin/categorys/submit");
            return $this->view->render("admin/category/form",$data);
        }
    }
    public function submit()
    {
        $json = [];

      
        
        // first get data and check if valid or no
        // if valid so insert it into table category

        if($this->isvalid())
        {
            // here data is alrady valid so insert it into model class
            // model class will creat new row of data 
            $category  = $this->load->model("category");

            $category->insertnewcategory();

            $json['success'] = "Category added Succsefuuly";
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
        $this->validator->required("name" , "catgory name is required");
        $this->validator->required("status" , "status name is required");
        return $this->validator->pass();
    }



    public function save($id)
    {
        $id = $id[0];

        
        $json = [];

      
        
        // first get data and check if valid or no
        // if valid so insert it into table category

        if($this->isvalid())
        {
            // here data is alrady valid so insert it into model class
            // model class will creat new row of data 
            $category  = $this->load->model("category");

            $category->save($id);

            $json['success'] = "Category updated Succsefuuly";
            $json['redirect'] = fullurl("admin/categorys");
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
        // if valid so insert it into table category
            // here data is alrady valid so insert it into model class
            // model class will creat new row of data 
            $category  = $this->load->model("category");

           if( $category->delete($id))
           {
            $this->session->set('success',"Category deleted Succsefuuly");
            $json['redirect'] = fullurl("admin/categorys");   
           }
           else
           {
            $json['error'] = "error";
           }



            $this->json($json);
         
    }

    
}