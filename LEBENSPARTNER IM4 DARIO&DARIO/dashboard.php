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
  <title>Lebenspartner</title>

  <link rel="stylesheet" href="/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
  <header class="header-wrapper">
    <span class="logo-text">Lebenspartner<sup>™</sup></span>
    <a href="/categories/UeberMich.php" class="header-icon right-icon" aria-label="Profil">👤</a>
  </header>

  <main class="login-container">
    <h1 class="login-title">Willkommen</h1>

    <div class="login-form link-wrapper">
      <a href="/categories/HaushaltWohnen.php" class="login-button">🏠 Haushalt & Wohnen</a>
      <a href="/categories/DigitaleUnterstuetzung.php" class="login-button">💻 Digitale Unterstützung</a>
      <a href="/categories/BuerokratieBeratung.php" class="login-button">📄 Bürokratie & Beratung</a>
      <a href="/categories/UeberMich.php" class="login-button">👤 Über mich</a>
    </div>

    <div class="button-wrapper">
    <button class="logout-button" id="logout-button">Logout</button>
    </div>
  </main>

  <script src="/js/logout.js"></script>
</body>
</html>
