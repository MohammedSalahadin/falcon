<?php
require_once 'db.php';
require_once 'address.php';
require_once 'issueType.php';
require_once 'alert.php';
class Property
{
    public $id;
    public $name;
    public $code;
    public $inCustomGroups = array();
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
    public $addresses = array(); // object of class Address
    public $tasks; // object of class Task
    public $alerts = array(); // object of class Alert
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
    public function getGroupName($groupID)
    {
        $query = "SELECT groupName from property_group where group_id='$groupID';";
        $result = (new Execute($query, "single"))->result;

        if (!empty($result)) {
            //echo" The name of the group($groupID)  is -> $result "; 
            return $result;
        }
        else {
            echo "Something wrong inside get group name";
            return false;
        }

    }

    public function inCustomGroup()
    {
        // if (!(isset($this->id) && $this->id > 0)) { echo "generate the object first";return false;}
        $query = "SELECT * FROM falcon.group_has_properties where property_id = '$this->id';";
        $result = (new Execute($query, "multiQuery"))->result;
        //print_r($query);

        if (!empty($result)) {
            // the numbers that execute from this for loop is the group that the property belongs to. ex: 1 2 3.
            foreach ($result as $group) {
                //echo $group["property_group_id"]." ";
                //$this->getGroupName($group["property_group_id"]);
                $groupKey = $group["property_group_id"];
                $groupName = $this->getGroupName($groupKey);
                $this->inCustomGroups[$groupKey] = $groupName;
            }
        //print_r($result);
        }
        else {
            echo "coudn't execute";
            return false;
        }

    }

    public function addIssueType()
    {
        echo " Current propety's ID -> " . $this->id;
        if ($this->id < 1) {
            echo " The id has not been generated yet ";
            return false;
        }
        $openDoor = new IssueType();
        $openDoor->create($this->id, "Creating issueType from property", "new one", 1.50, 2, "Security", 1, 1, 1, 1, 0, 0, "current"); // adding through the current property




    }

    public function update($id,$name, $code, $web, $primary, $billing, $notes, $security, $maintanance, $parking, $clientManagCompany)
    {
        

        try {
            if (!Execute::checkIdInTable('property_id', $id, 'properties')) {
                echo " The IssueType you're trying to update doesn't exist ";
                return false;
            }
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
            else {
                echo " There was a problem updating the property ";
                return false;
            }
        }
        catch (\Throwable $th) {
            return false;
        }

    }


    public function create($name, $notes, $clientManagCompany)
    {
        if ($this->id >= 1) {
            echo " The id have been generated before [inside create function] ";
            return false;
        }

        try {
            // setting up connection to start a transaction.
            $dbConn = new db();
            $conn = $dbConn->getConnection();
            if ($conn->connect_error) // checking database connection
            {
                echo " Connection to the database was NOT successfull ";
                return false;
            }
            $conn->begin_transaction();

            $query = "INSERT INTO `falcon`.`properties` (`propertyName`,`propertyNotes/PostOrders`, `securityProgram`, `maintananceProgram`, `clients_companies_id`)
            VALUES ('$name', '$notes', '1', '1','$clientManagCompany'); ";

            if (is_int($clientManagCompany) && Execute::checkIdInTable('client_company_id', $clientManagCompany, 'clients_companies')) // checking the table we are inserting based on.
            {
                if ($conn->query($query)) //Propery has been added
                {
                    $issueTypelastInsertedId = $conn->insert_id;
                    echo " Propery has been added successfully " . $issueTypelastInsertedId;
                    $query1 = "INSERT INTO `falcon`.`group_has_properties` (`property_id`, `property_group_id`) VALUES ($issueTypelastInsertedId, '1'); ";
                    if ($conn->query($query1)) //adding the most recent added property to all properties group
                    {
                        echo " added the most recent added property to all properties group successfully ";
                    }
                }
            }
            else {
                echo " The type of the input is wrong or This Client's Company doens't exist ";
                return false;
            }
            $conn->commit();
            $this->generate($issueTypelastInsertedId); //generate info
            $conn->close();
            return true;
        }
        catch (\Throwable $th) {
            $conn->rollback();
            $conn->close();
            echo $th;
            return false;
        }
    }
    public function generate($id)
    {
        echo " This property's ID before conditions -> " . $id;
        if ($id < 1) {
            echo " The id you're trying to generate is of wrong type or empty ";
            return false;
        }
        echo " This property's ID after first condition -> " . $id;
        if (!Execute::checkIdInTable('property_id', $id, 'properties')) {
            echo " No such id exists inside property table ";
            return false;
        }

        try {
            $this->generated = true;
            $query = "SELECT * FROM properties where property_id = '$id';";
            $execute = new Execute($query, "multiQuery");
            $result = ($execute->result)[0];
            //print_r($result);

            echo " This property's ID Before Generate -> " . $this->id;
            $this->id = $id;
            echo " This property's ID After Generate -> " . $this->id;
            $this->name = $result['propertyName'];
            $this->code = $result['propertyCode'];
            $this->webAddress = $result['webAddress'];
            $this->primaryAddress = $result['primaryAddress'];
            $this->billingAddress = $result['billingAddress'];
            $this->notesPostOrders = $result['propertyNotes/PostOrders'];
            $this->inCustomGroups = $result['inCustomGroups'];
            $this->securityProgram = $result['securityProgram'];
            $this->maintenanceProgram = $result['maintananceProgram'];
            $this->parkingProgram = $result['parkingProgram'];
            $this->managementCompany = $result['clients_companies_id'];
            return true;

        }
        catch (\Throwable $th) {
            echo "Something went wrong while generating";
            return false;
        }

    }

    public function addToGroup($groupID)
    {
        if (!Execute::checkIdInTable('group_id', $groupID, 'property_group')) {
            return false;
        }
        $property_id = $this->id;

        $query = "INSERT INTO `falcon`.`group_has_properties` (`property_id`, `property_group_id`) 
        VALUES ('$property_id', '$groupID');";
        $executed = (new Execute($query, "execute"))->result;
        if ($executed) {
            echo "added to group $groupID";
            return true;
        }
        else {
            echo "couldn't add the property to the group $groupID";
            return false;
        }

    }
    public function generateAddresses()
    {
        if ($this->id < 1) {
            echo " The id has not been generated yet ";
            return false;
        }
        $query = "SELECT id FROM falcon.property_addresses where property_id = '$this->id';";
        $addresses = (new Execute($query, "multiQuery"))->result;
        //print_r($addresses);
        foreach ($addresses as $address) {
            //print_r($address["id"]);
            $addressID = $address["id"];
            $addressObj = new Address();
            //$addressObj->generate($addressID);
            if ($addressObj->generate($addressID)) {
                $this->addresses[$addressID] = $addressObj;
            }
            unset($addressObj);
        }
    }
    public function generateIssueTypes()
    {
        if ($this->id < 1) {
            echo " The id has not been generated yet ";
            return false;
        }
        $query = "SELECT issue_type_id FROM falcon.issue_types where issue_type_id = '$this->id';";
        $issueTypes = (new Execute($query, "multiQuery"))->result;
        //print_r($addresses);
        foreach ($issueTypes as $issueType) {
            //print_r($address["id"]);
            $issueTypeID = $issueType["issue_type_id"];
            $issueTypeObj = new IssueType();
            if ($issueTypeObj->generate($issueTypeID)) {
                $this->issueTypes[$issueTypeID] = $issueTypeObj;
            }
            unset($issueTypeObj);
        }
    }
    public function generateAlerts()
    {
        if ($this->id < 1) {
            echo " The id has not been generated yet ";
            return false;
        }
        $query = "SELECT id FROM falcon.alert where id = '$this->id';";
        $alerts = (new Execute($query, "multiQuery"))->result;
        //print_r($addresses);
        foreach ($alerts as $alert) {
            //print_r($address["id"]);
            $alertID = $alert["id"];
            $alertObj = new Alert();
            if ($alertObj->generate($alertID)) {
                $this->alerts[$alertID] = $alertObj;
            }
            unset($alertObj);
        }
    }
}

$obj = new Property();
// $majdiMall->create("Majdi Mall","Check each floor, check the fire exits.",1);
//$majdiMall->addIssueType();
//$property2->addIssueType("secondAddedViaProg","Trying for all properties",1.50,2,"Security",1,1,1,1,0,0,"allproperties");
//$property2->update("Updated Name","Updated Note",1); // now it doesn't accept ID argument, it gets it from this->id.
//$issueType->create("secondAddedViaProg","Trying for all properties",1.50,2,"Security",1,1,1,1,0,0,"allproperties");

$obj->generate('1');
//$obj->addToGroup('3');
//$obj->generateAddresses();
//$obj->generateIssueTypes();
$obj->generateAlerts();
//$obj->inCustomGroup();
//print_r($obj->inCustomGroup);
//print_r($obj->addresses);
//print_r($obj->issueTypes);
print_r($obj->alerts);


?>