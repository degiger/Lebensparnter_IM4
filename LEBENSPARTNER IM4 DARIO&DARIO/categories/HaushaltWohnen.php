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
  <title>Haushalt & Wohnen</title>

  <link rel="stylesheet" href="../css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Zentrierter Header -->
  <header class="header-wrapper">
    <a href="javascript:history.back()" class="header-icon left-icon" aria-label="Zurück">←</a>
    <span class="logo-text">Lebenspartner<sup>™</sup></span>
    <a href="/categories/UeberMich.php" class="header-icon right-icon" aria-label="Profil">👤</a>
  </header>

  <!-- Hauptinhalt -->
  <main class="login-container">
    <h1 class="login-title">Haushalt & Wohnen</h1>

    <div class="login-form link-wrapper">
      <a href="HaushaltWohnen/ReinigungPutzhilfe.php" class="login-button">🧼 Reinigung & Putzhilfe</a>
      <a href="HaushaltWohnen/WaescheBuegelservice.php" class="login-button">👕 Wäsche & Bügelservice</a>
      <a href="HaushaltWohnen/HandwerksarbeitenundkleinereReperaturen.php" class="login-button">🛠️ Handwerksarbeiten & kleine Reparaturen</a>
      <a href="HaushaltWohnen/Gartenpflege.php" class="login-button">🌿 Gartenpflege</a>
    </div>

    <div class="button-wrapper">
      <button class="emergency-button">Notruf kontaktieren</button>
    </div>
  </main>
</body>
</html>
