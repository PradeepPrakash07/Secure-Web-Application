<?php
//checks if the entered otp is valid//
//uses the same funcions as the one that verfies password in inc_functions//
if (isset($_POST['verify'])) 
{
    session_start();
    $email = $_SESSION['mail'];
    $userName = $_SESSION['usr'];
    // echo $email;
    require_once('inc_db_handler.php');
    require_once('inc_functions.php');
    $query = "SELECT authToken FROM authenticate WHERE authEmail = '$email';";
    $statement = mysqli_query($conn, $query);
    if (!$statement) 
    {
        header("location: ../index.php?error=failed");
        exit();
    }
    $row = mysqli_fetch_assoc($statement);
    $otp = $_POST['otp'];
    // echo $otp;
    // echo "<br>";
    // echo $hashedotp;
    // echo "<br>";
    // echo $row['authToken'];
    $hashedOTP = $row['authToken'];
    $chkdotp = password_verify($otp, $hashedOTP);
    //     echo "<br>";
    // var_dump($chkdotp);
    if ($chkdotp === false) 
    {
        header('Location: ../index.php?error=wrongotp');
        exit();
    }
    $query = "DELETE FROM authenticate WHERE authEmail = '$email';";
    $statement = mysqli_query($conn, $query);
    startSession($conn, $userName);
    exit();
}



