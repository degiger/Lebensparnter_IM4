// logout.js

document.addEventListener("DOMContentLoaded", () => {
  const logoutButton = document.getElementById("logout-button");
  if (logoutButton) {
    logoutButton.addEventListener("click", handleLogoutClick);
  }
});

async function handleLogoutClick(event) {
  event.preventDefault();
  try {
    const success = await performLogout();
    if (success) {
      redirectToLogin();
    } else {
      showLogoutError("Logout failed. Please try again.");
    }
  } catch (err) {
    console.error("Logout error:", err);
    showLogoutError("Something went wrong during logout!");
  }
}

async function performLogout() {
  const response = await fetch("api/logout.php", {
    method: "GET",
    credentials: "include",
  });
  const result = await response.json();
  return result.status === "success";
}

function redirectToLogin() {
  window.location.href = "/login.php";
}

function showLogoutError(message) {
  alert(message);
}
