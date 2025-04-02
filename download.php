<?php
// Get the license key from the URL
$licenseKey = isset($_GET['key']) ? $_GET['key'] : '';

// Validate the license key again for security
function validateLicense($key) {
    // Implement the same validation logic as in validate_license.php
    if (!empty($key)) {
        return true;
    }
    return false;
}

if (!validateLicense($licenseKey)) {
    header('HTTP/1.0 403 Forbidden');
    echo 'Access denied';
    exit;
}

// Path to your executable file
$filePath = 'files/MewWare.exe';

// Check if file exists
if (!file_exists($filePath)) {
    header('HTTP/1.0 404 Not Found');
    echo 'File not found';
    exit;
}

// Force download by setting appropriate headers
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="MewWare.exe"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($filePath));

// Clear output buffer
ob_clean();
flush();

// Read the file and pass it directly to the output
readfile($filePath);
exit;
?>
