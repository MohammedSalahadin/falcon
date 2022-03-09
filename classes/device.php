<?php

require 'db.php';

class Device{
    private $generated;
    public $id;
    public $status = 0;         //bool, Aproved: true/false
    public $name;
    public $registered;     //bool
    public $lastLogin;
    public $phoneNumber;
    public $deviceID;
    public $os;
    public $carrierName;
    public $activationHistory;     //activation history
    public $friendlyName;
    public $userZebraPrinter = 0;                     //bool
    public $barcodeScanner = 1;   //bool
    public $requireGPS = 1;                    // default false
    public $userAutoFocus = 1;                 // default false
    public $active = 1;                                // default true;
    
    // First time creating device it will be un active,
    public function create($os='', $phoneNumber){
        $query = "INSERT INTO `falcon`.`devices` (`status`, `phoneNumber`, `userZebraPrinter`, `requireGPS`, `userAutoFocus`, `barcodeScanner`, `active`) VALUES ('$this->status', '$phoneNumber', '$this->userZebraPrinter', '$this->requireGPS', '$this->userAutoFocus', '$this->barcodeScanner', '$this->active');";
        $query.= "SELECT LAST_INSERT_ID() as id;";
        $result = new Execute($query, 'multiQuery');
        //check if the inserted record has been added
        $id = ($result->result)[0]['id'];
           if ($id > 0) {
                $this->generate($id);
           }
           else {
               return false;
               // echo "$propertyId is not Added to: $this->id group";
           }

    }
                              // default true;

    public function generate($id=''){
        if(Execute::checkIdInTable('id',$id,'devices')){
            $query = "SELECT * FROM falcon.devices where id='$id';";
            $execute = new Execute($query,'multiQuery');
            $result = ($execute->result)[0];
            if(!empty($result)){
                $this->generated = true;
                $this->id = $id;
                $this->status = $result['status'];         //bool, Aproved: true/false
                $this->name = $result['name'];
                $this->registered = $result['registered'];
                $this->lastLogin = $result['last Login'];
                $this->phoneNumber = $result['phoneNumber'];
                $this->deviceID = $result['deviceID'];
                // $this->os = $result[''];
                // $this->carrierName = $result[''];
                $this->activationHistory = $result['activationHistory'];
                $this->friendlyName = $result['friendlyName'];
                $this->userZebraPrinter  = $result['userZebraPrinter'];
                $this->barcodeScanner = $result['barcodeScanner'];
                $this->requireGPS  = $result['requireGPS'];
                $this->userAutoFocus  = $result['userAutoFocus'];              
                $this->active = $result['active']; 
                
                return true;
            }
            else {
                return false;
            }
        }
        else {                 // id is not exists
            return false;
        }
    }

    public function update($friendlyName, $userZebraPrinter, $requireGPS, $userAutoFocus, $barcodeScanner){
        if ($this->generated && $this->id != null) {
            $query = "UPDATE `falcon`.`devices` SET `friendlyName` = '$friendlyName', `userZebraPrinter` = '$userZebraPrinter', `requireGPS` = '$requireGPS', `userAutoFocus` = '$userAutoFocus', `barcodeScanner` = '$barcodeScanner' WHERE (`id` = '$this->id');";
            $execute = new Execute($query,"execute");
            $result = $execute->result;
            if ($result) {
                $this->generate($this->id);
                return true;
            } else{
                return false;
            }
        }
        else {
            //device info not generated
            return false;
        }
    }

    //requires to be created/generated
    public function approve(){
        if ($this->generated && $this->id != null) {
            $query = "UPDATE `falcon`.`devices` SET `status` = '1' WHERE (`id` = '$this->id');";
            $execute = new Execute($query, 'execute');
            $result = $execute->result;
            if ($result) {
                $this->status = '1';
                return true;
            }
            else { return false;}

        }
        else {
            return false;
        }

    }

    //requires to be created/generated
    public function disapprove(){
        if ($this->generated && $this->id != null) {
            $query = "UPDATE `falcon`.`devices` SET `status` = '0' WHERE (`id` = '$this->id');";
            $execute = new Execute($query, 'execute');
            $result = $execute->result;
            if ($result) {
                $this->status = '0';
                return true;
            }
            else { return false;}

        }
        else {
            return false;
        }

    }
}


// $d = new Device();
// $d->create('','098765678');
// $d->generate('6');
// if($d->approve()){echo "approved";}
// if($d->disapprove()){echo "disapproved";}
//  $d->update('New Friendly', '1', '0', '1', '1');
// echo $d->id;
//  echo $d->status;         //bool, Aproved: true/false
// echo $d->name;
// echo $d->registered;     //bool
// echo $d->lastLogin;
// echo $d->phoneNumber;
// echo $d->deviceID;
// echo $d->os;
// echo $d->carrierName;
// echo $d->activationHistory;     //activation history
// echo $d->friendlyName;
// echo $d->userZebraPrinter;                     //bool
// echo $d->barcodeScanner;   //bool
// echo $d->requireGPS;                    // default false
// echo $d->userAutoFocus;                 // default false
// echo $d->active;     
















?>