<?php
// Überprüfen, ob das Formular gesendet wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Eingaben erhalten
    $userelement = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if ($userelement == '' || $password == '') {
        // Wenn Benutzername oder Passwort leer sind, Fehlermeldung anzeigen
        $errorMessage = 'Please enter both username and password.';
    } else {
        session_start();
        include_once './php/nutzer_.php';  // Dein Benutzerverwaltungsskript einbinden
        // Überprüfen von Benutzername und Passwort
        if (checkLogin($userelement, $password)) {
           echo '<script>document.location="index.php";</script>';
            exit();
        } else {
            // Authentifizierung fehlgeschlagen
            $errorMessage = 'Invalid credentials. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayCareO1 - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="/resources/icon/icon.png" type="image/x-icon">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-glass::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-glass:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            border-radius: 50%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 70%;
            left: 80%;
            border-radius: 30%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 100px;
            height: 100px;
            top: 20%;
            right: 10%;
            border-radius: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .logo-glow {
            filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.3));
        }
    </style>
</head>

<body class="text-white">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Main Login Container -->
    <div class="relative z-10 w-full max-w-md mx-4">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="logo-glow mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">DayCareO1</h1>
            <p class="text-blue-200">Welcome back to your dashboard</p>
        </div>

        <!-- Login Card -->
        <div class="glass-effect rounded-2xl p-8 card-hover">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-white mb-2">Sign In</h2>
                <p class="text-blue-200">Access your daycare management system</p>
            </div>

            <!-- Error Message -->
            <?php if(isset($errorMessage)): ?>
                <div class="mb-6 p-4 bg-red-500 bg-opacity-20 border border-red-400 border-opacity-30 rounded-lg">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-300 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-red-300 text-sm"><?php echo $errorMessage; ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="login.php" method="post" class="space-y-6">
                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-blue-200 text-sm font-medium mb-2">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Username
                        </div>
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username"
                        class="input-glass w-full py-3 px-4 text-white rounded-lg transition-all duration-200"
                        placeholder="Enter your username"
                        value="<?php echo isset($userelement) ? htmlspecialchars($userelement) : ''; ?>"
                        required
                    >
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-blue-200 text-sm font-medium mb-2">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            Password
                        </div>
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="input-glass w-full py-3 px-4 text-white rounded-lg transition-all duration-200"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500 rounded">
                        <span class="ml-2 text-blue-200 text-sm">Remember me</span>
                    </label>
                    <a href="#" class="text-blue-300 hover:text-blue-100 text-sm transition-colors">
                        Forgot password?
                    </a>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <button 
                        type="submit" 
                        id="btn_login"
                        class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50"
                    >
                        <div class="flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Sign In
                        </div>
                    </button>

                    <button 
                        type="button"
                        id="register" 
                        class="w-full bg-gray-600 bg-opacity-30 hover:bg-opacity-40 text-white font-medium py-3 px-4 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50"
                    >
                        <div class="flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Create Account
                        </div>
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-blue-200 text-sm mb-2">Powered by</p>
            <div class="flex justify-center">
                <img src="./img/tuhh.svg" alt="TUHH Logo" class="h-6 filter brightness-0 invert opacity-70">
            </div>
        </div>
    </div>

    <script>
        // Register button functionality
        document.getElementById("register").addEventListener("click", function(e) {
            e.preventDefault();
            window.location = "register.php";
        });

        // Add interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate login card on load
            const loginCard = document.querySelector('.glass-effect');
            loginCard.style.opacity = '0';
            loginCard.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                loginCard.style.transition = 'all 0.8s ease';
                loginCard.style.opacity = '1';
                loginCard.style.transform = 'translateY(0)';
            }, 200);

            // Add input focus effects
            const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('transform', 'scale-105');
                    this.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('transform', 'scale-105');
                    this.style.transform = 'scale(1)';
                });
            });

            // Add button click animation
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Floating shapes animation enhancement
            const shapes = document.querySelectorAll('.shape');
            shapes.forEach((shape, index) => {
                shape.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.2) rotate(45deg)';
                    this.style.opacity = '0.3';
                });
                
                shape.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1) rotate(0deg)';
                    this.style.opacity = '0.1';
                });
            });

            // Auto-hide error messages after 5 seconds
            const errorMessage = document.querySelector('.bg-red-500');
            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.style.transition = 'all 0.5s ease';
                    errorMessage.style.opacity = '0';
                    errorMessage.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        errorMessage.remove();
                    }, 500);
                }, 5000);
            }
        });

        // Add typing effect for inputs
        function addTypingEffect() {
            const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.borderColor = 'rgba(59, 130, 246, 0.5)';
                        this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.2)';
                    } else {
                        this.style.borderColor = 'rgba(255, 255, 255, 0.2)';
                        this.style.boxShadow = 'none';
                    }
                });
            });
        }

        // Initialize typing effect
        addTypingEffect();
    </script>
</body>
</html>