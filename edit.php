<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?nosession");

}

include_once("header.php");

$userName = $_SESSION['user'];
$uid = $_SESSION['uid'];
?>

<body>
    <div class="h1">
        <h1>Edit your Profile.</h1>
    </div>
    <div id="edit">
        <div class="edit_span">
            <span>Change your username or Full name</span>
        </div>
        <form action="include/inc_edit.php" method="post">
            <div id="signin_fullname">
                <input class="edit_input" type="text" name="Fullname" id="uname" placeholder="Full name">
            </div>
            <div id="signin_uname">
                <input class="edit_input" type="text" name="Username" id="uname" placeholder="Username">
            </div>
            <div id="submit_btn">
                <button class="edit_btn" type="submit" name="submit_usrname" class="btn">
                    <span>Edit</span></button>
            </div>
            <div class="edit_span">
                <span>Change your password</span>
            </div>
            <div id="signin_psswd">
                <input class="edit_input" type="password" name="pswd" id="pswd" placeholder="Password" >
            </div>
            <div id="signin_pssdwd_re">
                <input class="edit_input" type="password" name="repswd" id="repswd" placeholder="Repeat your password">
            </div>
            <div id="submit_btn">
                <button class="edit_btn" type="submit" name="submit_pass" class="btn">
                    <span>Edit</span></button>
            </div>
    </div>
    </form>
</body>
</html>