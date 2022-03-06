<?php

include 'db.php';
require 'services.php';

class System{
    public $id;                                 //id of the system match in the database
    //general info
    public $generalId;
    private static $generalGenerated = false;  //calling addGeneral function only one time.
    public $localURL;
    public $hideHomePageMenuBar;
    public $homePageMenuLinkName;
    public $returnUrlOnLogout;
    public $contactCompanyName;
    public $contactAddress;
    public $dispachPhoneNumber;
    public $timeZone;
    public $dispachPhoenNumberGuards;
    public $city;
    public $state;
    public $zip;
    public $contactEmail;
    public $contactPhoneNumber;
    public $handheldPhotoTimestampText;
    public $renderHomePageAsHTMLMarkup;
    public $includeArrivals_DeparturesInDAR;
    public $homePageMessage;
    public $mobileDeviceLoginMessage;
    public $hideDropDownCitySelector;
    public $propertyFindExampleText;
    public $externalUrlLinks;

    //notification info
    public $notificationID;
    private static $notificationGenerated = false;   
    public $resendNotificationAlertForUnacknowledgedIssuesPriority1;
    public $resendNotificationAlertForUnacknowledgedIssuesPriority2;
    public $resendNotificationAlertForUnacknowledgedIssuesPriority3;

    //logos info
    public $logosID;
    private static $logosGenerated;
    public $mainPageLogo;                       //url of the logo file
    public $reportHeaderLogo;                   //url of the logo file

    //email info
    public $emailsID;
    private static $emailsGenerated = false;
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

    //Only called one time
    public function addGeneral($localURL, $hideHomePageMenuBar,$homePageMenuLinkName, $returnUrlOnLogout, $contactCompanyName,$contactAddress, $dispachPhoneNumber,$timeZone,
        $dispachPhoenNumberGuards ,$city, $state, $zip, $contactEmail, $contactPhoneNumber, $handheldPhotoTimestampText,$renderHomePageAsHTMLMarkup, $includeArrivals_DeparturesInDAR,
        $homePageMessage, $mobileDeviceLoginMessage,$hideDropDownCitySelector, $propertyFindExampleText, $externalUrlLinks){
        //function is called only one time in the second call it will return false
        if (self::$generalGenerated) return false;
        // do something.
        $query = "INSERT INTO `falcon`.`general` (`localUrl`, `hideHomePageMenuBar`, `homePageMenuLinkName`, `returnURLonLogout`,
         `dispachPhoneNumber`, `dispachPhoenNumberGuards`, `timeZone`, `contactCompanyName`, `contactAddress`, `city`, `states_id`, `zip`,
          `contactEmail`, `contactPhoneNumber`, `handheldPhotoTimestampText`, `renderHomePageAsHTMLMarkup`, `IncludeArrivals/DeparturesInDAR`,
           `HomePageMessage`, `MobileDeviceLoginMessage`, `hideDropDownCitySelector`, `propertyFindExampleText`, `externalUrlLinks`)
            VALUES ('$localURL', '$hideHomePageMenuBar', '$homePageMenuLinkName', '$returnUrlOnLogout', '$dispachPhoneNumber', '$dispachPhoenNumberGuards',
             '$timeZone', '$contactCompanyName', '$contactAddress', '$city', '$state', '$zip', '$contactEmail', '$contactPhoneNumber', '$handheldPhotoTimestampText',
              '$renderHomePageAsHTMLMarkup', '$includeArrivals_DeparturesInDAR', '$homePageMessage', '$mobileDeviceLoginMessage', '$hideDropDownCitySelector',
               '$propertyFindExampleText', '$externalUrlLinks');
        ";
        $query.="SELECT LAST_INSERT_ID() as id;";
        // $sql = "SELECT firstName FROM falcon.employees where id='1';";
        $result = new Execute($query, 'multiQuery');
        $fetch = $result->result;
        $id = $fetch[0]['id'];
        if($id != null && $this->getGeneral($id)){
            $this->generalId = $id;
            self::$generalGenerated = true;
            return true;    //object info are updated/setted
        } else {
            $this->generalId = "undifined";
            return false; //coudn't set/update the object info
        };
    }
   
    //update the General Information 
    public function updateGeneral($id,$localURL, $hideHomePageMenuBar,$homePageMenuLinkName, $returnUrlOnLogout, $contactCompanyName,$contactAddress, $dispachPhoneNumber,$timeZone,
        $dispachPhoenNumberGuards ,$city, $state, $zip, $contactEmail, $contactPhoneNumber, $handheldPhotoTimestampText,$renderHomePageAsHTMLMarkup, $includeArrivals_DeparturesInDAR,
        $homePageMessage, $mobileDeviceLoginMessage,$hideDropDownCitySelector, $propertyFindExampleText, $externalUrlLinks){
        $query = "UPDATE `falcon`.`general` SET `localUrl` = '$localURL', `hideHomePageMenuBar` = '$hideHomePageMenuBar',
         `homePageMenuLinkName` = '$homePageMenuLinkName', `returnURLonLogout` = '$returnUrlOnLogout', `dispachPhoneNumber` = '$dispachPhoneNumber',
        `dispachPhoenNumberGuards` = '$dispachPhoenNumberGuards', `timeZone` = '$timeZone', `contactCompanyName` = '$contactCompanyName',
        `contactAddress` = '$contactAddress', `city` = '$city', `states_id` = '$state', `zip` = '$zip', `contactEmail` = '$contactEmail',
        `contactPhoneNumber` = '$contactPhoneNumber', `handheldPhotoTimestampText` = '$handheldPhotoTimestampText',
        `renderHomePageAsHTMLMarkup` = '$renderHomePageAsHTMLMarkup', `IncludeArrivals/DeparturesInDAR` = '$includeArrivals_DeparturesInDAR',
        `HomePageMessage` = '$homePageMessage', `MobileDeviceLoginMessage` = '$mobileDeviceLoginMessage',
        `hideDropDownCitySelector` = '$hideDropDownCitySelector', `propertyFindExampleText` = '$propertyFindExampleText',
        `externalUrlLinks` = '$externalUrlLinks' WHERE (`id` = '$id')";

        $result = new Execute($query, 'multiQuery');
        $fetch = $result->result;
        if($this->getGeneral($id)){
            return true;    //object info are updated
        } else {
            return false; //coudn't update the object info
        };

    }

    //used to view data on front-end
    public function getGeneral($id){
        $query = "SELECT * FROM `falcon`.`general` where id = '$id';";
        $result = new Execute($query, 'multiQuery');
        $fields = ($result->result)[0]; //select first array that contains all the fields
        if($fields > 0){
            self::$generalGenerated = true;    //disable addGeneral function
            $this->generalId = $fields['id'];
            $this->localURL = $fields['localUrl'];
            $this->hideHomePageMenuBar = $fields['hideHomePageMenuBar'];
            $this->homePageMenuLinkName = $fields['homePageMenuLinkName'];
            $this->returnUrlOnLogout = $fields['returnURLonLogout'];
            $this->contactCompanyName = $fields['contactCompanyName'];
            $this->contactAddress = $fields['contactAddress'];
            $this->dispachPhoneNumber = $fields['dispachPhoneNumber'];
            $this->timeZone = $fields['timeZone'];
            $this->dispachPhoenNumberGuards = $fields['dispachPhoenNumberGuards'];
            $this->city = $fields['city'];
            $this->state = $fields['states_id'];
            $this->zip = $fields['zip'];
            $this->contactEmail = $fields['contactEmail'];
            $this->contactPhoneNumber = $fields['contactPhoneNumber'];
            $this->handheldPhotoTimestampText = $fields['handheldPhotoTimestampText'];
            $this->renderHomePageAsHTMLMarkup = $fields['renderHomePageAsHTMLMarkup'];
            $this->includeArrivals_DeparturesInDAR = $fields['IncludeArrivals/DeparturesInDAR'];
            $this->homePageMessage = $fields['HomePageMessage'];
            $this->mobileDeviceLoginMessage = $fields['MobileDeviceLoginMessage'];
            $this->hideDropDownCitySelector = $fields['hideDropDownCitySelector'];
            $this->propertyFindExampleText = $fields['propertyFindExampleText'];
            $this->externalUrlLinks = $fields['externalUrlLinks'];
            return true;
        } else {
        return false;
        }

    }

    public function addNotifications($resendNotificationAlertForUnacknowledgedIssuesPriority1,$resendNotificationAlertForUnacknowledgedIssuesPriority2,
        $resendNotificationAlertForUnacknowledgedIssuesPriority3){
        // call add Notification one time
        if (self::$notificationGenerated) return false;
        $query = "INSERT INTO `falcon`.`system_notification` (`ResendNotificationAlertForUnacknowledgedIssuesPriority1`, `ResendNotificationAlertForUnacknowledgedIssuesPriority2`, `ResendNotificationAlertForUnacknowledgedIssuesPriority3`) VALUES ('$resendNotificationAlertForUnacknowledgedIssuesPriority1', '$resendNotificationAlertForUnacknowledgedIssuesPriority2', '$resendNotificationAlertForUnacknowledgedIssuesPriority3');";
        $query.= "SELECT LAST_INSERT_ID() as id;";
        $result = new Execute($query, 'multiQuery');
        $id = ($result->result)[0]['id'];
        if($id != null && $this->getNotifications($id)){
            self::$notificationGenerated = true;            //disable addNotifiaction function
            $this->notificationID = $id;
            return true;    //object info are updated/setted
        } else {
            $this->notificationID = "undifined";
            return false; //coudn't set/update the object info
        };
    }

    public function updateNotifications($id,$resendNotificationAlertForUnacknowledgedIssuesPriority1,$resendNotificationAlertForUnacknowledgedIssuesPriority2,
        $resendNotificationAlertForUnacknowledgedIssuesPriority3){
        $query = "UPDATE `falcon`.`system_notification` SET `ResendNotificationAlertForUnacknowledgedIssuesPriority1` = '$resendNotificationAlertForUnacknowledgedIssuesPriority1', `ResendNotificationAlertForUnacknowledgedIssuesPriority2` = '$resendNotificationAlertForUnacknowledgedIssuesPriority2', `ResendNotificationAlertForUnacknowledgedIssuesPriority3` = '$resendNotificationAlertForUnacknowledgedIssuesPriority3' WHERE (`id` = '$id');";
        $result = new Execute($query, 'multiQuery');
        if($this->getNotifications($id)){
            return true;    //object info are updated
        } else {
            return false; //coudn't update the object info
        };
        return $id;
    }
    //used to view data on front-end
    public function getNotifications($id){
        $query = "SELECT * FROM falcon.system_notification WHERE id = '$id';";
        $result = new Execute($query, 'multiQuery');
        $fields = ($result->result)[0];

        if ($fields > 0) {
            self::$notificationGenerated = true;            //disable add notifications function
            $this->notificationID = $fields['id'];
            $this->resendNotificationAlertForUnacknowledgedIssuesPriority1 = $fields['ResendNotificationAlertForUnacknowledgedIssuesPriority1'];
            $this->resendNotificationAlertForUnacknowledgedIssuesPriority2 = $fields['ResendNotificationAlertForUnacknowledgedIssuesPriority2'];
            $this->resendNotificationAlertForUnacknowledgedIssuesPriority3 = $fields['ResendNotificationAlertForUnacknowledgedIssuesPriority3'];
            return true;
        }
        else {
            $this->notificationID = "undifined";
            return false;
        }
                
    }

    //adding new emails to assign it to a new system
    public function addEmails($fromEmailAddressNewOrder,$fromEmailAddressNewIssue,$fromEmailAddressAppeals,$SystemEmailNotification){
        if (self::$emailsGenerated) return false;
        $query = "INSERT INTO `falcon`.`email` (`fromEmailAddressNewOrder`, `fromEmailAddressNewIssue`, `fromEmailAddressAppeals`, `SystemEmailNotification`) VALUES ('$fromEmailAddressNewOrder', '$fromEmailAddressNewIssue', '$fromEmailAddressAppeals', '$SystemEmailNotification');";
        $query.= "SELECT LAST_INSERT_ID() as id;";
        $result = new Execute($query, 'multiQuery');
        $fetch = $result->result;
        $id = $fetch[0]['id'];
        if($id != null && $this->getEmails($id)){
            $this->emailID = $id;
            self::$emailsGenerated = true;
            return true;    //object info are updated/setted
        } else {
            echo "Coudn't generate emails";
            $this->generalId = "undifined";
            return false; //coudn't set/update the object info
        };
    }
    public function updateEmails($id,$fromEmailAddressNewOrder,$fromEmailAddressNewIssue,$fromEmailAddressAppeals,$SystemEmailNotification){
        $query = "UPDATE `falcon`.`email` SET `fromEmailAddressNewOrder` = '$fromEmailAddressNewOrder', `fromEmailAddressNewIssue` = '$fromEmailAddressNewIssue', `fromEmailAddressAppeals` = '$fromEmailAddressAppeals', `SystemEmailNotification` = '$SystemEmailNotification' WHERE (`id` = '$id');";
        $result = new Execute($query, 'multiQuery');
        $fetch = $result->result;
        if($this->getEmails($id)){
            return true;    //object info are updated
        } else {
            return false; //coudn't update the object info
        };
    }
    //used to view data on front-end
    public function getEmails($id){
        $query = "SELECT * FROM falcon.email where id = '$id';";
        $result = new Execute($query, 'multiQuery');
        $fields = ($result->result)[0]; //select first array that contains all the fields
        if($fields > 0){
            self::$emailsGenerated = true;
            $this->emailsID = $fields['id'];
            $this->fromEmailAddressNewOrder= $fields['fromEmailAddressNewOrder'];
            $this->fromEmailAddressNewIssue= $fields['fromEmailAddressNewIssue'];
            $this->fromEmailAddressAppeals= $fields['fromEmailAddressAppeals'];
            $this->SystemEmailNotification= $fields['SystemEmailNotification'];
            return true;
        }else {
            $this->emailsID = "undifined";
            return false;
        }
    }
    //Files will be soted in the gloabal variable $_FILES
    public function addLogos(){
        if (self::$logosGenerated) return false;    //stop if the function have been called before
        //Store the photos into ../upload folder and get their url
        $mainPageLogoUrl = Services::uploadImage("mainLogo"); // mainLogo matches the name of the file input in the from
        $reportHeaderLogoUrl = Services::uploadImage("reportHeaderLogo");  // reportHeaderLogo matches the name of the input in the from
        
        if ($mainPageLogoUrl != false || $reportHeaderLogoUrl != false){
            $query = "INSERT INTO `falcon`.`logos` (`mainPageLogo`, `reportHeaderLogo`) VALUES ('$mainPageLogoUrl', '$reportHeaderLogoUrl');";
            $query.= "SELECT LAST_INSERT_ID() as id;";
            $result = new Execute($query, 'multiQuery');
            $id = ($result->result)[0]['id'];
            if($id != null && $this->getLogos($id)){ //set class variables and check if setted
                return true; 
            } else {
                $this->logosGenerated = "undifined";
                return false; //coudn't set/update the object info
            };
        }
       
    }
    //logos id in the database
    public function updateLogos($id){
        //Store the photos into ../upload folder and get their url
        $mainPageLogoUrl = Services::uploadImage("mainLogo"); // mainLogo matches the name of the file input in the from
        $reportHeaderLogoUrl = Services::uploadImage("reportHeaderLogo");  // reportHeaderLogo matches the name of the input in the from
        
        if ($mainPageLogoUrl != false || $reportHeaderLogoUrl != false){
            $query = "UPDATE `falcon`.`logos` SET `mainPageLogo` = '$mainPageLogoUrl', `reportHeaderLogo` = '$reportHeaderLogoUrl' WHERE (`id` = '$id');";
            $result = new Execute($query, 'multiQuery');
            if($id != null && $this->getLogos($id)){ //set class variables and check if setted
                return true; 
            } else {
                $this->logosGenerated = "undifined";
                return false; //coudn't set/update the object info
            };
        }
    }
    //logos id in the database
    public function getLogos($id){
        $query = "SELECT * FROM falcon.logos where id = '$id'";
        $result = new Execute($query, 'multiQuery');
        $fields = ($result->result)[0];
        if ($fields > 0) {
            self::$logosGenerated = true;       
            $this->logosID = $fields['id'];
            $this->mainPageLogo = $fields['mainPageLogo'];
            $this->reportHeaderLogo = $fields['reportHeaderLogo'];
           return true;
        }
        else {
            $this->notificationID = "undifined";
            return false;
        }
    }


    //in order to create the system, we have to create 
    public function createSystem(){
        if (self::$generalGenerated && self::$notificationGenerated && self::$logosGenerated && self::$emailsGenerated) {
            $generalId = $this->generalId;
            $notificationID = $this->notificationID;
            $emailsID = $this->emailsID;
            $logosID = $this->logosID;
            $query = "INSERT INTO `falcon`.`systems` (`general_id`, `logos_id`, `notification_id`, 
            `email_id`) VALUES ('$generalId', '$logosID', '$notificationID', '$emailsID');";
             $query.= "SELECT LAST_INSERT_ID() as id;";
             $result = new Execute($query, 'multiQuery');
             $id = ($result->result)[0]['id'];
             if ($id > 1 && $this->getSystem($id)) {
                 return true;
             }
             else {
                 return false;
             }
             echo "Executed:".$id;

        } else {
            echo "Missing Calling function, General:".self::$generalGenerated." Notification:".self::$notificationGenerated."
            Logo Generated:".self::$logosGenerated." emails Generated:".self::$emailsGenerated;
        }
    }

    public function updateSystem(){
        
    }

    public function getSystem($id){
        $query = "SELECT * FROM falcon.systems WHERE id = '$id';";
        $result = new Execute($query, 'multiQuery');
        $fields = ($result->result)[0]; //select first array that contains all the fields
        if($fields > 0){
            // print_r($fields);
            if(
            $this->getGeneral($fields['general_id']) &&
            $this->getEmails($fields['email_id']) &&
            $this->getNotifications($fields['notification_id']) &&
            $this->getLogos($fields['logos_id'])
            ){
                echo "all fileds are set up";
                return true;
            } else{ return false;}; //coudn't set all system info
        } else { return false;}; //coudn't get the system id
        
        
    }


}

// $s = new System();
// $s->getSystem("1");
// echo $s->zip;
// echo $s->reportHeaderLogo;

// $localURL = "user.falcontrac.net";$hideHomePageMenuBar=1; $returnUrlOnLogout="user.falcontrac.com/logout";$homePageMenuLinkName="HP Menue N";
// $contactCompanyName = "user co name";$contactAddress= "address";$dispachPhoneNumber = "098721938";$timeZone="+1 GMT";$dispachPhoenNumberGuards="200300324";$city = "austin";$state = "1";$zip="12344";
// $contactEmail = "user@mail.com";$contactPhoneNumber = "09870977";$handheldPhotoTimestampText = "photo by user co";$renderHomePageAsHTMLMarkup = '0'; $includeArrivals_DeparturesInDAR = '1';
// $homePageMessage = "Welcome to to user co";$mobileDeviceLoginMessage = "mobilelogin message";$hideDropDownCitySelector='0'; $propertyFindExampleText="find property"; 
// $externalUrlLinks = "https://hjuzati.com https;//falcontrac.com";

//when updating 
// $rowId = '34';


//$id = $s->updateGeneral($rowId,$localURL,$hideHomePageMenuBar, $homePageMenuLinkName,$returnUrlOnLogout,$contactCompanyName,$contactAddress,$dispachPhoneNumber,$timeZone,$dispachPhoenNumberGuards,$city,$state,$zip,$contactEmail,$contactPhoneNumber,$handheldPhotoTimestampText,$renderHomePageAsHTMLMarkup, $includeArrivals_DeparturesInDAR,$homePageMessage,$mobileDeviceLoginMessage,$hideDropDownCitySelector,$propertyFindExampleText,$externalUrlLinks);    
// $id = $s->getGeneral('34');
// $s->addGeneral($localURL,$hideHomePageMenuBar, $homePageMenuLinkName,$returnUrlOnLogout,$contactCompanyName,$contactAddress,$dispachPhoneNumber,$timeZone,$dispachPhoenNumberGuards,$city,$state,$zip,$contactEmail,$contactPhoneNumber,$handheldPhotoTimestampText,$renderHomePageAsHTMLMarkup, $includeArrivals_DeparturesInDAR,$homePageMessage,$mobileDeviceLoginMessage,$hideDropDownCitySelector,$propertyFindExampleText,$externalUrlLinks);    
// echo $id." - ".$id2;
// echo $s->returnUrlOnLogout;

// $result1 = $s->getNotifications('4');
// $s->addNotifications('1','1','1');
// echo $result1 ."  -  ".$result2;
// echo $s->notificationID;
// echo $s->resendNotificationAlertForUnacknowledgedIssuesPriority1;

//** After calling add emails, or getEmails will disable the addEmails function */
// $result1 = $s->getEmails('1');
// $s->addEmails('mail1@mail.com', 'emails2@gmail.com', 'email3@hotmail.com', 'email4@yahoo.com');

//  echo $result1 ."  -  ".$result2;
//  echo $s->fromEmailAddressNewIssue;
//  $s->getLogos("1");


?>