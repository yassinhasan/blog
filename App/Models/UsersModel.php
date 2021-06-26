<?php
namespace App\Models;

use System\Model;

class UsersModel extends Model

{
    protected $tablename = "users";
    //protected $user;

    public function insertnewusers()
    {

        $image = $this->request->file("image");
        $imagename = $image->moveto($this->file->toupload("images"))->savedname();
        $result =   (bool) $this->data([

        "user_group_id" => $this->request->post("user_group_id"),
         "first_name" => $this->request->post("first_name"),
         "last_name" => $this->request->post("last_name"),
         "email" => $this->request->post("email"),
         "password" =>password_hash($this->request->post("password"),PASSWORD_DEFAULT) ,
         "image" =>$imagename,
         "gender" => $this->request->post("gender"),
         "birthday" => strtotime($this->request->post("birthday")),
         "created" => $now = time(),
         "status" => $this->request->post("status"),
         "ip"     => $this->request->server("SERVER_ADDR"),
         "logincode" => sha1($now.mt_rand())
         ])
     ->insert($this->tablename);
    
     return $result;
    }


    public function save($id)
    {

        $image = $this->request->file("image");
        $imagename = $image->moveto($this->file->toupload("images"))->savedname();
        $result =   (bool)  $this->data([

            "user_group_id" => $this->request->post("user_group_id"),
            "first_name" => $this->request->post("first_name"),
            "last_name" => $this->request->post("last_name"),
            "email" => $this->request->post("email"),
            "password" =>password_hash($this->request->post("password"),PASSWORD_DEFAULT) ,
            "image" =>$imagename,
            "gender" => $this->request->post("gender"),
            "birthday" => strtotime($this->request->post("birthday")),
            "created" => $now = time(),
            "status" => $this->request->post("status"),
            "ip"     => $this->request->server("SERVER_ADDR"),
            "logincode" => sha1($now.mt_rand())  
        
        
        ])->where(' id = ? ' , $id)->update($this->tablename);
        return $result;
    }
    public function delete($id)
    {
        $result =   (bool)  $this->where(' id = ? ' , $id)->delete($this->tablename);
        return $result;
    }

    public function getusers_groups()
    {
        return $this->fetchall("users_group");
        
    }

    public function getusers($id)
    {
        // select u.*,ug.name from users u inner join  users_group ug on u.user_group_id = ug.id;

      $alluserinfo =  $this->select(" u.*, ug.name")->from("users u")->join(" join users_group ug on u.user_group_id = ug.id")->where(" u.id =  ? " , $id )->fetch();
     
        return $alluserinfo;
    }


    public function update($id)
    {
        $user = $this->getbyid($id);
        $imagename = "";
        if($_FILES['image']['error'] === 4)
        {
            $imagename = $user->image;

        }
        else
        {
            $image = $this->request->file("image");
            $imagename = $image->moveto($this->file->toupload("images"))->savedname();
  
         
      }
        $result =   (bool)  $this->data([

            "first_name" => $this->request->post("first_name"),
            "last_name" => $this->request->post("last_name"),
            "email" => $this->request->post("email"),
            "image" =>$imagename,
            "gender" => $this->request->post("gender"),
            "birthday" => strtotime($this->request->post("birthday")),
            "status" => $this->request->post("status"),
        
        
        ])->where(' id = ? ' , $id)->update($this->tablename);
        return $result;
    }





}
