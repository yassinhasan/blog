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




}
