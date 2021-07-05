<?php
namespace App\Models;

use System\Model;

class PostsModel extends Model

{
    protected $tablename = "posts";
    //protected $user;

    public function insertnewposts()
    {
        $user  = $this->load->model("login")->user();
        $image = $this->request->file("image");
        $imagename = $image->moveto($this->file->toupload("/posts/images"))->savedname();
        $result =   (bool) $this->data([

        "category_id" => $this->request->post("category_id"),
         "user_id" => $user->id,
         "title" => $this->request->post("title"),
         "details" => $this->request->post("details"),
         "tags" => $this->request->post("tags") ,
         "image" =>$imagename,
         "created" =>  time(),
         "status" => $this->request->post("status"),

         ])
     ->insert($this->tablename);
    
     return $result;
    }


    public function save($id)
    {
        $related_posts = implode("," ,array_filter($this->request->post("related_posts"), "is_numeric"));
 
        $user  = $this->load->model("login")->user();

        
        $postsmodel = $this->getbyid($id);


            
            $imagename = "";
            if($_FILES['image']['error'] ===4)
            {
                $imagename = $postsmodel->image;

            }
            else
            {
                $image = $this->request->file("image");
               $imagename = $image->moveto($this->file->toupload("posts/images"))->savedname();
            }
        
        //$image = $this->request->file("image");
       // $imagename = $image->moveto($this->file->toupload("posts/images"))->savedname();
        $result =   (bool)  $this->data([

            "user_id" => $user->id,
            "title" => $this->request->post("title"),
            "details" => $this->request->post("details"),
            "tags" => $this->request->post("tags"),
            "related_posts" => $related_posts,
            "image" =>$imagename,
            "category_id" => $this->request->post("category_id"),
            "created" => $now = time(),
            "status" => $this->request->post("status"),
        
        
        ])->where(' id = ? ' , $id)->update($this->tablename);
        return $result;
    }
    public function delete($id)
    {
        $result =   (bool)  $this->where(' id = ? ' , $id)->delete($this->tablename);
        return $result;
    }



    // public function getusers_groups()
    // {
    //     return $this->fetchall("users_group");
        
    // }

    public function getallposts()
    {
        // select u.*,ug.name from users u inner join  users_group ug on u.user_group_id = ug.id;

      $allpostsinfo =  $this->select(" p.*, c.name , u.first_name , u.last_name ")->from("posts p")->join(" join categories c on p.category_id = c.id
      inner join users u on p.user_id = u.id
      ")->fetchAll();
     
        return $allpostsinfo;

    }

    
    public function get_latest_posts()
    {

        if(!$this->app->isshare("latestposts"))
        {
                    $latestposts = $this->select(" p.* , c.name as category_name , u.first_name , u.last_name ")->from("posts p")
            ->join(" left join categories c on p.category_id = c.id ")
            ->join(" left join users u on p.user_id = u.id ")
            ->orderby( " id " , "desc")
            ->fetchAll();
            
            $this->app->SHARE("latestposts" , $latestposts);
        }

        return $this->app->getobject("latestposts");

            
    }




 





}
