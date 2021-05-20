<?php
namespace App\Controllers;

use System\Controller;

class HomeController extends Controller
{



    public function index()
    {



        $view =    $this->view->render("htmlview");

       return $view;
    

      
    }
    
}