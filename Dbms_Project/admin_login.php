<!-- admin_login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Add your styling for the admin login page here */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('login_image.jpg'); /* Replace 'your-background-image.jpg' with the actual path to your image */
            background-size: cover;
            background-position: center;
            color: #495057;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column; /* Added to arrange header and form vertically */
        }

        header {
            text-align: center;
            margin-bottom: 20px; /* Added space between header and form */
            color: #ffffff; /* Added text color for better visibility on the background */
        }

        section {
            max-width: 400px;
            width: 100%;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for better readability */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <header>
        <h1>Admin Login</h1>
    </header>

    <section>
        <form action="process_admin_login.php" method="post">
            <label for="adminUsername">Username:</label>
            <input type="text" id="adminUsername" name="adminUsername" required>

            <label for="adminPassword">Password:</label>
            <input type="password" id="adminPassword" name="adminPassword" required>

            <button type="submit">Login</button>
        </form>
    </section>

</body>
</html>
