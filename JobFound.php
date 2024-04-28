<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include 'authguard.php';
    ?>

    <?php
    $location = $_POST['location'];
    $skills = $_POST['skills'];



    $conn = mysqli_connect("localhost", "root", "", "younggigs");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // echo "Connected successfully";
    }

    $query = "SELECT 
        jobs.id,
        jobs.title,
        jobs.location,
        jobs.type,
        jobs.description,
        jobs.company_name,
        GROUP_CONCAT(skills.skill SEPARATOR ', ') AS job_skills
    FROM 
        jobs
    INNER JOIN 
        jobskills ON jobs.id = jobskills.job_id
    INNER JOIN 
        skills ON jobskills.skill_id = skills.id
    GROUP BY 
        jobs.id, jobs.title, jobs.location, jobs.type, jobs.description";

    $conn->query($query);

    $result = $conn->query($query);


    // $query3 = "SELECT * FROM (
    //     SELECT 
    //     jobs.id,
    //     jobs.title,
    //     jobs.location,
    //     jobs.type,
    //     jobs.description,
    //     GROUP_CONCAT(skills.skill SEPARATOR ', ') AS job_skills
    // FROM 
    //     jobs
    // INNER JOIN 
    //     jobskills ON jobs.id = jobskills.job_id
    // INNER JOIN 
    //     skills ON jobskills.skill_id = skills.id
    // GROUP BY 
    //     jobs.id, jobs.title, jobs.location, jobs.type, jobs.description
    // ) WHERE location='$location' AND job_skills IN ('" . implode("', '", $skills) . "')";

    // SELECT * FROM (
    //     SELECT 
    //         jobs.id,
    //         jobs.title,
    //         jobs.location,
    //         jobs.type,
    //         jobs.description,
    //         GROUP_CONCAT(skills.skill SEPARATOR ', ') AS job_skills
    //     FROM 
    //         jobs
    //     INNER JOIN 
    //         jobskills ON jobs.id = jobskills.job_id
    //     INNER JOIN 
    //         skills ON jobskills.skill_id = skills.id
    //     GROUP BY 
    //         jobs.id, jobs.title, jobs.location, jobs.type, jobs.description
    // ) AS job_details
    // WHERE 
    //     job_details.location = 'mumbai' AND job_details.job_skills LIKE '%html%';
    $type=$_POST['jobType'];
    

    if($location=="all")
    {
        echo 'hello';
        $query = "
        SELECT * FROM (
            SELECT 
                jobs.id,
                jobs.title,
                jobs.location,
                jobs.type,
                jobs.description,
                jobs.company_name,
                GROUP_CONCAT(skills.skill SEPARATOR ', ') AS job_skills
            FROM 
                jobs
            INNER JOIN 
                jobskills ON jobs.id = jobskills.job_id
            INNER JOIN 
                skills ON jobskills.skill_id = skills.id
            GROUP BY 
                jobs.id, jobs.title, jobs.location, jobs.type, jobs.description
        ) AS job_details
        WHERE 
            job_details.job_skills LIKE '%" . implode("%' OR job_details.job_skills LIKE '%", $skills) . "%' 
            OR job_details.type='$type' 
            ;";
    }


   else if ($type == "all") {
        echo 'hello2';
        $query = "
            SELECT * FROM (
                SELECT 
                    jobs.id,
                    jobs.title,
                    jobs.location,
                    jobs.type,
                    jobs.description,
                    jobs.company_name,
                    GROUP_CONCAT(skills.skill SEPARATOR ', ') AS job_skills
                FROM 
                    jobs
                    INNER JOIN 
                    jobskills ON jobs.id = jobskills.job_id
                    INNER JOIN 
                    skills ON jobskills.skill_id = skills.id
                GROUP BY 
                    jobs.id, jobs.title, jobs.location, jobs.type, jobs.description
            ) AS job_details
            WHERE 
                job_details.location = '$location' AND (job_details.job_skills LIKE '%" . implode("%' OR job_details.job_skills LIKE '%", $skills) . "%') 
        ;";
    }
    

   else if ($type == 'all' && $location == 'all') {
        echo 'hello3';
        $query = "
            SELECT * FROM (
                SELECT 
                    jobs.id,
                    jobs.title,
                    jobs.location,
                    jobs.type,
                    jobs.description,
                    jobs.company_name,
                    GROUP_CONCAT(skills.skill SEPARATOR ', ') AS job_skills
                FROM 
                    jobs
                    INNER JOIN 
                    jobskills ON jobs.id = jobskills.job_id
                    INNER JOIN 
                    skills ON jobskills.skill_id = skills.id
                GROUP BY 
                    jobs.id, jobs.title, jobs.location, jobs.type, jobs.description
            ) AS job_details
            WHERE 
                (job_details.job_skills LIKE '%" . implode("%' OR job_details.job_skills LIKE '%", $skills) . "%') 
        ;";
    }


    else 
    {
        $query = "
        SELECT * FROM (
            SELECT 
                jobs.id,
                jobs.title,
                jobs.location,
                jobs.type,
                jobs.description,
                jobs.company_name,
                GROUP_CONCAT(skills.skill SEPARATOR ', ') AS job_skills
            FROM 
                jobs
            INNER JOIN 
                jobskills ON jobs.id = jobskills.job_id
            INNER JOIN 
                skills ON jobskills.skill_id = skills.id
            GROUP BY 
                jobs.id, jobs.title, jobs.location, jobs.type, jobs.description
        ) AS job_details
        WHERE 
        LOWER(job_details.location) = LOWER('$location') AND  job_details.job_skills LIKE '%" . implode("%' OR job_details.job_skills LIKE '%", $skills) . "%' AND job_details.type='$type' 
            ;";

        
    }
    

    // echo $query;

    // echo "<h1>Match Found</h1>";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "
        <div class='container mt-5'>
                <div class='row'>
                    <div class='col-md-6'>
                        <h3>Job Match Found</h3>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>Company</th>
                                    <th scope='col'>Title</th>
                                    <th scope='col'>Location</th>
                                    <th scope='col'>Type</th>
                                    <th scope='col'>Skills</th>
                                
                                    <th>Apply</th>
                                </tr>
                            </thead>";
        while ($row = $result->fetch_assoc()) {
            echo "
            
                            <tbody>
                                <tr>
                                    <td>" . $row['company_name'] . "</td>
                                    <td>" . $row['title'] . "</td>
                                    <td>" . $row['location'] . "</td>
                                    <td>" . $row['type'] . "</td>
                                    <td>" . $row['job_skills'] . "</td>
                                    <td><a href='ApplyJob.php?id=" . $row['id'] . "' onclick='return confirmApply()' >Apply</a></td>
                                </tr>
                            </tbody>
                        
            ";
        }

        echo "
        </table>
                    </div>
                </div>
            </div>";
    } else {
        echo "0 results";
    }

    // echo "<h1>Exact Match</h1>";

    // $query2 = "
    // SELECT * FROM (
    //     SELECT 
    //         jobs.id,
    //         jobs.title,
    //         jobs.location,
    //         jobs.type,
    //         jobs.description,
    //         GROUP_CONCAT(skills.skill SEPARATOR ', ') AS job_skills
    //     FROM 
    //         jobs
    //     INNER JOIN 
    //         jobskills ON jobs.id = jobskills.job_id
    //     INNER JOIN 
    //         skills ON jobskills.skill_id = skills.id
    //     GROUP BY 
    //         jobs.id, jobs.title, jobs.location, jobs.type, jobs.description
    // ) AS job_details
    // WHERE 
    //     job_details.location = '$location' AND job_details.job_skills LIKE '%" . implode("%' AND job_details.job_skills LIKE '%", $skills) . "%';";

    // // echo $query2;

    // $result = $conn->query($query2);

    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo "
    //         <div class='container mt-5'>
    //             <div class='row'>
    //                 <div class='col-md-6'>
    //                     <h3>Jobs Found for Exact Match</h3>
    //                     <table class='table'>
    //                         <thead>
    //                             <tr>
    //                                 <th scope='col'>Title</th>
    //                                 <th scope='col'>Location</th>
    //                                 <th scope='col'>Type</th>
    //                                 <th scope='col'>Skills</th>
    //                                 <th>Apply</th>
    //                             </tr>
    //                         </thead>
    //                         <tbody>
    //                             <tr>
    //                                 <td>" . $row['title'] . "</td>
    //                                 <td>" . $row['location'] . "</td>
    //                                 <td>" . $row['type'] . "</td>
    //                                 <td>" . $row['job_skills'] . "</td>
    //                                 <td><a href='ApplyJob.php?id=" . $row['id'] . "'>Apply</a></td>
    //                             </tr>
    //                         </tbody>
    //                     </table>
    //                 </div>
    //             </div>
    //         </div>
    //         ";
    //     }
    // } else {
    //     echo "0 results";
    // }


    // echo "
    // <div class='container mt-5'>
    //     <div class='row'>
    //         <div class='col-md-6'>
    //             <h3>Jobs Found</h3>
    //             <table class='table'>
    //                 <thead>
    //                     <tr>
    //                         <th scope='col'>Title</th>
    //                         <th scope='col'>Location</th>
    //                         <th scope='col'>Type</th>
    //                         <th scope='col'>Skills</th>
    //                     </tr>
    //                 </thead>
    //                 <tbody>"
    // ;


    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         echo "
    //         <tr>
    //             <td>".$row['title']."</td>
    //             <td>".$row['location']."</td>
    //             <td>".$row['type']."</td>
    //             <td>".$row['job_skills']."</td>
    //         </tr>
    //         ";
    //     }
    // } else {
    //     echo "0 results";
    // }

    ?>
</body>
<script>
    function confirm()
    {
       return confirm('Are you sure you wanna apply ?')
    }
</script>

</html>