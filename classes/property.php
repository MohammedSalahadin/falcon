<?php

require_once 'db.php';
class Property
{
    public $id;
    public $name;
    public $code;
    public $inCustomGroup;
    public $webAddress;
    public $lockProperty;
    public $managementCompany;
    public $primaryAddress;
    public $billingAddress;
    public $notesPostOrders;
    public $securityProgram; // acknowledgement
    public $maintenanceProgram;
    public $parkingProgram;
    public $photo;
    public $tours; // object of an Unknown class
    public $address = array(); // object of class Address
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

    public function addIssueType()
    {  
        require_once 'issueType.php';
        echo " Current propety's ID -> ".$this->id;
        if ($this->id<=0) {return false;}
        $openDoor = new IssueType();
        $openDoor->create($this->id,"Creating issueType from property","new one",1.50,2,"Security",1,1,1,1,0,0,"current"); // adding through the current property
        
        


    }

    public function update($name, $code, $web, $primary, $billing, $notes, $security, $maintanance, $parking, $clientManagCompany)
    {
        try 
        {
            $query = "UPDATE `falcon`.`properties` SET `propertyName` = '$name', `propertyCode` = '$code', `webAddress` = '$web', `primaryAddress` = '$primary', 
            `billingAddress` = '$billing', `propertyNotes/PostOrders` = '$notes', `securityProgram` = '$security', `maintananceProgram` = '$maintanance', `parkingProgram` = '$parking', 
            `clients_companies_id` = '$clientManagCompany' WHERE (`property_id` = '$this->id'); ";
            //$execute = new Execute($query, 'execute');
            //$execute->result
            if ((new Execute($query, 'execute'))->result) //Propery has been updated
            { 
                echo " Propery has been updated successfully ";
                return true;
            }
            else 
            {
                echo " There was a problem updating the property ";
                return false;
            }
        } 
        catch (\Throwable $th) 
        {
            return false;
        }
        
    }


    public function create($name, $notes, $clientManagCompany)
    {
        try 
        {
            // setting up connection to start a transaction.
            $dbConn = new db();
            $conn = $dbConn->getConnection();
            if ($conn->connect_error) // checking database connection
                {echo " Connection to the database was NOT successfull ";return false;}
            $conn->begin_transaction();

            $query = "INSERT INTO `falcon`.`properties` (`propertyName`,`propertyNotes/PostOrders`, `securityProgram`, `maintananceProgram`, `clients_companies_id`)
            VALUES ('$name', '$notes', '1', '1','$clientManagCompany'); ";

            if (is_int($clientManagCompany) && Execute::checkIdInTable('client_company_id', $clientManagCompany, 'clients_companies')) // checking the table we are inserting based on.
            {
                if ($conn->query($query)) //Propery has been added
                    {
                        $issueTypelastInsertedId = $conn->insert_id;
                        echo " Propery has been added successfully ".$issueTypelastInsertedId ;                 
                        $query1 = "INSERT INTO `falcon`.`group_has_properties` (`property_id`, `property_group_id`) VALUES ($issueTypelastInsertedId, '1'); ";
                        if($conn->query($query1)) //adding the most recent added property to all properties group
                            {
                                echo " added the most recent added property to all properties group successfully " ;                 
                            }
                    } 
            }else
            {
                echo " The type of the input is wrong or This Client's Company doens't exist " ;
                return false;
            }
            $conn->commit();
            $this->generate($issueTypelastInsertedId); //generate info
            $conn->close();
            return true;
        }
        catch (\Throwable $th) 
        {
            $conn->rollback();
            $conn->close();
            echo $th;
            return false;
        }
    }
    public function generate($id)
    {
        echo " This property's ID before conditions -> ".$id;
        if ($id<1) {return false;}
        echo " This property's ID after first condition -> ".$id;
        if (!Execute::checkIdInTable('property_id', $id, 'properties')) {return false;}

        try 
        {
            $this->generated = true;
            $query = "SELECT * FROM properties where property_id = '$id';";
            $execute = new Execute($query, "multiQuery");
            $result = ($execute->result)[0];
            //print_r($result);

            echo " This property's ID Before Generate -> ".$this->id;
            $this->id = $id;
            echo " This property's ID After Generate -> ".$this->id;
            $this->name = $result['propertyName'];
            $this->code = $result['propertyCode'];
            $this->webAddress = $result['webAddress'];
            $this->primaryAddress = $result['primaryAddress'];
            $this->billingAddress = $result['billingAddress'];
            $this->notesPostOrders = $result['propertyNotes/PostOrders'];
            $this->inCustomGroup = $result['inCustomGroups'];
            $this->securityProgram = $result['securityProgram'];
            $this->maintenanceProgram = $result['maintananceProgram'];
            $this->parkingProgram = $result['parkingProgram'];
            $this->managementCompany = $result['clients_companies_id'];
            return true;
    
        }
        catch (\Throwable $th) 
        {
            echo "Something went wrong while generating";
            return false;
        } 
        
    }
}

$majdiMall = new Property();
$majdiMall->create("Majdi Mall","Check each floor, check the fire exits.",1);
//$majdiMall->addIssueType();
//$property2->addIssueType("secondAddedViaProg","Trying for all properties",1.50,2,"Security",1,1,1,1,0,0,"allproperties");
//$property2->update("Updated Name","Updated Note",1); // now it doesn't accept ID argument, it gets it from this->id.
//$issueType->create("secondAddedViaProg","Trying for all properties",1.50,2,"Security",1,1,1,1,0,0,"allproperties");

?>