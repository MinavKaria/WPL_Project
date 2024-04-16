<?php

session_start();


    $conn = new mysqli("localhost", "root", "", "younggigs");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    echo $result->num_rows;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $hashedPassword = $row['password'];
        $isHR = $row['is_hr'];
        $UserID = $row['user_id'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['is_hr'] = $isHR;
            $_SESSION['user_id'] = $UserID;
            echo "Logged in successfully";
            Header("Location: index.php");
            
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email or password";
    }

    $stmt->close();
    $conn->close();

?>
