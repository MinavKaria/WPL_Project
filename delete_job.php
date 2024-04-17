<?php
$conn = new mysqli("localhost", "root", "", "younggigs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['job_id'])) {
    $job_id = $_POST['job_id'];


    $sql_delete_user_job = "DELETE FROM userjobs WHERE job_id = $job_id";
    $conn->query($sql_delete_user_job);
   
    $sql_delete_job = "DELETE FROM jobs WHERE id = $job_id";
    if ($conn->query($sql_delete_job) === TRUE) {
        echo "Job deleted successfully";
    } else {
        echo "Error deleting job: " . $conn->error;
    }

 
}

$conn->close();
?>
