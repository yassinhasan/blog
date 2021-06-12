<?php
namespace App\Models;

use System\Model;

class UsersModel extends Model

{
    protected $tablename = "users";

    public function insertnewusers()
    {
     $result =   (bool) $this->data(["first_name" => $this->request->post("first_name"), "status" => $this->request->post("status")])->insert($this->tablename);
    
     return $result;
    }


    public function save($id)
    {
        $result =   (bool)  $this->data(["first_name" => $this->request->post("first_name"), "status" => $this->request->post("status")])->where(' id = ? ' , $id)->update($this->tablename);
        return $result;
    }
    public function delete($id)
    {
        $result =   (bool)  $this->where(' id = ? ' , $id)->delete($this->tablename);
        return $result;
    }



}
