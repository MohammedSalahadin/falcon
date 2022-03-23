<?php
require_once 'db.php';

class Address
{

        private $property_id;
        private $streetNumber;
        private $streetName;
        private $streetTypeId;
        private $city;
        private $states_id;
        private $zip;
        private $country;
        private $buildingNumber;
        private $addressType;
        private $propertyAddressescol1;
        private $addressTypeId;
        private $GPSLongitude;
        private $GPSLatitude;


        private function setValue($property_id, $streetNumber, $streetName, $streetTypeId, $city, $states_id, $zip, $country, $buildingNumber, $addressType, $propertyAddressescol1, $addressTypeId, $GPSLongitude, $GPSLatitude)
        {
                $this->property_id = $property_id;
                $this->streetNumber = $streetNumber;
                $this->streetName = $streetName;
                $this->streetTypeId = $streetTypeId;
                $this->city = $city;
                $this->states_id = $states_id;
                $this->zip = $zip;
                $this->country = $country;
                $this->buildingNumber = $buildingNumber;
                $this->addressType = $addressType;
                $this->propertyAddressescol1 = $propertyAddressescol1;
                $this->addressTypeId = $addressTypeId;
                $this->GPSLongitude = $GPSLongitude;
                $this->GPSLatitude = $GPSLatitude;
        }


        public function create($property_id, $streetNumber, $streetName, $streetTypeId, $city, $states_id, $zip, $country, $buildingNumber, $addressType, $propertyAddressescol1, $addressTypeId, $GPSLongitude, $GPSLatitude)
        {
                $this->setValue($property_id, $streetNumber, $streetName, $streetTypeId, $city, $states_id, $zip, $country, $buildingNumber, $addressType, $propertyAddressescol1, $addressTypeId, $GPSLongitude, $GPSLatitude);
                $query = "INSERT INTO `falcon`.`admins` (`userName`, `password`, `email`, `firstName`, `lastName`, `domainName`) VALUES (`$property_id` , `$streetNumber` ,`$streetName` , `$streetTypeId` ,`$city` , `$states_id` ,`$zip` , `$country` ,`$buildingNumber` ,`$addressType`,`$propertyAddressescol1`,`$addressTypeId`,`$GPSLongitude`,`$GPSLatitude`  )";
                $execute = new Execute($query, 'execute');
                return $execute;
        }

        public function show($id)
        {
                $query = "SELECT * FROM falcon.property_addresses  where id = `$id` ";
                $execute = new Execute($query, 'single');
                return $execute;
        }
}
