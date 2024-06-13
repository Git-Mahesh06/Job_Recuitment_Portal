<!-- submit_application.php -->
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

        .success-message {
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .ok-button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $education = $_POST['education'];
            $address = $_POST['address'];
            $phoneNumber = $_POST['phoneNumber'];

            // Handle file upload
            $resumeFileName = $_FILES['resume']['name'];
            $resumeTempName = $_FILES['resume']['tmp_name'];
            $resumeUploadPath = 'resume/' . $resumeFileName; // Specify the directory where you want to store resume files

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($resumeTempName, $resumeUploadPath)) {
                // Establish a connection to the MySQL database
                $servername = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbname = "job_portal";

                $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert data into the job_seeker table
                $sql = "INSERT INTO job_seeker (fullName, email, username, education, resume, address, phoneNumber)
                        VALUES ('$fullName', '$email', '$username', '$education', '$resumeUploadPath', '$address', '$phoneNumber')";

                if ($conn->query($sql) === TRUE) {
                    echo '<div class="success-message">Application submitted successfully!</div>';

                    // Add a button for redirection
                    echo '<form action="job_listings.php" method="get">';
                    echo '<input class="ok-button" type="submit" value="OK">';
                    echo '</form>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the database connection
                $conn->close();
            } else {
                echo "Error uploading resume file.";
            }
        }
        ?>
    </div>
</body>
</html>
