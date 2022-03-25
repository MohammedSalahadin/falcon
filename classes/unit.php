<?php

// use Telnyx\Exception\UnknownApiErrorException;

require_once 'db.php';

class Unit
{
        public $id;
        public $property_addresses_id;
        public $UnitNumber;
        public $ParkingSpaceCount;
        public $ParkingSpaceNumbers;
        public $CurrentPermitCount;
        public $MaxPermitCount;
        public $SecurityViolations;
        public $ReportedSecurity;
        public $ReportedParking;
        public $ReportedMaintenance;

        public function create($property_addresses_id, $UnitNumber)
        {
                if(isset($this->id) && $this->id > 0){return false;} //can't call this function except when creating a new unit. 
                
                if(!Execute::checkIdInTable('id' ,$property_addresses_id, "property_addresses")){ echo $property_addresses_id." Address is Not Exists";return false;}// address id validation
                
                $MaxPermitCount = -1; // -1 Means value is set by property, to show in the front-end
                
                $query = "INSERT INTO `falcon`.`unites` (`property_addresses_id`, `UnitNumber`, `ParkingSpaceCount`, `ParkingSpaceNumbers`, `CurrentPermitCount`, `MaxPermitCount`, `SecurityViolations`, `Reported Security`, `ReportedParking`, `Reported Maintenance`) 
                VALUES ('$property_addresses_id', '$UnitNumber', '0', '0', '0', '$MaxPermitCount', '0', '0', '0', '0');";
                $query .= "SELECT LAST_INSERT_ID() as id;";
                $id = ((new Execute($query, "multiQuery"))->result)[0]['id'];
                if ($id > 0) {
                        if ($this->generate($id)){
                                return true;
                        } else {
                                 return false;
                        }
                } else { 
                        return false;
                }
        }


        public function setMaxPrimitCount($id, $maxPrimitCount){
                if(!Execute::checkIdInTable('id' ,$id, "unites")){ echo $id." unit is Not Exists";return false;}// address id validation
                $query = "UPDATE `falcon`.`unites` SET `MaxPermitCount` = '$maxPrimitCount' WHERE (`id` = '$id');";
                $executeed = (new Execute($query, "execute"))->result;
                if ($executeed) {
                        if ($this->generate($id)) {
                                return true;            //generated Successfully
                        } else { return false;}
                } else { return false;}
        }

        public function generate($id ='')
        {
                if ($id < 1) {
                        if (isset($this->id) && $this->id > 0) {
                                $id = $this->id;
                        } // when already generated
                        else {
                                echo "generate stopped";
                                return false;
                        }                                    // when not generated and not sent
                }
                $query = "SELECT * FROM falcon.unites where id = '$id';";
                $result = ((new Execute($query, "multiQuery"))->result)[0];
                if (!empty($result)) {
                        $this->id = $result['id'];
                        $this->property_addresses_id = $result['property_addresses_id'];
                        $this->UnitNumber = $result['UnitNumber'];
                        $this->ParkingSpaceCount = $result['ParkingSpaceCount'];
                        $this->ParkingSpaceNumbers = $result['ParkingSpaceNumbers'];
                        $this->CurrentPermitCount = $result['CurrentPermitCount'];
                        $this->MaxPermitCount = $result['MaxPermitCount'];
                        $this->SecurityViolations = $result['SecurityViolations'];
                        $this->ReportedSecurity = $result['Reported Security'];
                        $this->ReportedParking = $result['ReportedParking'];
                        $this->ReportedMaintenance = $result['Reported Maintenance'];
                        return true;
                }
        }


        public function remove($id= ''){
                if ($id < 1) {
                        if (isset($this->id) && $this->id > 0) {
                                $id = $this->id;
                        } // when already generated
                        else {
                                echo "generate stopped";
                                return false;
                        }                                    // when not generated and not sent
                }
                if(!Execute::checkIdInTable("id",$id,"unites")){echo "unit is not exists";return false;}  //check if unit is existes
               
                $query = "DELETE FROM `falcon`.`unites` WHERE (`id` = '$id');";
                $executeed = (new Execute($query, "execute"))->result;
                if($executeed){// Remove Successfully
                        return true;
                } else {
                        return false;
                }
        }
}


// $property_addresses_id = "5";
// $UnitNumber = "A1";

// $unit1 = new Unit();

//Single Object Creation
// $result = $unit1->create($property_addresses_id, $UnitNumber);
// if ($result) {
//         echo "unit is created";
// } else{
//         echo "Unit is not created!";
// }

// Singel Object Update;
/* $maxPrimitCount =0 ;
$id = 5;
$uResult = $unit1->setMaxPrimitCount($id, $maxPrimitCount);
if ($uResult) {
        echo "Unit is updated";
} else { echo "unit Not Updated";} */

//Single Object Remove
// $id = 5;
// $remove = $unit1->remove($id);
// if ($remove) {
//         echo "removed succesfully: $id";
// } else {echo "Couldnot remove unit: $id";}

// Accept Array of Unites
/* $unites = array("A1","A2","A3");
$u = array(); //list of unites objects of the */

//this foreach used to create multiple unites and store their objects into $u
/* foreach($unites as $unit){
        $uObj = new Unit();
        if ($uObj->create($property_addresses_id, $UnitNumber)) {
                $u[] = $uObj;
                unset($uObj);
        }
        
}
 */