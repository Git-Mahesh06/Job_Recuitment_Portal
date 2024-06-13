<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
        }

        .success-message, .error-message {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            font-size: 24px;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
        }

        .error-message {
            background-color: #FF5252;
            color: white;
        }

        .thumbs-up {
            font-size: 36px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
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
            $username = $_POST['username'];

            // Determine the action based on the button clicked
            if (isset($_POST['accept'])) {
                // Perform action for accepting the application
                $status = 'Accepted';
                echo '<div class="success-message"><span class="thumbs-up">&#128077;</span> Application accepted for Job Seeker with username ' . $username . '</div>';
            } elseif (isset($_POST['reject'])) {
                // Perform action for rejecting the application
                $status = 'Rejected';
                echo '<div class="error-message">Application rejected for Job Seeker with username ' . $username . '</div>';
            } else {
                // Invalid action
                echo '<div class="error-message">Invalid action</div>';
                exit();
            }

            // Update the status in the job_seeker table
            $updateSql = "UPDATE job_seeker SET status = '$status' WHERE username = '$username'";

            if ($conn->query($updateSql) === TRUE) {
                echo '<div>Status updated successfully.</div>';
            } else {
                echo '<div>Error updating status: ' . $conn->error . '</div>';
            }
        } else {
            // Redirect to the appropriate page if accessed without submitting the form
            header("Location: admin_interface.php");
            exit();
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
