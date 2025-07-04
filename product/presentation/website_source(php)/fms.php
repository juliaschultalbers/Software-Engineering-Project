<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/php/security/protection_header.php";

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayCareO1 - FavoriteMeal System</title>
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
            transform: translateY(-3px);
            box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .meal-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }

        .meal-card:hover {
            transform: scale(1.02);
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        .meal-selected {
            border: 2px solid #3b82f6;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(59, 130, 246, 0.1) 100%);
        }

        .child-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0.04) 100%);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.15);
            transition: all 0.2s ease;
        }

        .child-card:hover {
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.08) 100%);
        }

        .vote-complete {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(34, 197, 94, 0.1) 100%);
            border-color: rgba(34, 197, 94, 0.3);
        }

        .vote-pending {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(245, 158, 11, 0.1) 100%);
            border-color: rgba(245, 158, 11, 0.3);
        }

        .vote-missing {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(239, 68, 68, 0.1) 100%);
            border-color: rgba(239, 68, 68, 0.3);
        }

        .meal-emoji {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .progress-bar {
            background: rgba(255, 255, 255, 0.2);
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8);
            transition: width 0.5s ease;
        }

        .voting-status {
            position: relative;
        }

        .voting-status::before {
            content: '';
            position: absolute;
            left: -10px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 20px;
            border-radius: 2px;
        }

        .status-complete::before {
            background: #22c55e;
        }

        .status-pending::before {
            background: #f59e0b;
        }

        .status-missing::before {
            background: #ef4444;
        }

        .meal-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.1) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1rem;
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
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Staff
                            </span>
                        </a>
                        <a href="billing.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Billing
                            </span>
                        </a>
                        <a href="favorite-meal.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r bg-blue-500 bg-opacity-20 transition-all duration-200 text-white w-full">
                                FavoriteMeal
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
                    <h1 class="text-3xl font-bold text-white mb-2">FavoriteMeal System 🍽️</h1>
                    <p class="text-blue-100">Weekly meal voting for Friday lunch - Let the children choose their favorite!</p>
                    <div class="mt-4 flex items-center gap-4 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            <span class="text-blue-200">Voting for: <strong>Friday, January 24, 2025</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                            <span class="text-blue-200">Deadline: <strong>Thursday 3:00 PM</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Voting Overview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="glass-effect rounded-xl p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-xs text-green-300 font-medium">73%</span>
                        </div>
                        <h3 class="text-sm text-blue-200 mb-1">Votes Complete</h3>
                        <p class="text-2xl font-bold text-white">22 / 30</p>
                        <div class="text-xs text-green-300 mt-2">8 children remaining</div>
                    </div>

                    <div class="glass-effect rounded-xl p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <span class="text-xs text-blue-300 font-medium">Winner</span>
                        </div>
                        <h3 class="text-sm text-blue-200 mb-1">Current Favorite</h3>
                        <p class="text-xl font-bold text-white">🍕 Pizza Margherita</p>
                        <div class="text-xs text-blue-300 mt-2">9 votes (41%)</div>
                    </div>

                    <div class="glass-effect rounded-xl p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-xs text-purple-300 font-medium">23h left</span>
                        </div>
                        <h3 class="text-sm text-blue-200 mb-1">Time Remaining</h3>
                        <p class="text-2xl font-bold text-white">1 day</p>
                        <div class="text-xs text-purple-300 mt-2">until deadline</div>
                    </div>
                </div>

                <!-- Meal Options -->
                <div class="glass-effect rounded-xl shadow-lg overflow-hidden mb-8">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Available Meal Options</h3>
                        <p class="text-blue-200 mb-6">Choose from these delicious Friday lunch options</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Pizza Option -->
                            <div class="meal-card rounded-xl p-6 text-center cursor-pointer" onclick="showMealDetails('pizza')">
                                <div class="meal-icon mx-auto">🍕</div>
                                <h4 class="text-lg font-bold text-white mb-2">Pizza Margherita</h4>
                                <p class="text-sm text-blue-200 mb-4">Fresh tomato sauce, mozzarella, basil</p>
                                <div class="mb-4">
                                    <div class="flex justify-between text-sm text-blue-200 mb-2">
                                        <span>Current votes</span>
                                        <span>9 votes</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 41%"></div>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-blue-400">41%</div>
                            </div>

                            <!-- Pasta Option -->
                            <div class="meal-card rounded-xl p-6 text-center cursor-pointer" onclick="showMealDetails('pasta')">
                                <div class="meal-icon mx-auto">🍝</div>
                                <h4 class="text-lg font-bold text-white mb-2">Spaghetti Bolognese</h4>
                                <p class="text-sm text-blue-200 mb-4">Classic meat sauce with parmesan</p>
                                <div class="mb-4">
                                    <div class="flex justify-between text-sm text-blue-200 mb-2">
                                        <span>Current votes</span>
                                        <span>6 votes</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 27%"></div>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-green-400">27%</div>
                            </div>

                            <!-- Schnitzel Option -->
                            <div class="meal-card rounded-xl p-6 text-center cursor-pointer" onclick="showMealDetails('schnitzel')">
                                <div class="meal-icon mx-auto">🍖</div>
                                <h4 class="text-lg font-bold text-white mb-2">Chicken Schnitzel</h4>
                                <p class="text-sm text-blue-200 mb-4">Breaded chicken with potato salad</p>
                                <div class="mb-4">
                                    <div class="flex justify-between text-sm text-blue-200 mb-2">
                                        <span>Current votes</span>
                                        <span>4 votes</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 18%"></div>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-purple-400">18%</div>
                            </div>

                            <!-- Salad Option -->
                            <div class="meal-card rounded-xl p-6 text-center cursor-pointer" onclick="showMealDetails('salad')">
                                <div class="meal-icon mx-auto">🥗</div>
                                <h4 class="text-lg font-bold text-white mb-2">Rainbow Salad</h4>
                                <p class="text-sm text-blue-200 mb-4">Fresh vegetables with grilled chicken</p>
                                <div class="mb-4">
                                    <div class="flex justify-between text-sm text-blue-200 mb-2">
                                        <span>Current votes</span>
                                        <span>3 votes</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 14%"></div>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-yellow-400">14%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Children Voting List -->
                <div class="glass-effect rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                            <div>
                                <h3 class="text-2xl font-bold text-white mb-2">Children's Voting Status</h3>
                                <p class="text-blue-200">Track and manage individual meal choices</p>
                            </div>
                            <div class="flex gap-3">
                                <button onclick="sendReminders()" class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.924-.833-2.684 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    Send Reminders
                                </button>
                                <button onclick="exportResults()" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Export Results
                                </button>
                            </div>
                        </div>

                        <!-- Filter and Search -->
                        <div class="mb-6 flex flex-col md:flex-row gap-4">
                            <div class="flex-1">
                                <input type="text" id="child-search" placeholder="Search children by name..." 
                                       class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-white placeholder-blue-200">
                            </div>
                            <select id="status-filter" class="px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none text-white">
                                <option value="">All Children</option>
                                <option value="complete">Voted</option>
                                <option value="pending">Not Voted</option>
                            </select>
                            <select id="class-filter" class="px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-lg focus:outline-none text-white">
                                <option value="">All Classes</option>
                                <option value="toddlers">Toddlers</option>
                                <option value="preschoolers">Preschoolers</option>
                                <option value="afterschool">Afterschool</option>
                            </select>
                        </div>

                        <!-- Children List -->
                        <div class="space-y-3" id="children-list">
                            
                            <!-- Child 1 - Has voted -->
                            <div class="child-card rounded-lg p-4 flex items-center justify-between" data-status="complete" data-class="toddlers" data-name="emma johnson">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        EJ
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Emma Johnson</h4>
                                        <p class="text-blue-200 text-sm">Born: January 10, 2020 (Age 5) • Afterschool Class</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="voting-status status-complete text-green-400 font-semibold text-sm">Voted</div>
                                        <div class="text-white font-bold">🍖 Schnitzel</div>
                                        <div class="text-xs text-blue-200">Selected today 9:45 AM</div>
                                    </div>
                                    <button onclick="changeVote('noah-davis')" class="bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm transition-all">
                                        Change
                                    </button>
                                </div>
                            </div>

                            <!-- Child 5 - Not voted -->
                            <div class="child-card rounded-lg p-4 flex items-center justify-between" data-status="pending" data-class="preschoolers" data-name="mia wilson">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        MW
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Mia Wilson</h4>
                                        <p class="text-blue-200 text-sm">Born: August 5, 2021 (Age 3) • Preschoolers Class</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="voting-status status-missing text-red-400 font-semibold text-sm">Not Voted</div>
                                        <div class="text-gray-400 font-bold">No selection</div>
                                        <div class="text-xs text-red-300">Pending</div>
                                    </div>
                                    <button onclick="selectMealFor('mia-wilson')" class="bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm transition-all">
                                        Select
                                    </button>
                                </div>
                            </div>

                            <!-- Child 6 - Has voted -->
                            <div class="child-card rounded-lg p-4 flex items-center justify-between" data-status="complete" data-class="afterschool" data-name="sophia garcia">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        SG
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Sophia Garcia</h4>
                                        <p class="text-blue-200 text-sm">Born: April 18, 2019 (Age 6) • Afterschool Class</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="voting-status status-complete text-green-400 font-semibold text-sm">Voted</div>
                                        <div class="text-white font-bold">🥗 Salad</div>
                                        <div class="text-xs text-blue-200">Selected yesterday 2:20 PM</div>
                                    </div>
                                    <button onclick="changeVote('sophia-garcia')" class="bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm transition-all">
                                        Change
                                    </button>
                                </div>
                            </div>

                            <!-- Child 7 - Not voted -->
                            <div class="child-card rounded-lg p-4 flex items-center justify-between" data-status="pending" data-class="toddlers" data-name="ethan martinez">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        EM
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Ethan Martinez</h4>
                                        <p class="text-blue-200 text-sm">Born: September 12, 2022 (Age 2) • Toddlers Class</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="voting-status status-missing text-red-400 font-semibold text-sm">Not Voted</div>
                                        <div class="text-gray-400 font-bold">No selection</div>
                                        <div class="text-xs text-red-300">No reminders sent</div>
                                    </div>
                                    <button onclick="selectMealFor('ethan-martinez')" class="bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm transition-all">
                                        Select
                                    </button>
                                </div>
                            </div>

                            <!-- Child 8 - Has voted -->
                            <div class="child-card rounded-lg p-4 flex items-center justify-between" data-status="complete" data-class="preschoolers" data-name="ava anderson">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-teal-400 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        AA
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Ava Anderson</h4>
                                        <p class="text-blue-200 text-sm">Born: December 3, 2021 (Age 3) • Preschoolers Class</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="voting-status status-complete text-green-400 font-semibold text-sm">Voted</div>
                                        <div class="text-white font-bold">🍕 Pizza</div>
                                        <div class="text-xs text-blue-200">Selected today 8:30 AM</div>
                                    </div>
                                    <button onclick="changeVote('ava-anderson')" class="bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm transition-all">
                                        Change
                                    </button>
                                </div>
                            </div>

                        </div>

                        <!-- Load More Button -->
                        <div class="text-center mt-6">
                            <button onclick="loadMoreChildren()" class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                                Load More Children (22 remaining)
                            </button>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Meal Selection Modal -->
    <div id="meal-modal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="glass-effect rounded-xl max-w-md w-full p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white" id="modal-title">Select Meal for Child</h3>
                <button onclick="closeMealModal()" class="text-gray-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="space-y-3" id="meal-options">
                <button onclick="selectMeal('pizza')" class="w-full p-4 bg-white bg-opacity-10 hover:bg-opacity-20 rounded-lg text-left transition-all">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🍕</span>
                        <div>
                            <div class="text-white font-semibold">Pizza Margherita</div>
                            <div class="text-blue-200 text-sm">Fresh tomato sauce, mozzarella, basil</div>
                        </div>
                    </div>
                </button>
                <button onclick="selectMeal('pasta')" class="w-full p-4 bg-white bg-opacity-10 hover:bg-opacity-20 rounded-lg text-left transition-all">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🍝</span>
                        <div>
                            <div class="text-white font-semibold">Spaghetti Bolognese</div>
                            <div class="text-blue-200 text-sm">Classic meat sauce with parmesan</div>
                        </div>
                    </div>
                </button>
                <button onclick="selectMeal('schnitzel')" class="w-full p-4 bg-white bg-opacity-10 hover:bg-opacity-20 rounded-lg text-left transition-all">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🍖</span>
                        <div>
                            <div class="text-white font-semibold">Chicken Schnitzel</div>
                            <div class="text-blue-200 text-sm">Breaded chicken with potato salad</div>
                        </div>
                    </div>
                </button>
                <button onclick="selectMeal('salad')" class="w-full p-4 bg-white bg-opacity-10 hover:bg-opacity-20 rounded-lg text-left transition-all">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🥗</span>
                        <div>
                            <div class="text-white font-semibold">Rainbow Salad</div>
                            <div class="text-blue-200 text-sm">Fresh vegetables with grilled chicken</div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <script>
        let currentChildId = null;
        let voteCounts = {
            pizza: 9,
            pasta: 6,
            schnitzel: 4,
            salad: 3
        };
        const totalVotes = 22;

        // Meal details mapping
        const mealDetails = {
            pizza: { emoji: '🍕', name: 'Pizza Margherita', description: 'Fresh tomato sauce, mozzarella, basil' },
            pasta: { emoji: '🍝', name: 'Spaghetti Bolognese', description: 'Classic meat sauce with parmesan' },
            schnitzel: { emoji: '🍖', name: 'Chicken Schnitzel', description: 'Breaded chicken with potato salad' },
            salad: { emoji: '🥗', name: 'Rainbow Salad', description: 'Fresh vegetables with grilled chicken' }
        };

        // Filter functionality
        function setupFilters() {
            const searchInput = document.getElementById('child-search');
            const statusFilter = document.getElementById('status-filter');
            const classFilter = document.getElementById('class-filter');

            function filterChildren() {
                const searchTerm = searchInput.value.toLowerCase();
                const statusValue = statusFilter.value;
                const classValue = classFilter.value;
                const children = document.querySelectorAll('[data-name]');

                children.forEach(child => {
                    const name = child.dataset.name;
                    const status = child.dataset.status;
                    const childClass = child.dataset.class;

                    const matchesSearch = name.includes(searchTerm);
                    const matchesStatus = !statusValue || status === statusValue;
                    const matchesClass = !classValue || childClass === classValue;

                    if (matchesSearch && matchesStatus && matchesClass) {
                        child.style.display = 'flex';
                    } else {
                        child.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterChildren);
            statusFilter.addEventListener('change', filterChildren);
            classFilter.addEventListener('change', filterChildren);
        }

        // Modal functions
        function selectMealFor(childId) {
            currentChildId = childId;
            const childName = childId.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase());
            document.getElementById('modal-title').textContent = `Select Meal for ${childName}`;
            document.getElementById('meal-modal').classList.remove('hidden');
        }

        function changeVote(childId) {
            selectMealFor(childId);
        }

        function closeMealModal() {
            document.getElementById('meal-modal').classList.add('hidden');
            currentChildId = null;
        }

        function selectMeal(mealType) {
            if (!currentChildId) return;

            const meal = mealDetails[mealType];
            const childCard = document.querySelector(`[data-name="${currentChildId}"]`);
            
            if (childCard) {
                // Update child's selection
                const statusDiv = childCard.querySelector('.voting-status');
                const mealDiv = statusDiv.nextElementSibling;
                const timeDiv = mealDiv.nextElementSibling;
                const button = childCard.querySelector('button');

                statusDiv.textContent = 'Voted';
                statusDiv.className = 'voting-status status-complete text-green-400 font-semibold text-sm';
                mealDiv.textContent = `${meal.emoji} ${meal.name}`;
                mealDiv.className = 'text-white font-bold';
                timeDiv.textContent = 'Selected just now';
                timeDiv.className = 'text-xs text-blue-200';
                button.textContent = 'Change';
                button.onclick = () => changeVote(currentChildId);

                // Update child data
                childCard.dataset.status = 'complete';

                // Update vote counts (simplified - in real app would check previous vote)
                voteCounts[mealType]++;
                updateVoteDisplay();
            }

            closeMealModal();
            showNotification(`Meal selected: ${meal.name} for ${currentChildId.replace('-', ' ')}`, 'success');
        }

        function updateVoteDisplay() {
            const total = Object.values(voteCounts).reduce((a, b) => a + b, 0);
            
            // Update progress bars and percentages
            Object.keys(voteCounts).forEach(meal => {
                const percentage = total > 0 ? Math.round((voteCounts[meal] / total) * 100) : 0;
                const card = document.querySelector(`[onclick="showMealDetails('${meal}')"]`);
                if (card) {
                    const progressFill = card.querySelector('.progress-fill');
                    const percentageText = card.querySelector('.text-2xl');
                    const votesText = card.querySelector('.progress-bar').previousElementSibling.querySelector('span:last-child');
                    
                    if (progressFill) progressFill.style.width = `${percentage}%`;
                    if (percentageText) percentageText.textContent = `${percentage}%`;
                    if (votesText) votesText.textContent = `${voteCounts[meal]} votes`;
                }
            });
        }

        function showMealDetails(mealType) {
            const meal = mealDetails[mealType];
            showNotification(`${meal.emoji} ${meal.name}: ${meal.description}`, 'info');
        }

        function sendReminders() {
            showNotification('Reminders sent to all families with pending votes!', 'success');
        }

        function exportResults() {
            showNotification('Voting results exported to Excel!', 'success');
        }

        function loadMoreChildren() {
            showNotification('Loading more children...', 'info');
            // In real implementation, would load more children from server
        }

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transform transition-all duration-300 translate-x-full max-w-sm`;
            
            const bgColor = type === 'success' ? 'bg-green-500' : 
                           type === 'warning' ? 'bg-yellow-500' : 
                           type === 'error' ? 'bg-red-500' : 'bg-blue-500';
            
            notification.classList.add(bgColor);
            notification.innerHTML = `
                <div class="flex items-start text-white">
                    <span class="flex-1">${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-3 text-white hover:text-gray-200 flex-shrink-0">
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
                if (notification.parentElement) {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        if (notification.parentElement) {
                            notification.remove();
                        }
                    }, 300);
                }
            }, 5000);
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            setupFilters();
            
            // Close modal when clicking outside
            document.getElementById('meal-modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeMealModal();
                }
            });

            // Animate cards on load
            const childCards = document.querySelectorAll('.child-card');
            childCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.4s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Animate meal cards
            const mealCards = document.querySelectorAll('.meal-card');
            mealCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                }, index * 150 + 300);
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('meal-modal').classList.contains('hidden')) {
                closeMealModal();
            }
        });
    </script>

</body>

</html>: March 15, 2022 (Age 2) • Toddlers Class</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="voting-status status-complete text-green-400 font-semibold text-sm">Voted</div>
                                        <div class="text-white font-bold">🍕 Pizza</div>
                                        <div class="text-xs text-blue-200">Selected today 10:30 AM</div>
                                    </div>
                                    <button onclick="changeVote('emma-johnson')" class="bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm transition-all">
                                        Change
                                    </button>
                                </div>
                            </div>

                            <!-- Child 2 - Has voted -->
                            <div class="child-card rounded-lg p-4 flex items-center justify-between" data-status="complete" data-class="preschoolers" data-name="liam smith">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        LS
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Liam Smith</h4>
                                        <p class="text-blue-200 text-sm">Born: June 8, 2021 (Age 3) • Preschoolers Class</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="voting-status status-complete text-green-400 font-semibold text-sm">Voted</div>
                                        <div class="text-white font-bold">🍝 Pasta</div>
                                        <div class="text-xs text-blue-200">Selected today 11:15 AM</div>
                                    </div>
                                    <button onclick="changeVote('liam-smith')" class="bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm transition-all">
                                        Change
                                    </button>
                                </div>
                            </div>

                            <!-- Child 3 - Not voted -->
                            <div class="child-card rounded-lg p-4 flex items-center justify-between" data-status="pending" data-class="toddlers" data-name="olivia brown">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        OB
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Olivia Brown</h4>
                                        <p class="text-blue-200 text-sm">Born: November 22, 2022 (Age 2) • Toddlers Class</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="voting-status status-missing text-red-400 font-semibold text-sm">Not Voted</div>
                                        <div class="text-gray-400 font-bold">No selection</div>
                                        <div class="text-xs text-red-300">Reminder sent</div>
                                    </div>
                                    <button onclick="selectMealFor('olivia-brown')" class="bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-3 py-2 rounded-lg text-sm transition-all">
                                        Select
                                    </button>
                                </div>
                            </div>

                            <!-- Child 4 - Has voted -->
                            <div class="child-card rounded-lg p-4 flex items-center justify-between" data-status="complete" data-class="afterschool" data-name="noah davis">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        ND
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold">Noah Davis</h4>
                                        <p class="text-blue-200 text-sm">Born