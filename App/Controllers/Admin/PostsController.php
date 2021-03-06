<?php
namespace App\Controllers\Admin;
use System\Controller;
class PostsController extends Controller 

{
    public function index()
    {



    $data['session_results'] =  $this->session->has("success") ? $this->session->pull("success") : null;
    $this->html->settitle("posts");
     $this->html->setbreadcrumb("posts");

     // load all posts to add them in lists
     $data['allposts']  = $this->load->model("posts")->getallposts();

    echo   $this->layout->render($this->view->render("admin/posts/posts",$data));
    }

    public function add()
    {
        return $this->form();
    }

        // edit

    public function edit($id)
    {
        $id = $id[0];

        $this->html->settitle("Update posts");
        $this->html->setbreadcrumb("active");
    
        $postsmodel = $this->load->model("posts");
        $posts =  $postsmodel->getbyid($id);
       return $this->form($posts);
    }
    

    public function form($posts = null)
    {
        if($posts !=null)
        {
            $data['posts']  = $this->load->model("posts")->getall();
            $data['id'] = $posts->id;
            $data['title'] = $posts->title;
            $data['details'] = $posts->details ;
            $data['tags'] = $posts->tags;
            $data['categorys']  = $this->load->model("Category")->getall();
            $data['post_category'] = $posts->category_id;
            $data['created'] = strtotime($posts->created);
            $data['status'] = $posts->status;
            $data['image'] = $posts->image;
            $data['related_posts'] = explode(",",$posts->related_posts);

            $data['action'] = $this->url->link("admin/posts/save/".$data['id']);
            return   $this->view->render("admin/posts/form",$data);
        }
        else
        {
            $data['posts']  = $this->load->model("posts")->getall();
            $data['categorys']  = $this->load->model("Category")->getall();

            $data['action'] = $this->url->link("admin/posts/submit");
            return $this->view->render("admin/posts/form",$data);
        }
    }


    public function submit()
    {
        $json = [];

        if($this->isvalid())
        {
            $posts  = $this->load->model("posts");
            if($posts->insertnewposts())
            {
             $json['success'] = "Posts added Succsefuuly";               
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
        $this->validator->required("title")
        ->required("category_id")
        ->required("details")
        ->required("tags")
        ->required("status")
        ->required("related_posts");
       
      // $related_posts = implode("," ,array_filter($related_posts, "is_numeric"));
        if($id == null)
        {
            $this->validator->image("image");
        }        
        return $this->validator->pass();
    }

    public function save($id)
    {
        $id = $id[0];
        $json = [];
        if($this->isvalid($id))
        {
        $posts  = $this->load->model("posts");
        $posts->save($id);

        $json['success'] = "Posts updated Succsefuuly";
        $json['redirect'] = fullurl("admin/posts/posts");
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
        $posts  = $this->load->model("posts");

        if( $posts->delete($id))
           {
            $this->session->set('success',"Posts deleted Succsefuuly");
            $json['redirect'] = fullurl("admin/posts");   
           }
           else
           {
            $json['error'] = "error";
        }



         $this->json($json);
         
    }

    
}