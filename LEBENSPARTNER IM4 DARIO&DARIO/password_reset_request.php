<?php
session_start();
require_once './config/db_config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if (!$email) {
        $message = "Bitte gib Deine E-Mail-Adresse ein.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $expires = date("Y-m-d H:i:s", time() + 3600);

            $pdo->prepare("DELETE FROM password_resets WHERE email = :email")->execute([':email' => $email]);
            $pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (:email, :token, :expires)")
                ->execute([':email' => $email, ':token' => $token, ':expires' => $expires]);

            $link = "https://deine-domain.de/password_reset.php?token=$token";

            // Hinweis: Mailversand hier ergänzen, z. B. mail($email, 'Passwort zurücksetzen', $link);

            $message = "Wenn die E-Mail existiert, senden wir Dir einen Link zum Zurücksetzen.";
        } else {
            $message = "Wenn die E-Mail existiert, senden wir Dir einen Link zum Zurücksetzen.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Passwort zurücksetzen</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css" />
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

    .info-text {
      margin-top: 20px;
      font-size: 18px;
      color: #000;
      text-align: center;
      max-width: 600px;
    }
  </style>
</head>
<body>
  <main class="login-container">
    <h1 class="login-title">Passwort vergessen?</h1>

    <?php if ($message): ?>
      <p class="info-text"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST" class="login-form">
      <input type="email" name="email" class="login-input" placeholder="Deine E-Mail-Adresse" required />
      <button type="submit" class="login-button">Link anfordern</button>
    </form>
  </main>
</body>
</html>
