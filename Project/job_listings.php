<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings - Job Recruitment Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #495057;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 1em 0;
            text-align: center;
        }

        nav {
            background-color: #495057;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 1em;
            font-size: 1.2em;
        }

        section {
            padding: 2em;
        }

        .job-listing {
            display: flex;
            justify-content: space-between;
            border: 1px solid #ced4da;
            border-radius: 8px;
            margin-bottom: 1.5em;
            padding: 1.5em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .job-listing div {
            flex: 1;
        }

        .job-listing h3 {
            color: #007bff;
        }

        .apply-btn {
            background-color: #007bff;
            color: #fff;
            padding: 0.5em 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .apply-btn:hover {
            background-color: #0056b3;
        }

        .blink {
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 49%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1.5em 0;
            text-align: center;
        }

        footer p {
            margin: 0;
        }

        .search-bar {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 1em;
        }

        /* Additional style for the button */
        #viewJobStatusBtn {
            background-color: #28a745;
            color: #fff;
            padding: 0.5em 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #viewJobStatusBtn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <header>
        <h1>Job Listings</h1>
    </header>

    <nav>
        <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
        <button id="viewJobStatusBtn">View Applied Job Status</button>
    </nav>

    <section>
        <h2>Latest Job Listings</h2>

        <!-- Search Bar -->
        <input type="text" class="search-bar" id="jobSearch" placeholder="Search for a job...">

        <!-- Job Listings -->
        <?php
            // Establish a MySQL connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "job_portal";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch and display job listings from the database
            $jobList = mysqli_query($conn, "SELECT * FROM company");

            foreach ($jobList as $job) {
                if (isset($job["jobTitle"])) {
                    echo '<div class="job-listing" id="job_' . strtolower(str_replace(' ', '_', $job["jobTitle"])) . '">';
                    echo '<div>';
                    echo '<h3>' . $job["jobTitle"] . '</h3>';
                    echo '<p>Company: ' . $job["companyname"] . '</p>';
                    echo '<p>Location: ' . $job["companyLocation"] . '</p>';
                    echo '</div>';
                    echo '<button class="apply-btn" onclick="applyNow(\'' . strtolower(str_replace(' ', '_', $job["jobTitle"])) . '\')">Apply Now</button>';
                    echo '</div>';
                }
            }
            
        ?>
    </section>

    <footer>
        <p>&copy; 2024 Job Recruitment Portal. All rights reserved.</p>
    </footer>

    <script>
        // JavaScript to handle job search and blinking effect
        document.getElementById('jobSearch').addEventListener('input', function () {
            var searchValue = this.value.toLowerCase();
            var jobListings = document.querySelectorAll('.job-listing');
            
            jobListings.forEach(function (listing) {
                var jobTitle = listing.querySelector('h3').innerText.toLowerCase();
                if (jobTitle.includes(searchValue)) {
                    listing.classList.add('blink');
                } else {
                    listing.classList.remove('blink');
                }
            });
        });

        // Function to handle Apply Now button click
        function applyNow(jobId) {
            var jobListing = document.getElementById('job_' + jobId);
            jobListing.classList.remove('blink');
            
            // Redirect to Job Seeker Interface
            window.location.href = 'job_seeker_interface.php';
        }

        // Add an event listener to the View Applied Job Status button
        document.getElementById('viewJobStatusBtn').addEventListener('click', function () {
            // Redirect to Job Status Interface
            window.location.href = 'job_status_interface.php';
        });
    </script>

</body>
</html>
