<?php

class IssueTypes{
    public $id;

    public $name;

    public $description;

    public $addTo;

    public $fee;

    public $isActiveIssue;

    public $displayForDispatch;

    public $displayInHandheld;

    public $displayForWebusers;

    public $autoCloseIssue;

    public $restrictToCheckpoint;

    public $mainIssueTypes = array("Security","Parking","Maintenance");

    public $createdAt;

    public $updatedAt;

    public IssueLevels $level;

    public $getIssueTyes; //its going to be an array with object of IssueTypes Class, and Property Class.

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function update(){
        return 0;
    }

    public function create(){
        return 0;
    }
    
    public function generate(){
        return 0;
    }
}

?>