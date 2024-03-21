<?php
require_once 'config.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $path = FILE_PATH;

        if (move_uploaded_file($file['tmp_name'], $path . '/' . $file['name'])) {
            http_response_code(200);
            echo "";
        } else {
            http_response_code(500);
            echo "Failed to upload file.";
        }
    } else {
        http_response_code(400);
        echo "Missing file.";
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Pre-flight request. Reply successfully:
    http_response_code(200);
} else {
    http_response_code(405);
    echo "Method not allowed.";
}
?>

