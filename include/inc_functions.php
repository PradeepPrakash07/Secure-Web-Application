<?php
// $fullName = '';
// $userName = '';
// $password = '';
// $fullName = trim($fullName);
// $userName = trim($userName);
// $password = trim($password);
function checkEmpty($fullName, $email, $userName, $password, $repassword)   //checks if user inputs are empty//
{
    if (empty($fullName) || empty($email) || empty($userName) || empty($password) || empty($repassword)) 
    {
        return true; //returns true if any field is empty//
    }
    return false;
}

function invalidUsername($userName, $fullName)  //Checks if the user entered valid characters//
{
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $userName) || !preg_match("/^[a-zA-Z0-9 ]*$/", $fullName)) 
    {
        //uses preg_match function that takes a regular expression and a string as parameters and checks if there are any characters other than a-z A-Z or 0-9//
        return true;
    }

    return false;

}
function validMail($email)   //checks if the entered mail is a valid email id//
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
    //filter_var function takes the email as a parameter and uses filter_validate_email filter to check for validity of email//
        return true;
    }
    return false;
}

function passmatch($password, $repassword)    // this function compares password and re entered password
{
    if ($password !== $repassword) 
    {
        return true;
    }
    return false;

}

function userexists($conn, $userName, $email)   //this function checks if the given user name already exists//
{
    $query = "SELECT * FROM users WHERE userUsername = ? OR userEmail = ?;";
    //select everything (*) from the table called users where the username or email is same as the one user entered
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $query)) 
    {
        //if mySQL query fails then return user to login page
        header("location: ../index.php?error=failed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ss", $userName, $email); // initialise the mySQl query with the provided inputs
    mysqli_stmt_execute($statement);
    $retdata = mysqli_stmt_get_result($statement);
    if ($row = mysqli_fetch_assoc($retdata))   //if the query returns data then that means user exists//
    {
        return $row;
    } 
    else 
    {
        mysqli_stmt_close($statement);
        return false;

    }

}
function createUser($conn, $userName, $email, $fullName, $password)  //this function creates the user and adds it to the database//
{
    $result = false;
    $query = "INSERT INTO users(userName, userUsername, UserEmail, userPasswd) VALUES (?,?,?,?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $query)) 
    {
        header("location: ../index.php?error=failed");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($statement, "ssss", $fullName, $userName, $email, $hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../index.php?error=none");
    exit();

}

function checkEmptylogin($userName, $password)    //checks if inputs are empty//
{
    $userName = trim($userName);
    $password = trim($password);
    if (empty($userName) || empty($password)) 
    {
        return true;
    }
    return false;

}

function validateLogin($password, $conn, $username)    //function for validating login. It calls the userexists function and then vaerifies passwords//
{   
    $userExists = userexists($conn, $username, $username);
    if ($userExists === false) 
    {
        header("location: ../index.php?error=nousr");
        exit();
    }
    $hashedpwd = $userExists["userPasswd"];
    $chkdPass = password_verify($password, $hashedpwd); //verify the password using the password_verify function which compares the hashed password from the database and the user entered password//
    if ($chkdPass === false) 
    {
        header("location: ../index.php?error=wrngpassn");
        exit();
    }
    return false;
}

function startSession($conn, $userName)  //starts the session and stores the required session variables//
{   
    $bdate = '';
    $bid = '';
    $query = "SELECT usersId, userName FROM users WHERE userUsername = '$userName';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $name = $row['userName'];
        $uid = $row['usersId'];
    }
    $query = "SELECT date, bookingId FROM bookings WHERE usrId = '$uid';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $bdate = $row['date'];
        $bid = $row['bookingId'];
    }
    $_SESSION['user'] = $userName;
    $_SESSION['name'] = $name;
    $_SESSION['dt'] = $bdate;
    $_SESSION['bid'] = $bid;
    $_SESSION['uid'] = $uid;
    header("location: ../appointment.php?error=none");
    exit();

}
function startAuthsession ($conn, $userName)
{
    $query = "SELECT userEmail FROM users WHERE userUsername = '$userName';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $mail = $row['userEmail'];
    }
    session_start();
    $_SESSION['mail'] = $mail;
    $_SESSION['usr'] = $userName;
    header("location: inc_authenticate_signin.php");
    exit();
}
function cnclBkng($conn, $bid)    //function to cancel previous booking. selects the booking using the booking id from the session and deletes the matching entry from the database//
{
    $id = $_SESSION['bid']; 
    $query = "DELETE FROM bookings WHERE bookingId = '$id';";
    mysqli_query($conn, $query);
    $_SESSION['bid'] = '';
    $_SESSION['dt'] = '';
}

function adminExists($conn, $userName)  //checks if the admin by the provided name exists or not//
{
    $query = "SELECT * FROM admins WHERE name = ?;";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $query)) 
    {
        header("location: ../admin/admin.php?error=failed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "s", $adminName);
    mysqli_stmt_execute($statement);
    $retdata = mysqli_stmt_get_result($statement);
    if ($row = mysqli_fetch_assoc($retdata)) 
    {
        return $row;
    } 
    else 
    {
        mysqli_stmt_close($statement);
        return false;
    }

}
function validateAdminLogin($password, $conn, $username)    //validates the admin login. Sinilar to the validate login function. But, uses data from the admin table//
{
    $userExists = adminExists($conn, $username);
    if ($userExists === false) 
    {
        header("location: ../admin/index.php?error=notanadmin");
        exit();
        //return true;
    }
    $hashedpwd = $userExists["userPasswd"];
    $chkdPass = password_verify($password, $hashedpwd);
    if ($chkdPass === false) 
    {
        header("location: ../admin/admin.php?error=wrngpassn");
        exit();
        // return true;
    }
    return false;

}
function edit_checkEmpty($new_fullname, $new_username)  //this set of functions are for updating user information. All functions are similar to the ones used when creating new user//
{
    if (empty($new_fullname) || empty($new_username)) 
    {
        return true;
    }
    return false;
}

function edit_invalidUsername($new_username, $new_fullname)
{
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $new_username) || !preg_match("/^[a-zA-Z0-9 ]*$/", $new_fullname)) 
    {
        return true;
    }
    return false;
}

function edit_userexists($conn, $new_username)
{
    $query = "SELECT * FROM users WHERE userUsername = ? OR userEmail = ?;";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $query)) 
    {
        header("location: ../index.php?error=failed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ss", $username, $email);
    mysqli_stmt_execute($statement);
    $retdata = mysqli_stmt_get_result($statement);
    if ($row = mysqli_fetch_assoc($retdata)) 
    {
        return $row;
    } 
    else 
    {
        mysqli_stmt_close($statement);
        return false;
    }
}
function edit_updateUser($conn, $new_username, $new_fullname, $uid)
{
    $query = "UPDATE users SET userName = ? , userUsername = ? WHERE usersId = '$uid';";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $query)) 
    {   
        header("location: ../edit.php?error=failed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ss", $new_username, $new_fullname);
    mysqli_stmt_execute($statement);
    session_start();
    $_SESSION['name'] = $new_fullname;
}

function edit_checkEmptyPass($new_pass, $new_repass)
{
    if (empty($new_pass) || empty($new_repass)) 
    {
        return true;
    }
    return false;

}

function edit_passmatch($new_pass, $new_repass)
{
    if ($new_pass !== $new_repass) 
    {
        return true;
    }
    return false;
}
function edit_updatepassword($conn, $new_pass, $uid)
{
    $query = "UPDATE users SET userPasswd = ? WHERE usersId = '$uid';";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $query)) 
    {
        header("location: ../edit.php?error=failed");
        exit();
    }
    $new_hashedPassword = password_hash($new_pass, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($statement, "s", $new_hashedPassword);
    mysqli_stmt_execute($statement);
    header("location: ../edit.php?msg=done");
    exit();

}