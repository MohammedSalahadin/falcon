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
    public $securityProgram; // acknowledgement
    public $maintenanceProgram;
    public $parkingProgram;
    public $photo;
    public $tours; // object of an Unknown class
    public $address; // object of class Address
    public $tasks; // object of class Task
    public $alert; // object of class Alert
    public $attachedDocument;
    public $checkPoints; // object of class Checkpoint
    public $issue; // object of class issue
    public $checkPointsTours; // object of class CheckPointsTours
    public $phoneNumber; // object of class PhoneNumber
    public $location; // object of class Location
    public $issueTypes = array();
    
    public function __construct()
    {
        
    }

    public function addIssueType($id)
    {
        $issueType = new IssueType();
        

    }

    public function updateProperty($name,$notes,$clientManagCompany)
    {
        $query = "UPDATE `falcon`.`properties` SET `propertyName` = '$name', `propertyNotes/PostOrders` = '$notes ', `clients_companies_id` = '$clientManagCompany' WHERE (`id` = '$this->id'); ";
        $execute = new Execute($query, 'execute');
        
        if ($execute) { //Propery has been updated
             
            $this->name = $name;
            $this->notesPostOrders = $notes;
            $this->managementCompany = $clientManagCompany;

            echo "The name has been updated to ".$name."<br>The notes has been updated to ".$notes;
            return true;
            
        } else { return false;}
    }
    

    public function createProperty($name,$notes,$clientManagCompany)
    {
        try {
            $dbConn = new db();
            $conn = $dbConn->getConnection();
            $conn->begin_transaction();

            $query = "INSERT INTO `falcon`.`properties` (`propertyName`,`propertyNotes/PostOrders`, `clients_companies_id`) 
            VALUES ('$name', '$notes','$clientManagCompany'); "; 

            if ($conn->query($query)) { //Propery has been added
                $this->id = $conn->insert_id; //getting last insert ID
                echo $this->id."<br>";
            
                $query1 = "INSERT INTO `falcon`.`group_has_properties` (`property_id`, `property_group_id`) VALUES ($this->id, '1'); ";
                $result1 = $conn->query($query1);
                if($result1){ //adding the most recent added property to all properties group
                     echo " added the most recent added property to all properties group successfully ";
                }
           }
           $conn->commit();
           $conn->close();

        } catch (\Throwable $th) {
            $conn->rollback();
            $conn->close();
            return false;
        }
    }
}

$property2 = new Property();
//$property2->createProperty("addingToTestIssueType","first try",1);
$property2->addIssueType("secondAddedViaProg","Trying for all properties",1.50,2,"Security",1,1,1,1,0,0,"allproperties");
//$property2->updateProperty("Updated Name","Updated Note",1); // now it doesn't accept ID argument, it gets it from this->id.
$issueType->create("secondAddedViaProg","Trying for all properties",1.50,2,"Security",1,1,1,1,0,0,"allproperties");

?>