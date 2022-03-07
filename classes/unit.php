<?php
require_once 'db.php';

class Unit
{
        private $id;
        private $propertyAddressId;
        private $unitNumberPrefix;
        private $startingUnitNumber;
        private $unitNumberIncrement;
        private $endingUnitNumber;
        private $unitNumberSuffix;

        private function setValue($id, $propertyAddressId, $unitNumberPrefix, $startingUnitNumber, $unitNumberIncrement, $endingUnitNumber, $unitNumberSuffix)
        {
                $this->$id = $id;
                $this->propertyAddressId = $propertyAddressId;
                $this->unitNumberPrefix = $unitNumberPrefix;
                $this->startingUnitNumber = $startingUnitNumber;
                $this->unitNumberIncrement = $unitNumberIncrement;
                $this->endingUnitNumber = $endingUnitNumber;
                $this->unitNumberSuffix = $unitNumberSuffix;
        }

        public function create($propertyAddressId, $unitNumberPrefix, $startingUnitNumber, $unitNumberIncrement, $endingUnitNumber, $unitNumberSuffix)
        {
                $this->setValue(null, $propertyAddressId, $unitNumberPrefix, $startingUnitNumber, $unitNumberIncrement, $endingUnitNumber, $unitNumberSuffix);
                $query =
                        "INSERT INTO `falcon`.`unites`
                                (`property_addresses_id`,
                                `unitNumberPrefix`, 
                                `startingUnitNumber`, 
                                `unitNumberIncrement`, 
                                `endingUnitNumber`, 
                                `unitNumberSuffix`)
                        VALUES
                                (`$this->$propertyAddressId`,
                                `$this->$unitNumberPrefix`,
                                `$this->$startingUnitNumber`,
                                `$this->$unitNumberIncrement`,
                                `$this->$endingUnitNumber`,
                                `$this-> $unitNumberSuffix`);";

                $execute = new Execute($query, 'execute');
                return $execute;
        }


        public function show($id)
        {
                $this->$id = $id;
                $query = "SELECT * FROM falcon.unites  where id = `$this->$id` ";
                $execute = new Execute($query, 'single');
                return $execute;
        }

        public function update($id, $propertyAddressId, $unitNumberPrefix, $startingUnitNumber, $unitNumberIncrement, $endingUnitNumber, $unitNumberSuffix)
        {
                $this->setValue($id, $propertyAddressId, $unitNumberPrefix, $startingUnitNumber, $unitNumberIncrement, $endingUnitNumber, $unitNumberSuffix);
                $query =
                        "UPDATE `falcon`.`unites`
                        SET
                                `id` = `$id`,
                                `property_addresses_id` = `$this->$propertyAddressId`,
                                `unitNumberPrefix` = `$this->$unitNumberPrefix`,
                                `startingUnitNumber` = `$this->$startingUnitNumber`,
                                `unitNumberIncrement` = `$this->$unitNumberIncrement`,
                                `endingUnitNumber` = `$this->$endingUnitNumber`,
                                `unitNumberSuffix` = `$this->$unitNumberSuffix`
                        WHERE `id` = `$this->$id`;";
                $execute = new Execute($query, 'single');
                return $execute;
        }
}
