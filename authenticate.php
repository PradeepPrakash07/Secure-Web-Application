<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
?>
<script src="scripts/timeout.js"></script>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/otp.css">
    <title>Verify OTP</title>
</head>
<body>
    <form class="login-form" action="include/inc_verifyotp.php" method="post">
        <h1>Enter OTP</h1>
        <div class="form-input-material">
            <input type="text" name="otp" id="username" placeholder=" " autocomplete="off"
                class="form-control-material" required />
            <label for="username">OTP expires in 90 seconds</label>
        </div>
        <button type="submit" class="btn btn-primary btn-ghost" name="verify">Verify</button>
        We have sent an OTP to your registered mail.
    </form>
</body>
</html>