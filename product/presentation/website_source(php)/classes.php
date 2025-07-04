<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/php/security/protection_header.php";


?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayCareO1 - Classes</title>
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

        .class-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
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
                            <div class="w-4 h-10 rounded-l bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r bg-blue-500 bg-opacity-20 transition-all duration-200 text-white w-full">
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
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
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
            <main class="flex-1 p-6">
                
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-white mb-2">Class Management 🏫</h1>
                    <p class="text-blue-100">Manage your daycare classes and groups efficiently.</p>
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    Class Overview
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
                                    Class Editor
                                </div>
                            </button>
                        </div>

                        <!-- Tab Content -->
                        <div id="pane1" class="text-white">
                            <!-- Header with Add Button -->
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                                <div>
                                    <h3 class="text-2xl font-bold text-white mb-2">Your Classes</h3>
                                    <p class="text-blue-200">Overview of all daycare classes and their current status</p>
                                </div>
                                <button class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg card-hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Add New Class
                                </button>
                            </div>

                            <!-- Classes Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                                
                                <!-- Class Card 1 - Toddlers -->
                                <div class="class-card rounded-xl p-6 card-hover">
                                    <div class="flex justify-between items-start mb-6">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.01M15 10h1.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="text-xl font-bold text-white">Toddlers</h4>
                                                <p class="text-sm text-blue-200">Group ID: Butterflies</p>
                                            </div>
                                        </div>
                                        <button class="text-blue-200 hover:text-white opacity-60 hover:opacity-100 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="space-y-4 mb-6">
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200">Children Enrolled</span>
                                            <div class="flex items-center gap-2">
                                                <span class="text-2xl font-bold text-white">8</span>
                                                <span class="text-blue-200">/ 12</span>
                                                <div class="w-20 bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full" style="width: 67%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200">Caretakers</span>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xl font-bold text-green-300">2</span>
                                                <span class="text-blue-200">/ 3</span>
                                                <div class="w-20 bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full" style="width: 67%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-white bg-opacity-10 rounded-lg p-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-blue-200 text-sm">Age Range</span>
                                                <span class="text-white font-medium">1-3 years</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-3">
                                        <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            View Details
                                        </button>
                                        <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            Edit Class
                                        </button>
                                    </div>
                                </div>

                                <!-- Class Card 2 - Preschoolers -->
                                <div class="class-card rounded-xl p-6 card-hover">
                                    <div class="flex justify-between items-start mb-6">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C20.832 18.477 19.247 18 17.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="text-xl font-bold text-white">Preschoolers</h4>
                                                <p class="text-sm text-blue-200">Group ID: Sunflowers</p>
                                            </div>
                                        </div>
                                        <button class="text-blue-200 hover:text-white opacity-60 hover:opacity-100 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="space-y-4 mb-6">
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200">Children Enrolled</span>
                                            <div class="flex items-center gap-2">
                                                <span class="text-2xl font-bold text-white">15</span>
                                                <span class="text-blue-200">/ 20</span>
                                                <div class="w-20 bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-2 rounded-full" style="width: 75%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200">Caretakers</span>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xl font-bold text-green-300">3</span>
                                                <span class="text-blue-200">/ 4</span>
                                                <div class="w-20 bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full" style="width: 75%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-white bg-opacity-10 rounded-lg p-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-blue-200 text-sm">Age Range</span>
                                                <span class="text-white font-medium">3-5 years</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-3">
                                        <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            View Details
                                        </button>
                                        <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            Edit Class
                                        </button>
                                    </div>
                                </div>

                                <!-- Class Card 3 - Afterschool -->
                                <div class="class-card rounded-xl p-6 card-hover">
                                    <div class="flex justify-between items-start mb-6">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="text-xl font-bold text-white">Afterschool</h4>
                                                <p class="text-sm text-blue-200">Group ID: Elephants</p>
                                            </div>
                                        </div>
                                        <button class="text-blue-200 hover:text-white opacity-60 hover:opacity-100 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="space-y-4 mb-6">
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200">Children Enrolled</span>
                                            <div class="flex items-center gap-2">
                                                <span class="text-2xl font-bold text-white">22</span>
                                                <span class="text-blue-200">/ 25</span>
                                                <div class="w-20 bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-orange-400 to-orange-600 h-2 rounded-full" style="width: 88%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-200">Caretakers</span>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xl font-bold text-green-300">4</span>
                                                <span class="text-blue-200">/ 5</span>
                                                <div class="w-20 bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full" style="width: 80%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-white bg-opacity-10 rounded-lg p-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-blue-200 text-sm">Age Range</span>
                                                <span class="text-white font-medium">6-12 years</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-3">
                                        <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            View Details
                                        </button>
                                        <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                            Edit Class
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="pane2" class="text-white hidden">
                            <!-- Class Editor Form -->
                            <div class="mb-8">
                                <h3 class="text-2xl font-bold text-white mb-2">Class Editor</h3>
                                <p class="text-blue-200">Create or edit class information and assignments</p>
                            </div>
                            
                            <div class="glass-effect rounded-xl p-8">
                                <form class="space-y-8">
                                    <!-- Class Basic Info -->
                                    <div class="space-y-6">
                                        <h4 class="text-lg font-semibold text-white border-b border-white border-opacity-20 pb-2">Basic Information</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Group ID</label>
                                                <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="e.g., toddlers-01">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Class Name</label>
                                                <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="e.g., Toddlers">
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-blue-200 mb-2">Min Age (years)</label>
                                                <input type="number" class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-white placeholder-blue-200" placeholder="12">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Children Section -->
                                    <div class="space-y-6">
                                        <div class="flex justify-between items-center border-b border-white border-opacity-20 pb-2">
                                            <h4 class="text-lg font-semibold text-white">Enrolled Children</h4>
                                            <button type="button" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                Add Child
                                            </button>
                                        </div>
                                        <div class="bg-white bg-opacity-5 border border-white border-opacity-10 rounded-lg p-6">
                                            <div class="space-y-3">
                                                <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center text-white text-sm font-bold">EJ</div>
                                                        <span class="text-white font-medium">Emma Johnson (Age 2)</span>
                                                    </div>
                                                    <button class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">Remove</button>
                                                </div>
                                                <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center text-white text-sm font-bold">LS</div>
                                                        <span class="text-white font-medium">Liam Smith (Age 3)</span>
                                                    </div>
                                                    <button class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">Remove</button>
                                                </div>
                                                <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-8 h-8 bg-purple-400 rounded-full flex items-center justify-center text-white text-sm font-bold">OB</div>
                                                        <span class="text-white font-medium">Olivia Brown (Age 2)</span>
                                                    </div>
                                                    <button class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Caretakers Section -->
                                    <div class="space-y-6">
                                        <div class="flex justify-between items-center border-b border-white border-opacity-20 pb-2">
                                            <h4 class="text-lg font-semibold text-white">Assigned Caretakers</h4>
                                            <button type="button" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                Add Caretaker
                                            </button>
                                        </div>
                                        <div class="bg-white bg-opacity-5 border border-white border-opacity-10 rounded-lg p-6">
                                            <div class="space-y-3">
                                                <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                                    <div class="flex items-center gap-3">
                                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-10 h-10 rounded-full border-2 border-white border-opacity-30" alt="">
                                                        <div>
                                                            <span class="text-white font-medium block">Sarah Wilson</span>
                                                            <span class="text-blue-200 text-sm">Lead Caretaker</span>
                                                        </div>
                                                    </div>
                                                    <button class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">Remove</button>
                                                </div>
                                                <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                                    <div class="flex items-center gap-3">
                                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-10 h-10 rounded-full border-2 border-white border-opacity-30" alt="">
                                                        <div>
                                                            <span class="text-white font-medium block">Michael Davis</span>
                                                            <span class="text-blue-200 text-sm">Assistant</span>
                                                        </div>
                                                    </div>
                                                    <button class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-white border-opacity-20">
                                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center gap-2 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Save Changes
                                        </button>
                                        <button type="button" class="bg-gray-500 bg-opacity-30 hover:bg-opacity-40 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center gap-2 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Cancel
                                        </button>
                                        <button type="button" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center gap-2 transition-all sm:ml-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete Class
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
            const classCards = document.querySelectorAll('.class-card');
            classCards.forEach((card, index) => {
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
            const inputs = document.querySelectorAll('input');
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
                } else if (buttonText.includes('Delete') || buttonText.includes('Remove')) {
                    e.preventDefault();
                    showNotification(`${buttonText} action triggered!`, 'warning');
                }
            }
        });
    </script>

</body>

</html> 