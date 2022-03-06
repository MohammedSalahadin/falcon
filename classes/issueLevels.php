<?php

class IssueLevels{

    public $id;

    public $name;

    public $priority;

    public $color;

    public $string;

    public $createdAt;

    public $updatedAt;
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function generate(){
        return 0;
    }



}

?>