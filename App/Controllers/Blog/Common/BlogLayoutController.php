<?php
namespace App\Controllers\Blog\Common;

use System\Controller;
use System\View\View;

class BlogLayoutController extends Controller
{

    // all these secion i will make view of it
    // if i add exclude i will not make view of it
    private $sections = [
        "header" , "nav" , "main" , "slider" , "container" , "footer"
    ];
    private $exclude = [];

 
    public function render(View $page = null, $exclude = [])
    {

        $this->exclude = $exclude;

        // exclude will be like  ['sidebar' , 'main'];

        foreach($this->sections as $section)
        {

                if(in_array($section, $this->exclude))
                {
                    $data[$section] = "";
                }
                else
                {
                    $data[$section] = $this->load->controller("Blog/Common/$section")->index();
                }


        }

        $data['page'] = $page;

        return  $this->view->render("blog/layout", $data);
    }

        // $this->sections['header'] = $this->load->controller("Blog/Common/Header")->index(); // loead HeaderController index()
        // $this->sections['nav'] = $this->load->controller("Blog/Common/Nav")->index(); // loead HeaderController index()
        // $this->sections['main'] = $this->load->controller("Blog/Common/Main")->index(); // loead HeaderController index()
        // $this->sections['sidebar'] = $this->load->controller("Blog/Common/Sidebar")->index(); // loead HeaderController index()
        // $this->sections['container'] = $this->load->controller("Blog/Common/Container")->index(); // loead HeaderController index()
        // $this->sections['footer'] = $this->load->controller("Blog/Common/Footer")->index(); // loead HeaderController index()

}