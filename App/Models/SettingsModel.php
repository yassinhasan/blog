<?php
namespace App\Models;

use System\Model;

class SettingsModel extends Model

{
    protected $settings = [];
    protected $tablename = "settings";




    public function save($id)
    {
        $result =   (bool)  $this->data([

            "sitename" => $this->request->post("sitename"),
            "siteemail" => $this->request->post("siteemail"),
            "message" => $this->request->post("message"),
            "autologin" => $this->request->post("autologin"),
             "status" => $this->request->post("status")]
            )->where(' id = ? ' , $id)->update($this->tablename);
        return $result;
    }

    public function loadall()
    {
        foreach($this->fetch($this->tablename) as $key=>$value)
        {
            $this->settings[$key] = $value;
        
        }
        
    }

    public function getvalue($key)
    {

        $this->loadall();
      return  array_get($this->settings,$key,"not found key");
    }



    public function insertcolumn()
    {
       $column = $this->request->post("column"); 
       $columndesc = $this->request->post("columndesc"); 
       $columnnames =  $this->fetch("settings");

       $column_array= [];
       foreach($columnnames as $columnname=>$value)
       {
        $column_array[] = $columnname;
       }
       if(!in_array($column,$column_array))
       {
           
        $this->query("ALTER TABLE settings ADD COLUMN $column $columndesc");
        return true;
       }
       else
       {
           return false;
       }
      // return $columnnames;
    }



}
