<?php
// Ensure that the 'resume' parameter is provided in the URL
if (isset($_GET['resume'])) {
    // Get the filename from the URL
    $filename = $_GET['resume'];

    // Define the path to the folder where resumes are stored
    $resumeFolder = 'resume/';

    // Set the path to the resume file
    $filePath = $resumeFolder . $filename;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set the appropriate headers for download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        // If the file doesn't exist, display an error message
        echo 'File not found.';
    }
} else {
    // If 'resume' parameter is not provided, redirect to the applications page
    header('Location: fetch_submitted_applications.php');
    exit;
}
?>
