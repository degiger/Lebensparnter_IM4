<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}

// Formular wurde abgeschickt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Du kannst hier die Anfrage verarbeiten oder speichern, z. B. in einer Datenbank oder per Mail versenden

    // Danach weiterleiten zur Bestätigungsseite
    header("Location:/categories/bestaetigung.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digitaler Amtsgang</title>
  <link rel="stylesheet" href="/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <header class="header-wrapper">
    <a href="javascript:history.back()" class="header-icon left-icon" aria-label="Zurück">←</a>
    <span class="logo-text">Lebenspartner<sup>™</sup></span>
    <a href="/categories/UeberMich.php" class="header-icon right-icon" aria-label="Profil">👤</a>
  </header>

  <main class="login-container">
    <h1 class="login-title">Digitaler Amtsgang</h1>

    <form method="POST" class="login-form">
      <input type="hidden" name="type" value="Beratung-DigitalerAmtsgang" />
      <textarea name="message" class="textarea-box" placeholder="Wobei brauchst Du Unterstützung bei digitalen Behördengängen?"></textarea>
      <p class="info-text">
        Eine qualifizierte Fachkraft wird sich innerhalb von 24 Stunden mit Dir in Verbindung setzen.
      </p>
      <button type="submit" class="login-button">Absenden</button>
    </form>
  </main>
</body>
</html>
