<?php
// test db configuration
$host = "localhost";
$user = "root";
$password = "";
$dbname = "testdb";

// connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// test
if ($conn){
    echo "<p>Database connection is successful</p>";
}
else {
    die("Connection failed: ". mysqli_connect_error());
}

?>