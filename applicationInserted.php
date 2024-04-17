
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Job List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #f9f9f9;
        }
        .delete-btn {
            background-color: #ff6347;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .delete-btn:hover {
            background-color: #ff4c35;
        }
    </style>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'authguard.php'; ?>





<?php

$userId = $_SESSION['user_id'];
$conn = new mysqli("localhost", "root", "", "younggigs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM jobs WHERE id IN (SELECT job_id FROM UserJobs WHERE user_id = $userId)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $jobs = array();
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
} else {
    $jobs = array();
}

$conn->close();
?>

    <div class="container">
        <h2>Your Job List</h2>
        <table>
            <tr>
                <th>Job Title</th>
                <th>Location</th>
                <th>Type</th>
                <th>Description</th>
                <th>Company Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($jobs as $job) : ?>
                <tr>
                    <td><?php echo $job['title']; ?></td>
                    <td><?php echo $job['location']; ?></td>
                    <td><?php echo $job['type']; ?></td>
                    <td><?php echo $job['description']; ?></td>
                    <td><?php echo $job['company_name']; ?></td>
                    <td>
                        <form method="POST" action="delete_job.php">
                            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
                            <button class="delete-btn" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

