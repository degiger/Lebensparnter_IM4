<?php
// config.php
$host = 'localhost'; // für Ausbildungsserver von FHGR dürfen wir so lassen
$db   = '381552_2_1';  // Change to your DB name
$user = '381552_2_1';   // Change to your DB user
$pass = 'BOmrdhynq9k5';       // Change to your DB pass if needed

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    // Optional: Set error mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    error_log("Database connection error: " . $e->getMessage());
    echo "An error occurred while connecting to the database. Please try again later.";
    exit();
}
?>