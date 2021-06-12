<?php
namespace System;

use PDO;
use PDOException;
use System\Application;
class DataBase 
{
    private $app;
    private static $connection; // return pdo object
    private $data = []; 
    private $bindings = [];
    private $tablename;
    private $lastid;
    private $wheres = [];   // take sql stamtent and bindings
    private $select = [];
    private $join = [];
    private $limit;
    private $offset ;
    private $orderby = [];
    private $rows = 0;


    public function __construct(Application $app)
    {
        $this->app = $app;

        if(! $this->isconnection())
        {
            $this->connect();
        }

    }

    public function isconnection()
    {
      
        return static::$connection instanceof PDO;
    }

    public function connect()
    {
        $conneted_data = $this->app->file->requirefile('config.php');
        extract($conneted_data);

        try 

        {
            $dsn = "mysql://host=$host;dbname=$dbname";
             static::$connection = new PDO($dsn,$dbusername,$password);
             static::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
             static::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

             $this->connection()->exec("SET NAMES utf8");
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public  function connection()
    {
        return static::$connection;
    }

    // table name return this
    public function tablename($tablename)
    {
        $this->tablename = $tablename;
        return $this;
    }
    public function from($tablename)
    {
        return $this->tablename($tablename);
    }

    // inseerted data or updataed data also will be binidinds return  this
    // when add data it will insert indo this->bindings as key and value
    // like data("name" , "hasan")
    // bindings will be  (0 , "hasan") will take values only
    /**
     *      [name] => sad
     *     [status] => sad
     */
    public function data( $key,$value = null)
    {
        
        if(is_array($key))
        {
            $this->data = array_merge($this->data,$key);
           
            $this->addtobinding(array_values($this->data));
        }
        else
        {
         ;
            $this->data[$key] = $value;  
         
            $this->addtobinding(array_values($this->data));
        }
        return $this;

    }


    // prepare fileds name column and ?  will return sql
    public function preparebinding()
    {
        $sql ="";
        foreach(array_keys($this->data) as $key => $value  ) 
        {
           
            $sql.= $value." = ? , ";   
        }

        $sql = rtrim($sql,", ");
        return $sql;
    }

    //  ->wheres("id = ? " , 1) will take sql and bindings  and return this
    // will take sql from array_shift
    // and this second args will be array li [0 => 4]
    // will enter add to addtobindings($value)
    // then wil make when alreay $this->bindigs not null
    public function where(...$bindings)
    {        
        $sql = array_shift($bindings);

        if(count($bindings) == 1 AND  is_array($bindings[0]))
        {
                $bindings = $bindings[0];
                $this->addtobinding($bindings);
        }
        else
        {
            $this->addtobinding($bindings);
        }
    
        // where['id = ? , name = ? '] convert to string by implode(" ",$this->wheres);
        // sql here will be [0 => id = ? , name = ?]
        // when implode will be  = "id = ? , name = ?"
        // then add " where  before it
        $this->wheres[] = $sql;
        return $this;
    }
    

    // take sql and bindings ("insert into users set name = ? where id = ? , "hasan",2);
    // will retrn qyery \pdo statment
    public function query(...$bindings)
    {
        $sql = array_shift($bindings);
        
        if(count($bindings) == 1 AND  is_array($bindings[0]))
        {
             $bindings = $bindings[0];
        }
        try
        {
            $query = $this->connection()->prepare($sql);   
            foreach($bindings as $key => $value)
            {
                $query->bindvalue($key + 1,$value);
            }
            $query->execute();
            $this->reset();
        }
        catch(PDOException $e)
        {
            
            \pre($this->bindings);
            echo $sql;
            die($e->getMessage());
        }
        return $query;
    }

    // will take table name or no ->insert("users")->lastid()
    public function insert($tablename = null)
    {
        if($tablename)
        {
            $this->tablename = $tablename;
        }
        $sql = "INSERT INTO ".$this->tablename." SET ";

        $sql .=$this->preparebinding();
        // query will take ("inst ......" , [1,4]);
        // first args is sql
        // secind is bindings
        // now sql is ready and \pdo statment->bindvalue( 1 , $value) is ready
        $this->query($sql,$this->bindings);

        // here to get last id must pdo::lastinsetid 

        $this->lastid = $this->connection()->lastInsertId(); 

        // insert stamamtent will return this
        $this->reset();
        return $this;

    }

    public function lastid()
    {
        return $this->lastid;
    }


    // first check if this->bindings is not empty
    // if empty ok let this->bindings = $value only
    // if not empty make merge between old $this->bindings 
    // and array_values from $value

    /*like old 
     $this->bindings  = 
     array(
         0 => "figo@gmail.com"
         1 => "male"
     );
    
    $value = array(
        id => 3
    )  
    
    after merge

    $this->bindings will be
         array(
         0 => "figo@gmail.com",
         1 => "male",
         3 => 3
     );
    */
    public function addtobinding($value)
    {
        if(! is_null($this->bindings))
        {
            $this->bindings = array_merge($this->bindings,array_values($value));   
        }
        else
        {
            $this->bindings = $value; 
        }
    }

    public function preparefields()
    {
        $sql = "UPDATE ".$this->tablename." SET ";
        
        $sql .=$this->preparebinding();
        
        if($this->wheres)
        {
            $sql .= " WHERE " .\implode(" ",$this->wheres);
        }
        return $sql;
    }

    //like insert statment 

    public function update($tablename = null)
    {
        if($tablename)
        {
            $this->tablename = $tablename;
        }

        $sql =  $this->preparefields();
        $this->query($sql,$this->bindings);
        $this->lastid = $this->connection()->lastInsertId(); 
        $this->reset();
        return $this;
    }

    // start select
    
    public function select($select)
    {
        $this->select [] = $select;
        return $this;
    }

    public function join($join)
    {
        $this->join [] = $join;
        return $this;
    }
    public function limit($limit , $offset = 0)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        return $this;
    }
    public function orderby($orderby , $sort = 'ASC')
    {
        $this->orderby = [$orderby ,$sort];
        return $this;
    }

    // fetch one will return std class object 

    public function fetch($tablename = null)
    {
        if($tablename)
        {
            $this->tablename = $tablename;
        }
        $sql = $this->fetchstatment();
  
        $query = $this->query($sql,$this->bindings);
        $result = $query->fetch();
        $this->reset();
        return $result;
    }
    // fetch  all will return array
    // rows count only in fetch all 

    public function fetchall($tablename = null)
    {
        if($tablename)
        {
            $this->tablename = $tablename;
        }
        $sql = $this->fetchstatment();
        $query = $this->query($sql,$this->bindings);
        $results = $query->fetchAll();
        $this->rows = $query->rowCount();
        $this->reset();
        return $results;
    }

    // prepare fetch statment for select 

    public function fetchstatment()
    {
        $sql = " SELECT ";
        if($this->select)
        {
            $sql .= \implode(" , " , $this->select);
        }
        else
        {
            $sql .= " * ";
        }
        $sql .= " FROM ".$this->tablename;

        if($this->wheres)
        {
            $sql .= ' WHERE '. \implode(" " , $this->wheres);
        }
        // [left join 'users on userid.id  = contat.id refernce ...']
        if($this->join)
        {
            $sql .= \implode(" " , $this->select);
        }

        if($this->orderby)
        {
            $sql .= " ORDER BY " .\implode("  " , $this->orderby);
        }

        if($this->limit)
        {
            $sql .= " LIMIT ". $this->limit;
        }
        if($this->offset)
        {
            $sql .= " OFFSET ". $this->offset;
        }



        return $sql;
        
    }

    public function delete($tablename = null)
    {
        if($tablename)
        {
            $this->tablename = $tablename;
        }

        $sql = " DELETE FROM ".$this->tablename;
        if($this->wheres)
        {
            $sql .= " WHERE " . \implode(" ", $this->wheres);
        }
        $this->query($sql,$this->bindings);
        $this->lastid = $this->connection()->lastInsertId();
        $this->reset(); 
        return $this;
    }

    public function rows()
    {
        echo $this->rows;
    }

    public function reset()
    {
        $this->data = []; 
        $this->bindings = [];
        $this->tablename = null;
        $this->wheres = [];   // take sql stamtent and bindings
        $this->select = [];
        $this->join = [];
        $this->limit= null;
        $this->offset = null ;
        $this->orderby = [];
    }



}


    
