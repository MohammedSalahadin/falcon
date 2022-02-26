<?php

require '../user.php';

// check for milisos code or mysql injection
function validate($value){
    $clean = "";
    return $clean;
}


// Guard Login
if(isset($_POST['userName'])){
    $userName = validate($_POST['userName']);
    $password = validate($_POST['password']);

    $user = new Guard();
    $user-> login($username, $password);
    if ($user->loggedIn) { //logged in
        if ($user->active == true){ //user is active
            $returnBack['message'] = 'Succesfully Logged in'; // return success login
            $returnBack['loggedIn'] = false;                  // login state
            $returnBack['id'] = $user->id;
            $returnBack['firstName'] = $user->firstName;
            $returnBack['lastName'] = $user->lastName;
            $returnBack['avatar'] = $user->avatar;

        }
        else { // loged in but inactive user
            $returnBack['message'] = 'User is in Active';   //return fail message
            $returnBack['loggedIn'] = false;                // login state
        }

    } else { //wrong user name and password
        $returnBack['message'] = 'incorrect user name or password';   //return fail message
        $returnBack['loggedIn'] = false;                // login state
     }
     

}


?>