<?Php

require 'db.php';

class Group{
    public $id;
    public $name;
    public $groupGenerated;
    public $properties = array();
    
    public function __construct(){

    }

    // create new group
    public function create($name){
        if ($name != null) {
            $query = "INSERT INTO `falcon`.`property_group` (`groupName`) VALUES ('$name');";
            $query.= "SELECT LAST_INSERT_ID() as id;";
            $result = new Execute($query, 'multiQuery');
            $id = ($result->result)[0]['id'];           //generate the object using the id
            if($id != null && $this->generate($id)){ //set class variables and check if setted
                //echo "created:". $id;
                return true; 
            } else {
                $this->groupGenerated = "undifined";
                return false; //coudn't set/update the object info
            };
        } else{
            return false;       //name is empty
        }
    }

    //generate group from id, if called without parameter
    public function generate($id=''){
        if ($id == '' && $this->id != null){ $id = $this->id;}                 //when call without id, use generated id
        if ($id != null) {
            $query = "SELECT * FROM falcon.property_group where id = '$id';";
            $result = new Execute($query, 'multiQuery');
            $fields = ($result->result)[0];
            if(!empty($fields)){    //check in empty
                $this->groupGenerated =true;
                $this->id = $fields['id'];
                $this->name = $fields['groupName'];
                $query2 = "SELECT property_id FROM falcon.group_has_properties where property_group_id = '$id';";
                $result = new Execute($query2, 'multiQuery');
                $groups = $result->result;
                // print_r($query2);
                if (!empty($groups)){                       //check in empty
                    $this->properties = array();            //clear content, prevent duplication
                    foreach ($groups as $key => $row) {     // set array of properties in this group
                        $pID = $row['property_id'];
                        $q = "SELECT propertyName FROM falcon.properties where id = '$pID'";
                        $r = new Execute($q, 'multiQuery');
                        $property = ($r->result)[0];
                        if (!empty($property)) {            //assign name,id to the class array
                            $this->properties[$pID] = $property['propertyName'];
                        }
                    }
                    // echo "done";
                    // print_r($this->properties);
                }
               return true;
            }
            $this->id = $id;    //setup the class id

        }
    }

    //remove current group
    public function delete(){
        if (!$this->groupGenerated){ return false;}             //stop when group is not generated
        //remove all records from  group_has_properties table
        $query = "delete from group_has_properties where property_group_id = '$this->id';";
        $result = new Execute($query, 'execute');
        if ($result->result) {//rows are removed from group_has_properties
            //remove the 
            $query2= "delete from property_group where id='$this->id';";
            $result2 = new Execute($query, 'execute');
            if ($result2->result) { return true;}
            else { return false;}
        }
        else { //row were not removed from group_has_properties table
            return false;
        }

    }

    public function addProperty($propertyId){
        if ($this->id != null){
            $query = "INSERT INTO `falcon`.`group_has_properties` (`property_id`, `property_group_id`) VALUES ('$propertyId', '$this->id');";
            $result = new Execute($query, 'execute');
             //check if the inserted record has been added
            if ($result->result) {
                if($this->generate()){return true;}            //update the objects
                else {return false;}                           // objects not updated
                // echo "$propertyId added succesfully to $this->id group";
            }
            else {
                return false;
                // echo "$propertyId is not Added to: $this->id group";
            }
        } else {
            return false;  //generate or create the group first
        }
    }

    public function removeProperty($propertyId){
        if ($propertyId != null) {
            $query = "delete from group_has_properties where `property_id` = '$propertyId' and `property_group_id` = '$this->id';";
            $result = new Execute($query, 'execute');
             //check if the inserted record has been added
            if ($result->result) {
                if($this->generate()){return true;}            //update the objects
                else {return false;}                           // objects not updated
                // echo "$propertyId added succesfully to $this->id group";
            }
            else {
                return false;
                // echo "$propertyId is not Added to: $this->id group";
            }
            
        } else {
            return false;  //property id to remove is null
        }

    }
}

$g = new Group();
// $g->create("new group");
$g->generate('2');
// $g->addProperty('2');
// print_r($g->properties);
// $g->removeProperty('2');
// $g->delete();









?>