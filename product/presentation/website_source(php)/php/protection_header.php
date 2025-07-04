<?php
  

session_start();

// Überprüfe, ob der Benutzer eingeloggt ist (du solltest dies an deine Authentifizierungslogik anpassen)
if (!isset($_SESSION['user_id'])) {
    echo '<html><script>document.location="logout.php"</script></html>';

    header("Location: login.php"); // Weiterleitung auf die Anmeldeseite
    exit();
}
?>
