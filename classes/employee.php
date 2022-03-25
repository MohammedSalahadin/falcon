<?php

require_once 'user.php';

class Employee extends User
{
    public $employeeRoleID; // Guard(4), Dispacher(2), Supervisor(3) or Admin(1)

    private function createUserNotification($userID = '')
    {
        if ($userID == '' && $this->id > 0) {
            $userID == $this->id;
        } // validatino and use current class id if no id


        $conn = (new db())->getConnection();

        if ($conn->connect_error) // checking database connection
        {
            echo " Connection to the database was NOT successfull ";
            return false;
        }


        $conn->begin_transaction();

        $query = "INSERT INTO `falcon`.`users_notification` (`send meADailyMissedCheckpointReport`, `propertyIssuesPerHourFallBelowThreshold`, `overdueTasks`, `alertWhenUnableToSendTourStartMessages`, `alertWhenATourExpiresOrIsFinishedWithoutAllCheckpointsBeingHit`) VALUES ('0', '0', '0', '0', '0');";

        if ($conn->query($query)) //Propery has been added
        {
            $nID = $conn->insert_id;
            $query2 = "UPDATE `falcon`.`employees` SET `users_notification_id` = '$nID' WHERE (`id` = '$userID');";
            if ($conn->query($query2)) // adding the notification id to the employee table
            {
                $conn->commit();
                $conn->close();
                return true;
            } else {
                $conn->rollback();
                $conn->close();
                return false;
            }
        } else {
            $conn->rollback();
            $conn->close();
            return false;
        }
    }

    // INPUTS: 1. user id 2.file name (input file name)
    // Proccess: 1. insert the image to user directory id
    //           2. insert the image path to avatar column in user row in db.
    //           3. if inserted to db and to directory then remove the previous image
    //  OUTPUT: When image is uploaded to db and directory: return true;
    //          When image is not uploaded db and directory: return false;

    public function updateAvatar($id, $fileName)
    {

        // First making sure file is not empty
        if (isset($_FILES[$fileName])) {
            if ($_FILES[$fileName]['size'] == 0 && $_FILES[$fileName]['error'] == 0) {
                echo "file image is empty";
                return false;
            }
        } else {
            return false;
        }

        //get privous image path from db.
        $oldImgPath = (new Execute("select avatar from employees where id ='$id';", "single"))->result;

        /* upload the file to the specific path and get the full path of the file to store it in the database
        all you have to pass to the function are $fileName: is the name of the file input in the form
        and the path to store the file, path will be generated if it wasn't existes  */

        $avatar = Services::uploadImage($fileName, "users/employees/$id");
        if (!$avatar) {
            echo "somthing is wrong with uploading avatar";
            return false;
        } else {
            $query = "UPDATE `falcon`.`employees` SET `avatar` = '$avatar' WHERE (`id` = '$id');";
            $executed = (new Execute($query, "execute"))->result;
            if ($executed) {
                Services::deleteFile($oldImgPath); // remove previous image path
                echo "file is stored in db, $avatar";
                return true;
            } else {
                echo "something is wrong with inserting avatar to db.";
                return false;
            }
        }
    }
    // Used to create new user.
    public function create($firstName, $lastName, $email, $userName, $password, $employeeRoleID)
    {
        // Role id validation
        if (!Execute::checkIdInTable('id', $employeeRoleID, 'employee_roles')) {
            echo "The Role $employeeRoleID is not exists ";
            return false;
        }
        //Check if user name is exists
        if (Execute::checkIdInTable('userName', $userName, 'employees')) {
            echo "Username: $userName is already Exists";
            return false;
        }

        $query = "INSERT INTO `falcon`.`employees` (`firstName`, `lastName`, `emailAddress`, `userName`, `password`, `active`, `employee_roles_id`) 
        VALUES ('$firstName', '$lastName', '$email', '$userName', '$password', '1', '$employeeRoleID');";
        $query .= "SELECT LAST_INSERT_ID() as id";
        // echo $query;
        $id = ((new Execute($query, "multiQuery"))->result)[0]['id'];

        if ($id > 0) {
            //get root directory path
            $rootPath = Services::backRootPath();
            //creating directory for the employee
            if (!file_exists($rootPath . 'uploads/users/employees/' . $id)) {
                mkdir($rootPath . 'uploads/users/employees/' . $id, 0777, true);
                // echo "user dir created";
            } else {
                echo "user dir isn't created";
            }
            if ($this->generate($id)) { //when user is created and objects are created
                if (!$this->createUserNotification($id)) {
                    echo "Employee notification haven't been added";
                }
                return true;
            } else {
                echo "user is created but not generated";
                return false;
            }
        } else {
            return false;
        }
    }

    //This function is used when updating a user info
    public function update($id, $firstName, $lastName, $email, $active, $maintananceEmail, $timeCardID, $cellNumber, $phoneNumber, $city, $states_id, $zip, $allowSecurityAssignments, $allowParkingAssignments, $allowMaintenanceAssignments, $allowUserToviewGPSData, $allowEmails, $employeeRoleID, $fileName)
    {

        // When fileName input is not empty means there is avatar image to update
        if ($fileName != '') {
            if ($this->updateAvatar($id, $fileName)) {
                echo "avatar Updated";
            } else {
                echo "there is file (avatar) but coudn't update avatar";
                return false;
            }
        }

        // update image if any have been uploaded
        $this->updateAvatar($id, $fileName);

        $query = "UPDATE `falcon`.`employees` SET `firstName` = '$firstName', `lastName` = '$lastName', `emailAddress` = '$email',
         `active` = '$active', `maintananceEmail` = '$maintananceEmail',`timeCardID` = '$timeCardID', `cellNumber` = '$cellNumber',
          `phoneNumber` = '$phoneNumber', `city` = '$city', `states_id` = '$states_id',
           `zip` = '$zip', `allowSecurityAssignments` = '$allowSecurityAssignments', `allowParkingAssignments` = '$allowParkingAssignments',
            `allowMaintenanceAssignments` = '$allowMaintenanceAssignments', `allowUserToviewGPSData` = '$allowUserToviewGPSData',
             `allowEmails` = '$allowEmails',
              `employee_roles_id` = '$employeeRoleID' WHERE (`id` = '$id');";
        $execute = new Execute($query, "execute");
        $result = $execute->result;
        if ($result) {
            if ($this->generate($id)) {
                return true;
            }
        } else {
            echo "Coudn't update db error: $execute->error";
        }
    }

    //This function is used whe  user loges in from web
    public function webLogin($userName, $password)
    {
        //validation should be applied before data input
        $query = "select id,employee_roles_id from employees where (`userName` = '$userName') and (`password` = '$password');";
        $result = ((new Execute($query, "multiQuery"))->result);
        if (!empty($result)) {
            $id = $result[0]['id'];$roleID = $result[0]['employee_roles_id']; 
            if ($id > 0) {
                //check userRole, 4: guard: not primited to login, 1,2,3: are allowed to login
                if ($roleID == "4") { echo "gueards are not primited to login;"; return false;}
                if ($this->generate($id)) {
                    $this->loggedIn = true;
                    // echo "Logged In Sucessfully";
                    return true;
                } else {
                    echo "correct user and password. but Coudn't generate user data";
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function generate($id = '')
    {
        if ($id == '' && $this->id > 0) {
            $id == $this->id;
        }

        $query = "SELECT * FROM falcon.employees where id = '$id';";
        $result = ((new Execute($query, "multiQuery"))->result)[0];

        $this->id = $id;
        $this->firstName = $result['firstName'];
        $this->lastName = $result['lastName'];
        $this->userName = $result['userName'];
        $this->password = $result['password'];
        $this->emailAdress = $result['emailAddress'];
        $this->active = $result['active'];
        $this->maintananceEmail = $result['maintananceEmail'];
        $this->timeCardID = $result['timeCardID'];
        $this->cellNumber = $result['cellNumber'];
        $this->phoneNumber = $result['phoneNumber'];
        $this->city = $result['city'];
        $this->stateID = $result['states_id'];
        $this->zip = $result['zip'];
        $this->allowSecurityAssignments  = $result['allowSecurityAssignments'];
        $this->allowParkingAssignments = $result['allowParkingAssignments'];
        $this->allowMaintenanceAssignments = $result['allowMaintenanceAssignments'];
        $this->allowUserToviewGPSData = $result['allowUserToviewGPSData'];
        $this->allowEmailes = $result['allowEmails'];
        $this->avatar = $result['avatar'];                                 //link of the file
        $this->lastLoginDate = $result['lastLoginDate'];
        //employee related info
        $this->employeeRoleID = $result['employee_roles_id'];


        return true;
    }
}

// $firstName = "gurard";
// $lastName = "test";
// $email = "super@test.com";
// $userName = "guardSlave"; //user name can't be changed after creating the user.
// $password = "bulshit";
// $employeeRoleID = "4";  //1 admin 2 dispacher, 3.supervisor 4.gaurd

// $admin = new employee();
// $created = $admin->create($firstName, $lastName, $email, $userName, $password, $employeeRoleID);
// if ($created) {
//     echo "Employee $firstName with role $employeeRoleID is created";
// } else { echo "something is wrong with creating the employee";}

// $generate = $admin->generate('14');
 

//updating user required info
/* $id = "15";
$active = "1";
$maintananceEmail = "maintinanceEmail@m.com";
$timeCardID = "#er33";
$cellNumber = "07755344";
$phoneNumber = "07456666366";
$city = "austin";
$states_id = "41";
$zip = "445334";
$allowSecurityAssignments = "1";
$allowParkingAssignments = "1";
$allowMaintenanceAssignments = "1";
$allowUserToviewGPSData = "1";
$allowEmails = "1";
$employeeRoleID = "1";                      //1 admin 2 dispacher, 3.supervisor 4.gaurd
$fileName = ""; // when uploading image shoudn't be empty
$admin->update(
    $id,
    $firstName,
    $lastName,
    $email,
    $active,
    $maintananceEmail,
    $timeCardID,
    $cellNumber,
    $phoneNumber,
    $city,
    $states_id,
    $zip,
    $allowSecurityAssignments,
    $allowParkingAssignments,
    $allowMaintenanceAssignments,
    $allowUserToviewGPSData,
    $allowEmails,
    $employeeRoleID,
    $fileName
); */

// test employee login
/* $employee = new Employee();
$employee->webLogin("testadmin", "admintest");
if ($employee->loggedIn) {
    echo "logged in sucessfully!";
} else {
    echo "coudn't login;";
}
 */








?>