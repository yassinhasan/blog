<?php
namespace App\Controllers\Blog\Common;

use System\Controller;

class FooterController extends Controller
{
    public function index()
    {
        $data['title'] = $this->html->gettitle();
        $currentpage  = explode("/",$this->route->currentroute());
        $currentpage = end($currentpage);

        if($this->route->currentroute() == "/")
        {
            $data['blogjs'] =   "<script src=' ".mlink("blog/js/slider.js")."'></script>"  ;
        }
        elseif( $currentpage == "register" || $currentpage == "login")
        {
            $data['formjs'] =   "<script src=' ".mlink("blog/js/form.js")."'></script>"  ;
        }
        return $this->view->render("blog/common/footer" , $data);
    }
}