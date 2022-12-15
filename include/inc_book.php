<?php
session_start();
if (isset($_POST["submit"])) {
    $date = $_POST["doa"];
    // echo($date);
    if (empty($date)) {
        header("location: ../appointment.php?err=slctdt");
        exit();
    }
    include_once("inc_db_handler.php");
    $date = date(htmlentities($_POST["doa"]));
    $pnmbr = $_POST["passport_number"];
    $name = $_SESSION['name'];
    $uid = $_SESSION['uid'];
    $bid = substr($name,0,3).(string)rand(100000,999999);
    $sql = "INSERT INTO bookings(userName , usrId, date, bookingId, passportNumber) VALUES ('$name', '$uid', '$date', '$bid', '$pnmbr');"; //creates booking entry in the database//
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['bid'] = $bid;
        $_SESSION['dt'] = $date;
        header("location: ../appointment.php?msg=booked");
        exit();
    } else {
        header("location: ../appointment.php?msg=errbkng");
        exit();
    }



} else {
    header("location: ../appointment.php?err=slctdt");
    exit();
}