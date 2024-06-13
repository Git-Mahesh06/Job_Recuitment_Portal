<!-- admin_interface.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('_image.jpg'); /* Replace 'your-background-image.jpg' with the actual path to your image */
            background-size: cover;
            background-position: center;
            color: #495057;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            width: 100%;
        }

        nav {
            background-color: #343a40;
            padding: 10px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
        }

        nav a i {
            margin-right: 5px;
        }

        nav a:hover {
            background-color: #555;
        }

        section {
            margin: 20px;
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        section p {
            font-size: 1.2em;
        }
    </style>
</head>
<body>

    <header>
        <h1>Admin Interface</h1>
    </header>

    <nav>
        <a href="?page=manage_employee"><i class="fas fa-building"></i> Manage Employees</a>
        <a href="?page=manage_users"><i class="fas fa-users"></i> Manage Users</a>
    </nav>

    <section>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root"; // Replace with your database username
        $password = ""; // Replace with your database password
        $dbname = "job_portal"; // Replace with your database name

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if a specific page is requested
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            // Include the appropriate script based on the requested page
            if ($page === 'manage_employee') {
                $sql = "SELECT * FROM company";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Job Title</th><th>Company Name</th><th>Location</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['jobTitle'] . "</td>";
                        echo "<td>" . $row['companyname'] . "</td>";
                        echo "<td>" . $row['companyLocation'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No records found.";
                }
            } elseif ($page === 'manage_users') {
                $sql = "SELECT * FROM job_seeker";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Full Name</th><th>Email</th><th>Username</th><th>Education</th><th>Resume</th><th>Address</th><th>Phone Number</th><th>Status</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['fullName'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['education'] . "</td>";
                        echo "<td>" . $row['resume'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['phoneNumber'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No records found.";
                }
            } else {
                // Default content for other pages
                echo '<p>Welcome to the Admin Interface. Select an option from the navigation.</p>';
            }
        } else {
            // Default content for no specific page
            echo '<p>Welcome to the Admin Interface. Select an option from the navigation.</p>';
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </section>

</body>
</html>
