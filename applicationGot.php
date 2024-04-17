<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Jobs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 

    include 'authguard.php'; 
    

    $userID = $_SESSION['user_id'];

 
    $conn = new mysqli('localhost', 'root', '', 'younggigs');


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve applied jobs data
    $sql= "
    SELECT users.user_id, job_id, applied_date, resumeURL, name, email, qualification, phone, age,title 
    FROM applied_jobs, users, jobs
    WHERE applied_jobs.user_id = users.user_id and jobs.id=applied_jobs.job_id
    AND job_id IN (
        SELECT DISTINCT jobskills.job_id
        FROM jobskills, userjobs 
        WHERE jobskills.job_id = userjobs.job_id 
        AND userjobs.user_id = $userID
    );
    ";

    // Execute SQL query
    $result = $conn->query($sql);
    ?>

    <div class="container mt-5">
        <h2>Applied Jobs</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Job Name</th>
                    <th>Applied Date</th>
                    <th>Resume URL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Qualification</th>
                    <th>Phone</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['user_id']}</td>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>{$row['applied_date']}</td>";
                        echo "<td><a href='./uploads/".$row['resumeURL']."'>View Resume</a></td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['qualification']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['age']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No applied jobs found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Close database connection
    $conn->close();
    ?>
</body>
</html>
