<?php
//for establishing connection to the database//
$servername = "localhost"; //change to your server name//
$dbUsername = ""; // change to your databse user name//
$dbPassword = ""; //change to your database password//
$dbName = "registration"; //change to your data base name//
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName); //create connection//
if (!$conn) 
{
    die("Connection failed : " . mysqli_connect_error()); //if failed to create connection then exit//
}