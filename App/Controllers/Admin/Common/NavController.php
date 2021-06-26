<?php
namespace App\Controllers\Admin\Common;

use System\Controller;
class NavController extends Controller 
{

    public function index()
    {
        $user = $this->load->model("login")->user();
        $data['image'] = $user->image;
        return $this->view->render("admin/common/nav",$data);
    }
}