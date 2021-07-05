<?php
namespace App\Controllers\Blog\Common;

use System\Controller;

class HeaderController extends Controller
{
    public function index()
    {
        /*
         $data['registerstyle'] = "<link rel='stylesheet' href=".  mlink("blog/css/form.css").">";
        */
        $data['title'] = $this->html->gettitle();
        $currentpage  = explode("/",$this->route->currentroute());
        $currentpage = end($currentpage);
        // $currentpage = $currentpage[ count($currentpage) -1];


        if($this->route->currentroute() == "/")
        {
            $data['slidestyle'] = "<link rel='stylesheet' href=".  mlink("blog/css/slider.css").">";
        }
        elseif( $currentpage == "register")
        {
            $data['registerstyle'] = "<link rel='stylesheet' href=".  mlink("blog/css/form.css").">";
        }
        elseif($currentpage == "login")
        {
            $data['loginstyle'] = "<link rel='stylesheet' href=".  mlink("blog/css/loginform.css").">";
        }

        return $this->view->render("blog/common/header",$data);
    }
}