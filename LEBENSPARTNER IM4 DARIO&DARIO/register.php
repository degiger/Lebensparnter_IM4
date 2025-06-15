<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once './config/db_config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name   = trim($_POST['first_name'] ?? '');
    $last_name    = trim($_POST['last_name'] ?? '');
    $street       = trim($_POST['street'] ?? '');
    $city_zip     = trim($_POST['city_zip'] ?? '');
    $phone_number = trim($_POST['phone_number'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $password     = trim($_POST['password'] ?? '');

    if (!$first_name || !$last_name || !$street || !$city_zip || !$phone_number || !$email || !$password) {
        $message = "Alle Felder sind erforderlich.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        if ($stmt->fetch()) {
            $message = "Diese Email wird bereits verwendet.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $insert = $pdo->prepare("
                INSERT INTO users (first_name, last_name, street, city_zip, phone_number, email, password)
                VALUES (:first_name, :last_name, :street, :city_zip, :phone_number, :email, :password)
            ");
            $insert->execute([
                ':first_name'   => $first_name,
                ':last_name'    => $last_name,
                ':street'       => $street,
                ':city_zip'     => $city_zip,
                ':phone_number' => $phone_number,
                ':email'        => $email,
                ':password'     => $hashedPassword
            ]);

            $_SESSION['success_message'] = "Registrierung erfolgreich! Du kannst dich jetzt einloggen.";
            header("Location: /login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lebenspartner Registrierung</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .login-input {
      width: 100%;
      max-width: 900px;
      padding: 22px 30px;
      border-radius: 40px;
      background-color: #ddd;
      font-size: 20px;
      font-style: italic;
      border: none;
    }

    .message-box {
      margin-bottom: 20px;
      font-size: 18px;
      color: red;
      text-align: center;
      max-width: 600px;
    }

    .login-button {
      display: block;
      width: 100%;
      max-width: 900px;
      padding: 28px 40px;
      border-radius: 40px;
      background-color: #31f;
      color: #fff;
      font-size: 32px;
      font-weight: 700;
      font-family: "Inter", sans-serif;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .login-button:hover {
      background-color: #1e1ee6;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    }

    .login-button:active {
      transform: scale(0.97);
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2) inset;
    }
  </style>
</head>
<body>
  <main class="login-container">
    <h1 class="login-title">Registrierung</h1>

    <?php if ($message): ?>
      <p class="message-box"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST" class="login-form">
      <input type="text" name="first_name" class="login-input" placeholder="Vorname" required />
      <input type="text" name="last_name" class="login-input" placeholder="Nachname" required />
      <input type="text" name="street" class="login-input" placeholder="Straße" required />
      <input type="text" name="city_zip" class="login-input" placeholder="Ort & PLZ" required />
      <input type="tel" name="phone_number" class="login-input" placeholder="Telefonnummer" required />
      <input type="email" name="email" class="login-input" placeholder="Email" required />
      <input type="password" name="password" class="login-input" placeholder="Passwort" required />

      <button type="submit" class="login-button">Registrieren</button>
    </form>
  </main>
</body>
</html>
