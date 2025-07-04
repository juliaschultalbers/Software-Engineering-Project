<?php

echo " <style>
        /* Optional Styling for smooth dropdown */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
        }
        .no-scroll {
            overflow: hidden;
        }
        
        .toggle {
            position: relative;
            width: 70px;
            height: 70px;
            background: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .toggle span {
            position: absolute;
            width: 40px;
            height: 4px;
            border-radius: 4px;
            background: #101f40;
            transition: 0.5s;
        }

        .toggle span:nth-child(2) {
            transform: translateY(-15px);
            width: 25px;
            left: 15px;
        }

        .toggle span:nth-child(3) {
            transform: translateY(15px);
            width: 15px;
            left: 15px;
        }

        .toggle.active span:nth-child(1) {
            transform: translateX(60px);
        }

        .toggle.active span:nth-child(2) {
            width: 40px;
            transform: translateX(0) rotate(45deg);
            transition-delay: 0.2s;
        }

        .toggle.active span:nth-child(3) {
            width: 40px;
            transform: translateX(0) rotate(-45deg);
            transition-delay: 0.4s;
        }

        /* Dropdown animations */
        .fade-in {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .fade-out {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .menu-item {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .menu-item.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        /* Button fade-in with delay */
        .button-fade-in {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.4s ease 0.1s, transform 0.4s ease 0.1s;
        }

        .button-fade-out {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.2s ease, transform 0.4s ease;
        }
    </style>
    
    <!-- Navbar -->
  <nav id='navbar' class='bg-white px-4 py-8 flex justify-between items-center relative z-50'>
    <!-- Logo und Name als Link zur Startseite -->
    <a href='https://studienmeet.de' class='flex items-center space-x-2'>
        <img src='https://studienmeet.de/img/strike.png' height='40' width='40' alt=''>
        <div class='text-xl font-bold text-gray-800'>
            Studienmeet AG
        </div>
    </a>

    <!-- Menü-Button -->
    <div id='menuToggle_' onclick='toggleMenu()' class='toggle'>
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>

  <!-- Dropdown Menu -->
    <div id='dropdownMenu' class='hidden select-none bg-white shadow-md fixed py-5 left-0 w-full h-full p-4 z-50 fade-out'>
        <ul class='space-y-3 text-center text-xl text-gray-800 font-medium mt-16'>
            <li class='menu-item'><a href='https://studienmeet.de' class='block hover:text-gray-600'>Home</a></li>
             <li class='menu-item'><a href='about.php' class='block hover:text-gray-600'>About</a></li>
            <li class='menu-item'><a href='kontakt.php' class='block hover:text-gray-600'>Kontakt</a></li>
          
            <li class='menu-item'><a href='#' class='block hover:text-gray-600'>FAQ</a></li>
        </ul>
        
        <!-- 'Charts' Button at the bottom of the menu -->
        <div id='chartsButton' class='text-center bottom-2 mt-8 opacity-0 transform translate-y-10'>
            <a href='/charts.php' 
            class='bg-black text-white font-bold py-4 px-2
             rounded-lg block max-w-xs mx-auto hover:bg-gray-600'>
             Charts
            </a>
        </div>
    </div>

    ".'  <script>
        function toggleMenu() {
            const menuToggle = document.getElementById("menuToggle_");
            const dropdownMenu = document.getElementById("dropdownMenu");
            const menuItems = dropdownMenu.querySelectorAll(".menu-item");
            const chartsButton = document.getElementById("chartsButton");
            const navbar = document.getElementById("navbar");
            const body = document.body;

            // Toggle active class for menu button animation
            menuToggle.classList.toggle("active");

            // Check if dropdown menu is currently hidden
            if (dropdownMenu.classList.contains("hidden")) {
                // Show the dropdown menu
                dropdownMenu.classList.remove("hidden");
                dropdownMenu.classList.remove("fade-out");
                dropdownMenu.classList.add("fade-in");

                // Prevent scrolling
                body.classList.add("no-scroll");
           
                // Animate each menu item
                menuItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add("fade-in");
                    }, index * 50);
                });

                // Show and animate the "Charts" button with delay
                setTimeout(() => {
                    chartsButton.classList.add("button-fade-in");
                    chartsButton.classList.remove("button-fade-out");
                }, 200);

            } else {
                // Hide the dropdown menu with fade-out effect
                dropdownMenu.classList.remove("fade-in");
                dropdownMenu.classList.add("fade-out");

                // Allow scrolling
                body.classList.remove("no-scroll");

                // Remove fade-in from each menu item and hide them
                menuItems.forEach((item) => {
                    item.classList.remove("fade-in");
                });

                // Hide the "Charts" button with fade-out effect
                chartsButton.classList.remove("button-fade-in");
                chartsButton.classList.add("button-fade-out");

                // Delay hiding the dropdown until fade-out is complete
                setTimeout(() => {
                    dropdownMenu.classList.add("hidden");
                }, 300);
            }
        }
    </script>';
?>
