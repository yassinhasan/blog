<?php
namespace App\Controllers\Blog\Common;

use System\Controller;

class MainController extends Controller
{
    public function index()
    {
        return $this->view->render("blog/common/main");
    }
}