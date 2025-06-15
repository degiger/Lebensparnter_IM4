// request.js
document.getElementById("request-form").addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const message = document.getElementById("message").value;
    const type = document.getElementById("type").value;

    console.log(message)
  
    try {
      const response = await fetch("../api/request.php", {
        method: "POST",
        // credentials: 'include', // uncomment if front-end & back-end are on different domains
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ message, type }),
      });
      const result = await response.json();
  
      if (result.status === "success") {
        alert("Request sent!");
        window.location.href = "/dashboard.php";
      } else {
        alert(result.message || "Login failed.");
      }
    } catch (error) {
      console.error("Error:", error);
      alert("Something went wrong!");
    }
  });
  