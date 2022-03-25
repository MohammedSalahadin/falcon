<?php
//include database
require_once 'db.php';


class Company
{
    public $id;
    public $companyName;
    public $webAddress;
    public $notes;
    public $streetNumber;
    public $streetName;
    public $streetType;
    public $street_types_id;
    public $city;
    public $states_id;
    public $zip;
    public $buildingNumber;
    public $mainPhone;
    public $fax;


    public function __construct()
    {
    }

    public function create($companyName, $webAddress, $notes, $streetNumber, $streetName, $streetType, $street_types_id, $city, $states_id, $zip, $buildingNumber, $mainPhone, $fax)
    {
        if ($this->id > 0) {
            return false;
        }  // prevent calling when already generated

        $query = "INSERT INTO `falcon`.`clients_companies` (`companyName`, `webAddress`, `notes`, `streetNumber`, `streetName`, `streetType`, `street_types_id`, `city`, `states_id`, `zip`, `buildingNumber`, `mainPhone`, `fax`) 
        VALUES ('$companyName', '$webAddress', '$notes', '$streetNumber', '$streetName', '$streetType', '$street_types_id', '$city', '$states_id', '$zip', '$buildingNumber', '$mainPhone', '$fax');";
        $query .= "SELECT LAST_INSERT_ID() as id;";
        $id = ((new Execute($query, "multiQuery"))->result)[0]['id'];
        // print_r($query)."                                                   ";
        if (!empty($id) && $id > 0) {
            if ($this->generate($id)) {
                return true;            //succesfully created
            } else {
                return false;
            }     //filed to generate attrebutes
        } else {
            return false;
        }          //query not executed

    }

    public function update($id, $companyName, $webAddress, $notes, $streetNumber, $streetName, $streetType, $street_types_id, $city, $states_id, $zip, $buildingNumber, $mainPhone, $fax)
    {
        if (!Execute::checkIdInTable('client_company_id', $id, 'clients_companies')) {
            echo "company id: $id is not exists";
            return false;
        }

        $query = "UPDATE `falcon`.`clients_companies` SET `companyName` = '$companyName', `webAddress` = '$webAddress', `notes` = '$notes', `streetNumber` = '$streetNumber', `streetName` = '$streetName', `streetType` = '$streetType', `street_types_id` = '$street_types_id', `city` = '$city', `states_id` = '$states_id', `zip` = '$zip', `buildingNumber` = '$buildingNumber', `mainPhone` = '$mainPhone', `fax` = '$fax' WHERE (`client_company_id` = '$id');";
        $executed = (new Execute($query, "execute"))->result;

        if ($executed) {
            if ($this->generate($id)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function generate($id = '')
    {
        if ($id == '' && $this->id > 0) {
            $id == $this->id;
        }

        if (!Execute::checkIdInTable('client_company_id', $id, 'clients_companies')) {
            return false;
        }

        $query = "SELECT * FROM falcon.clients_companies where client_company_id = '$id';";
        $execute = new Execute($query, "multiQuery");
        $result = ($execute->result)[0];
        if (!empty($result)) {
            $this->id;
            $this->companyName = $result['companyName'];
            $this->webAddress = $result['webAddress'];
            $this->notes = $result['notes'];
            $this->streetNumber = $result['streetNumber'];
            $this->streetName = $result['streetName'];
            $this->streetType = $result['streetType'];
            $this->street_types_id = $result['street_types_id'];
            $this->city = $result['city'];
            $this->states_id = $result['states_id'];
            $this->zip = $result['zip'];
            $this->buildingNumber = $result['buildingNumber'];
            $this->mainPhone = $result['mainPhone'];
            $this->fax = $result['fax'];
            return true;
        } else {
            return false;
        }
    }

    public function remove($id = '')
    {
        if ($id == '' && $this->id > 0) {
            $id == $this->id;
        }
        if (!Execute::checkIdInTable('client_company_id', $id, 'clients_companies')) {
            echo "company $id is not exists ";return false;
        }
        $query = "DELETE FROM `falcon`.`clients_companies` WHERE (`client_company_id` = '$id');";
        $executed = (new Execute($query, "execute"))->result;
        if ($executed) {
            return true;
        } else {
            return false;
        }
    }
}

// Creating/ Updating Company 
/* $companyName = "NEw comp.";
$webAddress = "www.newcomp.com";
$notes = "last company for this week";
$streetNumber = "4511";
$streetName = "las vegas";
$streetType = "hill";
$street_types_id = "1";
$city = 'husten';
$states_id = "41";
$zip = "34433";
$buildingNumber = "332";
$mainPhone = "22331";
$fax = "054665442"; */

// $c = new Company();
// $result = $c->create($companyName, $webAddress, $notes, $streetNumber, $streetName, $streetType, $street_types_id, $city, $states_id, $zip, $buildingNumber, $mainPhone, $fax);

// if ($result) {
//     echo "Company $c->companyName is created";
// } else {
//     echo "Not Created!";
// }


// Update company info
/* $id = "16";
$companyName = "Updated Name.";
$webAddress = "www.updated.com";

$update = $c->update($id, $companyName, $webAddress, $notes, $streetNumber, $streetName, $streetType, $street_types_id, $city, $states_id, $zip, $buildingNumber, $mainPhone, $fax);

if ($update) {
    echo " Company $c->companyName Have been updated";
} else {
    echo "  Coudn't Update!  ";
}
 */


 //Remove Company

// $id = "18";
// $removed = $c->remove($id);
// if ($removed) {
//     echo "Company $id have been removed";
//     unset($id);
// } else {
//     echo "Coudn't Remove the company $id";
// }