<?php
//include database
require_once 'db.php';

class Admin{
    //admin info
    public $userName;
    public $password;
    public $email;
    public $firstName;
    public $lastName;
    public $domainName;
    //general info
    public $localURL;
    public $hideHomePageMenueBar = false;
    public $returnUrlOnLogout;
    public $dispachPhoneNumber;
    public $dispachPhoenNumberGuards;
    public $timeZone;
    public $contactCompanyName;
    public $contactAddress;
    public $city;
    public $states_id;
    public $contactEmail;
    public $contactPhoneNumber;
    public $handheldPhotoTimestampText;
    public $renderHomePageAsHTMLMarkup;
    public $IncludeArrivals_DeparturesInDAR;
    public $HomePageMessage;
    public $MobileDeviceLoginMessage;
    public $hideDropDownCitySelector;
    public $propertyFindExampleText;
    public $externalUrlLinks;
    //notification info
    public $ResendNotificationAlertForUnacknowledgedIssuesPriority1;
    public $ResendNotificationAlertForUnacknowledgedIssuesPriority2;
    public $ResendNotificationAlertForUnacknowledgedIssuesPriority3;
    //logos info
    public $mainPageLogo;
    public $reportHeaderLogo;
    //email info
    public $fromEmailAddressNewOrder;
    public $fromEmailAddressNewIssue;
    public $fromEmailAddressAppeals;
    public $SystemEmailNotification;

    public $devices = array();
    public $users = array();
    public $property = array();
    public $issueTypes = array();

    
    public function __construct() {}

    //create New admin instance, insert admin to the database and set current instance info
    public function createAdmin($userName, $password,$email,$firstName,$lastName,$domainName){
        $query = "INSERT INTO `falcon`.`admins` (`userName`, `password`, `email`, `firstName`, `lastName`, `domainName`) VALUES
         ('$userName', '$password', '$email', '$firstName', '$lastName', '$domainName');";

        $execute = new Execute ($query, 'execute');
        
        if ($execute) {
            //user have been registerd 
            $this->userName = $userName;
            
        } else { echo "not";}
        
    }

    //create new admin account, get admin info from the database and setup current instance info
    public function loginAdmin($userName, $password){
        $query = "SELECT * FROM falcon.admins where userName = '$userName' and `password` = '$password';";
        $execute = new Execute($query, 'array');
        return $execute;
    }


}


$admin = new Admin();
$something =$admin->loginAdmin("user1","user1");
print_r($something);
// $admin->createAdmin('mohammed', 'pass', 'mail', "f name", 'last name', 'mo.com');







?>