<?php
//loads all the parameters from the session and calls the required functions from inc_functions for editing user details//
session_start();
$uid = $_SESSION['uid'];
$new_fullname = $_POST["Fullname"];
$new_username = $_POST["Username"];
if (isset($_POST["submit_usrname"])) 
{
    include_once("inc_functions.php");
    include_once('inc_db_handler.php');
    // echo $new_fullname;
    // echo $new_username;
    if (edit_checkEmpty($new_fullname, $new_username) !== false) 
    {
    header('location: ../edit.php?error=emptyField');
    exit();
    }
    if (edit_invalidUsername($new_username, $new_fullname) !== false) 
    {
    header('location: ../edit.php?error=invalidUsername');
    exit();
    }
    ;
    if (edit_userexists($conn, $new_username) !== false) 
    {
    header('location: ../edit.php?error=userExists');
    exit();
    }
    edit_updateUser($conn, $new_username, $new_fullname, $uid);
    header('location: ../index.php');
    exit();

} 
elseif (isset($_POST["submit_pass"])) 
{
    include_once("inc_functions.php");
    include_once('inc_db_handler.php');
    $new_pass = $_POST["pswd"];
    $new_repass = $_POST["repswd"];
    if (edit_checkEmptyPass($new_pass, $new_repass) !== false) 
    {
    header("location: ../edit.php?error=pwdempty");
    exit();
    }
    if (edit_passmatch($new_pass, $new_repass) !== false)
    {
        header("location: ../edit.php?error=pwdnotmatch");
        exit();
    }
    edit_updatepassword($conn, $new_pass, $uid);
} 
else 
{
    header("location: ../edit.php?error=failed");
}