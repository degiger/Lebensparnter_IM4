// request.js

document.addEventListener("DOMContentLoaded", () => {
  const requestForm = document.getElementById("request-form");
  if (requestForm) {
    requestForm.addEventListener("submit", handleRequestSubmit);
  }
});

/**
 * Haupt-Submit-Handler für das Formular
 */
async function handleRequestSubmit(event) {
  event.preventDefault();

  const { message, type } = getFormValues();

  if (!message || !type) {
    alert("Bitte fülle alle Felder aus.");
    return;
  }

  try {
    const result = await sendRequest({ message, type });

    if (result.status === "success") {
      showSuccessAndRedirect();
    } else {
      showError(result.message || "Request failed.");
    }
  } catch (error) {
    console.error("Error:", error);
    showError("Something went wrong while sending your request.");
  }
}

/**
 * Liest die Werte aus dem Formular
 */
function getFormValues() {
  const message = document.getElementById("message")?.value || "";
  const type = document.getElementById("type")?.value || "";
  return { message, type };
}

/**
 * Sendet die Anfrage per Fetch
 */
async function sendRequest({ message, type }) {
  const response = await fetch("../api/request.php", {
    method: "POST",
    // credentials: 'include', // Falls notwendig bei Cross-Origin
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams({ message, type }),
  });

  return await response.json();
}

/**
 * Zeigt Erfolgsmeldung und leitet weiter
 */
function showSuccessAndRedirect() {
  alert("Request sent!");
  window.location.href = "/dashboard.php";
}

/**
 * Zeigt Fehlermeldung (aktuell per alert)
 */
function showError(message) {
  alert(message);
}
  
