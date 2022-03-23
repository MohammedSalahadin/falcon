<?php
//require_once 'db.php';

class Address
{
        public $id;
        public $property_id;
        public $streetNumber;
        public $streetName;
        public $streetTypeId;
        public $city;
        public $states_id;
        public $zip;
        public $country;
        public $buildingNumber;
        public $addressTypeId;
        public $GPSLongitude;
        public $GPSLatitude;

        public function create($property_id, $streetNumber, $streetName, $streetTypeId, $city, $states_id, $zip, $country, $buildingNumber, $addressTypeId, $GPSLongitude, $GPSLatitude)
        {
                if (isset($this->id) && $this->id > 0) { return false;}//create is called when creating new address only
                $query = "INSERT INTO `falcon`.`property_addresses` (`property_id`, `streetNumber`, `streetName`, `streetType_id`, `city`, `states_id`, `zip`, `country`, `buildingNumber`, `addresses_types_id`, `GPSLongitude`, `GPSLatitude`) 
                VALUES ('$property_id', '$streetNumber', '$streetName', '$streetTypeId', '$city', '$states_id', '$zip', '$country', '$buildingNumber', '$addressTypeId', '$GPSLongitude', '$GPSLatitude');";
                $query .= "SELECT LAST_INSERT_ID() as id;";
                echo $query;
                $id = ((new Execute($query, 'multiQuery'))->result)[0]['id'];
                if ($id > 0) {
                        if ($this->generate($id)) {
                                
                                return true;
                        } else {
                                return false;
                        }
                } else {
                        return false;
                }
        }

        public function update($id,$property_id, $streetNumber, $streetName, $streetTypeId, $city, $states_id, $zip, $country, $buildingNumber, $addressTypeId, $GPSLongitude, $GPSLatitude){
                if(!Execute::checkIdInTable('id', $id, 'property_addresses')){return false;}//Address validation
                
                $query = "UPDATE `falcon`.`property_addresses` SET `streetNumber` = '$streetNumber', `streetName` = '$streetName', `streetType_id` = '$addressTypeId', `city` = '$city', `states_id` = '$states_id', `zip` = '$zip', `country` = '$country', `buildingNumber` = '$buildingNumber', `addresses_types_id` = '$addressTypeId', `GPSLongitude` = '$GPSLongitude', `GPSLatitude` = '$GPSLatitude' WHERE (`id` = '$id');";
                $executed = (new Execute($query, "execute"))->result;
                if ($executed) {
                        if ($this->generate($id)) {
                                return true;
                        } else { return false;}
                }else { return false;}
        }

        public function generate($id = '')
        {
                if ($id < 1) {
                        if (isset($this->id) && $this->id > 0){$id = $this->id;}                         // when already generated
                        else { echo "generate stopped, incomming id: $id";return false;}                 // when not generated and not sent
                }

                $query = "SELECT * FROM falcon.property_addresses  where id = '$id' ";
                $result = ((new Execute($query, 'multiQuery'))->result)[0];
                if (!empty($result)) {
                        $this->id = $id;
                        $this->property_id = $result['property_id'];
                        $this->streetNumber = $result['streetNumber'];
                        $this->streetName = $result['streetName'];
                        $this->streetTypeId = $result['streetType_id'];
                        $this->city = $result['city'];
                        $this->states_id = $result['states_id'];
                        $this->zip = $result['zip'];
                        $this->country = $result['country'];
                        $this->buildingNumber = $result['buildingNumber'];
                        $this->addressTypeId = $result['addresses_types_id'];
                        $this->GPSLongitude = $result['GPSLongitude'];
                        $this->GPSLatitude = $result['GPSLatitude'];
                        return true;
                }
                else {
                        return false;
                }
                
        }

        public function remove($id = ''){
                if ($id < 1) {
                        if (isset($this->id) && $this->id > 0){$id = $this->id;}                         // when already generated
                        else { echo "generate stopped, incomming id: $id";return false;}                 // when not generated and not sent
                }
                $query = "DELETE FROM `falcon`.`property_addresses` WHERE (`id` = '2');";
                $executed = (new Execute($query, 'execute'))->result;
                if ($executed) {
                        return true;
                } else { 
                        return false;
                }
        }
}

// $property_id = '1'; $streetNumber= '5151'; $streetName= 'fiftyone';  $streetTypeId= '14'; $city= 'Husten' ; $states_id= '43';
// $zip= '33443';$country= 'United States';$buildingNumber= ''; $addressTypeId= '4'; $GPSLongitude = '2993888'; $GPSLatitude = '66577473';

//$address = new Address();
//$address->generate('1');

/* $r = $address->create($property_id, $streetNumber, $streetName, $streetTypeId, $city, $states_id, $zip, $country, $buildingNumber, $addressTypeId, $GPSLongitude, $GPSLatitude);
if($r){
        echo "created successfully";
}
else {
        echo "something is wrong";
} */


// Update test
// $id = $_POST['address_id'];
// $u = $address->update($id,$property_id, $streetNumber, $streetName, $streetTypeId, $city, $states_id, $zip, $country, $buildingNumber, $addressTypeId, $GPSLongitude, $GPSLatitude);

// if ($u) {
//         echo "Updated";
// } else {
//         echo "not updated";
// }
 

 
/* $idRemove = '2';
 $re = $address->remove($idRemove);
if ($re) {
       echo "address $idRemove is removed";
} else { echo "ID $idRemove is not removed!";} */