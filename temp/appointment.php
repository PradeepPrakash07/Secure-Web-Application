<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?nosession");
}
include_once("header.php");
$userName = $_SESSION['user'];
$name = $_SESSION['name'];
$date = $_SESSION['dt'];
$bid = $_SESSION['bid'];
$uid = $_SESSION['uid'];
?>

<body>
    <div id="main">
        <div class="heading">
            <?php
            $user = $_SESSION['user'];
            echo "<h1 id = 'mainHead'>Welcome $user !</h1>"; ?>
        </div>

        <div id="form_date">
            <div>
            </div>
            <div>
                <p id="p1">Select date</p>
            </div>
            <div id="form">
                <form action="include/inc_book.php" method="post">
                    <div id="date">
                        <input type="date" name="doa" id="doa">
                    </div>
                    <div>
                        <p id="p1">Enter passport number</p>
                    </div>
                    <div>
                        <input type="password" name="passport_number" id="psprt" maxlength="12">
                    </div>
                    <div id="book-btn">
                        <button type="submit" name="submit" id="appBtn">Book</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="bkngs">
            <h1 id="bkngHead">Your Booking.</h1>
            <div id="logoutbtn">
                <form action="include/inc_logout.php">
                    <button id="lgtBtn">Logout</button>
                </form>
            </div>
            <div id="prevBkng">
                <p id="nobkng">
                    You have no previous booking.
                </p>
                <div class="nameField">
                    <?php
                    echo "<p>Name : $name </p>"
                        ?>
                </div>
                <div class="dateField">
                    <?php
                    echo "<p>Date of Appointment : $date </p>"
                        ?>
                </div>
                <div class="bkdidField">
                    <?php
                    echo "<p>Booking ID : $bid  </p>"
                        ?>
                </div>
                <div>
                    <form action="include/inc_cancelBooking.php">
                        <button id="cnclBtn">Cancel/Reschedule Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var bid = `<?php echo $bid; ?>`
</script>
<script src="scripts/script.js"></script>

</html>