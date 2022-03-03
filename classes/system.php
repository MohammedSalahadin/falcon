<?php

include 'db.php';

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

    //System ID is requried
   /*  public function addGeneral($localURL, $hideHomePageMenuBar, $returnUrlOnLogout, $contactCompanyName, $dispachPhoneNumber, 
    $cityStateZip, $contactEmail, $contactPhoneNumber, $handheldPhotoTimestampText, $includeArrivals_DeparturesInDAR,
    $homePageMessage, $mobileDeviceLoginMessage, $propertyFindExampleText, $externalUrlLinks){ */
        public function addGeneral(){
        $id = 0;
        $query = "INSERT INTO `falcon`.`general` (`localUrl`, `hideHomePageMenuBar`, `homePageMenuLinkName`, `returnURLonLogout`,`dispachPhoneNumber`, `dispachPhoenNumberGuards`, `timeZone`, `contactCompanyName`, `contactAddress`, `city`, `states_id`,`contactEmail`, `contactPhoneNumber`, `handheldPhotoTimestampText`, `renderHomePageAsHTMLMarkup`, `IncludeArrivals/DeparturesInDAR`,`HomePageMessage`, `MobileDeviceLoginMessage`, `hideDropDownCitySelector`, `propertyFindExampleText`, `externalUrlLinks`) VALUES ('user2.falcontrac.com', '1', '1', '1', '07701233332', '07701213123', '+1', 'UserCompany', 'co address', 'austin', '1','user@email.com', '07763343334', '1', '1', '1', 'Welcome to user System', 'WElcome to falcon system', '0', 'example p name','somesites');";
        // $query.="SELECT LAST_INSERT_ID();";
        // $sql = "SELECT firstName FROM falcon.employees where id='1';";
        // $id = new Execute($query, 'single');
        $conn = new db();
        $conn = $conn -> getConnection();
        $result = $conn -> query($query);
        // $row = $result -> fetch_row();
        echo $query;
        // echo $row[0];
    }

    public function updateGeneral($localURL, $hideHomePageMenuBar, $returnUrlOnLogout, $contactCompanyName, $dispachPhoneNumber, 
    $cityStateZip, $contactEmail, $contactPhoneNumber, $handheldPhotoTimestampText, $includeArrivals_DeparturesInDAR,
    $homePageMessage, $mobileDeviceLoginMessage, $propertyFindExampleText, $externalUrlLinks){
        $id = 0;
        $query = "INSERT INTO `falcon`.`general` (`localUrl`, `hideHomePageMenuBar`, `homePageMenuLinkName`, `returnURLonLogout`, `dispachPhoneNumber`, `dispachPhoenNumberGuards`, `timeZone`, `contactCompanyName`, `contactAddress`, `city`, `states_id`, `contactEmail`, `contactPhoneNumber`, `handheldPhotoTimestampText`, `renderHomePageAsHTMLMarkup`, `IncludeArrivals/DeparturesInDAR`, `HomePageMessage`, `MobileDeviceLoginMessage`, `hideDropDownCitySelector`, `propertyFindExampleText`, `externalUrlLinks`) VALUES ('user.falcontrac.com', '1', '1', '1', '07701233332', '07701213123', '+1', 'UserCompany', 'userCo. address', 'austin', '1', 'user@email.com', '07763343334', '1', '1', '1', 'Welcome to user System', 'WElcome to falcon system', '0', 'eg.property name', 'https://www.google.com https://hjuzati.com');";
        $query.="";
        $id = new Execute($query, 'single');
        echo $id;
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

/* ($localURL, $hideHomePageMenuBar, $returnUrlOnLogout, $contactCompanyName, $dispachPhoneNumber, 
    $cityStateZip, $contactEmail, $contactPhoneNumber, $handheldPhotoTimestampText, $includeArrivals_DeparturesInDAR,
    $homePageMessage, $mobileDeviceLoginMessage, $propertyFindExampleText, $externalUrlLinks) */
    
$s = new System();
$s->addGeneral();







?>