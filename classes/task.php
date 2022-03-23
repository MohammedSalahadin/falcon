<?php

require_once 'db.php';

class Task
{
    public $id;
    public $taskName;
    public $issueType;      //id of issue type
    public $description;
    public $propertyAddress_id;    //id of the property address
    public $unitNumber_id;
    public $location;
    public $phone;
    public $time;
    public $taskDays;                   //id
    public $taskDaysOfWeek = array();    // array of the days
    public $alertIfLeftOpen;
    public $disableAfterThisDate;
    public $status;                     //active or not Active
    private $conn;

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
        $query = "INSERT INTO `falcon`.`taskdaysofweek` (`sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) 
        VALUES ('$sun', '$mon', '$tue', '$wed', '$thu', '$fri', '$sat');";

        if ($this->conn->query($query)) {
            $tourDaysOfWeek_id = $this->conn->insert_id;
            if ($tourDaysOfWeek_id > 0) {
                return $tourDaysOfWeek_id;
            } else {
                return 0;
            }
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
        $query = "UPDATE `falcon`.`taskdaysofweek` SET `sunday` = '$sun', `monday` = '$mon', `tuesday` = '$tue', `wednesday` = '$wed', `thursday` = '$thu', `friday` = '$fri', `saturday` = '$sat' WHERE (`id` = '$id');";
        if ($this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    private function generateDaysOfWeek($id)
    {
        $query = "SELECT * FROM falcon.taskdaysofweek where id = '$id';";
        $result = ((new Execute($query, "multiQuery"))->result)[0];
        if (!empty($result)) {
            $this->taskDaysOfWeek = array(); //reset days
            $this->taskDaysOfWeek['sun'] = $result['sunday'];
            $this->taskDaysOfWeek['mon'] = $result['monday'];
            $this->taskDaysOfWeek['tue'] = $result['tuesday'];
            $this->taskDaysOfWeek['wed'] = $result['wednesday'];
            $this->taskDaysOfWeek['thu'] = $result['thursday'];
            $this->taskDaysOfWeek['fri'] = $result['friday'];
            $this->taskDaysOfWeek['sat'] = $result['saturday'];
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
        if (Execute::checkIdInTable('id', $id, 'taskdaysofweek')) {
            return $id;
        } else {
            return 0;
        }
    }

    public function create(
        $taskName,
        $issueType,
        $description,
        $propertyAddress_id,
        $unitNumber_id,
        $location,
        $time,
        $taskDays,
        $alertIfLeftOpen,
        $disableAfterThisDate,
        $status
    ) {
        if ($this->id > 0) {
            return false;       //can't create object when it's alerady created
        }
        $this->conn = (new db())->getConnection();
        if ($this->conn->connect_error) // checking database connection
        {
            echo " Connection to the database was NOT successfull ";
            return false;
        }
        $this->conn->begin_transaction();

        if (!is_array($taskDays)) {
            return false;
        } //checkpoints should be array and shouldn't be empty

        // insert days into the db and get the id
        $taskDaysOfWeek_id = $this->createDaysOfWeek($taskDays);
        if ($taskDaysOfWeek_id < 1) {
            $this->conn->rollback();
            $this->conn->close();
            echo "Coudn't insert the weeks days; got this id: $taskDaysOfWeek_id";
            return false;
        }

        $query = "INSERT INTO `falcon`.`tasks` (`taskName`, `issue_types_id`, `taskDescription`, `property_addresses_id`,  `location`, `taskTime`, `taskDaysOfWeek_id`, `alertIfLeftOpen`, `disableTaskAfterDate`, `isActive`)
        VALUES ('$taskName', '$issueType', '$description', '$propertyAddress_id', '$location', '$time', '$taskDaysOfWeek_id', '$alertIfLeftOpen', '$disableAfterThisDate', '$status');";
        // print_r($execute->result);
        if ($this->conn->query($query)) {

            $id = $this->conn->insert_id;
            if ($id > 0) {
                $this->conn->commit();
                $this->conn->close();
                if ($this->generate($id, $taskDaysOfWeek_id)) {
                    return true;
                } else {
                    echo "data inserted but not generated!";
                }
            } else {
                $this->conn->rollback();
                $this->conn->close();
                return false;
            }
        } else {
            $this->conn->rollback();
            $this->conn->close();
            return false;
        }
    }

    public function update(
        $id,
        $taskName,
        $issueType,
        $description,
        $propertyAddress_id,
        $unitNumber_id,
        $location,
        $time,
        $taskDaysOfWeek_id,
        $taskDays,
        $alertIfLeftOpen,
        $disableAfterThisDate,
        $status
    ) {
        $this->conn = (new db())->getConnection();
        $this->conn->begin_transaction();

        $taskDaysOfWeek_id = $this->updateDaysOfWeek($taskDaysOfWeek_id, $taskDays);
        if ($taskDaysOfWeek_id < 1) {
            $this->conn->rollback();
            $this->conn->close();
            echo "Coudn't insert the weeks days; got this id: $taskDaysOfWeek_id";
            return false;
        }

        $query = "UPDATE `falcon`.`tasks` SET `taskName` = '$taskName', `issue_types_id` = '$issueType', `taskDescription` = '$description', `property_addresses_id` = '$propertyAddress_id', `location` = '$location', `taskTime` = '$time', `alertIfLeftOpen` = '$alertIfLeftOpen', `disableTaskAfterDate` = '$disableAfterThisDate', `isActive` = '$status' WHERE (`id` = '$id');";
        if ($this->conn->query($query)) {
            $this->conn->commit();
            $this->conn->close();
            if ($this->generate($id, $taskDaysOfWeek_id)) {
                return true;
            } else {
                echo "data updated but not generated! ";
            }
        } else {
            $this->conn->rollback();
            $this->conn->close();
        }
    }

    public function generate($id = '', $taskDaysOfWeek_id = '')
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
        $query = "SELECT * FROM falcon.tasks where id = '$id';";
        $execute = new Execute($query, 'multiQuery');
        $result = ($execute->result)[0];
        if (!empty($result)) {
            $this->id = $id;
            $this->taskName = $result['taskName'];
            $this->issueType = $result['issue_types_id'];     //id of issue type
            $this->description = $result['taskDescription'];
            $this->propertyAddress = $result['property_addresses_id'];    //id of the property address
            $this->unitNumber = $result['unites_id'];
            $this->location = $result['location'];
            // $this->phone = $result[''];
            $this->time = $result['taskTime'];
            $this->taskDays = $result['taskDaysOfWeek_id'];
            $this->alertIfLeftOpen = $result['alertIfLeftOpen'];
            $this->disableAfterThisDate = $result['disableTaskAfterDate'];
            $this->status = $result['isActive'];
            $this->generateDaysOfWeek($result['taskDaysOfWeek_id']);
            return true;
        } else {

            return false;
        }
    }



    public static function remove($id = '')
    {
        
    }
}
//test inputs attributes
$taskDays = array('sun' => 1, 'mon' => 0, 'tue' => 1, 'wed' => 0, 'thu' => 1, 'fri' => 0, 'sat' => 1);
$taskName = "Updated task";
$issueType = "1";
$description = "New task assignment desc.";
$propertyAddress_id = "1";
$unitNumber_id = "";
$location = '';
$time = "2:00:00";
$alertIfLeftOpen = 1;
$disableAfterThisDate = "2022-03-10 2:00:00"; //format YYYY-MM-DD hh:mm:ss 
$status = 1;


$task = new Task();

//Adding task
/* $createResult = $task->create(
    $taskName,
    $issueType,
    $description,
    $propertyAddress_id,
    $unitNumber_id,
    $location,
    $time,
    $taskDays,
    $alertIfLeftOpen,
    $disableAfterThisDate,
    $status
);

if ($createResult) {
    echo "$task->id created Sucessfully!";
} else {
    echo "coudn't create task";
}
 */

//  Updating Task
/* $id = '1';
$taskDaysOfWeek_id = "4";
$updateResult = $task->update(
    $id,
    $taskName,
    $issueType,
    $description,
    $propertyAddress_id,
    $unitNumber_id,
    $location,
    $time,
    $taskDaysOfWeek_id,
    $taskDays,
    $alertIfLeftOpen,
    $disableAfterThisDate,
    $status
);

if ($updateResult) {
    echo "updated successfully";
    echo $task->taskName;
} else {
    echo "Not Updated";
}
 */