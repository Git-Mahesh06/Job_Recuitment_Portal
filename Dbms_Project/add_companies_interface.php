<!-- add_companies_interface.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Companies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Add your styling for the add companies interface page here */
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

        form {
            max-width: 600px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 0.5em;
        }

        input {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 1em;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 0.5em 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <header>
        <h1>Add Companies</h1>
    </header>

    <form method="post" action="save_company.php">
        <label for="jobTitle">Job Title:</label>
        <input type="text" id="jobTitle" name="jobTitle" required>

        <label for="companyName">Company Name:</label>
        <input type="text" id="companyName" name="companyName" required>

        <label for="companyLocation">Company Location:</label>
        <input type="text" id="companyLocation" name="companyLocation" required>

        <button type="submit">Save</button>
    </form>

</body>
</html>
