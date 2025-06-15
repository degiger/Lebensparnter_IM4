<?php
session_start();
require_once './config/db_config.php';

if (isset($_SESSION['user_id'])) {
    header("Location: /dashboard.php");
    exit();
}

$successMessage = $_SESSION['success_message'] ?? '';
unset($_SESSION['success_message']);

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$email || !$password) {
        $errorMessage = "Email und Passwort sind erforderlich";
    } else {
        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email']   = $email;
            header("Location: /dashboard.php");
            exit();
        } else {
            $errorMessage = "Ungültige Zugangsdaten";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lebenspartner Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" />
  <style>
    /* Eingabefelder */
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

    /* Passwort vergessen Link */
    .forgot-password {
      font-size: 16px;
      text-align: right;
      width: 100%;
      max-width: 900px;
      color: #000;
      text-decoration: underline;
      margin-top: -10px;
      margin-bottom: 20px;
    }

    /* Abstand zwischen Buttons */
    .button-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      margin-top: 20px;
      width: 100%;
    }
  </style>
</head>
<body>
  <main class="login-container">
    <h1 class="login-title">Lebenspartner</h1>

    <?php if ($successMessage): ?>
      <p class="success-message"><?php echo htmlspecialchars($successMessage); ?></p>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
      <p class="error-message"><?php echo htmlspecialchars($errorMessage); ?></p>
    <?php endif; ?>

    <form method="POST" class="login-form">
      <input type="email" name="email" placeholder="Email" class="login-input" required />
      <input type="password" name="password" placeholder="Passwort" class="login-input" required />

      <a href="/password_reset_request.php" class="forgot-password">Passwort vergessen?</a>


      <div class="button-container">
        <button type="submit" class="login-button">Login</button>
      </div>
    </form>
  </main>
</body>
</html>
