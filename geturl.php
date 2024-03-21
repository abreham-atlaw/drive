<?php
require_once 'config.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['filename'])) {
        $filename = $_GET['filename'];
        $path = FILE_PATH . '/' . $filename;

        if (file_exists($path)) {
            $encoded_filename = rawurlencode($filename);
            echo '"' . HOST_ADDRESS . '/' . STATIC_PATH . '/' . $encoded_filename  . '"';
        } else {
            http_response_code(404);
            echo "\"File not found.\"";
        }
    } else {
        http_response_code(400);
        echo "\"Missing filename.\"";
    }
} else {
    http_response_code(405);
    echo "Method not allowed.";
}
?>
