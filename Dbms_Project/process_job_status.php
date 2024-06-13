<!-- process_job_status.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Status</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('job_status_image.jpg');
            background-color: #f8f9fa;
            color: #495057;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        section {
            background-color: rgba(255, 255, 255, 0.9);
            background-color: #e6ffee;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2, p {
            margin-bottom: 10px;
            font-size: 1.5em;
        }
    </style>
</head>
<body>

    <header>
        <h1>Job Status</h1>
    </header>

    <section>
        <?php
        // Establish a connection to the MySQL database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "job_portal";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission
            $jobSeekerUsername = $_POST['jobSeekerUsername'];

            // Fetch job status from the job_seeker table
            $sql = "SELECT * FROM job_seeker WHERE username = '$jobSeekerUsername'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<h2>Job Status for ' . $row['fullName'] . '</h2>';
                echo '<p>Username: ' . $row['username'] . '</p>';
                echo '<p>Status: ' . $row['status'] . '</p>';
            } else {
                echo '<p>No data found for the provided username.</p>';
            }
        } else {
            // Redirect to the appropriate page if accessed without submitting the form
            header("Location: job_status_interface.php");
            exit();
        }

        // Close the database connection
        $conn->close();
        ?>
    </section>

</body>
</html>
