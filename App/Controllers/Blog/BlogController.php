<?php
namespace App\Controllers\Blog;

use System\Controller;
use System\DataBase;


class BlogController extends Controller
{



    public function index()
    {
     
        $data['title'] = $this->html->settitle($this->settings->getvalue("sitename"));
        return $this->bloglayout->render(null,$data);
    }
    
}