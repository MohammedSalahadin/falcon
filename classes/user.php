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

    public function rigister($userName,$password,$emailAdress,$firstName,$lastName,$stateID,$cusRoleID, $active,$maintananceEmail,$timeCardID,$cellNumber,$phoneNumber,$city,$zip,$allowSecurityAssignments
    ,$allowParkingAssignments,$allowMaintenanceAssignments,$allowUserToviewGPSData,$allowEmailes,$avatar,$managementCo, $userNotID){


        $check = "SELECT userName FROM falcon.customers WHERE userName = '$userName';";

        $execute = new Execute ($check, 'array');

        if ($execute->result != ""){
            echo "The Username You Entered Is Set by Other User. Please Change the User Name.";     
        }else {

                $query = "INSERT INTO falcon.customers (`userName`, `password`, `emailAddress`, `firstName`, `lastName`, `states_id` , `customer_roles_id`,`active`, `maintananceEmail`
        , `timeCardID`, `cellNumber`, `phoneNumber`, `city` , `zip`, `allowSecurityAssignments`,`allowParkingAssignments`
        , `allowMaintenanceAssignments`, `allowUserToviewGPSData`, `allowEmails`, `avatar`, `managmentCompany`
        ,`users_notification_id` ) VALUES
        ('$userName', '$password', '$emailAdress', '$firstName', '$lastName','$stateID','$cusRoleID', '$active', '$maintananceEmail', '$timeCardID', '$cellNumber','$phoneNumber','$city'
        , '$zip', '$allowSecurityAssignments', '$allowParkingAssignments', '$allowMaintenanceAssignments','$allowUserToviewGPSData','$allowEmailes', '$avatar', '$managementCo', '$userNotID' );";

       $execute = new Execute ($query, 'execute');
        }

    
       
      
       

    }
    public function webLogin($userName, $password){
        $query = "SELECT * FROM falcon.customers where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        if ($execute) {
            //user have been registerd 
            $this->loggedIn = true;
            $this->userName = $userName;
            $this->firstName = $execute->result['firstName'];
            $this->lastName = $execute->result['lastName'];
            $this->password = $execute->result['password'];
            $this->emailAdress = $execute->result['emailAddress'];
            $this->maintananceEmail = $execute->result['maintananceEmail'];
            $this->timeCardID = $execute->result['timeCardID'];
            $this->cellNumber = $execute->result['cellNumber'];
            $this->phoneNumber = $execute->result['phoneNumber'];
            $this->city = $execute->result['city'];
            $this->zip = $execute->result['zip'];
            $this->avatar = $execute->result['avatar'];
            $this->lastLoginDate = $execute->result['lastLoginDate'];
            $this->managementCo = $execute->result['managmentCompany'];
            $this->employeeRoleId = $execute->result['employee_roles_id'];
            if ($execute->result['active'] == 1){
            $this->active = true;}
            if ($execute->result['allowSecurityAssignments'] == 1){
                $this->allowSecurityAssignments = true;
            }
            if ($execute->result['allowParkingAssignments'] == 1){
                $this->allowParkingAssignments = true;
            }
            if ($execute->result['allowMaintenanceAssignments'] == 1){
                $this->allowMaintenanceAssignments = true;
            }
            if ($execute->result['allowUserToviewGPSData'] == 1){
                $this->allowUserToviewGPSData = true;
            }
            if ($execute->result['allowEmails'] == 1){
                $this->allowEmailes = true;
            }
            
        }
     

    }
    public function  login($userName, $password){
        $query = "SELECT * FROM falcon.customers where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        if ($execute) {
            //user have been registerd 
            $this->loggedIn = true;
            $this->userName = $userName;
            $this->firstName = $execute->result['firstName'];
            $this->lastName = $execute->result['lastName'];
            $this->password = $execute->result['password'];
            $this->emailAdress = $execute->result['emailAddress'];
            $this->maintananceEmail = $execute->result['maintananceEmail'];
            $this->timeCardID = $execute->result['timeCardID'];
            $this->cellNumber = $execute->result['cellNumber'];
            $this->phoneNumber = $execute->result['phoneNumber'];
            $this->city = $execute->result['city'];
            $this->zip = $execute->result['zip'];
            $this->avatar = $execute->result['avatar'];
            $this->lastLoginDate = $execute->result['lastLoginDate'];
            $this->managementCo = $execute->result['managmentCompany'];
            $this->employeeRoleId = $execute->result['employee_roles_id'];
            if ($execute->result['active'] == 1){
            $this->active = true;}
            if ($execute->result['allowSecurityAssignments'] == 1){
                $this->allowSecurityAssignments = true;
            }
            if ($execute->result['allowParkingAssignments'] == 1){
                $this->allowParkingAssignments = true;
            }
            if ($execute->result['allowMaintenanceAssignments'] == 1){
                $this->allowMaintenanceAssignments = true;
            }
            if ($execute->result['allowUserToviewGPSData'] == 1){
                $this->allowUserToviewGPSData = true;
            }
            if ($execute->result['allowEmails'] == 1){
                $this->allowEmailes = true;
            }
            
        }
     

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

    public function rigister($userName,$password,$emailAdress,$firstName,$lastName,$stateID,$employeeRoleID, $active,$maintananceEmail,$timeCardID,$cellNumber,$phoneNumber,$city,$zip,$allowSecurityAssignments
    ,$allowParkingAssignments,$allowMaintenanceAssignments,$allowUserToviewGPSData,$allowEmailes,$avatar,$managementCo, $userNotID){

        $check = "SELECT userName FROM falcon.employees WHERE userName = '$userName';";

        $execute = new Execute ($check, 'array');

        if ($execute->result != ""){
echo "The Username You Entered Is Set by Other User. Please Change the User Name.";
        }else {

        $query = "INSERT INTO falcon.employees (`userName`, `password`, `emailAddress`, `firstName`, `lastName`, `states_id` , `employee_roles_id`,`active`, `maintananceEmail`
        , `timeCardID`, `cellNumber`, `phoneNumber`, `city` , `zip`, `allowSecurityAssignments`,`allowParkingAssignments`
        , `allowMaintenanceAssignments`, `allowUserToviewGPSData`, `allowEmails`, `avatar`, `managmentCompany`
        ,`users_notification_id` ) VALUES
        ('$userName', '$password', '$emailAdress', '$firstName', '$lastName','$stateID','$employeeRoleID', '$active', '$maintananceEmail', '$timeCardID', '$cellNumber','$phoneNumber','$city'
        , '$zip', '$allowSecurityAssignments', '$allowParkingAssignments', '$allowMaintenanceAssignments','$allowUserToviewGPSData','$allowEmailes', '$avatar', '$managementCo', '$userNotID' );";

       $execute = new Execute ($query, 'execute');

        }




       


    }
    public function webLogin($userName, $password){
        $query = "SELECT * FROM falcon.employees where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        if ($execute) {
            //user have been registerd 
            $this->loggedIn = true;
            $this->userName = $userName;
            $this->firstName = $execute->result['firstName'];
            $this->lastName = $execute->result['lastName'];
            $this->password = $execute->result['password'];
            $this->emailAdress = $execute->result['emailAddress'];
            $this->maintananceEmail = $execute->result['maintananceEmail'];
            $this->timeCardID = $execute->result['timeCardID'];
            $this->cellNumber = $execute->result['cellNumber'];
            $this->phoneNumber = $execute->result['phoneNumber'];
            $this->city = $execute->result['city'];
            $this->zip = $execute->result['zip'];
            $this->avatar = $execute->result['avatar'];
            $this->lastLoginDate = $execute->result['lastLoginDate'];
            $this->managementCo = $execute->result['managmentCompany'];
            $this->employeeRoleId = $execute->result['employee_roles_id'];
            if ($execute->result['active'] == 1){
            $this->active = true;}
            if ($execute->result['allowSecurityAssignments'] == 1){
                $this->allowSecurityAssignments = true;
            }
            if ($execute->result['allowParkingAssignments'] == 1){
                $this->allowParkingAssignments = true;
            }
            if ($execute->result['allowMaintenanceAssignments'] == 1){
                $this->allowMaintenanceAssignments = true;
            }
            if ($execute->result['allowUserToviewGPSData'] == 1){
                $this->allowUserToviewGPSData = true;
            }
            if ($execute->result['allowEmails'] == 1){
                $this->allowEmailes = true;
            }
            
        }
     

    }
    public function  login($userName, $password){
        $query = "SELECT * FROM falcon.employees where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        if ($execute) {
            //user have been registerd 
            $this->loggedIn = true;
            $this->userName = $userName;
            $this->firstName = $execute->result['firstName'];
            $this->lastName = $execute->result['lastName'];
            $this->password = $execute->result['password'];
            $this->emailAdress = $execute->result['emailAddress'];
            $this->maintananceEmail = $execute->result['maintananceEmail'];
            $this->timeCardID = $execute->result['timeCardID'];
            $this->cellNumber = $execute->result['cellNumber'];
            $this->phoneNumber = $execute->result['phoneNumber'];
            $this->city = $execute->result['city'];
            $this->zip = $execute->result['zip'];
            $this->avatar = $execute->result['avatar'];
            $this->lastLoginDate = $execute->result['lastLoginDate'];
            $this->managementCo = $execute->result['managmentCompany'];
            $this->employeeRoleId = $execute->result['employee_roles_id'];
            if ($execute->result['active'] == 1){
            $this->active = true;}
            if ($execute->result['allowSecurityAssignments'] == 1){
                $this->allowSecurityAssignments = true;
            }
            if ($execute->result['allowParkingAssignments'] == 1){
                $this->allowParkingAssignments = true;
            }
            if ($execute->result['allowMaintenanceAssignments'] == 1){
                $this->allowMaintenanceAssignments = true;
            }
            if ($execute->result['allowUserToviewGPSData'] == 1){
                $this->allowUserToviewGPSData = true;
            }
            if ($execute->result['allowEmails'] == 1){
                $this->allowEmailes = true;
            }
            
        }
     

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
//   $something =$cus->login("meer","tgt");
//    print_r($cus->allowSecurityAssignments);
//  print_r($something);
//  $admin-> userName = "meer";
$cus->rigister('meer', 'mmeerr', 'mb@mb', "meer", 'bahez','1','1','0','mm@mm','2','077077098','674633','suly','10005','1','0','0','1','1','lklklk','1','1');
 


?>