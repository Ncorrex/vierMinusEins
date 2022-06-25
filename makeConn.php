<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vierminuseins";

// Create connection
try {
    //create mysql connection
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    //show error
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}
?>