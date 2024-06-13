<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Recruitment Portal</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('interface_image.jpg'); /* Replace 'background.jpg' with your image path */
        background-size: cover;
        background-position: center;
    }
    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
    }
    h1 {
        color: #ffffff;
    }
    .buttons {
        margin-top: 20px;
    }
    .buttons button {
        padding: 10px 20px;
        margin: 0 10px;
        font-size: 19px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.4s;
    }
    .buttons button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Job Recruitment Portal</h1>
    <div class="buttons">
        <button onclick="location.href='employer_signup.php';">Employee</button>
        <button onclick="location.href='signup.php';">Applicant</button>
        <button onclick="location.href='admin_login.php';">Admin</button>
    </div>
</div>

</body>
</html>
