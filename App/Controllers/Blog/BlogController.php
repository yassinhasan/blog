<?php
namespace App\Controllers\Blog;

use System\Controller;
use System\DataBase;


class BlogController extends Controller
{



    public function index()
    {
        $data['posts'] = $this->load->model("posts")-> get_latest_posts();
        $data['getcategory_posts'] = $this->load->model("posts")-> getcategory_posts();
        echo  $this->view->render('blog/blog',$data);
    }
    
}