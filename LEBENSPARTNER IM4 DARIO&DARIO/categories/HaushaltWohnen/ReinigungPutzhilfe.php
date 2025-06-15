<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}

// Formular wurde abgeschickt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hier kannst du die Anfrage verarbeiten oder speichern

    // Weiterleitung zur Bestätigungsseite
    header("Location:/categories/bestaetigung.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reinigung und Putzhilfe</title>

  <!-- Korrekte CSS-Einbindung -->
  <link rel="stylesheet" href="/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Einheitlicher Header -->
  <header class="header-wrapper">
    <a href="javascript:history.back()" class="header-icon left-icon" aria-label="Zurück">←</a>
    <span class="logo-text">Lebenspartner<sup>™</sup></span>
    <a href="/categories/UeberMich.php" class="header-icon right-icon" aria-label="Profil">👤</a>
  </header>

  <!-- Hauptinhalt -->
  <main class="login-container">
    <h1 class="login-title">Reinigung / Putzhilfe</h1>

    <form method="POST" class="login-form">
      <input type="hidden" name="type" value="HaushaltWohnen-ReinigungPutzhilfe" />

      <textarea name="message" class="textarea-box" placeholder="Beschreibe Dein Anliegen zur Reinigung und Putzhilfe."></textarea>

      <p class="info-text">
        Die zuständige Behörde / Firma wird sich in den nächsten 24 Stunden mit Dir in Verbindung setzen.
      </p>

      <button type="submit" class="login-button">Absenden</button>
    </form>
  </main>
</body>
</html>
