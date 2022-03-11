<?php

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
    public function __construct()
    {
    }

    public function update($issueTypeName,$description,$issueFee,$issueLevel,$issueType,$active,$dispatch,$handheld,$webUsers,$autoClose,$checkPointOnly){
        if($this->generated == false){return false;} //stop,  

        $query = "update issue_types set () where id= '$this->id;'";
    }

    public function create($issueTypeName,$description,$issueFee,$issueLevel,$issueType,$active,$dispatch,$handheld,$webUsers,$autoClose,$checkPointOnly,$addTo)
    {
        if($this->generated == true){return false;}

        try {
            $dbConn = new db();
            $conn = $dbConn->getConnection();
            $conn->begin_transaction(); 

            $query = "INSERT INTO `falcon`.`issue_types` (`issueTypeName`, `issueDescription`, `issueFee`, `issueLevel`, `issue_type`, `isActiveIssue`, `displayForDispach`, `displayOnHandheld`, `displayForWebUsers`, `autoCloseIssue`, `restrictToCheckpointOnly`) 
            VALUES ('$issueTypeName','$description','$issueFee','$issueLevel','$issueType','$active','$dispatch','$handheld','$webUsers','$autoClose','$checkPointOnly');" ; 
                if ($conn->query($query)) { // issueType has been Created
                    // echo $this->id."<br>";
                    
                    $this->name = $issueTypeName;
                    // echo $this->name."<br>";
                    echo $conn->insert_id;
                    switch ($addTo) {
                        case 'current':
                            $query1 = "INSERT INTO `falcon`.`property_has_issue_types` (`property_id`, `issue_types_id`) 
                            VALUES ('$this->id', '$conn->insert_id'); ";
                            
                                if($conn->query($query1)){ // added the most recent added issueType to the current property
                                    echo " added the most recent added issueType to the current property ";
                                    $this->generate($conn->insert_id);  //generate info
                                }

                            break;
                        case 'allproperties':
                            $query2 = "INSERT INTO `falcon`.`property_group_has_issue_types` (`property_group_id`, `issue_type_id`) 
                            VALUES ('1', '$conn->insert_id'); ";
                                if($conn->query($query2)){ // added the most recent added issueType to all properties
                                    echo " added the most recent added issueType to all properties ";
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

        } catch (\Throwable $th) {
            $conn->rollback();
            $conn->close();
            return false;
        }
    }

    
    public function generate($id){
        if ($id < 0) { return false;}
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
        $this->createdAt= (new DateTime())->format('Y-M-D h:m:s');
        $this->mainIssueTypes = $result['issue_type'];

        return true;
            
    }
}


$it = new IssueType();
// $it->create("secondAddedViaProg","Trying for all properties",1.50,2,"Security",1,1,1,1,0,0,"allproperties");
$it->generate($id);


// $something = $it->generate('1');

// if ($something){
//     echo "created";
// }

?>