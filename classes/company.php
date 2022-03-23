<?php
//include database
require_once 'db.php';


class Company{
    public $id;
    public $name;
    public $webAddress;
    public $notes;
    public $streetNumber;
    public $city;
    public $state;
    public $zip;
    public $streetName;
    public $streerType;
    public $buildingNumber;
    public $mainPhone;
    public $fax;
    private $generate = false;

    public function __construct() {}

    public function create($name,$webAddress,$notes,$streetNumber,$city, $state, $zip,$streetName,$streetType,$buildingNumber,$mainPhone,$fax,$streetTypeID, $stateName){
        if ($this->generated) {return false;}
        $query = "INSERT INTO `falcon`.`clients_companies` (`companyName`, `webAddress`, `notes`, `streetNumber`, `streetName`, `streetType`, `street_types_id`, `city`, `states_id`, `zip`, `buildingNumber`, `mainPhone`, `fax`) 
        VALUES ('$name', '$webAddress', '$notes', '$streetNumber', '$streetName', '$streetType', '$streetTypeID', '$city', '$state', '$zip', '$buildingNumber', '$mainPhone', '$fax');
        ";
        $query .= "SELECT LAST_INSERT_ID as id";
        $execute = new Execute($query,"multiQuery");
        $id = ($execute->result)[0]['id'];
        if(!empty($id) && $id > 0 ){
            if($this->generate($id)){
                return true;            //succesfully created
            } else { return false;}     //filed to generate attrebutes
        } else {return false;}          //query not executed

    }

    public function update($name,$webAddress,$notes,$streetNumber,$cityStateZip,$streetName,$streerType,$buildingNumber,$mainPhone,$fax,$streetTypeID, $stateName){
        if (!$this->generated) {return false;}
        $query = "";

    }

    public function generate($id = ''){
        if($id == '' && $this->id > 0){$id == $this->id;}
        if (!Execute::checkIdInTable('id',$id, 'clients_companies')) {return false;}
        $query = "SELECT * FROM falcon.clients_companies where id = '$id';";
        $execute = new Execute($query, "multiQuery");
        $result = ($execute->result)[0];
        if (!empty($result)) {
            $this->id= $result['id'];
            $this->name= $result['companyName'];
            $this->webAddress= $result['webAddress'];
            $this->notes= $result['notes'];
            $this->streetNumber= $result['streetNumber'];
            $this->city= $result['city'];
            $this->state= $result['states_id'];
            $this->zip= $result['zip'];
            $this->streetName= $result['streetName'];
            $this->streerType= $result['streetType'];
            $this->buildingNumber= $result['buildingNumber'];
            $this->mainPhone= $result['mainPhone'];
            $this->fax= $result['fax'];
            $this->generate = true;
        }
        


    }

}

$c = new Company();
$c->create('blueWater', 'www.bluewater.com', 'blue water security co.', '234', 'austin', 'Texas', '33433', 'hawai 223', 'hill','',033746633, 44552,'1','texas');

?>