<?php

include_once('config_.php');
include_once('file_.php');
include_once 'crypt.php';

@session_start();
function generateId_USER() {
    return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 9, 9);
}


function FILEPATH_JSON_USERS() {
    return $_SERVER['DOCUMENT_ROOT']."/db/users.json";
}

function loadUsers() {
    $file = FILEPATH_JSON_USERS();
    if (!file_exists($file)) {
        return [];
    }
    $jsonData = file_get_contents($file);
    return json_decode($jsonData, true);
}
function CountUsers() {
    $file = FILEPATH_JSON_USERS();
    if (!file_exists($file)) {
        return 0;
    }
    $jsonData = file_get_contents($file);
    return count(json_decode($jsonData, true));
}
function saveUsers($users) {
    $file = FILEPATH_JSON_USERS();
    $jsonData = json_encode($users, JSON_PRETTY_PRINT);
    return file_put_contents($file, $jsonData);
}

function findUser($userelement) {
    $users = loadUsers();
    foreach ($users as $user) {
        if ($user['username'] === $userelement || $user['id'] === $userelement) {
            return $user;
        }
    }
    return false;
}

function createUser($username, $password) {
   
    $users = loadUsers();
    if (findUser($username)) {
        echo "Nutzer existiert bereits";
        return false;
    }

    $user = [
        'username' => $username,
        'password' => hash('sha256',$password),
        'id' => generateId_USER()
        // Füge hier weitere Felder hinzu, falls nötig
    ];

    $users[] = $user;
    return saveUsers($users);
}
function updatePassword( $oldPassword, $newPassword) {
    echo '...';
    // Angenommen, die Funktion findUser() gibt einen Benutzer als Array mit dem gespeicherten Passwort-Hash zurück
    $user = findUser($_SESSION['user_id']);
    

    $match_pw = hash('sha256',$oldPassword);
    // Überprüfen, ob das alte Passwort korrekt ist
    if ($user && $user['password'] === $match_pw) {
        // Neues Passwort als MD5-Hash speichern
        $newPasswordHash =  hash('sha256',$newPassword);

        // Update-Query oder Logik, um das Passwort in der Datenbank zu aktualisieren
        // Angenommen, updateUserPassword() aktualisiert das Passwort in der Datenbank
        updateUserPassword($user, $newPasswordHash);

        echo "Passwort wurde erfolgreich aktualisiert.";
    } else {
        echo "

        ".$user['password'] . " \n  " . $oldPassword;
        echo "Das alte Passwort ist falsch.";
    }
}
function updateUserPassword($user, $newPasswordHash) {
    // Lade die Benutzer aus der JSON-Datei
    $users = loadUsers();

    // Durchlaufe die Benutzer und finde den Benutzer basierend auf der user_id
    foreach ($users as &$u) {
        if ($u['id'] === $user['id']) {
            // Aktualisiere das Passwort
            $u['password'] = $newPasswordHash;
            break;
        }
    }

    // Speichere die aktualisierten Benutzer in der JSON-Datei
    saveUsers($users);

    return true;
}

function deleteUser($userelement) {
    $users = loadUsers();
    foreach ($users as $key => $user) {
        if ($user['username'] === $userelement || $user['email'] === $userelement) {
            unset($users[$key]);
            return saveUsers($users);
        }
    }
    return false;
}

function getUsername($userelement) {
    $user = findUser($userelement);
    return $user ? $user['username'] : false;
}

function getUserIdByName($userelement) {
    $user = findUser($userelement);
    return $user ? $user['id'] : false;
}
function getCartIdById() {
    $user = findUser($_SESSION['user_id']);
    return $user ? $user['cart_id'] : false;
}
function checkLogin($userelement, $password) {
    $user = findUser($userelement);
    if ($user['password'] === hash('sha256', $password)) {
       
        $_SESSION['user_id'] = $user['id'];
        return TRUE;
    }
    else
    {
        return FALSE;
    }

}

?>
