<?php
$conn = new mysqli("localhost", "root", "", "younggigs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['job_id'])) {
    $job_id = $_POST['job_id'];


    $conn->begin_transaction();

    try {

        $conn->query("SET FOREIGN_KEY_CHECKS = 0");


        $sql_delete_user_job = "DELETE FROM userjobs WHERE job_id = $job_id";
        $conn->query($sql_delete_user_job);


        $sql_delete_job_skills = "DELETE FROM jobskills WHERE job_id = $job_id";
        $conn->query($sql_delete_job_skills);


        $sql_delete_job = "DELETE FROM jobs WHERE id = $job_id";
        if ($conn->query($sql_delete_job) === TRUE) {

            $conn->commit();
            echo "Job deleted successfully";
        } else {

            $conn->rollback();
            echo "Error deleting job: " . $conn->error;
        }
    } catch (Exception $e) {

        $conn->rollback();
        echo "Error: " . $e->getMessage();
    } finally {
        $conn->query("SET FOREIGN_KEY_CHECKS = 1");
    }
}

$conn->close();
