<?Php

require 'db.php';

class Group{
    public $id;
    public $name;
    public $groupGenerated;
    public $properties = array();
    public $users = array();        

    function __construct(){

    }

    function create($name){
        if ($name != null) {
            $query = "INSERT INTO `falcon`.`property_group` (`groupName`) VALUES ('$name');";
            $query.= "SELECT LAST_INSERT_ID() as id;";
            $result = new Execute($query, 'multiQuery');
            $id = ($result->result)[0]['id'];
            if($id != null && $this->generate($id)){ //set class variables and check if setted
                //echo "created:". $id;
                return true; 
            } else {
                $this->groupGenerated = "undifined";
                return false; //coudn't set/update the object info
            };
        }
    }

    function generate($id){
        if ($id != null) {
            $query = "SELECT * FROM falcon.property_group where id = '$id';";
            $result = new Execute($query, 'multiQuery');
            $fields = ($result->result)[0];
            print_r($fields);
            if(!empty($fields)){    //check in empty
                // $this->groupGenerated =true;
                $this->id = $fields['id'];
                $this->name = $fields['groupName'];
                $query2 = "SELECT property_id FROM falcon.property_group where property_group_id = '$id';";
                $result = new Execute($query2, 'multiQuery');
                $groups = $result->result;
                if (!empty($groups)){       //check in empty
                    foreach ($groups as $key => $row) {     //insert properties id,name into the array
                        $pID = $row['property_id'];
                        $q = "SELECT propertyName FROM falcon.properties where id = '$pID'";
                        $r = new Execute($q, 'multiQuery');
                        $property = ($r->result)[0];
                        if (!empty($property)) {            //assign name,id to the class array
                            $this->properties[$pID] = $property['propertyName'];
                        }


                    }
                }
               return true;
            }

        }
    }
}

$g = new Group();
$g->create("new group");






?>