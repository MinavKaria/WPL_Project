<?php
$conn = new mysqli("localhost", "root", "", "younggigs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['job_title'];
$location = $_POST['location'];
$type = $_POST['type'];
$description = $_POST['description'];
$company_name = $_POST['company'];
$skills = $_POST['skills'];

// Separate the skills with commas
$skills_array = explode(",", $skills);

// Trim whitespace from each skill and remove empty values
$skills_array = array_map('trim', $skills_array);
$skills_array = array_filter($skills_array);

// Initialize an array to store skill IDs
$skill_ids = array();

// Insert job details into the 'jobs' table
$sql_job = "INSERT INTO jobs (title, location, type, description, company_name) 
            VALUES ('$title', '$location', '$type', '$description', '$company_name')";

if ($conn->query($sql_job) === TRUE) {
   
    $job_id = $conn->insert_id;
    
   
    foreach ($skills_array as $skill) {
   
        $sql_check_skill = "SELECT id FROM skills WHERE skill = '$skill'";
        $result = $conn->query($sql_check_skill);
        
    
        if ($result->num_rows == 0) {
            $sql_insert_skill = "INSERT INTO skills (skill) VALUES ('$skill')";
            $conn->query($sql_insert_skill);
            
          
            $skill_id = $conn->insert_id;
        } else {
        
            $row = $result->fetch_assoc();
            $skill_id = $row['id'];
        }
        
        
        $skill_ids[] = $skill_id;
    }
    
 
    foreach ($skill_ids as $skill_id) {
        $sql_pivot = "INSERT INTO jobskills (job_id, skill_id) 
                      VALUES ('$job_id', '$skill_id')";
        $conn->query($sql_pivot);
    }
    
    echo "Job details, skills, and pivot data inserted successfully";
} else {
    echo "Error inserting job: " . $conn->error;
}

$conn->close();
?>
