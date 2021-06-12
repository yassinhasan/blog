<?php
namespace App\Controllers;

use System\Controller;
use System\DataBase;


class HomeController extends Controller
{



    public function index()
    {
        echo  $this->view->render('home');
    }
    
}