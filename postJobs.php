<?php
$conn = new mysqli("localhost", "root", "", "younggigs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

$title = $_POST['job_title'];
$location = $_POST['location'];
$type = $_POST['type'];
$description = $_POST['description'];
$company_name = $_POST['company'];
$skills = $_POST['skills'];

$user_id = $_SESSION['user_id'];

// Separate the skills with commas
$skills_array = explode(",", $skills);

// Trim whitespace from each skill and remove empty values
$skills_array = array_map('trim', $skills_array);
$skills_array = array_filter($skills_array);

// Initialize an array to store skill IDs
$skill_ids = array();

// Prepare the insert statement for skills outside the loop
$stmt_insert_skill = $conn->prepare("INSERT INTO skills (skill) VALUES (?)");
$stmt_insert_skill->bind_param("s", $skill);

foreach ($skills_array as $skill) {
    // Check if skill exists
    $sql_check_skill = "SELECT id FROM skills WHERE skill = ?";
    $stmt_check_skill = $conn->prepare($sql_check_skill);
    $stmt_check_skill->bind_param("s", $skill);
    $stmt_check_skill->execute();
    $result = $stmt_check_skill->get_result();
    
    if ($result->num_rows == 0) {
        // If skill does not exist, execute the insert statement
        $stmt_insert_skill->execute();
        $skill_id = $conn->insert_id;
    } else {
        // If skill exists, get its ID
        $row = $result->fetch_assoc();
        $skill_id = $row['id'];
    }
    
    $skill_ids[] = $skill_id;
}

// Close the statement after the loop
$stmt_insert_skill->close();

// Insert job details into the 'jobs' table using prepared statement
$sql_job = "INSERT INTO jobs (title, location, type, description, company_name) 
            VALUES (?, ?, ?, ?, ?)";
$stmt_job = $conn->prepare($sql_job);
$stmt_job->bind_param("sssss", $title, $location, $type, $description, $company_name);

if ($stmt_job->execute()) {
    $job_id = $conn->insert_id;

    // Insert user job relationship
    $sql_user_job = "INSERT INTO UserJobs (job_id, user_id) VALUES (?, ?)";
    $stmt_user_job = $conn->prepare($sql_user_job);
    $stmt_user_job->bind_param("ii", $job_id, $user_id);
    $stmt_user_job->execute();
    
    // Insert job-skill relationships
    foreach ($skill_ids as $skill_id) {
        $sql_pivot = "INSERT INTO jobskills (job_id, skill_id) VALUES (?, ?)";
        $stmt_pivot = $conn->prepare($sql_pivot);
        $stmt_pivot->bind_param("ii", $job_id, $skill_id);
        $stmt_pivot->execute();
        $stmt_pivot->close();
    }
    
    echo "Job details, skills, and pivot data inserted successfully";
} else {
    echo "Error inserting job: " . $conn->error;
}

$stmt_job->close();
$stmt_user_job->close();
$stmt_check_skill->close();

$conn->close();
?>
