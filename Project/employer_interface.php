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
        <h1>Employer Interface</h1>
    </header>

    <nav>
        <a href="add_companies_interface.php"><i class="fas fa-building"></i> Company</a>
        <a href="?page=manage_users"><i class="fas fa-users"></i> Manage Users</a>
    </nav>

    <section>
        <?php
        // Check if a specific page is requested
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            // Include the appropriate script based on the requested page
            if ($page === 'manage_users') {
                include('fetch_submitted_applications.php');
            } elseif ($page === 'company') {
                // Add content for the "Company" page here
                echo '<p>Welcome to the Company page. Add content for Company management here.</p>';
            } else {
                // Default content for other pages
                echo '<p>Welcome to the Employer Interface. Select an option from the navigation.</p>';
            }
        } else {
            // Default content for no specific page
            echo '<p>Welcome to the Employer Interface. Select an option from the navigation.</p>';
        }
        ?>
    </section>

</body>
</html>
