<?php

session_start();

if (isset($_SESSION['employee'])) {
    $employee = json_decode($_SESSION['employee']);
    
    $userName = $employee->userName;
    $fullName = $employee->firstName . " " . $employee->lastName;
    $id = $employee->id;
    $avatar = $employee->avatar;
} else {
    exit("Please Login first");
}
