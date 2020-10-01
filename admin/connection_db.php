<?php

$database = "cjanroap_property_portal";
$servername = "localhost";
$username = "cjanroap_property_user";
$password = "Airlines!2";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";






?>