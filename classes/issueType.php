<?php
use Twilio\TwiML\Voice\Echo_;

require 'db.php';
class IssueType{
    public $id;
    public $name;
    public $description;
    public $priority;
    public $fee;
    public $isActiveIssue;
    public $displayForDispatch;
    public $displayInHandheld;
    public $displayForWebusers;
    public $autoCloseIssue;
    public $restrictToCheckpoint;
    public $mainIssueTypes;  // "Security","Parking","Maintenance"
    public $createdAt;
    public $updatedAt;
    public $level;
    public $getIssueTyes; //its going to be an array with object of IssueTypes Class, and Property Class.
    private $generated = false; //bool

    public function checkIfGenerated(){
        return "Has this object's issueType been generated before? -> ".$this->generated;
    }
    
    public function __construct()
    {
    }

    public function update($description,$issueFee,$issueLevel,$active,$dispatch,$handheld,$webUsers,$autoClose,$checkPointOnly){
        
        if($this->generated == false){echo "this objects issueType has not been generated yet, so you can't update it. ";return false;} //stop,  
       
        try {
            $currentDateTime = (new DateTime())->format('Y-m-d h:m:s');
            //echo $currentDateTime ."<br> This is the current time/date and this is the id of the current object -> ".$this->id;

            $query = "UPDATE falcon.issue_types SET issueDescription = '$description', issueFee = '$issueFee', issueLevel = '$issueLevel', 
            isActiveIssue = '$active', displayForDispach = '$dispatch', displayOnHandheld = '$handheld',
            updatedAt = '$currentDateTime' WHERE (issue_type_id = '$this->id');";


            $execute = new Execute($query,"execute");
            $result = $execute->result;

            if ($result) { // if the IssueType has been updated
                echo " The IssueType has been updated successfully ";
                $this->generate($this->id);  //generate info based on the updated data
                return true;
            } else {
                echo "not updated";
                return false;
            }
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }
    }

    public function createIssueType($issueTypeName,$description,$issueFee,$issueLevel,$issueType,$active,$dispatch,$handheld,$webUsers,$autoClose,$checkPointOnly,$addTo)
    {
        if($this->generated == true){echo "this objects issueType has been generated before, so you can't do it again. ";return false;}
        try {
            $dbConn = new db();
            $conn = $dbConn->getConnection();
            $conn->begin_transaction();

            $currentDateTime = (new DateTime())->format('Y-m-d h:m:s');
            $query = "INSERT INTO `falcon`.`issue_types` (`issueTypeName`, `issueDescription`, `issueFee`, `issueLevel`, `issue_type`, `isActiveIssue`, `displayForDispach`, `displayOnHandheld`, `displayForWebUsers`, `autoCloseIssue`, `restrictToCheckpointOnly`,`createdAt`) 
            VALUES ('$issueTypeName','$description','$issueFee','$issueLevel','$issueType','$active','$dispatch','$handheld','$webUsers','$autoClose','$checkPointOnly','$currentDateTime');" ; 
                
                if ($conn->query($query)) { // issueType has been Created
                    $this->createdAt = $currentDateTime;
                    echo "IssueType has been Created Successfuly at $this->createdAt <br>";
                    
                    switch ($addTo) {

                        case 'current':
                            $query1 = "INSERT INTO `falcon`.`property_has_issue_types` (`property_id`, `issue_types_id`) 
                            VALUES ('$this->id', '$conn->insert_id'); ";

                                if($conn->query($query1)){ // added the most recent added issueType to the current property
                                    echo " added the most recent added issueType to the current property<br> ";
                                    $this->generate($conn->insert_id);  //generate info
                                }
                            break;

                        case 'allproperties':
                            $query2 = "INSERT INTO `falcon`.`property_group_has_issue_types` (`property_group_id`, `issue_type_id`) 
                            VALUES ('1', '$conn->insert_id'); ";

                                if($conn->query($query2)){ // added the most recent added issueType to all properties
                                    echo " added the most recent added issueType to all properties<br> ";
                                    $this->generate($conn->insert_id);  //generate info
                                }
                            break;

                        default:
                            echo "wrong command: $addTo, use 'current' or 'allproperties'";
                            break;
                    }
                }
           $conn->commit();
           $conn->close();
           return true;
        } catch (\Throwable $th) {
            $conn->rollback();
            $conn->close();
            return false;
        }
    }

    public function generate($id){
        if ($id < 0) { return false;}
        if(!Execute::checkIdInTable('issue_type_id',$id, 'issue_types')){return false;}
        
        
        $this->generated = true;

        $query = "SELECT * FROM issue_types where issue_type_id = '$id';";
        $execute = new Execute($query, "multiQuery");
        $result = ($execute->result)[0];
        //print_r($result);
        $this->id = $id;
        $this->name= $result['issueTypeName'];
        $this->description= $result['issueDescription'];
        $this->fee= $result['issueFee'];
        $this->isActiveIssue= $result['isActiveIssue'];
        $this->displayForDispatch= $result['displayForDispach'];
        $this->displayInHandheld= $result['displayOnHandheld'];
        $this->displayForWebusers= $result['displayForWebUsers'];
        $this->autoCloseIssue= $result['autoCloseIssue'];
        $this->restrictToCheckpoint= $result['restrictToCheckpointOnly'];
        $this->level= $result['issueLevel'];
        //$this->createdAt= (new DateTime())->format('Y-M-D h:m:s'); this would be assigned even when you update, so i transfered it to create function.
        $this->mainIssueTypes = $result['issue_type'];

        return true;
    }
}

$it = new IssueType();
if(!$it->generate('6')){
    echo "Not generated";
}

// $it->update("Trying out update and generate",1.50,2,1,1,1,1,0,0);
//$result = $it->createIssueType("The new Create Func","Trying for all properties",1.50,2,"Security",1,1,1,1,0,0,"allproperties");

//echo $it->checkIfGenerated();
//echo $it->id;
// $something = $it->generate('1');

// if ($something){
//     echo "created";
// }

?>