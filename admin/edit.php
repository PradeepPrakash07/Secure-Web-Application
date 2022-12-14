<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?nosession");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="edit.css">
    <title>Appointment Booking</title>
</head>

<header>
    <nav id="topnav">
        <ul>
            <li id="home">
                <a href="dashboard.php">Accounts</a>
            </li>
            <li id="booking">
                <a href="bookings.php">Bookings</a>
            </li>
            <li id="booking">
                <a href="edit.php">Edit</a>
            </li>
            <li id="logout">
                <a href="inc_logout.php">Logout</a>
            </li>
        </ul>
    </nav>
</header>

<body>

    <div id="wraper">
        <h1>Edit</h1>
        <hr>
        <form action="editAcc.php" method="post">
            <div id="SSID">
                <input type="text" class="input" name="Name" id="SSIDform" placeholder="Name" required>
            </div>
            <div id="pass">
                <input type="password" class="input" name="pswd" id="passform" required placeholder="Password">
            </div>
            <div id="pass">
                <input type="password" class="input" name="repswd" id="passform" required placeholder="Repeat password">
            </div>
            <div id="submit_btns">
                <button type="submit" id="submitbtn" name='submit'>Submit</button>
            </form>
    </div>
    </div>

</body>
</html>