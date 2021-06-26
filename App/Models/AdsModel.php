<?php
namespace App\Models;

use System\Model;

class AdsModel extends Model

{
    protected $tablename = "ads";

    public function insertnewads()
    {
        $pages = implode(",",$this->request->post("pages"));


        $image = $this->request->file("image");
        $imagename = $image->moveto($this->file->toupload("/ads/images"))->savedname();
        $result =   (bool) $this->data([

        "name" => $this->request->post("name"),
        "link" => $this->request->post("link"),
        "image" =>$imagename,
        "pages" =>$pages,
        "start_at" => strtotime($this->request->post("start_at")),
        "end_at" => strtotime($this->request->post("end_at")),
        "status" => $this->request->post("status"),

         ])
         ->insert($this->tablename);
    
        return $result;
    }


    public function save($id)
    {
        $pages = implode(",",$this->request->post("pages"));

        $adsmodel = $this->getbyid($id);

        $imagename = "";
        if($_FILES['image']['error'] ===4)
        {
            $imagename = $adsmodel->image;

        }
        else
        {
            $image = $this->request->file("image");
            $imagename = $image->moveto($this->file->toupload("ads/images"))->savedname();
        }

        $result =   (bool)  $this->data([
        "name" => $this->request->post("name"),
        "link" => $this->request->post("link"),
        "image" =>$imagename,
        "pages" =>$pages,
        "start_at" => strtotime($this->request->post("start_at")),
        "end_at" => strtotime($this->request->post("end_at")),
        "status" => $this->request->post("status"),
        ])->where(' id = ? ' , $id)->update($this->tablename);
        return $result;
    }
    
    public function delete($id)
    {

        $result =   (bool)  $this->where(' id = ? ' , $id)->delete($this->tablename);
        return $result;
    }


    public function getallroutes()
    {
        $pages = [];
        $allroutes  = $this->route->grtroutes();
            foreach($allroutes as $route)
            {
                if(! preg_match("#admin#",$route['url']))
                {
                    $pages[] = $route['url'];
                }
            }
        return $pages;    
    }


}
