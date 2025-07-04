
<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/php/security/protection_header.php");
?>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . "/php/nutzer_.php";
  include_once $_SERVER['DOCUMENT_ROOT'] . "/php/security/protection_header.php";
@session_start();


?>
<!DOCTYPE html>
<html  lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThreeDreamz Bot-Panel Web v1.0</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="/resources/icon/icon.png" type="image/x-icon"> <!-- Icon hinzufügen -->
    <style>
        body {
            background-color: #565e5a;
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            margin-top: 0;
        }
        .stats-container {
            display: flex;
            justify-content: space-between;
        }
        .stats-item {
            flex: 1;
            text-align: center;
            padding: 0 0.5rem; /* Verkleinerter horizontaler Abstand */
        }
        .text-large {
            font-size: 1.25rem; /* Große Schriftgröße für Statistiken */
        }
        .text-xl-custom {
            font-size: 1.5rem; /* Große Schriftgröße für Überschriften */
        }
        .stat-value {
            font-size: 1.25rem; /* Schriftgröße für Werte */
        }
    </style>
    <style>
        .status-dot-online {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #00ff00; /* Leuchtendes Grün */
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.8); /* Grüner Glow-Effekt */
        }
        .status-dot-offline {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #0080ff; /* Leuchtendes Grün */
            box-shadow: 0 0 10px rgba(0, 0, 255, 0.8); /* Grüner Glow-Effekt */
        } 
        .status-dot-offline {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ff0000; /* Leuchtendes Grün */
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.8); /* Grüner Glow-Effekt */
        }

    </style>
</head>
<body class="bg-gray-800 text-white flex flex-col min-h-screen">

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php/GUI/body_bg.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php/GUI/nav.php";


 ?>




<div class="flex justify-center">



<div class="bg-white p-12 rounded-lg shadow-lg max-w-md w-full border border-gray-200 mt-6">
  <!-- 2x3 Grid für die Texte -->
  <div class="grid grid-cols-2 gap-4 mb-6">
    <div>
      <div class="text-gray-600 text-sm">Benutzername</div>
      <div class="text-gray-900 font-bold">
        <?php echo findUser($_SESSION['user_id'])['username']; ?>
      </div>
    </div>
    <div>
      <div class="text-gray-600 text-sm">Passwort (SHA256)</div>
      <div class="text-gray-900 font-bold"> 
        <?php
          $password = findUser($_SESSION['user_id'])['password'];
          echo strlen($password) > 15 ? substr($password, 0, 17) . '..' : $password;
        ?>
      </div>
    </div>
    <div>
      <div class="text-gray-600 text-sm">User ID</div>
      <div class="text-gray-900 font-bold"> 
        <?php echo findUser($_SESSION['user_id'])['id']; ?>
      </div>
    </div>

    <div>
      <div class="text-gray-600 text-sm">Role</div>
      <div class="text-gray-900 font-bold"> 
        <?php echo findUser($_SESSION['user_id'])['rank'] ?? 'User'; ?>
      </div>
    </div>
  </div>

  <!-- Formular -->
  <div class="bg-gray-50 p-8 rounded-lg shadow-inner max-w-md w-full border border-gray-200">
    <form action="/php/api_post.php" method="POST" class="space-y-6">
      <div>
        <label for="old_pw" class="block text-gray-700 text-sm font-bold mb-2">Altes Passwort</label>
        <input id="old_pw" name="old_pw" type="text" placeholder="Geben Sie Ihr altes Passwort ein"
          class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" required>
      </div>

      <div>
        <label for="new_pw" class="block text-gray-700 text-sm font-bold mb-2">Neues Passwort</label>
        <input id="new_pw" name="new_pw" type="text" placeholder="Geben Sie Ihr neues Passwort ein"
          class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" required>
          
            <label for="new_pw_re" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Neues Passwort wiederholen</label>
          <input id="new_pw_re" name="new_pw_re" type="text" placeholder="Geben Sie Ihr neues Passwort noch einmal ein"
          class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" required>
      </div>

      <div class="flex justify-center">
        <button id="updatePW" type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition">
          Passwort aktualisieren
        </button>
      </div>
    </form>
  </div>

  
</div>
</div>










<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php/GUI/footer.php";
?>
</body>
</html>
