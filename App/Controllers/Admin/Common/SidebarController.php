<?php
namespace App\Controllers\Admin\Common;

use System\Controller;
class SidebarController extends Controller 
{

    public function index()
    {
        $data['title'] = $this->html->gettitle();
        $data['breadcrumb'] = $this->html->getbreadcrumb();
        return $this->view->render("admin/common/sidebar",$data);
    }
}