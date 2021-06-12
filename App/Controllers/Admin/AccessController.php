<?php
namespace App\Controllers\Admin;
use System\Controller;

class AccessController extends Controller
{
    public function index()
    {
            $logeuser = $this->load->model("login");

             $this->request->prepareurl();
             $currenturl  = $this->request->url();

            if(strlen($currenturl) > 1)
            {
                $currenturl = ltrim($currenturl,"/");
            }


            $exceptionurl = ["users/login" , "users/login/submit" , "accessdenied" ,"/", "users/logout"];
            


            
            // if not loged goto to login page but if it's already loggin bage so donot repeat it so ignore it 

            if(! $logeuser->isloggined()  AND  !in_array($currenturl , $exceptionurl)) 
            {
                
               
               $this->url->redirect("users/login");
            }
            
            if($logeuser->isloggined() )
            {
                
                $user = $logeuser->user();
                $pagesmodel =  $this->load->model("UsersGroups");
                $id = $user->user_group_id;

                // only pages that he access it 
   
                $allowedurl =   $pagesmodel->getallowedpages($id);
                $newcurrenturl= preg_replace("/\/[0-9]$/" , "/:id" ,$currenturl);
               if(! in_array($newcurrenturl , $allowedurl) AND !in_array($currenturl , $exceptionurl)) 
                {
                    //     pre($newcurrenturl);
                    //    pre($allowedurl);
                      

                $this->url->redirect("accessdenied");
                }
                
                // get current url
            }

            // if logged check his user group id and get allowed pages
            // if these pages is not  present in all array so return to access page
          

            //  $this->request->prepareurl();
            //  $currenturl  = $this->request->url();
            // }

            // if(! in_array($currenturl , $allowedurl) ) 
            // {

            //    $this->url->redirect("accessdenied");
            // }
        }
 }
           


            // $user = $logeuser->user();
            // if($user)
            // {
            // // get pages that allowed for this user by his users-group-id
            // $pagesmodel =  $this->load->model("UsersGroups");
         
            
            //  $id = $user->user_group_id;

            //  echo $id;
            //  $allowedurl =   $pagesmodel->getallowedpages($id);
             
            //  // get current url

            //  $this->request->prepareurl();
            //  $currenturl  = $this->request->url();
            // if($logeuser->isloggined()  AND  ! in_array($currenturl , $allowedurl)) 
            // {

            //    // $this->url->redirect("accessdenied");
            // }
            // else
            // {
            //     // echo "not logged";
            // }
            // }




