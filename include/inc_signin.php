<?php
if (isset($_POST["submit"])) 
{
    $userName = $_POST["Username"];
    $password = $_POST["pswd"];
    require_once 'inc_db_handler.php';
    require_once 'inc_functions.php';
    if (checkEmptylogin($userName, $password) !== false) 
    {
        header("location: ../index.php?error=emptyfield");
        exit();
    }
    validateLogin($password, $conn, $userName);
    startAuthsession($conn, $userName);
    header("location: inc_authenticate_signin.php");
    exit();
    // startSession($conn, $userName);
}
else 
{
    header("location: ../index.php?error=nousr");
}