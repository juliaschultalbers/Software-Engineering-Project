<?php
session_start();
// Überprüfen, ob die Anfrage per POST erfolgt ist
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Überprüfen, ob die benötigten Felder vorhanden sind
    include_once "nutzer_.php";
    if (isset($_POST['old_pw']) && isset($_POST['new_pw'])) {
        // POST-Daten auslesen
        $oldPassword = $_POST['old_pw'];
        $newPassword = $_POST['new_pw'];
        echo "Altes Passwort: " . htmlspecialchars(hash('sha256', ($oldPassword))) . "<br>";
        echo "Neues Passwort: " . htmlspecialchars(hash('sha256', ($newPassword)));
        echo '...';
        updatePassword($oldPassword, $newPassword);
        // Daten ausgeben (nur zu Demonstrationszwecken, in der Praxis sollten Passwörter nie im Klartext ausgegeben werden)

    } else {
        echo "Fehlende POST-Daten.";
    }
} else {
    echo "Nur POST-Anfragen sind erlaubt.";
}
?>