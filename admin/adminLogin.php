<?php

if (isset($_POST["submit"])) {
    $adminName = $_POST["Name"];
    $password = $_POST["pass"];
    require_once '../include/inc_db_handler.php';
    require_once 'inc_functions.php';
    if (checkEmptylogin($adminName, $password) !== false) {
        header("location: ../index.php?error=emptyfield");
        exit();
    
    }
    validateAdminLogin($password, $conn, $adminName);
    session_start();
    $_SESSION['admin'] = 'TRUE';
    header("location: dashboard.php");
    exit();
} else {
    header("location: index.php?error=noadmin");

}