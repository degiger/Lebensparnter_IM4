<?php
session_start();
require_once './config/db_config.php';

$token = $_GET['token'] ?? '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token    = $_POST['token'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$token || !$password) {
        $message = "Fehlende Eingabe.";
    } else {
        $stmt = $pdo->prepare("SELECT email FROM password_resets WHERE token = :token AND expires_at > NOW()");
        $stmt->execute([':token' => $token]);
        $row = $stmt->fetch();

        if ($row) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $pdo->prepare("UPDATE users SET password = :password WHERE email = :email")
                ->execute([':password' => $hashedPassword, ':email' => $row['email']]);
            $pdo->prepare("DELETE FROM password_resets WHERE email = :email")
                ->execute([':email' => $row['email']]);

            $_SESSION['success_message'] = "Passwort erfolgreich geändert. Du kannst Dich jetzt einloggen.";
            header("Location: /login.php");
            exit();
        } else {
            $message = "Ungültiger oder abgelaufener Token.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Neues Passwort setzen</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <main class="login-container">
    <h1 class="login-title">Neues Passwort</h1>

    <?php if ($message): ?>
      <p class="info-text"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST" class="login-form">
      <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>" />
      <input type="password" name="password" class="login-input" placeholder="Neues Passwort" required />
      <button type="submit" class="login-button">Passwort speichern</button>
    </form>
  </main>
</body>
</html>
