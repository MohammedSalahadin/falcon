<?php
//include database
require_once 'db.php';

class user{
    //admin info
    public $id;
    public $userName;
    public $password;
    public $email;
    public $firstName;
    public $lastName;
    public $avatar;
    public $allowEmailes = false;
    public $allowUserToviewGPSData = false;
    public $allowParkingAssignments = false;
    public $allowMaintenanceAssignments = false;
    public $allowSecurityAssignments = false;
    public $active = false;
    public $phoneNumber;
    public $cellNumber;
    public $timeCardID;
    public $maintananceEmail;
    public $managementCo;
    public $securityRole;
    public $loggedIn = false;
    

    public $assignedProperties = array();

    
    

    //set 
    public function setManagementCo($managementCo){
        echo $managementCo;
        
    }

    
    public static function getALLUsers($userName, $password){
    }  

}


class securityRole{
    public $id;
    public $name;

    public function create($id,$name){

    }

    public function generate($id){

    }

    public function assignTo($user){

    }
}

class customer extends user{
    public $userType;
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
}
class guard extends employee{
    public $permissions = array();

    public function submitIssue($issue,$property){

    }
    public function mobileLogin($userName, $password){

    }
}
class supervisor extends employee{
    public $permissions = array();

    public function rigister(){

    }
    public function webLogin($userName, $password){

    }
    public function  login($userName, $password){

    }

}
class admin extends supervisor{
    public $permissions = array();

    public function approve($device){}

    public function removeDevice($device){}

    public function editDevice($device){}
    
    public function addUser($user){}
    
    public function editUser($user){}
    
    public function lokProperty($property){}
    
    public function unlockProperty($property){}
}

class dispacher extends supervisor{
    public $permissions = array();
}

?>