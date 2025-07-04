<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/php/security/protection_header.php";


?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayCareO1-Panel Web v1.0</title>
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

        .metric-card {
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
                        <a href="#" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r bg-blue-500 bg-opacity-20 transition-all duration-200 text-white w-full">
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
            <main class="flex-1 flex flex-col p-6">
                
                <!-- Welcome Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-white mb-2">Good Morning! 🌅</h1>
                    <p class="text-blue-100">Welcome to your DayCare dashboard. Here's what's happening today.</p>
                </div>

                <!-- Quick Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                    <div class="metric-card rounded-xl p-6 card-hover">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm">Total Children</p>
                                <p class="text-3xl font-bold text-white">47</p>
                                <p class="text-green-300 text-sm">+3 this week</p>
                            </div>
                            <div class="bg-blue-500 bg-opacity-30 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="metric-card rounded-xl p-6 card-hover">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm">Active Classes</p>
                                <p class="text-3xl font-bold text-white">3</p>
                                <p class="text-blue-300 text-sm">All running</p>
                            </div>
                            <div class="bg-green-500 bg-opacity-30 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="metric-card rounded-xl p-6 card-hover">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm">Staff Members</p>
                                <p class="text-3xl font-bold text-white">12</p>
                                <p class="text-green-300 text-sm">All present</p>
                            </div>
                            <div class="bg-purple-500 bg-opacity-30 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="metric-card rounded-xl p-6 card-hover">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm">Monthly Revenue</p>
                                <p class="text-3xl font-bold text-white">$21.4K</p>
                                <p class="text-green-300 text-sm">+12% vs last month</p>
                            </div>
                            <div class="bg-yellow-500 bg-opacity-30 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Dashboard Content -->
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
                    
                    <!-- Classes Overview -->
                    <div class="glass-effect rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-4 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
                            </svg>
                            <span class="font-semibold">Classes Overview</span>
                        </div>

                        <div class="p-6 text-white space-y-4">
                            <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                <div>
                                    <span class="font-medium">Afterschool</span>
                                    <p class="text-sm text-blue-100">Ages 6-12</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-blue-300 font-medium mr-3">10</span>
                                    <span class="text-red-300 font-medium">2</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                <div>
                                    <span class="font-medium">Infants</span>
                                    <p class="text-sm text-blue-100">Ages 0-1</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-blue-300 font-medium mr-3">5</span>
                                    <span class="text-red-300 font-medium">0</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center p-4 bg-white bg-opacity-10 rounded-lg">
                                <div>
                                    <span class="font-medium">Toddlers</span>
                                    <p class="text-sm text-blue-100">Ages 1-3</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-blue-300 font-medium mr-3">3</span>
                                    <span class="text-red-300 font-medium">0</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-500 bg-opacity-20 px-6 py-3 text-blue-100 hover:bg-opacity-30 cursor-pointer transition-colors">
                            <span class="font-medium">+ Add New Class</span>
                        </div>
                    </div>

                    <!-- Families Stats -->
                    <div class="glass-effect rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-4 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                            </svg>
                            <span class="font-semibold">Families & Enrollment</span>
                        </div>

                        <div class="p-6 text-white">
                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <div class="text-center">
                                    <div class="text-blue-100 text-sm mb-1">Enrolled</div>
                                    <div class="text-4xl font-bold text-white mb-1">41</div>
                                    <div class="text-green-300 text-xs">Active</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-blue-100 text-sm mb-1">Waitlist</div>
                                    <div class="text-4xl font-bold text-red-300 mb-1">6</div>
                                    <div class="text-red-300 text-xs">Pending</div>
                                </div>
                            </div>

                            <hr class="border-white border-opacity-20 mb-6" />

                            <div class="grid grid-cols-2 gap-6">
                                <div class="text-center">
                                    <div class="text-blue-100 text-sm mb-1">Families</div>
                                    <div class="text-3xl font-bold text-white mb-1">28</div>
                                    <div class="text-blue-300 text-xs">Total</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-blue-100 text-sm mb-1">Waitlist</div>
                                    <div class="text-3xl font-bold text-red-300 mb-1">4</div>
                                    <div class="text-red-300 text-xs">Families</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-green-500 bg-opacity-20 px-6 py-3 text-green-100 hover:bg-opacity-30 cursor-pointer transition-colors">
                            <span class="font-medium">+ Add New Family</span>
                        </div>
                    </div>

                    <!-- Calendar Widget -->
                    <div class="glass-effect rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-6 py-4 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z" />
                            </svg>
                            <span class="font-semibold">Today's Schedule</span>
                        </div>

                        <div class="p-6 text-white space-y-4">
                            <div class="flex items-center justify-between text-sm mb-4">
                                <button class="text-purple-200 hover:text-white">&lt;</button>
                                <span class="font-semibold">March 2019</span>
                                <button class="text-purple-200 hover:text-white">&gt;</button>
                            </div>

                            <div class="bg-white bg-opacity-10 rounded-lg p-4 mb-4">
                                <div class="text-center mb-2">
                                    <div class="text-purple-200 text-sm">Today</div>
                                    <div class="text-2xl font-bold">17</div>
                                    <div class="text-purple-200 text-sm">Wednesday</div>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center gap-3 p-3 bg-white bg-opacity-10 rounded-lg">
                                    <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                    <div>
                                        <div class="text-sm font-medium">Morning Circle</div>
                                        <div class="text-xs text-purple-200">9:00 AM - All Classes</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 p-3 bg-white bg-opacity-10 rounded-lg">
                                    <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                    <div>
                                        <div class="text-sm font-medium">Lunch Time</div>
                                        <div class="text-xs text-purple-200">12:00 PM - All Classes</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 p-3 bg-white bg-opacity-10 rounded-lg">
                                    <div class="w-3 h-3 bg-blue-400 rounded-full"></div>
                                    <div>
                                        <div class="text-sm font-medium">Story Time</div>
                                        <div class="text-xs text-purple-200">2:30 PM - Toddlers</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-purple-500 bg-opacity-20 px-6 py-3 text-purple-100 hover:bg-opacity-30 cursor-pointer transition-colors">
                            <span class="font-medium">+ Add Event</span>
                        </div>
                    </div>
                </div>

                <!-- Reminders Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    
                    <!-- Child Reminders -->
                    <div class="glass-effect rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-4 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                            </svg>
                            <span class="font-semibold">Child Reminders</span>
                        </div>

                        <div class="p-6">
                            <div class="space-y-4 text-white">
                                <div class="flex items-center gap-4 p-4 bg-white bg-opacity-10 rounded-lg">
                                    <img src="https://i.redd.it/dhi0om5l4ze71.jpg" class="h-10 w-10 rounded-full border-2 border-white border-opacity-30" alt="">
                                    <div class="flex-1">
                                        <div class="font-medium">Emma Weber</div>
                                        <div class="text-sm text-orange-200">Vaccination due - April 25, 2019</div>
                                    </div>
                                    <div class="text-orange-300 text-sm font-medium">High</div>
                                </div>
                                <div class="flex items-center gap-4 p-4 bg-white bg-opacity-10 rounded-lg">
                                    <img src="https://randomuser.me/api/portraits/lego/2.jpg" class="h-10 w-10 rounded-full border-2 border-white border-opacity-30" alt="">
                                    <div class="flex-1">
                                        <div class="font-medium">Lucas Schmidt</div>
                                        <div class="text-sm text-orange-200">Medical checkup - April 30, 2019</div>
                                    </div>
                                    <div class="text-yellow-300 text-sm font-medium">Medium</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Staff Reminders -->
                    <div class="glass-effect rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-4 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927C9.469 2.387 10.531 2.387 10.951 2.927L13.63 6.36A1 1 0 0112.83 8h-5.66a1 1 0 01-.8-1.64l2.679-3.433zM10 9a1 1 0 011 1v7a1 1 0 11-2 0v-7a1 1 0 011-1z" />
                            </svg>
                            <span class="font-semibold">Staff Reminders</span>
                        </div>

                        <div class="p-6">
                            <div class="space-y-4 text-white">
                                <div class="flex items-center gap-4 p-4 bg-white bg-opacity-10 rounded-lg">
    <div class="h-10 w-10 rounded-full border-2 border-white border-opacity-30 overflow-hidden flex items-center justify-center bg-gray-200">
        <img src="https://www.nurseryworld.co.uk/media/be2p2oav/wmvickygerman.jpg?width=1002&height=668&bgcolor=White&v=1da4d9e3595c430" class="w-full h-full object-cover" alt="">
    </div>
    <div class="flex-1">
        <div class="font-medium">Wanda Mazi</div>
        <div class="text-sm text-red-200">Police Report due - April 25, 2019</div>
    </div>
    <div class="text-red-300 text-sm font-medium">Urgent</div>
</div>
<div class="flex items-center gap-4 p-4 bg-white bg-opacity-10 rounded-lg">
    <div class="h-10 w-10 rounded-full border-2 border-white border-opacity-30 overflow-hidden flex items-center justify-center bg-gray-200">
        <img src="https://images.squarespace-cdn.com/content/v1/62a8f836fd5fb9251f33f15e/b142a83d-4f32-42c5-9306-ff54a666ebde/Picture2.jpg" class="w-full h-full object-cover" alt="">
    </div>
    <div class="flex-1">
        <div class="font-medium">Nebula Thanos</div>
        <div class="text-sm text-red-200">Training Certificate - April 28, 2019</div>
    </div>
    <div class="text-yellow-300 text-sm font-medium">Medium</div>
</div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate metric cards on load
            const metricCards = document.querySelectorAll('.metric-card');
            metricCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
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

            // Update time every second (for demo purposes)
            function updateTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString();
                // You can add a time display element if needed
            }
            setInterval(updateTime, 1000);
        });

        // Function to show notification (for demo)
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
            
            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 5000);
        }

        // Add click handlers for demonstration
        document.addEventListener('click', function(e) {
            if (e.target.closest('.bg-blue-50, .bg-green-50, .bg-purple-50')) {
                e.preventDefault();
                const action = e.target.textContent.trim();
                showNotification(`${action} clicked!`, 'info');
            }
        });
    </script>

</body>

</html>