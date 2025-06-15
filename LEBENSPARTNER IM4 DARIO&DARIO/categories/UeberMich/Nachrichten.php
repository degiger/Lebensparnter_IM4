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
  <title>Error</title>

  <link rel="stylesheet" href="/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
  <style>
    .error-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 60vh;
      text-align: center;
    }

    .error-title {
      font-size: 28px;
      font-weight: 700;
      font-style: italic;
      margin-bottom: 20px;
    }

    .error-text {
      font-size: 20px;
      font-style: italic;
    }

    .start-button-wrapper {
      display: flex;
      justify-content: center;
      margin-top: 80px;
      padding: 0 20px;
    }

    .start-button {
      display: inline-block;
      padding: 24px 48px;
      font-size: 28px;
      font-weight: 700;
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 40px;
      text-decoration: none;
      text-align: center;
      transition: background-color 0.2s ease;
      width: 100%;
      max-width: 420px;
    }

    .start-button:hover {
      background-color: #222;
    }

    .start-button:active {
      transform: scale(0.97);
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="header-wrapper">
    <a href="javascript:history.back()" class="header-icon left-icon" aria-label="Zurück">←</a>
    <span class="logo-text">Lebenspartner<sup>™</sup></span>
    <a href="/categories/UeberMich.php" class="header-icon right-icon" aria-label="Profil">👤</a>
  </header>

  <!-- Inhalt -->
  <main class="login-container">
    <div class="error-container">
      <h1 class="error-title">Error</h1>
      <p class="error-text">Seite ist noch in Aufarbeitung.</p>
    </div>

    <div class="start-button-wrapper">
      <a href="/dashboard.php" class="start-button">Zur Startseite</a>
    </div>
  </main>
</body>
</html>
