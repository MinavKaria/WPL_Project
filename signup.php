<?php

$name = $_POST['name'];
$qualification = $_POST['qualification'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$age = $_POST['age'];
$isHR=$_POST['is_hr'];

if ($password != $confirmPassword) {
    echo "Password and Confirm Password do not match";
    exit();
}

$conn = new mysqli("localhost", "root", "", "younggigs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$targetDir = "uploads/";
$resumeFileName = basename($_FILES["resume"]["name"]);
$resumeFilePath = $targetDir . $resumeFileName;
move_uploaded_file($_FILES["resume"]["tmp_name"], $resumeFilePath);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO users (name, qualification, email, password, phone, resume, age,is_hr) VALUES (?, ?, ?, ?, ?, ?, ?,?)");

$stmt->bind_param("ssssssis", $name, $qualification, $email, $hashedPassword, $phone, $resumeFileName, $age,$isHR);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
