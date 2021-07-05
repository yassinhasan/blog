<?php
namespace App\Controllers\Blog\Common;

use System\Controller;

class NavController extends Controller
{
    public function index()
    {
        $user = $this->load->model("login")->user();
        $categories = $this->load->model("category")->getenabledcategory();
        $loged = $this->load->model("Login")->isloggined();
        
        return $this->view->render("blog/common/nav",compact(['loged','user','categories']));
    }
}