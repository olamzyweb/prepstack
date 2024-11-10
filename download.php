<?php session_start();
$ref = $_SESSION['reference'];
$filename = $_SESSION['fname'];
$fileurl = $_SESSION['furl'];

if(empty($ref)){
    header("location:javascript://history.go(-1)");
    exit;
    }
    if (!isset($_SESSION['furl']) || !isset($_SESSION['fname'])) {
        echo "Download error: file not found.";
        exit;
    }

// File path
$file = "file/".$fileurl; // Replace with your actual file path

// Check if the file exists
if (file_exists($file)) {
    // Set headers to force download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Clear output buffer
    ob_clean();
    flush();

    // Read the file and output it to the user
    readfile($file);
    // Unset specific session variables after download
    // unset($_SESSION['furl']);    // Clear the file URL session
    // unset($_SESSION['fname']);   // Clear the file name session
    // unset($_SESSION['reference']); // Clear the reference session if needed

    exit;
} else {
    echo "File not found.";
}



?>




