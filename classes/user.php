<?php
//include database
require_once 'db.php';

class user{
    //admin info
    public $firstName;
    public $lastName;
    public $userName;
    public $password;
    public $emailAdress;
    public $active = false;
    public $maintananceEmail;
    public $timeCardID;
    public $cellNumber;
    public $phoneNumber;
    public $city;
    public $zip;
    public $allowSecurityAssignments = false;
    public $allowParkingAssignments = false;
    public $allowMaintenanceAssignments = false;
    public $allowUserToviewGPSData = false;
    public $allowEmailes = false;
    public $avatar;
    public $lastLoginDate;

    public $managementCo;
    public $employeeRoleId;
    public $loggedIn = false;
    

    public $assignedProperties = array();

    
    public function __construct() {}

    //set 
    public function setManagementCo($managementCo, $userName, $pass){

        
    }

    
    public static function getALLUsers($type){

        if ($type == "employee"){
        $query = "SELECT * FROM falcon.employees;";
        $execute = new Execute($query, 'multi');
        return $execute;
    }

    if ($type == "customer"){
        $query = "SELECT * FROM falcon.customers;";
        $execute = new Execute($query, 'multi');
        return $execute;
    }
    }  

}

class customer extends user{
    
    public $userType;

    public function rigister($userName,$password,$emailAdress,$firstName,$lastName,$stateName, $cusRole){
        $query = "INSERT INTO falcon.customers (`userName`, `password`, `emailAddress`, `firstName`, `lastName`, `states_id`, `customer_roles_id`) VALUES
        ('$userName', '$password', '$emailAdress', '$firstName', '$lastName', (SELECT id FROM falcon.states WHERE shortName = '$stateName'),(SELECT id FROM falcon.customer_roles WHERE name = '$cusRole'));";

       $execute = new Execute ($query, 'execute');
       
       if ($execute) {
           //user have been registerd 
           $this->userName = $userName;
           
           
       } else { echo "not";}
       

    }
    public function webLogin($userName, $password){
        $query = "SELECT * FROM falcon.customers where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        return $execute;

    }
    public function  login($userName, $password){
        $query = "SELECT * FROM falcon.customers where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        return $execute;

    }




}
class maintinanceWorker extends customer{
    public $permissions = array();
}
class maintinanceSuperviser extends customer{
    public $permissions = array();
}
class singlePropertyManager extends customer{
    public $permissions = array();
    public $property;
}
class managementCompanyUser extends customer{
    public $permissions = array();
    public $company;
}



class employee extends user{
    public $userType;

    public function rigister($userName,$password,$emailAdress,$firstName,$lastName,$stateName){
        $query = "INSERT INTO falcon.employees (`userName`, `password`, `emailAddress`, `firstName`, `lastName`, `states_id`) VALUES
        ('$userName', '$password', '$emailAdress', '$firstName', '$lastName', (SELECT id FROM falcon.states WHERE shortName = '$stateName'));";

       $execute = new Execute ($query, 'execute');
       
       if ($execute) {
           //user have been registerd 
           $this->userName = $userName;
           
           
       } else { echo "not";}
       

    }
    public function webLogin($userName, $password){
        $query = "SELECT * FROM falcon.employees where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        return $execute;

    }
    public function  login($userName, $password){
        $query = "SELECT * FROM falcon.employees where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        return $execute;

    }




}
class guard extends employee{
    public $permissions = array();

    public function submitIssue($issue,$property){

    }
    public function mobileLogin($userName, $password){

    }
}

class admin extends employee{
    public $permissions = array();

    public function approve($device){}

    public function removeDevice($device){}

    public function editDevice($device){}
    
    public function addUser($user){}
    
    public function editUser($user){}
    
    public function lokProperty($property){}
    
    public function unlockProperty($property){}
}

class dispacher extends employee{
    public $permissions = array();
}




$cus = new customer();
 $something =$cus->getALLUsers("customer");
 print_r($something);
//  $admin-> userName = "meer";
//$cus->rigister('alan', 'pass', 'mail', "f name", 'last name','NY','test');
 


?>