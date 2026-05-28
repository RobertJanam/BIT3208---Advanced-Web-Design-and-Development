<?php
$conn = mysqli_connect("localhost", "root", "", "sportsdb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Database Connected Successfully!";
?>