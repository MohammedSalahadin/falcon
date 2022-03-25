<?php
//include database
require_once 'db.php';
require_once 'services.php'; // should test backRootPath in

class User
{
    public $id;
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
    public $stateID;
    public $zip;
    public $allowSecurityAssignments = false;
    public $allowParkingAssignments = false;
    public $allowMaintenanceAssignments = false;
    public $allowUserToviewGPSData = false;
    public $allowEmailes = false;
    public $avatar;                                 //link of the file
    public $lastLoginDate;

    public $loggedIn = false;                       //changes to true only when loggen function is successfuly called

    public $userGroup;                              //group of properties id, or single property id
    public $assignedProperties = array();           //

}



