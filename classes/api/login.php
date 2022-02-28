<?php

require 'classes\user.php';

// check for milisos code or mysql injection

// Guard Login

    $userName = "meer";
    $password = "mmeerr";

    $user = new Guard();
    $user-> login($userName, $password);
    if ($user->loggedIn) { //logged in
        echo 'Succesfully Logged in';
        if ($user->active == true){ //user is active
             // return success login
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
     




?>