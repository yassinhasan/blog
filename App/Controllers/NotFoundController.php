<?php
namespace App\Controllers;
use System\Controller;
class NotFoundController extends Controller 
{
    public function notfound()
    {

     return  $this->view->render("notfound");
    }
}