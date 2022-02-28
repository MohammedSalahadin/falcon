<?php

require_once 'db.php';
class Property
{
    public $id;

    public $name;

    public $webAddress;

    public $lockProperty;

    public $managementCompany; // object of Company class

    public $primaryAddress;

    public $billingAddress;

    public $notesPostOrders;

    public $securityProgram; //acknowledgement

    public $maintenanceProgram;

    public $parkingProgram;

    public $photo;

    public $tours; // object of an Unknown class

    public $address; // object of class Address

    public $tasks; // object of class Task

    public $alert; // object of class Alert

    public $attachedDocument;

    public $checkPoints; // objct of class Checkpoint

    //public $issue1 = new Issue(1);

    public $checkPointsTours; // object of class CheckPointsTours

    public $phoneNumber; // object of class PhoneNumber

    public $location; // object of class Location

    //public $issueTypes1 = new IssueTypes(1);

    public function __construct()
    {
        
    }

    public function addIssueType()
    {
        return 0;
    }

    //$query = "INSERT INTO `falcon`.`properties` (`propertyName`, `propertyCode`, `propertyNotes/PostOrders`, `clients_companies_id`) 
    //VALUES ('second Property', 'code 2', 'p1.com', 'iraq, sully street2', '2', 'Some Note', '2', '2', '2', '2');
    //;";

    public function createProperty($name,$notes,$clientManagCompany)
    {
        $query = "INSERT INTO `falcon`.`properties` (`propertyName`,`propertyNotes/PostOrders`, `clients_companies_id`) 
        VALUES ('$name', '$notes','$clientManagCompany');
        ;";

        $execute = new Execute ($query, 'execute');
        
        if ($execute) { //Propery has been added
             
            $this->name = $name;
            $this->notesPostOrders = $notes;

            echo $name."<br>".$notes ;
            
            
        } else { echo "Failed";}
        
    }

    // private function validatecCompanyID()
    // {
    //     return 0;
    // }

    public function generateProperty()
    {
        return 0;
    }

    public function updateProperty($name,$notes,$clientManagCompany,$id)
    {

        

        $query = "UPDATE `falcon`.`properties` SET `propertyName` = '$name', `propertyNotes/PostOrders` = '$notes ', `clients_companies_id` = '$clientManagCompany' WHERE (`id` = '$id');
        ;";

        $execute = new Execute ($query, 'execute');
        
        if ($execute) { //Propery has been added
             
            $this->name = $name;
            $this->notesPostOrders = $notes;
            $this->managementCompany = $clientManagCompany;
            $this->id = $id;

            echo "The name has been updated to ".$name."<br>The notes has been updated to ".$notes;
            
        } else { echo "Failed";}
        

        return 0;
    }

    function addThisPropertyToAllPropertyGroup()
    {
        return 0;
    }


}
$property2 = new Property();

//$property2->createProperty("Second Property","Some Note",1);
$property2->updateProperty("Updated Name","Updated Note",1,2);

?>