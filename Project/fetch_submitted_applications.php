<!-- fetch_submitted_applications.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetched Applications</title>
    <style>
        /* Add your styles as needed */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

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

// Fetch submitted applications
$sql = "SELECT * FROM job_seeker";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Submitted Applications</h2>';
    echo '<table>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Education</th>
                <th>Resume</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['fullName'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['education'] . '</td>';
        echo '<td><a href="download_resume.php?resume=' . basename($row['resume']) . '" target="_blank">Download Resume</a></td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['phoneNumber'] . '</td>';
        echo '<td>' . $row['status'] . '</td>';
        echo '<td>
                <form method="post" action="process_application_decision.php">
                    <input type="hidden" name="username" value="' . $row['username'] . '">
                    <button type="submit" name="accept">Accept</button>
                    <button type="submit" name="reject">Reject</button>
                </form>
            </td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No submitted applications.';
}

// Close the database connection
$conn->close();
?>

</body>
</html>