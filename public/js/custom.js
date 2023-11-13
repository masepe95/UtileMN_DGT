<script>
    function updateAppointments(){" "}
    {fetch("/api-proxy", { method: "GET" })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            console.log("Success:", data);
            // Qui puoi gestire il successo della chiamata
        })
        .catch((error) => {
            console.error("Error:", error);
            // Qui puoi gestire l'errore
        })}
    function updateContracts(){" "}
    {fetch("/api-proxy2", { method: "GET" })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            console.log("Success:", data);
            // Qui puoi gestire il successo della chiamata
        })
        .catch((error) => {
            console.error("Error:", error);
            // Qui puoi gestire l'errore
        })}
</script>;
