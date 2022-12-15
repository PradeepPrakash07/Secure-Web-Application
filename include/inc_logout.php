<?php

//to logout user... clears session variables and redirects to login page//

header("Location: ../index.php");
session_start();
session_destroy();
exit();