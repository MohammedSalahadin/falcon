<?php

require_once 'db.php';

/* 
Alert object is automaticly created with the property; therefore we should include that in the create function
of the property,
Creating: when creating the alert for the first time,it only requires the property_id.
Updating: When updating the alert it requries previous alert id, minimumIssuesCreatedPerHour & 
multidimentional array of weekTimes
*/

class Alert{
    public $id;
    public $reportIfMissed;
    public $property;           //property ID
    public $MinAnlertPerHour;   
    public $weekTimes;          // Multidimentional array holds the times and days

    public function __construct(){}

    //this function is called when saving the alert
    public function update($id,$minimumIssuesCreatedPerHour,$weekTimes){
        $weekTimesEn = json_encode($weekTimes);
        $query = "UPDATE `falcon`.`alert` SET `minimumIssuesCreatedPerHour` = '$minimumIssuesCreatedPerHour', `weekTimes` = '$weekTimesEn' WHERE (`id` = '$id');";
        $result = (new Execute($query, 'execute'))->result;
        if ($result) {
            if ($this->generate($id)) {
                return true;
            } else {
                return false;   // failed  to generate the info
            }
        } else {
            return false;//failed to run the sql code
        }
    }

    //create is automaticly called when the propery is created, to have the record in the database
    public function create($property_id){

        $weekTimes = array(
            "sun" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
            "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
            "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),
       
            "mon" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
            "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
            "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),
       
            "tue" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
            "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
            "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),
       
            "wed" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
            "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
            "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),
       
            "thu" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
            "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
            "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),
       
            "fri" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
            "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
            "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),
       
            "sat" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
            "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
            "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),
               
       );
       $minimumIssuesCreatedPerHour = 0; //0 means no alert
        
        $weekTimesEn = json_encode($weekTimes);

        $query = "INSERT INTO `falcon`.`alert` (`property_id`, `minimumIssuesCreatedPerHour`, `weekTimes`) 
        VALUES ('$property_id', '$minimumIssuesCreatedPerHour', '$weekTimesEn');";
        $query .= "SELECT LAST_INSERT_ID() as id";
        $id = ((new Execute($query, "multiQuery"))->result)[0]['id'];

        if ($id > 0) {
            if($this->generate($id)){
                return true;
            }
            else {
                return false; // Filed when trying to 
            }
        } else {
            return false; //    filed when getting the id and executeing create query;
        }


    }

    public function generate($id = ''){
        if ($id < 1) {
            if (isset($this->id) && $this->id > 0) {
                $id = $this->id;
            } // when already generated
            else {
                echo "generate stopped";
                return false;
            }                                    // when not generated and not sent
        } // id valication

        $query = "SELECT * FROM alert where id = '$id';";
        $result = ((NEW Execute($query, "multiQuery"))->result)[0];
        if (!empty($result)) {
            $this->id = $id;
            // $this->reportIfMissed = $result[''];
            $this->property = $result['property_id'];           
            $this->MinAnlertPerHour = $result['minimumIssuesCreatedPerHour'];   
            $this->weekTimes = json_decode($result['weekTimes']);
            return true;
        } else {
            return false;
        }

    }

    
    public function sendTestNotification(){

    }

}

//      TESTING     //

/* $weekTimes = array(
     "sun" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
     "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
     "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),

     "mon" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
     "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
     "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),

     "tue" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
     "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
     "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),

     "wed" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
     "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
     "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),

     "thu" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
     "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
     "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),

     "fri" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
     "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
     "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),

     "sat" => array("1:00" => 0,"2:00" => 0,"3:00" => 0,"4:00" => 0,"5:00" => 0,"6:00" => 0,"7:00" => 0,"8:00" => 0,"9:00" => 0,"10:00" => 0,
     "11:00" => 0,"12:00" => 0,"13:00" => 0,"14:00" => 0,"15:00" => 0,"16:00" => 0,"17:00" => 0,"18:00" => 0,"19:00" => 0,"20:00" => 0,
     "21:00" => 0,"22:00" => 0,"23:00" => 0,"24:00" => 0,),
        
); */

// $alert = new Alert();

//create
// $alert->create('1');


//  Update
// $alertID = '1';
// $minimumIssuesCreatedPerHour = '3';

// $alertUpdate = $alert->update($alertID,$minimumIssuesCreatedPerHour,$weekTimes);

// if ($alertUpdate) {
//     echo "alert updated";
// } else {
//     echo "Not updated";
// }