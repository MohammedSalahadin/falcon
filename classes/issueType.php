<?php

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
    
    public function __construct()
    {
    }

    public function update(){
        return 0;
    }

    public function create($issueTypeName,$description,$issueFee,$issueLevel,$issueType,$active,$dispatch,$handheld,$webUsers,$autoClose,$checkPointOnly,$addTo)
    {
        try {
            $dbConn = new db();
            $conn = $dbConn->getConnection();
            $conn->begin_transaction(); 

            $query = "INSERT INTO `falcon`.`issue_types` (`issueTypeName`, `issueDescription`, `issueFee`, `issueLevel`, `issue_type`, `isActiveIssue`, `displayForDispach`, `displayOnHandheld`, `displayForWebUsers`, `autoCloseIssue`, `restrictToCheckpointOnly`) 
            VALUES ('$issueTypeName','$description','$issueFee','$issueLevel','$issueType','$active','$dispatch','$handheld','$webUsers','$autoClose','$checkPointOnly');" ; 

                if ($conn->query($query)) { // issueType has been Created
                    echo $this->id."<br>";
                    $this->name = $issueTypeName;
                    echo $this->name."<br>";

                    switch ($addTo) {
                        case 'current':
                            $query1 = "INSERT INTO `falcon`.`property_has_issue_types` (`property_id`, `issue_types_id`) 
                            VALUES ('$this->id', '$conn->insert_id'); ";
                                if($conn->query($query1)){ // added the most recent added issueType to the current property
                                    echo " added the most recent added issueType to the current property ";
                                }
                            break;
                        case 'allproperties':
                            $query2 = "INSERT INTO `falcon`.`property_group_has_issue_types` (`property_group_id`, `issue_type_id`) 
                            VALUES ('1', '$conn->insert_id'); ";
                                if($conn->query($query2)){ // added the most recent added issueType to all properties
                                    echo " added the most recent added issueType to all properties ";
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
    
    public function generate(){
        return 0;
    }
}

?>