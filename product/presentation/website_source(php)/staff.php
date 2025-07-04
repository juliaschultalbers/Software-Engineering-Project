<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/php/security/protection_header.php";


?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayCareO1 - Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="/resources/icon/icon.png" type="image/x-icon">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .status-dot-online {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #00ff00;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.8);
        }

        .status-dot-offline {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ff0000;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
        }

        .tab-active {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(147, 51, 234, 0.2) 100%);
            border-bottom: 3px solid #3b82f6;
        }

        .staff-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .search-input {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>

<body class="text-white flex flex-col min-h-screen">
   <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/php/GUI/nav.php";


    ?>
    <div class="flex items-center justify-center">
        <div class="flex w-full max-w-7xl">

            <!-- Sidebar -->
            <aside class="hidden md:flex flex-col justify-between w-64 bg-gray-800 bg-opacity-90 text-white p-4 backdrop-filter backdrop-blur-lg">
                <div>
                    <h2 class="text-lg font-bold mb-4 text-white">Menu</h2>
                    <nav class="space-y-2">
                        <a href="index.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Dashboard
                            </span>
                        </a>
                        <a href="classes.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Classes
                            </span>
                        </a>
                        <a href="children.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Children
                            </span>
                        </a>
                        <a href="staff.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r bg-blue-500 bg-opacity-20 transition-all duration-200 text-white w-full">
                                Staff
                            </span>
                        </a>
                        <a href="schedules.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Schedules
                            </span>
                        </a>
                        <a href="#" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Billing
                            </span>
                        </a>
                        <a href="logout.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-red-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-red-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Logout
                            </span>
                        </a>
                    </nav>
                </div>

                <div class="space-y-2">
                 
                    <div class="mt-4 text-xs text-gray-300 text-center">
                        Powered By
                    </div>
                    <div class="flex justify-center mt-1">
                        <img src="./img/tuhh.svg" alt="TUHH Logo" class="h-8 filter brightness-0 invert">
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6 w-2/5">
                
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-white mb-2">Staff Management 👥</h1>
                    <p class="text-blue-100">Manage and coordinate your daycare team members.</p>
                </div>

                <!-- Main Content Card -->
                <div class="glass-effect rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <!-- Tabs -->
                        <div class="flex space-x-1 mb-8 bg-white bg-opacity-10 rounded-lg p-1">
                            <button
                                id="tab1"
                                class="tab-active flex-1 px-6 py-3 rounded-lg text-white font-medium transition-all duration-200 focus:outline-none"
                                onclick="showTab('tab1', 'tab2', 'pane1', 'pane2')">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Staff Overview
                                </div>
                            </button>
                            <button
                                id="tab2"
                                class="flex-1 px-6 py-3 rounded-lg text-blue-200 hover:text-white font-medium transition-all duration-200 focus:outline-none"
                                onclick="showTab('tab2', 'tab1', 'pane2', 'pane1')">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Staff Editor
                                </div>
                            </button>
                        </div>

                        <!-- Tab Content -->
                        <div id="pane1" class="text-white">
                            <!-- Header with Search and Add Button -->
                            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 gap-6">
                                <div>
                                    <h3 class="text-2xl font-bold text-white mb-2">Your Team</h3>
                                    <p class="text-blue-200">Manage and monitor all staff members</p>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                                    <div class="relative">
                                        <input type="text" placeholder="Search staff..." class="search-input pl-12 pr-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200 w-full sm:w-64">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-4 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <select class="search-input px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-white">
                                        <option value="" class="bg-gray-800">All Roles</option>
                                        <option value="lead" class="bg-gray-800">Lead Caretaker</option>
                                        <option value="assistant" class="bg-gray-800">Assistant</option>
                                        <option value="admin" class="bg-gray-800">Administrator</option>
                                    </select>
                                    <button onclick="window.location.href='messages.php'" class="bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg card-hover font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4.258-.928L3 20l1.062-3.273C3.402 15.408 3 13.752 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        Messages
                                    </button>
                                    <button class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg card-hover font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        Add Staff Member
                                    </button>
                                </div>
                            </div>

                            <!-- Staff Cards Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                
                                <!-- Staff Card 1 -->
                                <div class="staff-card rounded-xl p-6 card-hover">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="h-14 w-14 rounded-full border-2 border-white border-opacity-30 overflow-hidden flex items-center justify-center bg-gray-200">
                                            <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-full h-full object-cover" alt="">
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="status-dot-online"></div>
                                            <span class="text-xs text-green-300 font-medium">Online</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h4 class="text-lg font-bold text-white mb-1">Sarah Wilson</h4>
                                        <p class="text-blue-200 text-sm mb-2">Lead Caretaker</p>
                                        <div class="inline-block bg-blue-500 bg-opacity-30 px-3 py-1 rounded-full">
                                            <span class="text-blue-200 text-xs font-medium">Toddlers Group</span>
                                        </div>
                                    </div>

                                    <div class="space-y-3 mb-6 bg-white bg-opacity-5 rounded-lg p-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Phone:</span>
                                            <span class="text-white text-sm">+1-555-0140</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Experience:</span>
                                            <span class="text-white text-sm font-medium">5 years</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Schedule:</span>
                                            <span class="text-green-300 text-sm font-medium">Full-time</span>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            View
                                        </button>
                                        <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            Edit
                                        </button>
                                    </div>
                                </div>

                                <!-- Staff Card 2 -->
                                <div class="staff-card rounded-xl p-6 card-hover">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="h-14 w-14 rounded-full border-2 border-white border-opacity-30 overflow-hidden flex items-center justify-center bg-gray-200">
                                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-full h-full object-cover" alt="">
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="status-dot-online"></div>
                                            <span class="text-xs text-green-300 font-medium">Online</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h4 class="text-lg font-bold text-white mb-1">Michael Davis</h4>
                                        <p class="text-blue-200 text-sm mb-2">Assistant</p>
                                        <div class="inline-block bg-purple-500 bg-opacity-30 px-3 py-1 rounded-full">
                                            <span class="text-purple-200 text-xs font-medium">Preschoolers Group</span>
                                        </div>
                                    </div>

                                    <div class="space-y-3 mb-6 bg-white bg-opacity-5 rounded-lg p-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Phone:</span>
                                            <span class="text-white text-sm">+1-555-0141</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Experience:</span>
                                            <span class="text-white text-sm font-medium">2 years</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Schedule:</span>
                                            <span class="text-yellow-300 text-sm font-medium">Part-time</span>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            View
                                        </button>
                                        <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            Edit
                                        </button>
                                    </div>
                                </div>

                                <!-- Staff Card 3 -->
                                <div class="staff-card rounded-xl p-6 card-hover">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="h-14 w-14 rounded-full border-2 border-white border-opacity-30 overflow-hidden flex items-center justify-center bg-gray-200">
                                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="w-full h-full object-cover" alt="">
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="status-dot-offline"></div>
                                            <span class="text-xs text-red-300 font-medium">Offline</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h4 class="text-lg font-bold text-white mb-1">Emma Thompson</h4>
                                        <p class="text-blue-200 text-sm mb-2">Lead Caretaker</p>
                                        <div class="inline-block bg-orange-500 bg-opacity-30 px-3 py-1 rounded-full">
                                            <span class="text-orange-200 text-xs font-medium">Afterschool Group</span>
                                        </div>
                                    </div>

                                    <div class="space-y-3 mb-6 bg-white bg-opacity-5 rounded-lg p-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Phone:</span>
                                            <span class="text-white text-sm">+1-555-0142</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Experience:</span>
                                            <span class="text-white text-sm font-medium">8 years</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Schedule:</span>
                                            <span class="text-green-300 text-sm font-medium">Full-time</span>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            View
                                        </button>
                                        <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            Edit
                                        </button>
                                    </div>
                                </div>

                                <!-- Staff Card 4 -->
                                <div class="staff-card rounded-xl p-6 card-hover">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="h-14 w-14 rounded-full border-2 border-white border-opacity-30 overflow-hidden flex items-center justify-center bg-gray-200">
                                            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="w-full h-full object-cover" alt="">
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="status-dot-online"></div>
                                            <span class="text-xs text-green-300 font-medium">Online</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h4 class="text-lg font-bold text-white mb-1">Ranjit Rodrigez</h4>
                                        <p class="text-blue-200 text-sm mb-2">Administrator</p>
                                        <div class="inline-block bg-gray-500 bg-opacity-30 px-3 py-1 rounded-full">
                                            <span class="text-gray-200 text-xs font-medium">Management</span>
                                        </div>
                                    </div>

                                    <div class="space-y-3 mb-6 bg-white bg-opacity-5 rounded-lg p-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Phone:</span>
                                            <span class="text-white text-sm">+1-555-0143</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Experience:</span>
                                            <span class="text-white text-sm font-medium">10 years</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200 text-sm">Schedule:</span>
                                            <span class="text-green-300 text-sm font-medium">Full-time</span>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            View
                                        </button>
                                        <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            Edit
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <!-- Pagination -->
                            <div class="flex justify-center items-center mt-8 space-x-2">
                                <button class="px-4 py-2 text-blue-200 hover:text-white disabled:opacity-50 transition-colors" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">1</button>
                                <button class="px-4 py-2 text-blue-200 hover:text-white transition-colors">2</button>
                                <button class="px-4 py-2 text-blue-200 hover:text-white transition-colors">3</button>
                                <button class="px-4 py-2 text-blue-200 hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div id="pane2" class="text-white hidden">
                            <!-- Staff Editor Form -->
                            <div class="mb-8">
                                <h3 class="text-2xl font-bold text-white mb-2">Staff Editor</h3>
                                <p class="text-blue-200">Create or edit staff member profile and assignments</p>
                            </div>
                            
                            <div class="glass-effect rounded-xl p-8">
                                <form class="space-y-8">
                                    <!-- Personal Information -->
                                    <div class="space-y-6">
                                        <h4 class="text-lg font-semibold text-white border-b border-white border-opacity-20 pb-2">Personal Information</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">First Name</label>
                                                <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="Sarah">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Last Name</label>
                                                <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="Wilson">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Phone Number</label>
                                                <input type="tel" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="+1-555-0140">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Email</label>
                                                <input type="email" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="sarah.wilson@daycare.com">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Date of Birth</label>
                                                <input type="date" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Employment Information -->
                                    <div class="space-y-6">
                                        <h4 class="text-lg font-semibold text-white border-b border-white border-opacity-20 pb-2">Employment Information</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Role</label>
                                                <select class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white">
                                                    <option value="" class="bg-gray-800">Select Role</option>
                                                    <option value="lead" class="bg-gray-800">Lead Caretaker</option>
                                                    <option value="assistant" class="bg-gray-800">Assistant</option>
                                                    <option value="admin" class="bg-gray-800">Administrator</option>
                                                    <option value="substitute" class="bg-gray-800">Substitute</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Schedule Type</label>
                                                <select class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white">
                                                    <option value="" class="bg-gray-800">Select Schedule</option>
                                                    <option value="fulltime" class="bg-gray-800">Full-time</option>
                                                    <option value="parttime" class="bg-gray-800">Part-time</option>
                                                    <option value="contractor" class="bg-gray-800">Contractor</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Experience (years)</label>
                                                <input type="number" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="5">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Hire Date</label>
                                                <input type="date" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Salary/Hourly Rate</label>
                                                <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="$25/hour">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Class Assignments -->
                                    <div class="space-y-6">
                                        <div class="flex justify-between items-center border-b border-white border-opacity-20 pb-2">
                                            <h4 class="text-lg font-semibold text-white">Class Assignments</h4>
                                            <button type="button" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                Assign Class
                                            </button>
                                        </div>
                                        <div class="bg-white bg-opacity-5 border border-white border-opacity-10 rounded-lg p-6">
                                            <div class="space-y-3">
                                                <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-3 h-3 bg-blue-400 rounded-full"></div>
                                                        <span class="text-white font-medium">Toddlers Group</span>
                                                        <span class="text-blue-200 text-sm">(Lead Caretaker)</span>
                                                    </div>
                                                    <button class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">Remove</button>
                                                </div>
                                                <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-3 h-3 bg-purple-400 rounded-full"></div>
                                                        <span class="text-white font-medium">Preschoolers Group</span>
                                                        <span class="text-purple-200 text-sm">(Assistant)</span>
                                                    </div>
                                                    <button class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Qualifications & Certifications -->
                                    <div class="space-y-6">
                                        <h4 class="text-lg font-semibold text-white border-b border-white border-opacity-20 pb-2">Qualifications & Certifications</h4>
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Education</label>
                                                <textarea rows="2" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="Bachelor's in Early Childhood Education"></textarea>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Certifications</label>
                                                <textarea rows="2" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="CPR Certified, First Aid, Child Development Associate (CDA)"></textarea>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Special Skills</label>
                                                <textarea rows="2" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="Bilingual (English/Spanish), Music Therapy, Special Needs Experience"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Emergency Contact -->
                                    <div class="space-y-6">
                                        <h4 class="text-lg font-semibold text-white border-b border-white border-opacity-20 pb-2">Emergency Contact</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Emergency Contact Name</label>
                                                <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="John Wilson">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Emergency Phone</label>
                                                <input type="tel" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="+1-555-0145">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-blue-200 mb-2">Relationship</label>
                                            <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="Spouse">
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-white border-opacity-20">
                                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center gap-2 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Save Staff Member
                                        </button>
                                        <button type="button" class="bg-gray-500 bg-opacity-30 hover:bg-opacity-40 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center gap-2 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Cancel
                                        </button>
                                        <button onclick="window.location.href='messages.php'" type="button" class="bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center gap-2 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4.258-.928L3 20l1.062-3.273C3.402 15.408 3 13.752 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                            Send Message
                                        </button>
                                        <button type="button" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center gap-2 transition-all sm:ml-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Remove Staff
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        function showTab(activeId, inactiveId, activePaneId, inactivePaneId) {
            // Active tab styling
            const activeTab = document.getElementById(activeId);
            const inactiveTab = document.getElementById(inactiveId);
            
            activeTab.classList.add('tab-active');
            activeTab.classList.remove('text-blue-200');
            activeTab.classList.add('text-white');
            
            inactiveTab.classList.remove('tab-active');
            inactiveTab.classList.add('text-blue-200');
            inactiveTab.classList.remove('text-white');
            
            // Show/hide content
            document.getElementById(activePaneId).classList.remove('hidden');
            document.getElementById(inactivePaneId).classList.add('hidden');
        }

        // Add interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate cards on load
            const staffCards = document.querySelectorAll('.staff-card');
            staffCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 150);
            });

            // Add click animation to cards
            const allCards = document.querySelectorAll('.card-hover');
            allCards.forEach(card => {
                card.addEventListener('click', function() {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Form validation highlight
            const inputs = document.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.3)';
                });
                input.addEventListener('blur', function() {
                    this.style.boxShadow = '';
                });
            });
        });

        // Function to show notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transform transition-all duration-300 translate-x-full`;
            
            const bgColor = type === 'success' ? 'bg-green-500' : 
                           type === 'warning' ? 'bg-yellow-500' : 
                           type === 'error' ? 'bg-red-500' : 'bg-blue-500';
            
            notification.classList.add(bgColor);
            notification.innerHTML = `
                <div class="flex items-center text-white">
                    <span>${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 5000);
        }

        // Demo button interactions
        document.addEventListener('click', function(e) {
            if (e.target.closest('button')) {
                const button = e.target.closest('button');
                const buttonText = button.textContent.trim();
                
                if (buttonText.includes('Add') || buttonText.includes('Edit') || buttonText.includes('View') || buttonText.includes('Save')) {
                    e.preventDefault();
                    showNotification(`${buttonText} action triggered!`, 'info');
                } else if (buttonText.includes('Remove') || buttonText.includes('Delete')) {
                    e.preventDefault();
                    showNotification(`${buttonText} action triggered!`, 'warning');
                }
            }
        });
    </script>

</body>

</html>