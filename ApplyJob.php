<?php
session_start();

$conn = new mysqli("localhost", "root", "", "younggigs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' parameter is not null
if($_GET['id'] !== null){
    $jobID = $_GET['id'];
    $userID = $_SESSION['user_id'];

    $findResume = "SELECT resume FROM users WHERE user_id = $userID";
    $result = $conn->query($findResume);
    $row = $result->fetch_assoc();
    $resumeURL = $row['resume'];
    echo $resumeURL;

    $sql = "INSERT INTO applied_jobs (job_id, user_id, applied_date, resumeURL) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $jobID, $userID, date("Y-m-d"), $resumeURL);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: application.php");
} else {
    header("Location: application.php");
}
?>
