<?php
namespace App\Models;

use System\Model;

class UsersGroupsModel extends Model
{
    protected $tablename  = "users_group";
    public function create()
    {
        $usersgroupid = $this->data("name",$this->request->post("name"))->tablename("users_group")->insert()->lastid();

        

        $selectedpages = $this->request->post("pages") ; 

        if($selectedpages)
        {
           foreach($selectedpages as $selectedpage)
        {
         $this->data(["pages" => $selectedpage, "users_group_id" => $usersgroupid])->insert("users_group_permessions");

        }
        }


    }

    public function getbyid($id)
    {
        $usersgroup = parent::getbyid($id);
      //  pre($usersgroup);

      $selectedpages = [];
    
      $pages =  $this->tablename("users_group_permessions")->where(" users_group_id = ? " , $id)->fetchall();

      foreach($pages as $page )

      {
          $selectedpages [] = $page->pages;
      }
      
      $usersgroup->pages = $selectedpages;
      return $usersgroup;
    }

    public function update($id)
    {
        $this->data("name",$this->request->post("name"))->tablename("users_group")->where(" id = ? " , $id)->update();
        $selectedpages = $this->request->post("pages") ; 
        $this->where(' users_group_id = ? ' , $id)->delete("users_group_permessions");
        foreach($selectedpages as $selectedpage)
        {
         $pagess =   $this->data(["pages" => $selectedpage, "users_group_id" => $id])->insert("users_group_permessions");
           
        }
      

        if($pagess)
        {
            return true;
        }
      
        
    }

    public function delete($id)
    {
          $this->where(' id = ? ' , $id)->delete($this->tablename);
          $result =   (bool)  $this->where(' users_group_id = ? ' , $id)->delete("users_group_permessions");
        return $result;
    }

    public function getallowedpages($id)
    {
        $pages = $this->select("pages")->where(' users_group_id = ? ' , $id)->fetchAll("users_group_permessions");

       $allowedpage = []; 
       foreach($pages as $page)
       {
        $allowedpage[] = $page->pages;
       }
       return $allowedpage;
    }

}