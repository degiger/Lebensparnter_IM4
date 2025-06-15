<?php
// login.php
ini_set('session.cookie_httponly', 1);
// ini_set('session.cookie_secure', 1); // if using HTTPS
session_start();
header('Content-Type: application/json');

require_once 'config/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'] ?? '';
    $type = $_POST['type'] ?? '';
    $user = $_SESSION['user_id'];


    if (!$message || !$type) {
        echo json_encode(["status" => "error", "message" => "Message / type is required"]);
        exit;
    }

    $insert = $pdo->prepare("INSERT INTO requests (userId, requestType, requestMessage) VALUES (:userId, :requestType, :requestMessage)");
    $insert->execute([
        ':userId' => 4,
        ':requestType'  => $type,
        ':requestMessage' => $message,
    ]);
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
