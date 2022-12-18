<?php
session_start();
if (!isset($_SESSION['user'])) 
{
    header("Location: index.php?nosession");
}
$userName = $_SESSION['user'];
$name = $_SESSION['name'];
$date = $_SESSION['dt'];
$bid = $_SESSION['bid'];
$uid = $_SESSION['uid'];
include_once("header.php");
?>
<body>
    <h1>Your Booking.</h1>
    <p id="nobkng">
            You have no previous booking.
    </p>
    <div id="prevBkng">
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
</body>
<script>
    var bid = `<?php echo $bid;?>`
</script>
<script src="scripts/script.js"></script>
</html>