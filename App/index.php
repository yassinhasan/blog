<?php

use System\Application;
use System\File;

$app = Application::getinstance();

// add layout to container in $app so
// it will return function load controaller[layoutcontrolelr]

$app->SHARE("layout",function($app){
    return $app->load->controller("Admin/Common/Layout");
});

// homepage

$app->load->controller("Admin\Access")->index();


$app->route->add_route("/","Blog/Blog");



// admin page
// admin/users/login ده الينك الي هينكب فوق واقارنه مع الي مكتوب ده
// لو لقيته صحيح هيحملي الكلاس  ده  logincontaller 
// بقوله شغل الكلاس ده يعني حمل ملف الكلاس ده يعني اي حاجه هكتبها جوه الكلاس هتتعرض
// لو عملت  echo "hasan";  هتنعرض
// اللي موجود في فولدر الادمن
// جوه الميثود Index
// اعمل ريندر لاي حاجه انت عايزها انت مش مربوط هنا باي حاجه
 $app->route->add_route("users/login","Admin/Login");

 //admin/users/login/submit

 //  admin/users/login/submit ده الباترن
 // هقارنه مع اللي مكتوب هنا في الموقع http://www.blog27.com/admin/users/login/subit
 // لو لقيته تمام بقوله حملي الكلاس
 // logincontroller 
 // وشغلي الميثود فيه الي هيا
 // submit  done
 $app->route->add_route("users/login/submit","Admin/Login@submit","POST");
 $app->route->add_route("users/logout","Admin/Logout");


 // dashboard done

 $app->route->add_route("admin/dashobard","Admin/Dashobard");
 $app->route->add_route("admin","Admin/Dashobard");
 $app->route->add_route("admin/dashboard/add","Admin/Dashobard@add");
 $app->route->add_route("admin/dashboard/submit","Admin/Dashobard@submit");

// logout done

//  $app->route->add_route("/logout","Logout");

  //cateogry  done
 
  $app->route->add_route("admin/categorys","Admin/Categorys");
  $app->route->add_route("admin/categorys/add","Admin/Categorys@add");
  $app->route->add_route("admin/categorys/submit","Admin/Categorys@submit","POST");
  $app->route->add_route("admin/categorys/edit/:id","Admin/Categorys@edit");
  $app->route->add_route("admin/categorys/save/:id","Admin/Categorys@save","POST");
  $app->route->add_route("admin/categorys/delete/:id","Admin/Categorys@delete");

 //users  done

 $app->route->add_route("admin/users","Admin/Users");
 $app->route->add_route("admin/users/add","Admin/Users@add");
 $app->route->add_route("admin/users/submit","Admin/Users@submit","POST");
 $app->route->add_route("admin/users/edit/:id","Admin/Users@edit");
 $app->route->add_route("admin/users/save/:id","Admin/Users@save","POST");
 $app->route->add_route("admin/users/delete/:id","Admin/Users@delete");


 //usersg-groups done

 $app->route->add_route("admin/users-groups","Admin/UsersGroups");
 $app->route->add_route("admin/users-groups/add","Admin/UsersGroups@add");
 $app->route->add_route("admin/users-groups/submit","Admin/UsersGroups@submit","POST");
 $app->route->add_route("admin/users-groups/edit/:id","Admin/UsersGroups@edit");
 $app->route->add_route("admin/users-groups/save/:id","Admin/UsersGroups@save","POST");
 $app->route->add_route("admin/users-groups/delete/:id","Admin/UsersGroups@delete");

  //posts  done

  $app->route->add_route("admin/posts","Admin/Posts");
  $app->route->add_route("admin/posts/add","Admin/Posts@add");
  $app->route->add_route("admin/posts/submit","Admin/Posts@submit","POST");
  $app->route->add_route("admin/posts/edit/:id","Admin/Posts@edit");
  $app->route->add_route("admin/posts/save/:id","Admin/Posts@save","POST");
  $app->route->add_route("admin/posts/delete/:id","Admin/Posts@delete");
  $app->route->add_route("admin/posts/delete/:id/comments","Admin/Comments");
  $app->route->add_route("admin/posts/comments/edit/:id","Admin/Comments@edit");
  $app->route->add_route("admin/posts/comments/save/:id","Admin/Comments@save","POST");
  $app->route->add_route("admin/posts/comments//delete:id","Admin/Comments@delete");




    //ads done

    $app->route->add_route("admin/ads","Admin/Ads");
    $app->route->add_route("admin/ads/add","Admin/Ads@add","POST");
    $app->route->add_route("admin/ads/submit","Admin/Ads@submit","POST");
    $app->route->add_route("admin/ads/edit/:id","Admin/Ads@edit","POST");
    $app->route->add_route("admin/ads/save/:id","Admin/Ads@save","POST");
    $app->route->add_route("admin/ads/delete/:id","Admin/Ads@delete","POST");


    //profile done

    $app->route->add_route("admin/profile","Admin/Profile");
    $app->route->add_route("admin/profile/save/:id","Admin/Profile@save","POST");


    

    // admin settings 

    $app->route->add_route("admin/settings","Admin/Settings");
    $app->route->add_route("admin/settings/save/:id","Admin/Settings@save","POST");

    // contact settings 

    $app->route->add_route("admin/contacts","Admin/Contacts");
    $app->route->add_route("admin/contacts/reply/:id","Admin/Contacts@reply");
    $app->route->add_route("admin/contacts/send/:id","Admin/Contacts@send","POST");


     


    // هنا بقوله لو محصلش اي ماتش في كلاس الروت
    // اعملي تحويل علي المسار ده
    // blog/404 
    // كده هيحصل ماتش تمام ولما يحصل هيحمل صفحه 
    // notfoundcontrolelr
    // method == notfound
 $app->route->add_route("404","NotFound@notfound");
//  $app->route->add_route("/404");

$app->route->add_route("accessdenied","AccessDenied");


