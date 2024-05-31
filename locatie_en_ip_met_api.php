<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land en IP met API ophalen</title>
</head>
<body>
<script>
    // Wacht tot het volledige document is geladen
    document.addEventListener("DOMContentLoaded", function() {
        // Haal de waarde van 'formSubmitted' op uit sessionStorage
        const alreadySubmitted = sessionStorage.getItem('formSubmitted');
        
        // Controleer of het formulier al is verzonden
        if (!alreadySubmitted) {
            // Gebruik fetch API om de geolocatie gegevens van ipapi.co op te halen
            fetch('https://ipapi.co/json/')
                .then(response => response.json()) // Converteer de response naar JSON
                .then(data => {
                    // Haal de landnaam en het IP-adres uit de response data
                    const land = data.country_name;
                    const ip = data.ip;
                    
                    // Stel de waarde van het verborgen inputveld 'land' in
                    document.getElementById('land').value = land;
                    
                    // Stel de waarde van het verborgen inputveld 'ip' in
                    document.getElementById('ip').value = ip;
                    
                    // Markeer in sessionStorage dat het formulier is verzonden
                    sessionStorage.setItem('formSubmitted', 'true');
                    
                    // Verzend het formulier
                    document.getElementById('myForm').submit();
                })
                .catch(error => console.error('Error fetching geolocation:', error)); 
				// Foutafhandeling
        }
    });
</script>

    <div class="container">
        <h1>Land en IP met API ophalen</h1>
    </div>
    <form id="myForm" method="post">
        <input type="text" id="land" name="land" hidden>
		<input type="text" id="ip" name="ip" hidden>
    </form>
</body>
</html>

<?php

// Controleer of de POST-variabele 'land' is ingesteld
if (isset($_POST['land'])) {
    $land = $_POST['land'];
	$ip = $_POST['ip'];
	
	echo "Land: ".$land;
	echo "</br>IP: ".$ip;	
}
?>