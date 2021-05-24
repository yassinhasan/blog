<?php
namespace App\Controllers\Admin;

use System\Controller;
class LoginController extends Controller 
{

    public function index()
    {
        
     $t =   $this->view->render('Admin/Login');
    
    }
}