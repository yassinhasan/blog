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

            // admin login 

            $exceptionurl = ["users/login" , "users/login/submit" , "accessdenied" ,"/", "users/logout" ,"blog/login",
            "blog/posts",
            "blog/category",
            "blog/contactus",
            "blog/profile",
            "blog/login/submit" ,
            "blog/register",
            "blog/register/checkexistsdata",
            "blog/register/submit"
            ];

            echo "yes";
            if(! $logeuser->isloggined() )
            {
                pre($this->route->currentroute());
                
            }
            // if not loged goto to login page but if it's already loggin bage so donot repeat it so ignore it 

            // !in_array($currenturl , $exceptionurl) mean this user  is not loged and try to access admin page




        //     if(! $logeuser->isloggined()  AND  !in_array($currenturl , $exceptionurl)) 
        //     {
                
        //           if(strpos($currenturl,"blog") === 0)
        //           {
                   
        //           $this->url->redirect("blog/login");

        //           }
        //           else
        //           { $this->url->redirect("users/login");
        //         echo "yes iam admin";
        //           }
              
        //     }


        //     // he is not loged and now in any of allowed public pages
            
        //     if($logeuser->isloggined() )
        //     {
                
        //         $user = $logeuser->user();
        //         $pagesmodel =  $this->load->model("UsersGroups");
        //         $id = $user->user_group_id;

        //         // only pages that he access it 
                
        //         $allowedurl =   $pagesmodel->getallowedpages($id);
        //         $newcurrenturl= preg_replace("/\/[0-9]{1,}$/" , "/:id" ,$currenturl);

        //         pre($newcurrenturl);
        //         die;


        //        if(! in_array($newcurrenturl , $allowedurl) AND !in_array($currenturl , $exceptionurl)) 
        //         {
        //             //     pre($newcurrenturl);
        //             //    pre($allowedurl);
 
        //         $this->url->redirect("accessdenied");
        //         }

                
        //         // get current url
        //     }

        //     // if logged check his user group id and get allowed pages
        //     // if these pages is not  present in all array so return to access page
          

        // }
    }
 }
           






