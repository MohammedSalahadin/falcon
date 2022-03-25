<?php
use Twilio\TwiML\Voice\Echo_;

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

    public function create($id,$issueTypeName,$description,$issueFee,$issueLevel,$issueType,$active,$dispatch,$handheld,$webUsers,$autoClose,$checkPointOnly,$addTo)
    {
        if($this->generated == true){echo " this issueType has been generated before. ";return false;}
        try 
        {
            $dbConn = new db();
            $conn = $dbConn->getConnection();
            if($conn->connect_error){echo " Connection to the database was unsuccessfull ";return false;}
            $conn->begin_transaction();

            $currentDateTime = (new DateTime())->format('Y-m-d h:m:s');
            $query = "INSERT INTO `falcon`.`issue_types` (`issueTypeName`, `issueDescription`, `issueFee`, `issueLevel`, `issue_type`, `isActiveIssue`, `displayForDispach`, `displayOnHandheld`, `displayForWebUsers`, `autoCloseIssue`, `restrictToCheckpointOnly`,`createdAt`) 
            VALUES ('$issueTypeName','$description','$issueFee','$issueLevel','$issueType','$active','$dispatch','$handheld','$webUsers','$autoClose','$checkPointOnly','$currentDateTime');" ; 
            
            if ($conn->query($query)) // issueType has been Created
            {
                $this->createdAt = $currentDateTime;
                echo " IssueType has been Created Successfuly ";
                
                switch ($addTo) 
                {

                    case 'current':
                        $issueTypelastInsertedId = $conn->insert_id;
                        $query1 = "INSERT INTO `falcon`.`property_has_issue_types` (`property_id`, `issue_types_id`) 
                        VALUES ('$id', '$issueTypelastInsertedId'); ";

                            if($conn->query($query1)) // added the most recent added issueType to the current property
                            { 
                                echo " added the most recent added issueType to the current property ";
                            }
                            else {return false;}
                        break;

                    case 'allproperties':
                        //echo $conn->insert_id." ";
                        $issueTypelastInsertedId = $conn->insert_id;
                        $query2 = "INSERT INTO `falcon`.`property_group_has_issue_types` (`property_group_id`, `issue_type_id`) 
                        VALUES ('1', '$issueTypelastInsertedId'); ";

                            if($conn->query($query2)) // added the most recent added issueType to all properties
                            { 
                                echo " added the most recent added issueType to all properties ";
                            }
                            else {return false;}
                        break;

                    default:
                        echo "wrong command: $addTo, use 'current' or 'allproperties'";
                        break;
                }
            }
        $conn->commit();
        if ($this->generate($issueTypelastInsertedId)) //generate info
        {
            echo " Generate based on updated issueType ";
        }
        else {return false;}
        $conn->close();
        return true;
        } 
        catch (\Throwable $th) 
        {
            $conn->rollback();
            $conn->close();
            echo $th;
            return false;
        }
    }

    public function generate($id){
        echo" Before Conditions ";
        if ($id<1) { return false;}
        echo" first condition is okay ";
        if(!Execute::checkIdInTable('issue_type_id',$id, 'issue_types')){return false;}
        echo" second condition is okay ";
        try 
        {
            echo " Generate variable's value Before Generating -> ".$this->generated; 
            $this->generated = true;
            echo " Generate variable's value After Generating -> ".$this->generated; 

            $query = "SELECT * FROM issue_types where issue_type_id = '$id';";
            $execute = new Execute($query, "multiQuery");
            $result = ($execute->result)[0];

            echo " This property's ID Before Generate -> ".$this->id;
            $this->id = $id;
            echo " This property's ID After Generate -> ".$this->id;

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
            $this->mainIssueTypes = $result['issue_type'];
    
            return true;
        } 
        catch (\Throwable $th) 
        {
            echo " Something went wrong while generating " ;
            return false;
        }
 
    }

    public function update($description,$issueFee,$issueLevel,$active,$dispatch,$handheld,$webUsers,$autoClose,$checkPointOnly){
        
        if($this->generated == false){echo "this issueType has not been generated before, so you can't update it. ";return false;} //stop,  
       
        try 
        {
            $currentDateTime = (new DateTime())->format('Y-m-d h:m:s');
            //echo $currentDateTime ."<br> This is the current time/date and this is the id of the current object -> ".$this->id;

            if(!Execute::checkIdInTable('issue_type_id',$this->id, 'issue_types')){echo " The IssueType you're trying to update doesn't exist " ;return false;}

            $query = "UPDATE falcon.issue_types SET issueDescription = '$description', issueFee = '$issueFee', issueLevel = '$issueLevel', 
            isActiveIssue = '$active', displayForDispach = '$dispatch', displayOnHandheld = '$handheld',
            updatedAt = '$currentDateTime' WHERE (issue_type_id = '$this->id');";

            //$execute = new Execute($query,"execute");
            if ((new Execute($query,"execute"))->result) // if the IssueType has been updated
            { 
                echo " The IssueType has been updated successfully ";
                $this->updatedAt = $currentDateTime;
                $this->generate($this->id); // generate info based on the updated data
                return true;
            } 
            else 
            {
                echo " Something went wring while executing the query ";
                return false;
            }
        } 
        catch (\Throwable $th) 
        {
            echo " Something went wrong while updating ";
            return false;
        }
    }
    public function checkIfGenerated(){ //this function doesn't work for some reason. as in theres no output value for it.
        return "Check if this issueType has been generated before-> ".$this->generated;
    }
    
}

// if(!$it->generate('6')){
//     echo "Not generated";
// }
/// CREATE AND UPDATE issueType ONLY THROUGH PROPERTY 
?>