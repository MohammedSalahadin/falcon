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

    public static IssueType $issueType;

    public function __construct()
    {
        
    }

    // for adding issueType, can't finish it right now as the database side of it needs work.
    public function addIssueType($issueTypeName,$description,$addTo,$issueFee,$active,$dispatch,$handheld,$webUsers,$autoClose,$checkPointOnly,$issueType,$issueLevel)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    private function validateCompanyID() // to validate the update function.
    {
        return 0;
    }

    public function updateProperty($name,$notes,$clientManagCompany,$id)
    {
        $query = "UPDATE `falcon`.`properties` SET `propertyName` = '$name', `propertyNotes/PostOrders` = '$notes ', `clients_companies_id` = '$clientManagCompany' WHERE (`id` = '$id'); ";
        $execute = new Execute($query, 'execute');
        
        if ($execute) { //Propery has been updated
             
            $this->name = $name;
            $this->notesPostOrders = $notes;
            $this->managementCompany = $clientManagCompany;
            $this->id = $id;

            echo "The name has been updated to ".$name."<br>The notes has been updated to ".$notes;
            
        } else { echo "Failed";}
    }
    

    public function createPropertyTX($name,$notes,$clientManagCompany)
    {
        try {
            $dbConn = new db();
            $conn = $dbConn->getConnection();
            $conn->begin_transaction();

            $query = "INSERT INTO `falcon`.`properties` (`propertyName`,`propertyNotes/PostOrders`, `clients_companies_id`) 
            VALUES ('$name', '$notes','$clientManagCompany'); "; 

            $result = $conn->query($query);

            if ($result) { //Propery has been added
                $this->name = $name;
                $this->notesPostOrders = $notes;
                echo $name."<br>".$notes."<br>";

                $lastInsertId = $conn->insert_id; //getting last insert ID

                echo $lastInsertId."<br>";

                $query1 = "INSERT INTO `falcon`.`group_has_properties` (`property_id`, `property_group_id`) VALUES ($lastInsertId, '1'); ";
                $result1 = $conn->query($query1);
                if($result1){ //adding the most recent added property to all properties group
                     echo " It fucking Worked ";
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
//$property2->createPropertyTX("testingAddToAllPropertyAgain","Hopefully it worked this time",1);
//$property2->updateProperty("Updated Name","Updated Note",1,2);

?>