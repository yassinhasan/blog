<?php
namespace App\Controllers\Admin\Common;

use System\Controller;
class HeaderController extends Controller 
{

    public function index()
    {

        $data['title'] = $this->html->gettitle();
        return $this->view->render("admin/common/header",$data);
    }
}