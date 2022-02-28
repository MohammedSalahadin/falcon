<?php

class db{
    private $sName = "falcontrac.tk";
    private $uName = "falcon";
    private $pw = "falcon";
    private $dbname = "falcon";
    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->sName, $this->uName,$this->pw,$this->dbname);//db connection
    }
    public function getConnection(){
        return $this->conn;
    }
}

//execute queires
class Execute{
    public $num_rows;
    public $result;
    public $conn;
    public function __construct($query, $type){
        $conn = new db();
        $conn = $conn -> getConnection();
        $this->conn = $conn;
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
            default:
                $result = "wrong method: $type, use execute,single,array or multi";
                break;
        }
        $this->result = $result;
    }

    public function single($query){
        $result = $this->conn -> query($query);
        $fetch = $result -> fetch_row();
        $this->conn->close();
        return $fetch[0];
    }

    public function array($query){
        $result = $this->conn -> query($query);
        $this->num_rows = $result->num_rows;
        $fetch = $result -> fetch_array();
        $this->conn->close();
        return $fetch;
    }
    public function multi($query){
        $result = $this->conn -> query($query);
        $this->num_rows = $result->num_rows;
        $fetch = $result -> fetch_all(MYSQLi_ASSOC);
        $this->conn->close();
        return $fetch;
    }

    public function execute($query){
        $result = $this->conn->query($query);
        $this->conn->close();
        return $result;
    }
}

// $ex = new Execute("SELECT * FROM hima.visets where ipAddress = '::1'", "single");
// print_r($ex->result);

?>
