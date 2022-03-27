<?php

//require_once 'db.php';

/*
    When creating a new tour you should pass array of the checkpoints ids in order to add them to the tour

    You should pass tour days id, which is a row inside the 
*/

class Tours
{
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
    {
    }
    //creating id of days weeks to use it in 
    private function createDaysOfWeek($TDOW)
    {
        if (!is_array($TDOW) || empty($TDOW)) {
            return false;
        }
        $sun = $TDOW['sun'];
        $mon = $TDOW['mon'];
        $tue = $TDOW['tue'];
        $wed = $TDOW['wed'];
        $thu = $TDOW['thu'];
        $fri = $TDOW['fri'];
        $sat = $TDOW['sat'];
        $query = "INSERT INTO `falcon`.`tourdaysofweek` (`sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) 
        VALUES ('$sun', '$mon', '$tue', '$wed', '$thu', '$fri', '$sat');";
        $query .= "SELECT LAST_INSERT_ID() as id";
        $execute = new Execute($query, "multiQuery");
        $tourDaysOfWeek_id = ($execute->result)[0]['id'];
        if ($tourDaysOfWeek_id > 0) {
            return $tourDaysOfWeek_id;
        } else {
            return 0;
        }
    }

    private function updateDaysOfWeek($id, $TDOW)
    {
        //input validation
        if (!is_array($TDOW) || empty($TDOW) || $id < 1) {
            echo "Not array or empty or id: $id";
            return false;
        }
        $sun = $TDOW['sun'];
        $mon = $TDOW['mon'];
        $tue = $TDOW['tue'];
        $wed = $TDOW['wed'];
        $thu = $TDOW['thu'];
        $fri = $TDOW['fri'];
        $sat = $TDOW['sat'];
        $query = "UPDATE `falcon`.`tourdaysofweek` SET `sunday` = '$sun', `monday` = '$mon', `tuesday` = '$tue', `wednesday` = '$wed', `thursday` = '$thu', `friday` = '$fri', `saturday` = '$sat' WHERE (`id` = '$id');";
        $execute = new Execute($query, 'execute');
        $result = $execute->result;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    //in case of updating
    private function checkDaysOfWeekId($id)
    {
        if ($id < 1) {
            return false;
        }
        if (Execute::checkIdInTable('id', $id, 'tourdaysofweek')) {
            return $id;
        } else {
            return 0;
        }
    }

    //get tours of week id 
    private function getToursOfWeek($tourID)
    {
        if ($tourID < 1) {
            return false;
        } // validation
        $query = "SELECT tourDaysOfWeek_id FROM falcon.property_tours where id = '$tourID'";
        $execute = new Execute($query, 'multiQuery');
        $id = ($execute->result)[0]['tourDaysOfWeek_id'];
        if ($id > 0) {
            return $id;
        } else {
            return false;
        }
    }


    // last attrebute recives an array  checkpoints ids, and daysOfWeeks .
    public function create(
        $property_id,
        $tourName,
        $tourDescription,
        $tourStartTime,
        $tourEndTime,
        $allowManualSubmission,
        $isActiveTour,
        $daysOfWeek,
        $checkpoints
    ) {
        if ($this->generated) {
            return false;
        };
        // print_r($tourDaysOfWeek_id);
        if (!is_array($checkpoints) || !is_array($daysOfWeek)) {
            return false;
        } //checkpoints should be array and shouldn't be empty
        //create weeks of day id
        $tourDaysOfWeek_id = $this->createDaysOfWeek($daysOfWeek);

        $query = "INSERT INTO `falcon`.`property_tours` (`property_id`, `tourName`, `tourDescription`, `tourStartTime`, `tourEndTime`, `allowManualSubmission`, `isActiveTour`, `tourDaysOfWeek_id`) VALUES ('$property_id', '$tourName', '$tourDescription', '$tourStartTime', '$tourEndTime', '$allowManualSubmission', '$isActiveTour', '$tourDaysOfWeek_id');";
        $query .= "SELECT LAST_INSERT_ID() as id";

        //later setting the transaction
        $execute = new Execute($query, 'multiQuery');
        $id = ($execute->result)[0]['id'];
        //check if the data is inserted, check if the 
        if ($id > 0) {
            //inserting the property_tours_has_property_checkpoints to db
            foreach ($checkpoints as $key => $checkpoint) {
                $query = "INSERT INTO `falcon`.`property_tours_has_property_checkpoints` (`property_tours_id`, `property_checkpoints_id`) 
                VALUES ('$id', '$checkpoint');";
                $execute = new Execute($query, "execute");
            }

            if ($this->generate($id)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function update($tourID, $tourName, $tourDescription, $tourStartTime, $tourEndTime, $allowManualSubmission, $isActiveTour, $tourDaysOfWeek, $checkpoints)
    {
        if (!$this->id < 1) {
            return false;
        } // if the id is not initilized
        if (!is_array($checkpoints) || !is_array($tourDaysOfWeek)) {
            return false;
        } //checkpoints should be array and shouldn't be empty
        //get tours 
        $toursDaysOfWeek_id =  $this->getToursOfWeek($tourID);

        $query = "UPDATE `falcon`.`property_tours` SET  `tourName` = '$tourName', `tourDescription` = '$tourDescription', `tourStartTime` = '$tourStartTime', `tourEndTime` = '$tourEndTime', `allowManualSubmission` = '$allowManualSubmission', `isActiveTour` = '$isActiveTour' WHERE (`id` = '$tourID');";
        $execute = new Execute($query, 'execute');
        $result = $execute->result;
        if ($result) {
            //update the days of week
            if ($this->updateDaysOfWeek($toursDaysOfWeek_id, $tourDaysOfWeek)) {
                if ($this->generate($tourID)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function generate($id = '')
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
            $query2 = "SELECT * FROM falcon.property_tours_has_property_checkpoints where property_tours_id = '$id';";
            $execute2 = new Execute($query2, "multiQuery");
            $result2 = $execute2->result;
            if (!empty($result2)) {

                //reset checkpoints
                $this->checkpoints = array();
                foreach ($result2 as $checkpoint) {
                    $this->checkpoints[] = $checkpoint['property_checkpoints_id'];
                }

                //make true when checkpoints are setted
                $this->generated = true;
                return true;
            } else {
                return true; // property tour donesn't have checkpoints
            }
        } else {

            return false;
        }
    }
}

// $property_id = '2';
// $tourName = 'update test 2';
// $tourDescription = 'update test have to include all data 2';
// $tourStartTime = '11:00 pm';
// $tourEndTime = '12:00 am';
// $allowManualSubmission = '0';
// $isActiveTour = '1';
// //get from front-end arrange to array
// $tourDaysOfWeek = array('sun' => 1, 'mon' => 0, 'tue' => 1, 'wed' => 0, 'thu' => 1, 'fri' => 0, 'sat' => 1);
// $checkpoints = array(1, 2, 3, 4);


// create days of week from the form input/ check days weeks id.

// $tours  = new Tours();
// $create = $tours->create($property_id, $tourName, $tourDescription, $tourStartTime, $tourEndTime,
//  $allowManualSubmission, $isActiveTour, $tourDaysOfWeek, $checkpoints);
// if ($create) {
//     echo "created";
// } else {
//     echo "not created";
// }

// $tourID = '2';
// $update = $tours->update($tourID, $tourName, $tourDescription, $tourStartTime, $tourEndTime,
// $allowManualSubmission, $isActiveTour, $tourDaysOfWeek, $checkpoints);

// if ($update) {
//     echo $tourID. " Have been updated";
//     echo $tours->id;echo $tours->tourName;
// } else {
//     echo "failed to update the tour: ".$tourID;
// }

// generating a new tour
// $tour = new Tours();
// if ($tour->generate('2')) {
//     echo $tour->id;
//     echo $tour->tourName;
// }
