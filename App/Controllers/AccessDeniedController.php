<?php
namespace App\Controllers;
use System\Controller;

class AccessDeniedController extends Controller
{
    public function index()
    {
        
        echo $this->view->render("access-denied");
    }
}