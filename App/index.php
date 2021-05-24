<?php

use System\Application;
use System\File;

$app = Application::getinstance();


// admin page
 $app->route->add_route("admin/login","Admin/Login");

 $app->route->add_route("admin/login/submit","Admin/Login@submit","POST");


 // dashboard

 $app->route->add_route("admin/dashobard","Admin/Dashobard");
 $app->route->add_route("admin","Admin/Dashobard");

// logout

 $app->route->add_route("/logout","Logout");

 //users 

 $app->route->add_route("admin/users","Admin/Users");
 $app->route->add_route("admin/users/add","Admin/Users@add");
 $app->route->add_route("admin/users/submit","Admin/Users@submit","POST");
 $app->route->add_route("admin/users/edit/:id","Admin/Users@edit");
 $app->route->add_route("admin/users/save/:id","Admin/Users@save","POST");
 $app->route->add_route("admin/users/delete/:id","Admin/Users@delete");


 //usersg-groups

 $app->route->add_route("admin/users-groups","Admin/UsersGroups");
 $app->route->add_route("admin/users-groups/add","Admin/UsersGroups@add");
 $app->route->add_route("admin/users-groups/submit","Admin/UsersGroups@submit","POST");
 $app->route->add_route("admin/users-groups/edit/:id","Admin/UsersGroups@edit");
 $app->route->add_route("admin/users-groups/save/:id","Admin/UsersGroups@save","POST");
 $app->route->add_route("admin/users-groups/delete/:id","Admin/UsersGroups@delete");

  //posts 

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

  //cateogry 

  $app->route->add_route("admin/categorys","Admin/Categorys");
  $app->route->add_route("admin/categorys/add","Admin/Categorys@add");
  $app->route->add_route("admin/categorys/submit","Admin/Categorys@submit","POST");
  $app->route->add_route("admin/categorys/edit/:id","Admin/Categorys@edit");
  $app->route->add_route("admin/categorys/save/:id","Admin/Categorys@save","POST");
  $app->route->add_route("admin/categorys/delete/:id","Admin/Categorys@delete");


    //posts 

    $app->route->add_route("admin/ads","Admin/Ads");
    $app->route->add_route("admin/ads/add","Admin/Ads@add");
    $app->route->add_route("admin/ads/submit","Admin/Ads@submit","POST");
    $app->route->add_route("admin/ads/edit/:id","Admin/Ads@edit");
    $app->route->add_route("admin/ads/save/:id","Admin/Ads@save","POST");
    $app->route->add_route("admin/ads/delete/:id","Admin/Ads@delete");
    // admin settings 

    $app->route->add_route("admin/settings","Admin/Settings");
    $app->route->add_route("admin/settings/save/:id","Admin/Settings@save","POST");

    // contact settings 

    $app->route->add_route("admin/contacts","Admin/Contacts");
    $app->route->add_route("admin/contacts/reply/:id","Admin/Contacts@reply");
    $app->route->add_route("admin/contacts/send/:id","Admin/Contacts@send","POST");


     


 $app->route->add_route("404","NotFound");
 $app->route->add_route("/404");




