<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: appointment.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Immigration Booking Application</title>
</head>

<body background="/styles/images/Background.jpg">
    <div class="mainContainer">
        <div class="signin_form" id="signin_form">
            <h2>Sign in</h2>
            <form action="include/inc_signin.php" method="post">
                <div id="signin_uname">
                    <input type="text" name="Username" id="uname" placeholder="Username or Email" required>
                </div>
                <div id="signin_psswd">
                    <input type="password" name="pswd" id="pswd" placeholder="Password" required>
                </div>
                <div id="submit_btn">
                    <button type="submit" class="btn" name="submit">
                        <div class="login_svg">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 470 470"
                                style="enable-background:new 0 0 470 470;" xml:space="preserve">
                                <g>
                                    <circle cx="235" cy="312.5" r="157.5" style="fill:#92E3A9" />
                                    <path
                                        d="M162.5,139.546V102.5c0-39.977,32.523-72.5,72.5-72.5s72.5,32.523,72.5,72.5v37.046c0.164,0.069,0.329,0.132,0.493,0.201
                                        c10.347,4.376,20.196,9.637,29.507,15.724V102.5C337.5,45.981,291.519,0,235,0S132.5,45.981,132.5,102.5v52.97
                                        c9.311-6.086,19.161-11.347,29.507-15.724C162.171,139.678,162.336,139.615,162.5,139.546z"
                                        style="fill:#92E3A9" />
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </div><span>login</span>
                    </button>
                </div>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "nousr") {
                    echo "<p>Wrong credentials!</p>";
                }
            }
            ?>
        </div>
        <div class="signup_form">
            <h2>Sign up</h2>
            <form action="include/inc_signup.php" method="post">
                <div id="signin_fullname">
                    <input type="text" name="Fullname" id="uname" placeholder="Full name" required>
                </div>
                <div id="signin_uname">
                    <input type="text" name="Username" id="uname" placeholder="Username" required>
                </div>
                <div id="signup_email">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div id="signin_psswd">
                    <input type="password" name="pswd" id="pswd" placeholder="Password" required>
                </div>
                <div id="signin_pssdwd_re">
                    <input type="password" name="repswd" id="repswd" placeholder="Repeat your password" required>
                </div>
                <div id="submit_btn">
                    <button type="submit" name="submit" class="btn">
                        <span>Create Account</span></button>
                </div>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyfield") {
                    echo "<p>Inputs cannot be empty</p>";
                } elseif ($_GET["error"] == "invalidUsername") {
                    echo "<p>Username cannot have special characters</p>";
                } elseif ($_GET["error"] == "invalidmail") {
                    echo "<p>Invalid mail ID</p>";
                } elseif ($_GET["error"] == "pwdnotmatch") {
                    echo "<p>Passwords don't match</p>";
                } elseif ($_GET["error"] == "usrexists") {
                    echo "<p>A user with same Username or Email exists</p>";
                } elseif ($_GET["error"] == "none") {
                    echo "<p>Success! Account created</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
<script src="scripts/index.js"></script>

</html>