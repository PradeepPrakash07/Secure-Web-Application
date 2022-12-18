<?php
//handles the creation of new user by calling required functions from inc_functions//
if (isset($_POST["submit"])) 
{
    $fullName = $_POST["Fullname"];
    $userName = $_POST["Username"];
    $email = $_POST["email"];
    $password = $_POST["pswd"];
    $repassword = $_POST["repswd"];
    // echo $fullName;
    // echo "\n";
    // echo $userName;
    // echo "\n";
    // echo $email;
    // echo "\n";
    // echo $password;
    // echo "\n";
    // echo $repassword;
    require_once 'inc_db_handler.php';
    require_once 'inc_functions.php';
    if (checkEmpty($fullName, $email, $userName, $password, $repassword) !== false) 
    {
        header("location: ../index.php?error=emptyfield");
        exit();

    }
    if (invalidUsername($userName,$fullName) !== false) 
    {
        header("location: ../index.php?error=invalidUsername");
        exit();
    }
    if(validMail($email) !== false)
    {
        header("location: ../index.php?error=invalidmail");
        exit();
    }

    if(passmatch($password, $repassword) !== false)
    {
        header("location: ../index.php?error=pwdnotmatch");
        exit();
    }
    if (userexists($conn, $userName, $email) !== false)
    {
        header("location: ../index.php?error=usrexists");
        exit();
    }
    createUser($conn, $userName, $email, $fullName, $password);
} 
else 
{
    header("location: ../index.php");
} 