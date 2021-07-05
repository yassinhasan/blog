<?php
namespace App\Controllers\Blog\Common;

use System\Controller;

class ContainerController extends Controller
{
    public function index()
    {
        $data['ads']= $this->load->model("ads")->enabled_ads();
        $data['posts'] = $this->load->model("posts")-> get_latest_posts();
        $data['getcategory_posts'] = $this->load->model("category")-> getenabledcategory();
        return $this->view->render("blog/common/container",$data);
    }
}