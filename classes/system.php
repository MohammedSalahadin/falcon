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
    public $properties = array(); 
    public $groups = array();


    public function __construct(){

    }





}









?>