<?php
$dbName = "scandiweb_test";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "root";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Something went wrong");
}
?>