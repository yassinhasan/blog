<?php
namespace App\Controllers\Admin;
use System\Controller;

class UsersGroupsController extends Controller
{
    public function index()
    {
     
        $usersgroups = $this->load->model("UsersGroups")->getall();
       
        $data['session_results'] = $this->session->has("success") ? $this->session->pull("success") : null ;
        $data['usersgroups'] = $usersgroups;
        $this->html->settitle("users group ");
        $this->html->setclass("users-group");
     
      echo  $this->layout->render($this->view->render("admin/usersgroups/usersgroups",$data));
        
    }


    public function add()
    {
        return  $this->prepareform();
    }
 
    public function submit()
    {   


    
        $insert = $this->load->model("UsersGroups")->create();

        if($insert)
        {
            $json['success'] = " inserted succseully"; 
          
        }
        else
        {
            $json['error'] = " error in inserted "; 
        }

      
       return $this->json($json);
    }

    public function edit($id)
    {
        $id = $id[0];

      return  $this->prepareform($id);
    }


    public function save($id)
    {
        $id = $id[0];

        $insert = $this->load->model("UsersGroups")->update($id);

        if($insert)
        {
            $json['success'] = " updated succseully"; 
          
        }
        else
        {
            $json['error'] = " error in inserted "; 
        }
        return $this->json($json);
        
      

    }

    public function prepareform($id = null)
    {
        if($id == null)
        {
            $allpages = [];
            $data['action'] = fullurl("/admin/users-groups/submit");
            foreach($this->route->grtroutes() as $page)
            {
                if(strpos($page['url'],"admin") === 0)
                {
                    $allpages[] = $page['url'];
                }
               
            }
            $data['allpages'] = $allpages;
            return $this->view->render("admin/usersgroups/form",$data);
        }
        else
        {
            $usersgroups =  $this->load->model("UsersGroups")->getbyid($id);
            $allpages = [];
            foreach($this->route->grtroutes() as $page)
            {
                if(strpos($page['url'],"admin") === 0)
                {
                    $allpages[] = $page['url'];
                }
               
            }
            $data['allpages'] = $allpages;
    
            
            $data['name'] = $usersgroups->name;
            $data['selectedpages'] = $usersgroups->pages;
            $data['action'] = fullurl("/admin/users-groups/save/$id");
            return $this->view->render("admin/usersgroups/form",$data);
        }
    }

    public function delete($id)
    {
         $id = $id[0];
        // first get data and check if valid or no
        // if valid so insert it into table category
            // here data is alrady valid so insert it into model class
            // model class will creat new row of data 
            $UsersGroups  = $this->load->model("UsersGroups");

           if( $UsersGroups->delete($id))
           {
            $this->session->set('success',"UsersGroups deleted Succsefuuly");
            $json['redirect'] = fullurl("admin/users-groups");   
           }
           else
           {
            $json['error'] = "error";
           }



            $this->json($json);
         
    }





}



/*
scenario of index()


when log into users group page
wi will need load layout page

that containt $this->layout->render( here will take content of content of users group)
 also i will send $this->html->settitle("users-group");
 in class header i will say $this->gettitle() and send it to data $data['title'];
 in $thos->view->render("header" , $data)

layout controller will receive view of content
and header sidebar and footer

ok till now when i wirte in url 

admin/users-groups it will call controller usergroupcontroller and function index 

so function index will call layout page that contain everything

so content of usergroup will be like category  contain lists of users group and button of add user group



####### scenario of add ########

i need to add name of usegroup after i will take id of it by last id
then add all of it permession to the same id

how i can get all permession 

permession will be all url that start with admin//
 how can i get this

by loop of $this->routes() method that return all routes but i will make condition if  this routes start with admin

so add it in dummy containr like name usergroup-pages

so now i have inserted usergroup table row
and i habe it's id so i will insert into usergroup-permession table all of permession 

so in add page form i need to send $all-psermession by getallroutes method 
so make seledt multubly selesction 


after add in need to redirect to admin/usser-groups to show all lists 

how to show it 

i will make method in model controller that get all users group  name only of usergroup table only

and make table of it

##################### scenario of edit  #############

public funcrtiion edit($id)

id here is id of usergroup  beacue i will fetch admin/usergroup/$id  and return html 

then in model i will make getbydid to get usergroup name and user group permession pages

after get  peremssoin pages i will send it to view $this->view->render("form" , $data)
$data here will contain name and only  pages permession
so i have all permssion and only user permssion 
i need to make select of it how

<select name=pages[] multiblibe>
<?php 

here i will make loop of all permession
foerach all pages as page

echo <option value= ''  > page </potion> 

?>

i habe now usersgroup like admin by id 1 
if 1 so edit and delete button will be hide

if not by click on edit call fetch method that take url to admin/users-group/edit 

and will open edit form like category

in edit form i will send data  by id i will take id and get that usergroup name and usergroup permession pages 
and make selected of it only 



########## sencario of update ##########

fetch url update($id)

i will make validation 
then if ok 
will make update medthod in model

$this->date($key,$value)
$this->update('name' ,$this->request->post('name')) - > where(' id = ? ' , $id);
then i need update data in usergroup permession

now i have sleected pages $this->post->('pages')
array 
so i will make loop of it 
make free array it will take it

then update 
// here prplem
$this->update('page' ,$this->request->post('name')) - > where(' id = ? ' , $id);

no probelm

i need to insert every time in data 
foreach $pages as page

$this->data("name" , $page) ->where ( "id  = ? ) -> update("table name" );




########### secario of delte #############

fetch delete
then return on usergroup lists

and will send all post data that contain user

*/