<?php
namespace App\Controllers\Admin;
use System\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        if( isset($_COOKIE['logincode']))
        {
            $this->cookie->remove("logincode",-1);
        }
        $this->session->remove("logincode");
        $this->cookie->removeall();
        $this->session->destroy();
        
       $this->url->redirect("users/login");
   // return  $this->view->render('admin/users/login',$this->data);
    }
}