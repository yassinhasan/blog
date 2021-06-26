<?php
namespace App\Models;

use System\Model;

class CategoryModel extends Model

{
    protected $tablename = "categories";

    public function insertnewcategory()
    {
     $result =   (bool) $this->data(["name" => $this->request->post("name"), "status" => $this->request->post("status")])->insert($this->tablename);
    
     return $result;
    }


    public function save($id)
    {
        $result =   (bool)  $this->data(["name" => $this->request->post("name"), "status" => $this->request->post("status")])->where(' id = ? ' , $id)->update($this->tablename);
        return $result;
    }
    public function delete($id)
    {
        $result =   (bool)  $this->where(' id = ? ' , $id)->delete($this->tablename);
        return $result;
    }

    


}
