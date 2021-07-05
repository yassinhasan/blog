<?php
namespace App\Controllers\Blog\Common;

use System\Controller;

class SliderController extends Controller
{
    public function index()
    {
        $data['posts'] = $this->load->model("posts")-> get_latest_posts();
        return $this->view->render("blog/common/slider", $data);
    }
}