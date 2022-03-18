<?php

require 'db.php';

/*
    When creating a new tour you should pass array of the checkpoints ids in order to add them to the tour

    You should pass tour days id, which is a row inside the 
*/

class Tours{
    public $id;
    public $property_id;
    public $tourName;
    public $tourDescription;
    public $tourStartTime;
    public $tourEndTime;
    public $allowManualSubmission;
    public $isActiveTour;
    public $tourDaysOfWeek_id;
    public $checkpoints = array();
    public $tourDaysOfWeek = array(); //sotre days of week ['sun'=>0, 'mon'=>1 .. etc]
    private $generated = false;

    public function __construct()
    {}

    // last attrebute recives an array of checkpoints ids
    public function create($property_id, $tourName, $tourDescription, $tourStartTime, $tourEndTime, $allowManualSubmission, $isActiveTour, $tourDaysOfWeek_id, $checkpoints){  
        if ($this->generated ){ return false;};
        // print_r($tourDaysOfWeek_id);
        if (!is_array($checkpoints)) { return false;}//checkpoints should be array and shouldn't be empty
        if ($tourDaysOfWeek_id < 1) { return false;}//checkpoints should be array and shouldn't be empty

        
        

        $query = "INSERT INTO `falcon`.`property_tours` (`property_id`, `tourName`, `tourDescription`, `tourStartTime`, `tourEndTime`, `allowManualSubmission`, `isActiveTour`, `tourDaysOfWeek_id`) VALUES ('$property_id', '$tourName', '$tourDescription', '$tourStartTime', '$tourEndTime', '$allowManualSubmission', '$isActiveTour', '$tourDaysOfWeek_id');";
        $query .= "SELECT LAST_INSERT_ID() as id";

        //later setting the transaction
        $execute = new Execute($query, 'multiQuery');
        $id = ($execute->result)[0]['id'];
        //check if the data is inserted, check if the 
        if ($id > 0 ) {
            //inserting the property_tours_has_property_checkpoints to db
            foreach ($checkpoints as $key => $checkpoint) {
                $query = "INSERT INTO `falcon`.`property_tours_has_property_checkpoints` (`property_tours_id`, `property_checkpoints_id`) 
                VALUES ('$id', '$checkpoint');";
                $execute = new Execute($query, "execute");
            }
            
            if($this->generate($id)){
                return true;
            }
            else { return false;}
        }else { return false;}
    }


    public function update(){

    }

    
    public function generate($id= ''){
        if ($id < 1) {echo "id is less than 0";return false;}
        //getting information and assign it to the objects
        $query = "SELECT * FROM falcon.property_tours where id = '$id';";
        $execute = new Execute($query, 'multiQuery');
        $result = ($execute->result)[0];
        if (!empty($result)) {
            $this->id = $id;
            $this->property_id = $result['property_id'];
            $this->tourName = $result['tourName'];
            $this->tourDescription = $result['tourDescription'];
            $this->tourStartTime = $result['tourStartTime'];
            $this->tourEndTime = $result['tourEndTime'];
            $this->allowManualSubmission = $result['allowManualSubmission'];
            $this->isActiveTour = $result['isActiveTour'];
            $this->tourDaysOfWeek_id = $result['tourDaysOfWeek_id'];
            
            //getting assigned checkpoints from property_tours_has_property_checkpoints and assign them to the $checkpionts array
            $query = "SELECT * FROM falcon.property_tours_has_property_checkpoints where property_tours_id = '$id';";
            $execute2 = new Execute ($query , "multiQuery");
            $result2 = $execute2->result;
            if (!empty($result2)) {
                
                //reset checkpoints
                $this->checkpoints = array();
                foreach ($result2 as $key => $checkpoint) {
                    $this->checkpoints[] = $checkpoint['property_checkpoints_id'];
                }

            //make true when checkpoints are setted
            $this->generated = true;
            return true;
            }
            else { return false;}
        }else {return false;}

        
    }
}
$property_id = '1';$tourName = 'first tour';$tourDescription='this is first tour';$tourStartTime= '10:00 pm';
$tourEndTime = '11:00 pm'; $allowManualSubmission = '1'; $isActiveTour = '1';
//get from front-end arrange to array
$tourDaysOfWeek = array('sun' => 0, 'mon' => 0,'tue' => 0,'wed' => 0,'thu' => 0,'fri' => 0,'sat' => 0);
$checkpoints = array(1,2,3,4);

//should create the id of the selected days and then pass it to the object
function createDaysOfWeek($TDOW){
    if (!is_array($TDOW) || empty($TDOW)) { return false;}
    $sun = $TDOW['sun'];$mon = $TDOW['mon'];$tue = $TDOW['tue'];$wed = $TDOW['wed'];$thu = $TDOW['thu'];
    $fri = $TDOW['fri'];$sat = $TDOW['sat'];
    $query = "INSERT INTO `falcon`.`tourdaysofweek` (`sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) 
    VALUES ('$sun', '$mon', '$tue', '$wed', '$thu', '$fri', '$sat');";
    $query .= "SELECT LAST_INSERT_ID() as id";
    $execute = new Execute($query, "multiQuery");
    $tourDaysOfWeek_id = ($execute->result)[0]['id'];
    if ($tourDaysOfWeek_id > 0 ){
        return $tourDaysOfWeek_id;
    } else { return 0;}

}
//in case of updating
function checkDaysOfWeekId($id){
    if($id < 1 ){return false;}
    if (Execute::checkIdInTable('id', $id, 'tourdaysofweek')) {
        return $id;
    } else { return 0;}
}

// create days of week from the form input/ check days weeks id.
$testId = '2';
if(checkDaysOfWeekId($testId) > 0){
    $tourDaysOfWeek_id = $testId;
    $tours  = new Tours();
    $create = $tours->create($property_id, $tourName, $tourDescription, $tourStartTime, $tourEndTime, $allowManualSubmission, $isActiveTour, $tourDaysOfWeek_id, $checkpoints);
    if ($create){
        echo "created";
    } else { echo "not created";}

}













?>