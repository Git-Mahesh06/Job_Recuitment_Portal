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
            font-size: 20px;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
        }

        .error-message {
            background-color: #FF5252;
            color: white;
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
            $jobTitle = $_POST['jobTitle'];
            $companyName = $_POST['companyName'];
            $companyLocation = $_POST['companyLocation'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "job_portal"; // Replace with your actual database name

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO company (jobTitle, companyName, companyLocation)
                    VALUES ('$jobTitle', '$companyName', '$companyLocation')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="success-message">Company details saved successfully!</div>';

                // Add a button for redirection
                echo '<form action="admin_interface.php" method="get">';
                echo '<input class="ok-button" type="submit" value="OK">';
                echo '</form>';
            } else {
                echo '<div class="error-message">Error: ' . $sql . '<br>' . $conn->error . '</div>';
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
