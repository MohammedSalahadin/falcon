<?php

class db{
    private $sName = "falcontrac.tk";
    private $uName = "falcon";
    private $pw = "falcon";
    private $dbname = "falcon";
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->sName, $this->uName, $this->pw, $this->dbname); //db connection
    }
    public function getConnection()
    {
        return $this->conn;
    }
    public function checkConnection()
    {
        if($this->conn->connect_error)
        {
            echo " There was a problem connecting to the database " ; return false;
        } else // This part can be removed, its just for reassurance.
        {
            echo " Connection with the database is Successfull " ; return true;
        }
        
    }
}

//execute queires
class Execute
{
    public $num_rows;
    public $result;
    public $conn;
    public function __construct($query, $type)
    {
        $conn = new db();
        $conn->checkConnection();
        $this->conn = $conn->getConnection();
        
        switch ($type) {
            case 'execute':
                $result = $this->execute($query);
                break;
            case 'single':
                $result = $this->single($query);
                break;
            case 'array':
                $result = $this->array($query);
                break;
            case 'multi':
                $result = $this->multi($query);
                break;
            case 'multiQuery':
                $result = $this->multiQuery($query);
                break;
            default:
                $result = "wrong method: $type, use execute,single,array or multi";
                break;
        }
        $this->result = $result;
    }

    public function getLastInsertedId(){ // call this function instead of using query to get last_insert_id
        return $this->conn->insert_id; 
    }
    
    public function single($query)
    {
        $result = $this->conn->query($query);
        $fetch = $result->fetch_row();
        $this->conn->close();
        return $fetch[0];
    }

    public function array($query)
    {
        $result = $this->conn->query($query);
        $this->num_rows = $result->num_rows;
        $fetch = $result->fetch_array();
        $this->conn->close();
        return $fetch;
    }
    public function multi($query)
    {
        $result = $this->conn->query($query);
        $this->num_rows = $result->num_rows;
        $fetch = $result->fetch_all(MYSQLI_ASSOC);
        $this->conn->close();
        return $fetch;
    }


    public function execute($query){
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
             return true;
        } else {
            // print_r($query);
            return false;
        }

    }
    
    //check if table is exists: return true: exists, false: not exists
    public static function checkTableExists($table){
        $conn = new db(); $conn = $conn->getConnection();
        $query = 'select 1 from `'.$table.'`';
        $val = mysqli_query($conn, $query);
        if($val !== FALSE){
            // print("Exists");
            return true;
        }
        else{
            // print("Doesn't exist");
            return false;
        }

    }

    //Accepts id and table name, returns true if the id is exists, false if it's not exists
    public static function checkIdInTable($colID,$value, $table){
        $conn = new db(); $conn = $conn->getConnection();
        if(Execute::checkTableExists($table)){
            $query = "select $colID from $table where $colID = $value";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0){
            //found
            return true;
            // echo "$value is found";
            }else{
            //not found
            return false;
                // echo "Coudn't find :$value in $table";
            }
        }else{
            return false; //table isn't exists
        }
    }

    public function multiQuery($query)
    {
        $result =  $this->conn->multi_query($query);
        $fetch = [];

        do {
            if ($result =  $this->conn->store_result()) {
                $fetch = $result->fetch_all(MYSQLI_ASSOC) ;
                // var_dump($result->fetch_all(MYSQLI_ASSOC));
                $result->free();
            }
        } while ( $this->conn->next_result());
        return $fetch;
    }

    
}

