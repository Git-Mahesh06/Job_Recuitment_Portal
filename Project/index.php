<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Recruitment Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: url('job_images.jpg') center center fixed;
            background-size: cover;
            color: #495057;
        }

        header {
            background: url('job_images.jpg') center center fixed; /* Add your header background image here */
            background-size: cover;
            color: #000000; /* Change text color */
            padding: 2em 0; /* Increase padding for a larger header */
            text-align: center;
        }

        h1 {
            font-size: 3em; /* Increase font size for header */
            margin-bottom: 0.5em; /* Adjust spacing */
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
            background-color: rgba(255, 255, 255, 0.8); /* Add an overlay for better readability */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 20px;
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

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1.5em 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <header>
        <h1>Job Recruitment Portal</h1>
    </header>

    <nav>
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="job_listings.php"><i class="fas fa-briefcase"></i> Jobs</a>
        <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
    </nav>

    <section>
        <h2>Welcome to the Job Recruitment Portal</h2>
        <p>Find your dream job here!</p>
       <a href="job_listings.php" style="text-decoration: none; color: #495057;">
           <div style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
               <i class="fas fa-briefcase" style="font-size: 40px; margin-bottom: 10px;"></i>
               <button class="apply-btn">Apply Now</button>
           </div>
       </a>
    </section>

    <footer>
        <p>&copy; 2024 Job Recruitment Portal. All rights reserved.</p>
    </footer>

</body>
</html>
