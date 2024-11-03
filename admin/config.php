<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "portofolio_reza";
$port = 2526;

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>