<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            background-color: #f9f9f9;
            font-size: 16px;
            box-sizing: border-box;
            transition: box-shadow 0.3s;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .navbarBox {
            width: 100%;
            background-color: #ffffff;
            height: 10vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .navbarContainer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            gap: 75px;
        }

        .navbarLinks {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
            gap: 50px;
        }

        .logo {
            width: 150px;
        }

        .btn {
            width: 100px;
        }

        .navbarLinks>li {
            font-size: 20px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="stylesheet" href="style.css">


</head>

<body>

    <?php
    include 'authguard.php';

    if (!isset($_SESSION['email'])) {
        echo '<div class="alert alert-danger" role="alert">
    You are not authorized to view this page, Please login first.
    </div>
   
    ';
    }
    else
    {
        echo '
        
            <div class="container">
            <h1>Post a Job</h1>
            <form action="postJobs.php" method="POST">
                <label for="job_title">Job Title:</label><br>
                <input type="text" id="job_title" name="job_title" required><br>

                <label for="company">Company:</label><br>
                <input type="text" id="company" name="company" required><br>

                <label for="location">Location:</label><br>
                <input type="text" id="location" name="location" required><br>

                <label for="description">Job Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

                <label for="type">Job Type:</label><br>
                <select name="type" id="type" required>
                    <option value="full-time">Full-Time</option>
                    <option value="part-time">Part-Time</option>
                    <option value="contract">Contract</option>
                </select><br>
                <br>

                <label for="skills">Skills:</label><br>
                <input type="text" id="skills" name="skills" placeholder="Enter the Skills with Comma" required><br>

                
                <input type="submit" value="Submit">
            </form>
        </div>
        ';
    }
    ?>

</body>

</html>