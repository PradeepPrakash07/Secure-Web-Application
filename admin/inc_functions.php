<?php

/* ---------------------------------admin login------------------------*/

function checkEmptylogin($userName, $password) 
{
    if (empty($userName)||empty($password)) {
        return true;
    }

    return false;

}


function adminExists($conn, $adminName) 
{
    $query = "SELECT * FROM admins WHERE name = ?;";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement,$query)) {
        header("location: ../admin/admin.php?error=failed");
        exit();
}
    mysqli_stmt_bind_param($statement,"s", $adminName);
    mysqli_stmt_execute($statement);
    $retdata = mysqli_stmt_get_result($statement);
    if ($row = mysqli_fetch_assoc($retdata)) {
        return $row;
}
    else {
        mysqli_stmt_close($statement);
        return false;
    }
}

function validateAdminLogin($password, $conn, $adminName) 
{
    $userExists = adminExists($conn, $adminName);
    if ($userExists === false) {
        header("location: ../admin/index.php?error=notanadmin");
        exit();
        // return true;
}
    $hashedpwd = $userExists["password"];
    $chkdPass = password_verify($password,$hashedpwd);
    if ($chkdPass === false) {
        header("location: ../admin/index.php?error=wrngpassn");
        exit();
        // return true;
    }
    return false;

}
