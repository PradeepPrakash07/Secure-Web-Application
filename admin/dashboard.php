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
    <link rel="stylesheet" href="dashboard.css">
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
    <h1>Users</h1>
    <div class="container">
        <div class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#">Name</a></div>
                <div class="header__item"><a id="wins" class="filter__link filter__link--number">User Name</a></div>
                <div class="header__item"><a id="draws" class="filter__link filter__link--number">User Id</a></div>
                <div class="header__item"><a id="total" class="filter__link filter__link--number">Reset Password</a>
            </div>
        </div>
        <div class="table-content">
        <?php
            $servername = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "registration";
            $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
            if (!$conn) {
                die("Connection failed : " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            if (!$result) {
                die("invalid query" . $conn->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo '<div class="table-row">		
                <div class="table-data">'. $row["userName"].'</div>
                <div class="table-data">'. $row["userUsername"].'</div>
                <div class="table-data">'. $row["usersId"].'</div>
                <div class="table-data"><a href=reset.php?usrid='. $row["usersId"].'>reset</a></div>
                </div>';
            }
            ?>  
        </div>
        </div>
    </div>
</body>
</html>