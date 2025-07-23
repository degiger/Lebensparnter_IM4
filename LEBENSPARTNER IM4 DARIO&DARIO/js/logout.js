// logout.js

document.addEventListener("DOMContentLoaded", () => {
  const logoutButton = document.getElementById("logout-button");

  if (logoutButton) {
    logoutButton.addEventListener("click", handleLogoutClick);
  }
});

/**
 * Haupt-Click-Handler für Logout
 */
async function handleLogoutClick(event) {
  event.preventDefault();

  try {
    const success = await logoutUser();

    if (success) {
      redirectToLogin();
    } else {
      showLogoutError("Logout failed. Please try again.");
    }
  } catch (error) {
    console.error("Logout error:", error);
    showLogoutError("Something went wrong during logout!");
  }
}

/**
 * Ruft Logout-Endpunkt auf
 */
async function logoutUser() {
  const response = await fetch("api/logout.php", {
    method: "GET",
    credentials: "include",
  });

  const result = await response.json();
  return result.status === "success";
}

/**
 * Weiterleitung zur Login-Seite
 */
function redirectToLogin() {
  window.location.href = "/login.php";
}

/**
 * Fehleranzeige
 */
function showLogoutError(message) {
  alert(message); // Optional: durch DOM-Ausgabe ersetzen
}
