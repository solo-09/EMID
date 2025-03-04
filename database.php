<?php
$host = "localhost";
$user = "root";  // Change if necessary
$password = "";
$dbname = "medical_id_system";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}
?>
