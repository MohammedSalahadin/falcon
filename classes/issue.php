<?php


class Issue
{
    public $id;
    public $propertyName;
    public $createdDate;
    public $location;
    public $reportedAddress;
    public $approxAccuranceTime;
    public $status;
    public $assignedDate;
    public $ack; //acknowledgement
    public $arrivedDate;
    public $closed;
    public $photos;
    public $audio;
    public $notes;
    public $gpsLongitude;
    public $gpsLatitude;
    public $issueType; //object of IssueTypes Class
    public $createdBy; //its going to be object of User Class
    public $assignedTo; //its going to be object of User Class
    public $actualAddress; //its going to be object of Address Class
    public $issueGenerated = false; //bool


    public function __construct()
    {
    }
    public function create()
    {
        $query = "INSERT INTO `falcon`.`issues` (`properties_id`, `issue_types_id`, `reportedDetail`, `location`, `reportedAddress`, 
        `approxOccurrenceTime`, `property_addresses_id`, `status`, `created`, `assigned`, `ack`, `arrived`, `closed`, `createdBy`, `assignedTo`, 
        `gpsLongitude`, `gpsLatitude`) VALUES ('id', 'id', 'detail about the report', 'Location', 'address', 
        'i don't know', 'id', 'open', 'created at', 'some user', 'accepted', '1', '0', 'some user', 'some user', 'some gps', 'some gps'); ";
    }

    public function generate($id)
    {
        if ($id < 0) { return false;}
        $this->issueGenerated = true;

        $query = "SELECT * FROM issues where issue_id = '$id';";
        $execute = new Execute($query, "multiQuery");
        $result = ($execute->result)[0];
        print_r($result);
        $this->id = $id;
        $this->propertyName= $result['issueTypeName'];
        $this->createdDate= $result['issueDescription'];
        $this->location= $result['issueFee'];
        $this->reportedAddress= $result['isActiveIssue'];
        $this->approxAccuranceTime= $result['displayForDispach'];
        $this->status= $result['displayOnHandheld'];
        $this->assignedDate= $result['displayForWebUsers'];
        $this->ack= $result['autoCloseIssue'];
        $this->arrivedDate= $result['restrictToCheckpointOnly'];
        $this->closed= $result['issueLevel'];
        //$this->createdAt= (new DateTime())->format('Y-M-D h:m:s'); this would be assigned even when you update, so i transfered it to create function.
        $this->photos = $result['issue_type'];
        $this->audio = $result['issue_type'];
        $this->notes = $result['issue_type'];
        $this->gpsLongitude = $result['issue_type'];
        $this->gpsLatitude = $result['issue_type'];
        $this->issueType = $result['issue_type'];
        $this->createdBy = $result['issue_type'];
        $this->assignedTo = $result['issue_type'];
        $this->actualAddress = $result['issue_type'];
        return true;
    }

    public function assignTo()
    {
        return 0;
    }

    public function addNote()
    {
        return 0;
    }

    function sendEmail()
    {
        return 0;
    }

    function print()
    {
        return 0;
    }

    function close()
    {
        return 0;
    }

    function gps()
    {
        return 0;
    }

}

?>