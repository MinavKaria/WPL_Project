<?php
    $conn = new mysqli("localhost", "root", "", "younggigs");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    echo "Connected successfully";


    $query="CREATE DATABASE if not exists younggigs";

    if ($conn->query($query) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();
?>
