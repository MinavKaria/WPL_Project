
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'authguard.php';
    ?>
</body>
</html>
<?php



$conn = new mysqli("localhost", "root", "", "younggigs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h1>Applied Jobs</h1>";


if(isset($_SESSION['user_id'])){ 
    $userID = $_SESSION['user_id']; 
    $query="SELECT applied_jobs.*, jobs.*
    FROM applied_jobs
    INNER JOIN jobs ON applied_jobs.job_id = jobs.id
    GROUP BY applied_jobs.job_id
    HAVING applied_jobs.user_id = $userID
    ";
    $result = $conn->query($query);
    // $row = $result->fetch_assoc();  
    echo "<table class='table table-striped table-hover'>
    <thead>
      <tr>
        <th scope='col'>Job Title</th>
        <th scope='col'>Location</th>
        <th scope='col'>Type</th>
        <th scope='col'>Description</th>
        <th scope='col'>Resume</th>
      </tr>
    </thead>
    <tbody>";
    while($row = $result->fetch_assoc()){
        echo "<tr>
        <td>".$row['title']."</td>
        <td>".$row['location']."</td>
        <td>".$row['type']."</td>
        <td>".$row['description']."</td>
        <td><a href='./uploads/".$row['resumeURL']."'>View Resume</a></td>
       
      </tr>";
    }
    echo "</tbody>
    </table>";



}
else{
    $userID = "";
}

?>
