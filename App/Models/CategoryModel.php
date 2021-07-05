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

        // select only categories which only hvae posts and enabled 
    public function getenabledcategory()
        {
    
        if(! $this->app->isshare("enabled_category"))
        {

        $getcategory_posts = $this->select(" COUNT(p.id) as number_of_posts , c.name as category_name , c.id as category_id")->from("categories c")
        ->join("  join posts p on  c.id = p.category_id AND c.status = 'enabled'")
        ->groupby( "p.category_id ")
        ->having(" number_of_posts >  0 ")
        ->fetchAll();
        $this->app->SHARE("enabled_category" , $getcategory_posts);
        
        }

        
        return $this->app->getobject("enabled_category");
    }


}
