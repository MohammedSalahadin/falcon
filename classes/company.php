<?php
//include database
require_once 'db.php';

class cityStateZip{
    public $city;
    public $state;
    public $zip;
    public $arrayState =  array();
    public function __construct() {}

    public static function getStatesList(){

        $query = "SELECT name FROM falcon.states;";
        $execute = new Execute($query, 'multi');
        print_r($execute);
        for($i = 0; $i < count($execute->result); $i++) {
           // print_r( $execute->result[$i]) ;
        }
    }  

}







class company{
    public $name;
    public $webAddress;
    public $notes;
    public $streetNumber;
    public $cityStateZip;
    public $streetName;
    public $streerType;
    public $buildingNumber;
    public $mainPhone;
    public $fax;

    public function __construct() {}

    public function create($name,$webAddress,$notes,$streetNumber,$cityStateZip,$streetName,$streerType,$buildingNumber,$mainPhone,$fax,$streetTypeID, $stateName){

        $query = "INSERT INTO falcon.clients_companies ('companyName', 'webAddress' , 'notes' , 'streetNumber' , 'streetName' , 'streetType', 'city' , 'zip' , 'buildingNumber' , 'mainPhone' , 'fax' , 'street_types_id' , 'states_id')";

    }






}

$cus = new cityStateZip();
 $something =$cus->getStatesList();
 print_r($cus->arrayState[0]) ;
 

?>