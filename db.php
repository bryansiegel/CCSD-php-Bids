<?php
date_default_timezone_set('America/Los_Angeles');
$servername = "127.0.0.1";
$username = "root";
$password = "advanced";
$dbname = "ccsd_bids";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
