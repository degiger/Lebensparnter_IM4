<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Versendet!</title>
  <link rel="stylesheet" href="/css/style.css" />
</head>

<body>
  <header class="header-wrapper">
    <a href="javascript:history.back()" class="header-icon left-icon" aria-label="Zurück">←</a>
    <span class="logo-text">Lebenspartner<sup>™</sup></span>
    <a href="/categories/UeberMich.php" class="header-icon right-icon" aria-label="Profil">👤</a>
  </header>

  <main class="login-container" style="text-align: center;">
    <h2><strong>Versendet&nbsp;!</strong></h2>
    <p>Vielen Dank für Deine Anfrage.</p>
    <p>Dein Fall wurde an die zuständige Stelle weitergeleitet.</p>
    <p>Sie werden innert 24 Stunden telefonisch kontaktiert.</p>

    <a href="/dashboard.php" class="login-button" style="margin-top: 2rem;">Zur Startseite</a>

  </main>
</body>
</html>
