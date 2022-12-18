<?php
    include_once("inc_db_handler.php");
    include_once("inc_functions.php");
session_start();
$bid = $_SESSION['bid'];
cnclBkng($conn, $bid); // calls the cnclBkng function from the inc_functions file for canceling booking//
header('Location: ../appointment.php');
exit();