<?php

require 'db.php';

class Checkpoint{
    public $id;
    public $name;
    private $generated;
    public $location;
    public $QR_NFC_Value;
    public $propertyAddress;
    public $checkPointUnit;
    public $checkPointIssueType;
    public $checkPointLastHint;
    public $reportNotes;
    public $officerInstructions;
    public $active;
    public $allowKeepOpen;
    public $requirePhoto;
    public $reportIfMissed;

    public function __construct()
    {
        
    }

    public function create($property_id, $checkPointName, $checkPointLocation, $QR_NFCCodeValue, $property_addresses_id, $chckpointUnit, $checkpintIssueType, $autoCreateIssueType, $checkpointLastHint, $reportNote, $officerInstructions, $isActive, $allowKeepOpen, $requirePhoto, $reportIfMissed){
        if($this->generated){return false;}
        
        if ($property_id != null) {
            $query = "INSERT INTO `falcon`.`property_checkpoints` (`property_id`, `checkPointName`, `checkPointLocation`, `QR/NFCCodeValue`, `property_addresses_id`, `chckpointUnit`, `checkpintIssueType`, `autoCreateIssueType`, `checkpointLastHint`, `reportNote`, `officerInstructions`, `isActive`, `allowKeepOpen`, `requirePhoto`,  `reportIfMissed`) 
            VALUES ('$property_id', '$checkPointName', '$checkPointLocation', '$QR_NFCCodeValue', '$property_addresses_id', '$chckpointUnit', '$checkpintIssueType', '$autoCreateIssueType', '$checkpointLastHint', '$reportNote', '$officerInstructions', '$isActive', '$allowKeepOpen', '$requirePhoto', '$reportIfMissed');";
            $query .= "SELECT LAST_INSERT_ID() as id;";
            $execute = new Execute($query, "multiQuery");
            $id = ($execute->result)[0]['id'];
            if ($id != null && $this->generate($id)) { // Class objects, and insert to db is done
                return true;
            } 
            else {  // didn't generate the id and the class objects
                return false;
            }
            
        }
        else {
            return false;
        }

    }

    public function update($checkPointName, $checkPointLocation, $QR_NFCCodeValue, $property_addresses_id, $chckpointUnit, $checkpintIssueType, $autoCreateIssueType, $checkpointLastHint, $reportNote, $officerInstructions, $isActive, $allowKeepOpen, $requirePhoto, $propertyCheckpointscol, $reportIfMissed ){
        if ($this->id == null && $this->generated ) { return false;} //when the id is not exists or passed
        if ($this->id != null  && $this->generated) { $id = $this->id;} //when id is exists but not passed

        $query ="UPDATE `falcon`.`property_checkpoints` SET `checkPointName` = '$checkPointName', `checkPointLocation` = '$checkPointLocation', `QR/NFCCodeValue` = '$QR_NFCCodeValue', `property_addresses_id` = '$property_addresses_id', `chckpointUnit` = '$chckpointUnit', `checkpintIssueType` = '$checkpintIssueType', `reportNote` = '$reportNote', `officerInstructions` = '$officerInstructions', `isActive` = '$isActive', `allowKeepOpen` = '$allowKeepOpen', `requirePhoto` = '$requirePhoto', `reportIfMissed` = '$reportIfMissed' WHERE (`id` = '$id');";
        $execute = new Execute($query, 'execute');
        $result = $execute->result;
        if($result){
            if ($this->generate()) {
                return true;
            }
            else{ return false;}   //objects are not set
        } else {return false;}     //query is not executed

    }
    

    public function generate($id=''){
        if ($id == null && $this->id == null) { return false;} //when the id is not exists or passed
        if ($id == null && $this->id != null) { $id = $this->id;} //when id is exists but not passed

        $query = "SELECT * FROM falcon.property_checkpoints where id = '$id';";
        $execute = new Execute($query,"multiQuery");
        $result = ($execute->result)[0];
        if (!empty($result)) {
            //setting up all attributes in the class
            $this->id = $id;
            $this->generated = true;
            $this->name = $result['checkPointName'];
            $this->location = $result['checkPointLocation'];
            $this->QR_NFC_Value = $result['QR/NFCCodeValue'];
            $this->propertyAddress = $result['property_addresses_id'];
            $this->checkPointUnit = $result['chckpointUnit'];
            $this->checkPointIssueType = $result['checkpintIssueType'];
            $this->checkPointLastHint = $result['checkpointLastHint'];
            $this->reportNotes = $result['reportNote'];
            $this->officerInstructions = $result['officerInstructions'];
            $this->active = $result['isActive'];
            $this->allowKeepOpen = $result['allowKeepOpen'];
            $this->requirePhoto = $result['requirePhoto'];
            $this->reportIfMissed = $result['reportIfMissed'];

            return true;
        

        } else {
            return false;
        }
    }

}
//get from db, used for test create function
$property_addresses_id = '1';
$propertyID = '1';
$checkpintIssueType = '2';



$chp = new Checkpoint();
// $chp->create('1', 'chName', "street 1", 'c3ff', $property_addresses_id, 'chpointUnit', $checkpintIssueType, '1', 'Last hint of the checkpoint is here', 'Notes for the report', 'do good check for the entries', '1', '0', '1', '1');
$chp->generate('1');
            // ($checkPointName, $checkPointLocation, $QR_NFCCodeValue, $property_addresses_id, $chckpointUnit, $checkpintIssueType, $autoCreateIssueType, $checkpointLastHint, $reportNote, $officerInstructions, $isActive, $allowKeepOpen, $requirePhoto, $propertyCheckpointscol, $reportIfMissed ){

// $chp->update('chName', "street 1", 'c3ff', $property_addresses_id, 'chpointUnit', $checkpintIssueType, '1', 'Last hint of the checkpoint is here', 'Notes for the report', 'do good check for the entries', '1', '0', '1', '1');

echo $chp->QR_NFC_Value;







?>