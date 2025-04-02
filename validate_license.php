<?php
// Set headers to handle AJAX request
header('Content-Type: application/json');

// Get the license key from the request
$data = json_decode(file_get_contents('php://input'), true);
$licenseKey = isset($data['licenseKey']) ? $data['licenseKey'] : '';

// Validate the license key (connect to your database or KeyAuth API)
// This is a placeholder - replace with your actual validation logic
function validateLicense($key) {
    // Example: Connect to KeyAuth API or your database
    // For now, we'll just check if the key is not empty
    if (!empty($key)) {
        // Here you would typically check against your database or KeyAuth API
        return true;
    }
    return false;
}

if (validateLicense($licenseKey)) {
    echo json_encode(['valid' => true]);
} else {
    echo json_encode(['valid' => false, 'message' => 'Invalid license key']);
}
?>
