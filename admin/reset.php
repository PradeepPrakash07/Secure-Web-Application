<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: dashboard.php?err=notadmin");
}

$id = $_GET["usrid"];
$newPass = "pass123";
include_once('../include/inc_db_handler.php');
$new_hashedPassword = password_hash($newPass, PASSWORD_DEFAULT);
$query = "UPDATE users SET userPasswd = '$new_hashedPassword' WHERE usersId = '$id';";
$result = mysqli_query($conn,$query);

if ($result) {
    header("Location: dashboard.php?msg=done");
    exit();
}
?>