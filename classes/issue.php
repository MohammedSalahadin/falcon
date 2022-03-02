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

    public IssueTypes $issueType; //object of IssueTypes Class

    public $createdBy; //its going to be object of User Class

    public $assignedTo; //its going to be object of User Class

    public $actualAddress; //its going to be object of Address Class


    public function __construct($id)
    {
        $this->id = $id;
    }

    public function generate()
    {
        return 0;
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