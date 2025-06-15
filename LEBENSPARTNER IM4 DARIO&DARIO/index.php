<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lebenspartner – Startseite</title>
  <link rel="stylesheet" href="/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
  <style>
    .start-buttons {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      margin-top: 40px;
      width: 100%;
    }

    .start-button {
      display: block;
      width: 100%;
      max-width: 900px;
      padding: 28px 40px;
      border-radius: 40px;
      background-color: #000;
      color: #fff;
      font-size: 32px;
      font-weight: 700;
      font-family: "Inter", sans-serif;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .start-button:hover {
      background-color: #222;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    }

    .welcome-text {
      font-size: 22px;
      text-align: center;
      margin-top: 30px;
      max-width: 700px;
      color: #000;
    }
  </style>
</head>
<body>
  <main class="login-container">
    <h1 class="login-title">Willkommen bei Lebenspartner</h1>

    <p class="welcome-text">
      Deine digitale Begleitung im Alltag – Hilfe bei Behördengängen, Technik, Haushalt und mehr.
      Bitte melde Dich an oder registriere Dich, um loszulegen.
    </p>

    <div class="start-buttons">
      <a href="/login.php" class="start-button">Login</a>
      <a href="/register.php" class="start-button">Registrieren</a>
    </div>
  </main>
</body>
</html>
