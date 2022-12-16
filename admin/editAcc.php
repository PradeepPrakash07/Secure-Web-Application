<?php
include_once('../include/inc_db_handler.php');
if (isset($_POST["submit"])) {
    $fullName = $_POST["Name"];
    $password = $_POST["pswd"];
    $repassword = $_POST["repswd"];
}

if (check_Empty($fullName, $password, $repassword) !== false) {
    header("location: edit.php?error=emptyfield");
    exit();
}

if (invalidUsername($fullName) !== false) {
    header("location: edit.php?error=invalidUsername");
    exit();
}

if(passmatch($password, $repassword) !== false) {
    header("location: edit.php?error=pwdnotmatch");
    exit();
}
createAdmin($conn,$fullName,$password);
function check_Empty($fullName, $password, $repassword){
    $fullName = trim($fullName);
    $fullName = trim($password);
    $fullName = trim($repassword);
    if (empty($fullName)||empty($password)||empty($repassword)) {
        return true;
    }
    return false;
}

function invalidUsername($fullName) {
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $fullName)) {
        return true;
    }
    return false;
}

function passmatch($password,$repassword) {
 
    if($password !== $repassword) {
    return true;
    }
    return false;
}
function createAdmin($conn,$fullName,$password) {
    $query = "INSERT INTO admins(name,password) VALUES (?,?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement,$query)) {
        header("location: /edit.php?err=failed");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($statement,"ss", $fullName, $hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: index.php?error=none");
    exit();    
}