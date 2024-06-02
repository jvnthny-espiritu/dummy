<?php
$servername = "localhost";
$adname = "root";
$adpass = "";
$dbname = "booking_db";

$conn = mysqli_connect($servername, $adname, $adpass, $dbname);

if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
?>