<?php
namespace System\Http;

class UploadFile 
{

    private $file = [];
    private $filename;
    private $nameonly;
    private $file_extension;
    private $filesize;
    private $fileerror;
    private $file_temp;
    private $filetype;
    private $error_message = [];
    private $imagesrc;
    private $savedname;
    const DS = DIRECTORY_SEPARATOR;

    const ALLOWED_EXTENSION = ["jpeg" , "gif" , "png" , "jfif"];

    public function __construct($input)
    {
        if(isset($_FILES[$input]))
        {
            $this->getfileinfo($input);  
        } 
    }

    public function getfileinfo($input)
    {
        // full info of file uploaded frim input
        $file = $_FILES[$input];


        $this->file = $file;
        $this->fileerror = $file['error'];

        // if no file uploaded return

        if($this->errorupload())
        {
            $this->addmessage("soory no file uploaded");
            return;
        }

        //  get full name with extension

        $this->filename = $file['name'];

        //get file error
        
        // get file size 
        $this->filesize = $file['size'];

        // get temp_name
        $this->file_temp = $file['tmp_name'];

        //get file type

        $this->filetype = $file['type'];

        // to get file name and extension
        $fileinfo = pathinfo($this->file['name']);

        //get file name with out extension
        $this->nameonly = $fileinfo['filename'];

        // get extension only
        
        $this->file_extension = $fileinfo['extension'];

        $this->checkerror();
        // if(! $this->noerror())
        // {
        //     pre($this->getallmessages());
        // }
    }

    public function getfilename()
    {
        return $this->filename;
    }
    public function getnameonly()
    {
        return $this->nameonly;
    }
    public function getfilesize()
    {
        return $this->filesize;
    }
    public function getextension()
    {
        return $this->file_extension;
    }
    public function getfilerror()
    {
        return $this->fileerror;
    }
    public function getfiletemp()
    {
        return $this->file_temp;
    }

    public function isimage()
    {
    return (strpos($this->filetype , "image/") === 0   AND  in_array(strtolower($this->file_extension),self::ALLOWED_EXTENSION) ) ;
        
           
    }

    public function allowedsize()
    {
        return ($this->filesize < $this->filesize);
    }

    public function checkerror()
    {
            if(! $this->isimage())
            {
                $this->addmessage("soory this file not image");
                
            }

            // elseif( ! $this->allowedsize())
            // {
            //     $this->addmessage("soory ".$this->filename . "is  bigger than " .$this->filesize); 
            // }   
    } 


    public function errorupload()
    {
        return   ($this->fileerror === 4);
    }

    public function addmessage($message)
    {
        $this->error_message[] = $message;
    }

    public function getallmessages()
    {
        return $this->error_message;
    }

    public function noerror()
    {
        return empty($this->error_message);
    }


    public function moveto($target , $filename = null)

    {
       
        
        $filename = sha1(rand(0,1000))."_".sha1(rand(0,1000)).".".$this->file_extension;
        $this->savedname = $filename;
        $destination = $target.self::DS.$filename;
      
        $this->imagesrc = $destination;
        if($this->noerror())
        {
           if(! is_dir($target))
           {
               mkdir($target,0777,true);
           }

            move_uploaded_file($this->file_temp , $destination);

        }
        else
        {
            pre($this->getallmessages());
        }

        return $this;
        
    }

    public function imagesrc()
    {
        if($this->noerror())
        {
           return $this->imagesrc ; 
        }
        
    }

    public function savedname()
    {
        if($this->noerror())
        {
           return $this->savedname ; 
        }
        
    }
    


}


/*
    //scenari
    /**
     * in request class
     * 
     * private file = [];
     * it will be like 
     * i will use /syste/http/fileupload
     * $this->request->file($file)
     * {
     * $fileinfo = $this->request->file($file);
     *  $this->file['file'] = new uploadfile($fileinfo);
     * return e$this->file['fil'];
     * 
     * }
     * 
     * */ 
    // secnario in fileupload class
    /**
     * so when i will write 
     * $file = $this->request->file($file); === it will create object from fileupload(contain file info)
     * so in fileupload class it will recieve file info
     * in constructor
     *  public function __construct($fileinfo)
     * {
     *  $this->file = $fileinfo /// array of file information
     * }
     * 
     * so  method file will return object of file upload 
     * 
     * in constrcutor method getfileinfoo() will return all info 
     *  pubblic function getinfo()
     * {
     *  $this->filename = $this->file['filename'];
     * use method pathinfo($filename); // will get extension and file name witouh extension
     * $info = pathinfo($this->filename);
     * 
     *  $this->filenameonly = $info['filename'];
     *  $this->extension = $info['filename'];
     *  $this->mimitype = $info['type'];
     *  $this->size = $this->file['type'];
     *  $this->error = $this->file['type'];
     * }
     * 
     * public function isfile()
     * {
     *   return ($this->error != upload_file_ok); 
     * }
     * 
     * pubcli function moveto($target , $filename = null)
     * {
     *      first prepare 
     * filename  =  sha1(math.rand(0,1000))."_".sha1(math.rand(0,1100));
     * filename .= $this->fileextemsion;
     * 
     * $target
     * }
     */
