<?php
include('./php/config_.php');
include_once './php/nutzer_.php';
//isValidEmail
//isAlphaNumeric
//isValidPhoneNumber
//
//
// Hardcoded Benutzerdaten

// Überprüfen, ob das Formular gesendet wurde

//$username, $email, $passwort, $telnummer, $alter, $vorname,$nachname, $plz, $stadt,$strasse, $nummer,$unternehmen, $u_plz,$u_stadt,$u_strasse,$u_nummer


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    //   $errorMessage = 'Die angegebene Email oder der Username sind bereits vergeben/registriert.';

     
        // Überprüfen von Benutzername und Passwort

        if (!findUser($username)) {
           
            if (createUser($username,  $password) ){

                //send email
           
                
                echo '<script>document.location="/ss/login.php"</script>';
                   header('/ss/login.php');
                exit();
            } else {
                $errorMessage = 'Account cant be registered. Pls choose other names.';
            }
        } else {
            $errorMessage = 'Username or Password wrong.';
        }

}

?>


<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>3Dreamz Bot-Panel v1.0</title>
</head>

<body style="width: 100%;height: 100%;margin:0;">


    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 z-50 w-full static">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="login.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="./img/logo.png" class="h-8" alt="nan."/>
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">3Dreamz</span>
            </a>
            <button id="nav_btn" data-collapse-toggle="navbar" type="button" class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-hamburger" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full" id="navbar">
                <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded dark:bg-blue-600" aria-current="page">Home</a>
                    </li>


                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Admin</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">QR-Datenbank</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Tickets</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!--
  END TABLE
-->


    <div class="mt-16">
    <form action="register.php" method="post">    
    <div class="bg-white p-8 rounded-md shadow-md w-80 mx-12 mt-6 items-center">
            

                <h2 class="text-2xl font-semibold mb-6">Register</h2>
                <h3 class="text-lg font-semibold mb-2">Account</h3>

                <div class="mb-4">
                    <label for="textbox1" class="block text-gray-600 text-sm font-medium mb-2">Username</label>
                    <input value="123" type="text" id="username" name="username" class="w-full border rounded-md py-2 px-3 text-gray-700">
                </div>
                <div class="mb-4">
                    <label for="textbox21" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                    <input type="text" id="password" name="password" class="w-full border rounded-md py-2 px-3 text-gray-700" value="123">
                </div>
              

                <div class="grid grid-cols-2 gap-4">
                    <!-- Textbox 1 -->

                    <!-- Textbox 2 -->






                    <!-- Füge hier weitere Textboxen ein (Textbox 3 bis 10) -->

                    <!-- Textbox 10 -->
                </div>


                <button class="w-full bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                    Register
                </button>
           
        </div>
        </form>
    </div>


    <?php if (isset($emaiVerification)) : ?>

        <script>
            async function fetchAndLog(url) {
                try {
                    const response = await fetch(url);
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    const data = await response.text();
                    console.log(data);
                } catch (error) {
                    console.error('Fetch error:', error);
                }
            }

            async function await_verify(url) {
                try {
                    const result = await fetchAndLog(url); // Annahme: fetch ist eine asynchrone Funktion

                    if (result === 'wait') {
                        // Kurze Pause, um ständiges Polling zu vermeiden
                        await new Promise(resolve => setTimeout(resolve, 1000)); // Warte z.B. 1 Sekunde

                        // Rekursiver Aufruf
                        return await await_verify(url);
                    } else {
                        document.location = "login.php"
                        return result;
                    }
                } catch (error) {
                    // Fehlerbehandlung
                    console.error('Fehler beim Abrufen der URL: ', error);
                    throw error; // oder anderweitige Fehlerbehandlung
                }
            }
        </script>
    <?php endif; ?>
    </script>

</body>

</html>