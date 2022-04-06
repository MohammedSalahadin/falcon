<?php

require '../employee.php';

// check for milisos code or mysql injection
function validate($value){
    $clean = "";
    return $clean;
}


// Guard Login
if(isset($_POST['userName'])){
    $userName = validate($_POST['userName']);
    $password = validate($_POST['password']);

    $gaurd = new Employee();
    $gaurd-> appLogin($username, $password);
    if ($gaurd->loggedIn) { //logged in
        if ($gaurd->active == true){ //user is active
            $returnBack['message'] = 'Succesfully Logged in'; // return success login
            $returnBack['loggedIn'] = false;                  // login state
            $returnBack['id'] = $gaurd->id;
            $returnBack['firstName'] = $gaurd->firstName;
            $returnBack['lastName'] = $gaurd->lastName;
            $returnBack['avatar'] = $gaurd->avatar;

        }
        else { // loged in but inactive gaurd
            $returnBack['message'] = 'User is in Active';   //return fail message
            $returnBack['loggedIn'] = false;                // login state
        }

    } else { //wrong gaurd user name and password
        $returnBack['message'] = 'incorrect gaurd user name or password';   //return fail message
        $returnBack['loggedIn'] = false;                // login state
     }

     print_r($returnBack);
}
else {
    echo "Wrong submittion";
}


?>