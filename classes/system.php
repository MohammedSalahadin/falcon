<?php

class System{
    public $id;                                 //id of the system match in the database
    //general info
    public $localURL;
    public $hideHomePageMenuBar;                //true,false
    public $returnUrlOnLogout;
    public $contactCompanyName;
    public $dispachPhoneNumber;
    public $cityStateZip;                       //Object of cityStateZip
    public $contactEmail;
    public $contactPhoneNumber;
    public $handheldPhotoTimestampText;         //this text will be placed on every photo taken by gaurds
    public $includeArrivals_DeparturesInDAR;    //true,false
    public $homePageMessage;                    //Message in the home page
    public $mobileDeviceLoginMessage;           
    public $propertyFindExampleText;
    public $externalUrlLinks;
    //notification info
    public $resendNotificationAlertForUnacknowledgedIssuesPriority1;
    public $resendNotificationAlertForUnacknowledgedIssuesPriority2;
    public $resendNotificationAlertForUnacknowledgedIssuesPriority3;
    //logos info
    public $mainPageLogo;                       //url of the logo file
    public $reportHeaderLogo;                   //url of the logo file
    //email info
    public $fromEmailAddressNewOrder;
    public $fromEmailAddressNewIssue;
    public $fromEmailAddressAppeals;
    public $SystemEmailNotification;
    //Users  
    public $employee_admins = array();
    public $employee_Gaurds = array();                
    public $employee_Dispachers = array();
    public $employee_Supervisor = array();
    public $customer_SinglePropertyManager = array();
    public $customer_ManagmentCompanyUser = array();
    public $customer_MaintinanceWorker = array();
    public $customer_MaintinanceSupervisor = array();
    //System main elements
    public $devices = array();                  //array of Multiple devices objects of the system
    public $properties = array();               //array of the properites of the system
    public $groups = array();                   // array of groups object


    public function __construct(){

    }

    public function addGeneral($localURL, $hideHomePageMenuBar, $returnUrlOnLogout, $contactCompanyName, $dispachPhoneNumber, 
    $cityStateZip, $contactEmail, $contactPhoneNumber, $handheldPhotoTimestampText, $includeArrivals_DeparturesInDAR,
    $homePageMessage, $mobileDeviceLoginMessage, $propertyFindExampleText, $externalUrlLinks){
        $id = 0;
        return $id;
    }

    public function updateGeneral($localURL, $hideHomePageMenuBar, $returnUrlOnLogout, $contactCompanyName, $dispachPhoneNumber, 
    $cityStateZip, $contactEmail, $contactPhoneNumber, $handheldPhotoTimestampText, $includeArrivals_DeparturesInDAR,
    $homePageMessage, $mobileDeviceLoginMessage, $propertyFindExampleText, $externalUrlLinks){
        $id = 0;
        return $id;
    }
    //used to view data on front-end
    public function getGeneral($localURL, $hideHomePageMenuBar, $returnUrlOnLogout, $contactCompanyName, $dispachPhoneNumber, 
    $cityStateZip, $contactEmail, $contactPhoneNumber, $handheldPhotoTimestampText, $includeArrivals_DeparturesInDAR,
    $homePageMessage, $mobileDeviceLoginMessage, $propertyFindExampleText, $externalUrlLinks){
        $id = 0;
        return $id;
    }

    public function addNotifications($resendNotificationAlertForUnacknowledgedIssuesPriority1,$resendNotificationAlertForUnacknowledgedIssuesPriority2,
    $resendNotificationAlertForUnacknowledgedIssuesPriority3){
        $id = 0;
        $query = "";
        return $id;
    }

    public function updateNotifications($resendNotificationAlertForUnacknowledgedIssuesPriority1,$resendNotificationAlertForUnacknowledgedIssuesPriority2,
    $resendNotificationAlertForUnacknowledgedIssuesPriority3){
        $id = 0;
        $query = "";
        return $id;
    }
    //used to view data on front-end
    public function getNotifications($resendNotificationAlertForUnacknowledgedIssuesPriority1,$resendNotificationAlertForUnacknowledgedIssuesPriority2,
    $resendNotificationAlertForUnacknowledgedIssuesPriority3){
        $id = 0;
        $query = "";
        return $id;
    }
    public function addEmails($fromEmailAddressNewOrder,$fromEmailAddressNewIssue,$fromEmailAddressAppeals,$SystemEmailNotification){
        $id = 0;
        $query = "";
        return $id;
    }
    public function updateEmails($fromEmailAddressNewOrder,$fromEmailAddressNewIssue,$fromEmailAddressAppeals,$SystemEmailNotification){
        $id = 0;
        $query = "";
        return $id;
    }
    //used to view data on front-end
    public function getEmails($fromEmailAddressNewOrder,$fromEmailAddressNewIssue,$fromEmailAddressAppeals,$SystemEmailNotification){
        $id = 0;
        $query = "";
        return $id;
    }
    
    public function addLogos($mainPageLogo, $reportHeaderLogo){
        $id = 0;
        $query = "";
        return $id;
    }
    //get's data fron front-end
    public function updateLogos($mainPageLogo, $reportHeaderLogo){
        $id = 0;
        $query = "";
        return $id;
    }
    //used to view data on front-end
    public function getLogos($mainPageLogo, $reportHeaderLogo){
        $id = 0;
        $query = "";
        return $id;
    }



    public function createSystem(){
        $query = "INSERT INTO `falcon`.`systems` (`general_id`, `devices_id`, `logos_id`, `notification_id`, `email_id`, `domainName`) VALUES ('1', '1', '1', '1', '1', 'test.falcontrac.com');";


    }




}









?>