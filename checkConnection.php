<?php
$conn = new mysqli("localhost", "root", "", "younggigs");

// $conn = new mysqli("sql206.infinityfree.com", "if0_36339942", "minav2004", "if0_36339942_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";



?>
