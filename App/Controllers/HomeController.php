<?php
namespace App\Controllers;

use System\Controller;
use System\DataBase;


class HomeController extends Controller
{



    public function index()
    {

        assets("admin/images/test.jfif");

    //    $t =  $this->url->link("/home");
    //    $this->url->redirect("/public/test.php");
        //  $t = $this->loader->model("Users")->getbyid(2);
        //  \pre($t);
         
   
    // $this->cookie->setcookie("name", "hasan" ); 
           
        // $this->cookie->removeall();
        // // $this->cookie->remove("name");
        // // echo  $this->cookie->has("name");
   
        // pre( $this->cookie->all());
        // pre($this->html);
    //  $t =  \makelink("public\\test.php");
    // \redirect("public\\test.php");
        // echo "hello";
        //  $this->db->query("truncate table users");
        

       // $this->db->query("insert into users set gender = ? , email = ? " , ["hasan" , "shemale"]);
    //    $this->db->data("first_name", "marwa")->where("id = ? " , 4)->update("users");

    //  $t =$this->db->select(" * ")->from("users")->limit(2)->fetchall();
    //  \pre($t);
    //  $this->db->rows();


   // $this->db->where("id = ?" , 1)->delete("users");
                // $view =    $this->view->render("htmlview");

        // return $view;

      
    }
    
}