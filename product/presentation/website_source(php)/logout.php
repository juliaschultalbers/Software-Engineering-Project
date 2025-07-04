<?php
// Starte die PHP-Session
session_start();

// Zerstöre alle Session-Daten
session_destroy();

// Leite den Benutzer auf die Anmeldeseite weiter
header("Location: login.php");
exit();
?>
