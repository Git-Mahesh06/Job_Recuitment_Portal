<!-- process_admin_login.php -->
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dummy admin credentials (replace these with actual credentials)
    $adminUsername = "admin";
    $adminPasswordHash = password_hash("admin123", PASSWORD_DEFAULT); // Hashed password

    $username = $_POST["adminUsername"];
    $password = $_POST["adminPassword"];

    // Validate credentials
    if ($username == $adminUsername && password_verify($password, $adminPasswordHash)) {
        // Redirect to the admin interface after successful login
        header("Location: admin_interface.php");
        exit();
    } else {
        // Invalid credentials - you may handle this case differently
        header("Location: admin_login.php?error=1");
        exit();
    }
} else {
    // Redirect to login page if accessed without submitting the form
    header("Location: admin_login.php");
    exit();
}
?>
