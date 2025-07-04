<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/php/security/protection_header.php";

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayCareO1 - Staff Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="/resources/icon/icon.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
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

        .tab-active {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(147, 51, 234, 0.2) 100%);
            border-bottom: 3px solid #3b82f6;
        }

        .shift-cell {
            min-height: 80px;
            transition: all 0.2s ease;
        }

        .shift-cell:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .staff-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .shift-assigned {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(34, 197, 94, 0.1) 100%);
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .shift-morning {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(59, 130, 246, 0.1) 100%);
        }

        .shift-afternoon {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(245, 158, 11, 0.1) 100%);
        }

        .shift-evening {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.2) 0%, rgba(139, 92, 246, 0.1) 100%);
        }

        .upload-zone {
            border: 2px dashed rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .upload-zone:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.1);
        }

        .upload-zone.dragover {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.2);
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

                        <a href="/children.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Children
                            </span>
                        </a>


                        <a href="/staff.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Staff
                            </span>
                        </a>
   
                                                <a href="children.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r bg-blue-500 bg-opacity-20 transition-all duration-200 text-white w-full">
                                Schedules
                            </span>
                        </a>

                        <a href="billing.php" class="flex items-center h-10 group">
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
                    <p class="text-blue-100">Manage staff schedules and shift assignments efficiently.</p>
                </div>

                <!-- Main Content Card -->
                <div class="glass-effect rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <!-- Tabs -->
                        <div class="flex space-x-1 mb-8 bg-white bg-opacity-10 rounded-lg p-1">
                            <button
                                id="tab1"
                                class="tab-active flex-1 px-6 py-3 rounded-lg text-white font-medium transition-all duration-200 focus:outline-none"
                                onclick="showTab('tab1', ['tab2', 'tab3'], 'pane1', ['pane2', 'pane3'])">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Schedule Planner
                                </div>
                            </button>
                            <button
                                id="tab2"
                                class="flex-1 px-6 py-3 rounded-lg text-blue-200 hover:text-white font-medium transition-all duration-200 focus:outline-none"
                                onclick="showTab('tab2', ['tab1', 'tab3'], 'pane2', ['pane1', 'pane3'])">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Staff Overview
                                </div>
                            </button>
                            <button
                                id="tab3"
                                class="flex-1 px-6 py-3 rounded-lg text-blue-200 hover:text-white font-medium transition-all duration-200 focus:outline-none"
                                onclick="showTab('tab3', ['tab1', 'tab2'], 'pane3', ['pane1', 'pane2'])">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                    </svg>
                                    Excel Import
                                </div>
                            </button>
                        </div>

                        <!-- Tab Content -->
                        
                        <!-- Schedule Planner Tab -->
                        <div id="pane1" class="text-white">
                            <div class="mb-6">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-white mb-2">Weekly Schedule</h3>
                                        <p class="text-blue-200">Drag and drop staff to assign shifts</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <button onclick="saveSchedule()" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Save Schedule
                                        </button>
                                        <button onclick="clearSchedule()" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Clear All
                                        </button>
                                    </div>
                                </div>

                                <!-- Available Staff -->
                                <div class="mb-6">
                                    <h4 class="text-lg font-semibold mb-4">Available Staff</h4>
                                    <div class="flex flex-wrap gap-3" id="available-staff">
                                        <div class="staff-member bg-blue-500 bg-opacity-30 px-4 py-2 rounded-lg cursor-move hover:bg-opacity-40 transition-all" draggable="true" data-staff="sarah-wilson">
                                            <div class="flex items-center gap-2">
                                                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-8 h-8 rounded-full" alt="">
                                                <span>Sarah Wilson</span>
                                            </div>
                                        </div>
                                        <div class="staff-member bg-green-500 bg-opacity-30 px-4 py-2 rounded-lg cursor-move hover:bg-opacity-40 transition-all" draggable="true" data-staff="michael-davis">
                                            <div class="flex items-center gap-2">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-8 h-8 rounded-full" alt="">
                                                <span>Michael Davis</span>
                                            </div>
                                        </div>
                                        <div class="staff-member bg-purple-500 bg-opacity-30 px-4 py-2 rounded-lg cursor-move hover:bg-opacity-40 transition-all" draggable="true" data-staff="emma-johnson">
                                            <div class="flex items-center gap-2">
                                                <img src="https://randomuser.me/api/portraits/women/65.jpg" class="w-8 h-8 rounded-full" alt="">
                                                <span>Emma Johnson</span>
                                            </div>
                                        </div>
                                        <div class="staff-member bg-orange-500 bg-opacity-30 px-4 py-2 rounded-lg cursor-move hover:bg-opacity-40 transition-all" draggable="true" data-staff="john-smith">
                                            <div class="flex items-center gap-2">
                                                <img src="https://randomuser.me/api/portraits/men/75.jpg" class="w-8 h-8 rounded-full" alt="">
                                                <span>John Smith</span>
                                            </div>
                                        </div>
                                        <div class="staff-member bg-pink-500 bg-opacity-30 px-4 py-2 rounded-lg cursor-move hover:bg-opacity-40 transition-all" draggable="true" data-staff="lisa-brown">
                                            <div class="flex items-center gap-2">
                                                <img src="https://randomuser.me/api/portraits/women/50.jpg" class="w-8 h-8 rounded-full" alt="">
                                                <span>Lisa Brown</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schedule Grid -->
                                <div class="glass-effect rounded-xl p-6 overflow-x-auto">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="border-b border-white border-opacity-20">
                                                <th class="text-left p-4 text-blue-200">Time</th>
                                                <th class="text-center p-4 text-blue-200">Monday</th>
                                                <th class="text-center p-4 text-blue-200">Tuesday</th>
                                                <th class="text-center p-4 text-blue-200">Wednesday</th>
                                                <th class="text-center p-4 text-blue-200">Thursday</th>
                                                <th class="text-center p-4 text-blue-200">Friday</th>
                                                <th class="text-center p-4 text-blue-200">Saturday</th>
                                            </tr>
                                        </thead>
                                        <tbody id="schedule-table">
                                            <tr class="border-b border-white border-opacity-10">
                                                <td class="p-4 font-medium">
                                                    <div class="shift-morning px-3 py-2 rounded-lg">
                                                        <div class="text-white font-bold">Morning</div>
                                                        <div class="text-blue-200 text-sm">06:00 - 14:00</div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="monday" data-shift="morning">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="tuesday" data-shift="morning">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="wednesday" data-shift="morning">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="thursday" data-shift="morning">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="friday" data-shift="morning">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="saturday" data-shift="morning">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b border-white border-opacity-10">
                                                <td class="p-4 font-medium">
                                                    <div class="shift-afternoon px-3 py-2 rounded-lg">
                                                        <div class="text-white font-bold">Afternoon</div>
                                                        <div class="text-blue-200 text-sm">14:00 - 18:00</div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="monday" data-shift="afternoon">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="tuesday" data-shift="afternoon">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="wednesday" data-shift="afternoon">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="thursday" data-shift="afternoon">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="friday" data-shift="afternoon">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="saturday" data-shift="afternoon">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-4 font-medium">
                                                    <div class="shift-evening px-3 py-2 rounded-lg">
                                                        <div class="text-white font-bold">Evening</div>
                                                        <div class="text-blue-200 text-sm">18:00 - 22:00</div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="monday" data-shift="evening">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="tuesday" data-shift="evening">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="wednesday" data-shift="evening">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="thursday" data-shift="evening">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="friday" data-shift="evening">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="shift-cell glass-effect rounded-lg p-3 min-h-20 border-2 border-dashed border-white border-opacity-20" 
                                                         ondrop="drop(event)" ondragover="allowDrop(event)" data-day="saturday" data-shift="evening">
                                                        <div class="assigned-staff"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Staff Overview Tab -->
                        <div id="pane2" class="text-white hidden">
                            <div class="mb-8">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-white mb-2">Staff Overview</h3>
                                        <p class="text-blue-200">Manage your daycare staff members</p>
                                    </div>
                                    <button onclick="addStaffMember()" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg card-hover">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        Add Staff Member
                                    </button>
                                </div>

                                <!-- Staff Grid -->
                                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                                    
                                    <!-- Staff Card 1 -->
                                    <div class="staff-card rounded-xl p-6 card-hover">
                                        <div class="flex justify-between items-start mb-6">
                                            <div class="flex items-center gap-3">
                                                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-16 h-16 rounded-full border-3 border-white border-opacity-30" alt="">
                                                <div>
                                                    <h4 class="text-xl font-bold text-white">Sarah Wilson</h4>
                                                    <p class="text-sm text-blue-200">Lead Caretaker</p>
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                                        <span class="text-xs text-green-300">Available</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="text-blue-200 hover:text-white opacity-60 hover:opacity-100 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="space-y-4 mb-6">
                                            <div class="bg-white bg-opacity-10 rounded-lg p-3">
                                                <div class="flex justify-between items-center mb-2">
                                                    <span class="text-blue-200 text-sm">This Week's Hours</span>
                                                    <span class="text-white font-bold">32h</span>
                                                </div>
                                                <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full" style="width: 80%"></div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Classes</div>
                                                    <div class="text-white font-bold">3</div>
                                                </div>
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Experience</div>
                                                    <div class="text-white font-bold">5y</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex gap-3">
                                            <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                View Schedule
                                            </button>
                                            <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                Edit Profile
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Staff Card 2 -->
                                    <div class="staff-card rounded-xl p-6 card-hover">
                                        <div class="flex justify-between items-start mb-6">
                                            <div class="flex items-center gap-3">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-16 h-16 rounded-full border-3 border-white border-opacity-30" alt="">
                                                <div>
                                                    <h4 class="text-xl font-bold text-white">Michael Davis</h4>
                                                    <p class="text-sm text-blue-200">Assistant Caretaker</p>
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                                        <span class="text-xs text-yellow-300">On Break</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="text-blue-200 hover:text-white opacity-60 hover:opacity-100 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="space-y-4 mb-6">
                                            <div class="bg-white bg-opacity-10 rounded-lg p-3">
                                                <div class="flex justify-between items-center mb-2">
                                                    <span class="text-blue-200 text-sm">This Week's Hours</span>
                                                    <span class="text-white font-bold">28h</span>
                                                </div>
                                                <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full" style="width: 70%"></div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Classes</div>
                                                    <div class="text-white font-bold">2</div>
                                                </div>
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Experience</div>
                                                    <div class="text-white font-bold">3y</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex gap-3">
                                            <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                View Schedule
                                            </button>
                                            <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                Edit Profile
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Staff Card 3 -->
                                    <div class="staff-card rounded-xl p-6 card-hover">
                                        <div class="flex justify-between items-start mb-6">
                                            <div class="flex items-center gap-3">
                                                <img src="https://randomuser.me/api/portraits/women/65.jpg" class="w-16 h-16 rounded-full border-3 border-white border-opacity-30" alt="">
                                                <div>
                                                    <h4 class="text-xl font-bold text-white">Emma Johnson</h4>
                                                    <p class="text-sm text-blue-200">Specialist</p>
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                                        <span class="text-xs text-green-300">Available</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="text-blue-200 hover:text-white opacity-60 hover:opacity-100 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="space-y-4 mb-6">
                                            <div class="bg-white bg-opacity-10 rounded-lg p-3">
                                                <div class="flex justify-between items-center mb-2">
                                                    <span class="text-blue-200 text-sm">This Week's Hours</span>
                                                    <span class="text-white font-bold">36h</span>
                                                </div>
                                                <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-2 rounded-full" style="width: 90%"></div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Classes</div>
                                                    <div class="text-white font-bold">4</div>
                                                </div>
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Experience</div>
                                                    <div class="text-white font-bold">7y</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex gap-3">
                                            <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                View Schedule
                                            </button>
                                            <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                Edit Profile
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Staff Card 4 -->
                                    <div class="staff-card rounded-xl p-6 card-hover">
                                        <div class="flex justify-between items-start mb-6">
                                            <div class="flex items-center gap-3">
                                                <img src="https://randomuser.me/api/portraits/men/75.jpg" class="w-16 h-16 rounded-full border-3 border-white border-opacity-30" alt="">
                                                <div>
                                                    <h4 class="text-xl font-bold text-white">John Smith</h4>
                                                    <p class="text-sm text-blue-200">Part-time Helper</p>
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                                                        <span class="text-xs text-red-300">Off Duty</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="text-blue-200 hover:text-white opacity-60 hover:opacity-100 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="space-y-4 mb-6">
                                            <div class="bg-white bg-opacity-10 rounded-lg p-3">
                                                <div class="flex justify-between items-center mb-2">
                                                    <span class="text-blue-200 text-sm">This Week's Hours</span>
                                                    <span class="text-white font-bold">20h</span>
                                                </div>
                                                <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-orange-400 to-orange-600 h-2 rounded-full" style="width: 50%"></div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Classes</div>
                                                    <div class="text-white font-bold">1</div>
                                                </div>
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Experience</div>
                                                    <div class="text-white font-bold">1y</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex gap-3">
                                            <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                View Schedule
                                            </button>
                                            <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                Edit Profile
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Staff Card 5 -->
                                    <div class="staff-card rounded-xl p-6 card-hover">
                                        <div class="flex justify-between items-start mb-6">
                                            <div class="flex items-center gap-3">
                                                <img src="https://randomuser.me/api/portraits/women/50.jpg" class="w-16 h-16 rounded-full border-3 border-white border-opacity-30" alt="">
                                                <div>
                                                    <h4 class="text-xl font-bold text-white">Lisa Brown</h4>
                                                    <p class="text-sm text-blue-200">Senior Caretaker</p>
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                                        <span class="text-xs text-green-300">Available</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="text-blue-200 hover:text-white opacity-60 hover:opacity-100 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="space-y-4 mb-6">
                                            <div class="bg-white bg-opacity-10 rounded-lg p-3">
                                                <div class="flex justify-between items-center mb-2">
                                                    <span class="text-blue-200 text-sm">This Week's Hours</span>
                                                    <span class="text-white font-bold">40h</span>
                                                </div>
                                                <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-pink-400 to-pink-600 h-2 rounded-full" style="width: 100%"></div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Classes</div>
                                                    <div class="text-white font-bold">3</div>
                                                </div>
                                                <div class="bg-white bg-opacity-10 rounded-lg p-3 text-center">
                                                    <div class="text-blue-200 text-sm">Experience</div>
                                                    <div class="text-white font-bold">8y</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex gap-3">
                                            <button class="flex-1 bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                View Schedule
                                            </button>
                                            <button class="flex-1 bg-green-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                                Edit Profile
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Excel Import Tab -->
                        <div id="pane3" class="text-white hidden">
                            <div class="mb-8">
                                <h3 class="text-2xl font-bold text-white mb-2">Excel Import</h3>
                                <p class="text-blue-200">Import staff schedules from Excel files</p>
                            </div>

                            <!-- Upload Zone -->
                            <div class="glass-effect rounded-xl p-8 mb-8">
                                <div class="upload-zone rounded-xl p-12 text-center" id="upload-zone" onclick="document.getElementById('file-input').click()">
                                    <div class="mb-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-blue-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                        </svg>
                                        <h4 class="text-xl font-bold text-white mb-2">Upload Excel File</h4>
                                        <p class="text-blue-200">Drag and drop your Excel file here, or click to browse</p>
                                    </div>
                                    <input type="file" id="file-input" accept=".xlsx,.xls" style="display: none;" onchange="handleFileUpload(event)">
                                    <div class="text-sm text-blue-300">
                                        Supported formats: .xlsx, .xls
                                    </div>
                                </div>
                            </div>

                            <!-- Template Download -->
                            <div class="glass-effect rounded-xl p-6 mb-8">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-2">Need a Template?</h4>
                                        <p class="text-blue-200">Download our Excel template to format your schedule data correctly</p>
                                    </div>
                                    <button onclick="downloadTemplate()" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Download Template
                                    </button>
                                </div>
                            </div>

                            <!-- Preview Area -->
                            <div id="preview-area" class="glass-effect rounded-xl p-6 hidden">
                                <div class="flex items-center justify-between mb-6">
                                    <h4 class="text-lg font-bold text-white">File Preview</h4>
                                    <div class="flex gap-3">
                                        <button onclick="processSchedule()" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Import Schedule
                                        </button>
                                        <button onclick="clearPreview()" class="bg-gray-500 bg-opacity-30 hover:bg-opacity-40 text-white px-4 py-2 rounded-lg">
                                            Clear
                                        </button>
                                    </div>
                                </div>
                                <div id="excel-preview" class="overflow-x-auto">
                                    <!-- Excel data will be displayed here -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        // Global variables
        let currentSchedule = {};
        let excelData = null;
        let draggedElement = null;

        // Tab switching function
        function showTab(activeId, inactiveIds, activePaneId, inactivePaneIds) {
            // Handle active tab
            const activeTab = document.getElementById(activeId);
            activeTab.classList.add('tab-active');
            activeTab.classList.remove('text-blue-200');
            activeTab.classList.add('text-white');
            
            // Handle inactive tabs
            inactiveIds.forEach(id => {
                const inactiveTab = document.getElementById(id);
                inactiveTab.classList.remove('tab-active');
                inactiveTab.classList.add('text-blue-200');
                inactiveTab.classList.remove('text-white');
            });
            
            // Show/hide content
            document.getElementById(activePaneId).classList.remove('hidden');
            inactivePaneIds.forEach(id => {
                document.getElementById(id).classList.add('hidden');
            });
        }

        // Drag and Drop functionality for schedule
        function allowDrop(ev) {
            ev.preventDefault();
            ev.currentTarget.classList.add('border-blue-400', 'bg-blue-500', 'bg-opacity-20');
        }

        function drop(ev) {
            ev.preventDefault();
            ev.currentTarget.classList.remove('border-blue-400', 'bg-blue-500', 'bg-opacity-20');
            
            if (draggedElement) {
                const staffId = draggedElement.dataset.staff;
                const staffName = draggedElement.querySelector('span').textContent;
                const staffImg = draggedElement.querySelector('img').src;
                const day = ev.currentTarget.dataset.day;
                const shift = ev.currentTarget.dataset.shift;
                
                // Create staff assignment element
                const assignedStaff = document.createElement('div');
                assignedStaff.className = 'flex items-center gap-2 bg-white bg-opacity-20 rounded-lg p-2 mb-2';
                assignedStaff.innerHTML = `
                    <img src="${staffImg}" class="w-6 h-6 rounded-full" alt="">
                    <span class="text-white text-sm font-medium">${staffName}</span>
                    <button onclick="removeAssignment(this)" class="ml-auto text-red-400 hover:text-red-300 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                `;
                
                ev.currentTarget.querySelector('.assigned-staff').appendChild(assignedStaff);
                
                // Update schedule data
                if (!currentSchedule[day]) currentSchedule[day] = {};
                if (!currentSchedule[day][shift]) currentSchedule[day][shift] = [];
                currentSchedule[day][shift].push({
                    id: staffId,
                    name: staffName,
                    img: staffImg
                });
                
                showNotification(`${staffName} assigned to ${day} ${shift} shift`, 'success');
            }
        }

        // Drag start
        document.addEventListener('DOMContentLoaded', function() {
            const staffMembers = document.querySelectorAll('.staff-member');
            staffMembers.forEach(member => {
                member.addEventListener('dragstart', function(e) {
                    draggedElement = this;
                });
                
                member.addEventListener('dragend', function(e) {
                    draggedElement = null;
                });
            });
            
            // Prevent default drag over for shift cells
            const shiftCells = document.querySelectorAll('.shift-cell');
            shiftCells.forEach(cell => {
                cell.addEventListener('dragleave', function(e) {
                    this.classList.remove('border-blue-400', 'bg-blue-500', 'bg-opacity-20');
                });
            });
        });

        function removeAssignment(button) {
            const assignmentDiv = button.closest('div');
            const staffName = assignmentDiv.querySelector('span').textContent;
            assignmentDiv.remove();
            showNotification(`${staffName} removed from shift`, 'warning');
        }

        function saveSchedule() {
            // In a real application, this would save to database
            console.log('Saving schedule:', currentSchedule);
            showNotification('Schedule saved successfully!', 'success');
        }

        function clearSchedule() {
            if (confirm('Are you sure you want to clear the entire schedule?')) {
                currentSchedule = {};
                const assignedStaffDivs = document.querySelectorAll('.assigned-staff');
                assignedStaffDivs.forEach(div => {
                    div.innerHTML = '';
                });
                showNotification('Schedule cleared', 'warning');
            }
        }

        function addStaffMember() {
            showNotification('Add Staff Member feature coming soon!', 'info');
        }

        // Excel Import Functions
        function handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    try {
                        const data = new Uint8Array(e.target.result);
                        const workbook = XLSX.read(data, { type: 'array' });
                        const firstSheetName = workbook.SheetNames[0];
                        const worksheet = workbook.Sheets[firstSheetName];
                        const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
                        
                        excelData = jsonData;
                        displayPreview(jsonData);
                        showNotification('File uploaded successfully!', 'success');
                    } catch (error) {
                        showNotification('Error reading file: ' + error.message, 'error');
                    }
                };
                reader.readAsArrayBuffer(file);
            }
        }

        function displayPreview(data) {
            const previewArea = document.getElementById('preview-area');
            const previewDiv = document.getElementById('excel-preview');
            
            if (data && data.length > 0) {
                let html = '<table class="w-full text-white"><thead><tr class="border-b border-white border-opacity-20">';
                
                // Headers
                if (data[0]) {
                    data[0].forEach(header => {
                        html += `<th class="text-left p-3 text-blue-200">${header || ''}</th>`;
                    });
                }
                html += '</tr></thead><tbody>';
                
                // Data rows (limit to first 10 for preview)
                for (let i = 1; i < Math.min(data.length, 11); i++) {
                    html += '<tr class="border-b border-white border-opacity-10">';
                    if (data[i]) {
                        data[0].forEach((_, colIndex) => {
                            html += `<td class="p-3">${data[i][colIndex] || ''}</td>`;
                        });
                    }
                    html += '</tr>';
                }
                
                html += '</tbody></table>';
                
                if (data.length > 11) {
                    html += `<div class="mt-4 text-blue-200 text-center">... and ${data.length - 11} more rows</div>`;
                }
                
                previewDiv.innerHTML = html;
                previewArea.classList.remove('hidden');
            }
        }

        function processSchedule() {
            if (!excelData) {
                showNotification('No data to process!', 'error');
                return;
            }
            
            // Clear existing schedule
            currentSchedule = {};
            const assignedStaffDivs = document.querySelectorAll('.assigned-staff');
            assignedStaffDivs.forEach(div => {
                div.innerHTML = '';
            });
            
            try {
                // Process Excel data
                // Expected format: Name, Monday Morning, Monday Afternoon, Monday Evening, Tuesday Morning, etc.
                const headers = excelData[0];
                const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                const shifts = ['morning', 'afternoon', 'evening'];
                
                for (let i = 1; i < excelData.length; i++) {
                    const row = excelData[i];
                    const staffName = row[0];
                    
                    if (!staffName) continue;
                    
                    let colIndex = 1;
                    days.forEach(day => {
                        shifts.forEach(shift => {
                            if (colIndex < row.length && row[colIndex] && (row[colIndex].toLowerCase() === 'x' || row[colIndex].toLowerCase() === 'yes' || row[colIndex] === '1')) {
                                // Find the corresponding cell in the schedule
                                const shiftCell = document.querySelector(`[data-day="${day}"][data-shift="${shift}"]`);
                                if (shiftCell) {
                                    const assignedStaff = document.createElement('div');
                                    assignedStaff.className = 'flex items-center gap-2 bg-white bg-opacity-20 rounded-lg p-2 mb-2';
                                    assignedStaff.innerHTML = `
                                        <div class="w-6 h-6 bg-blue-400 rounded-full flex items-center justify-center text-white text-xs font-bold">${staffName.substring(0, 2).toUpperCase()}</div>
                                        <span class="text-white text-sm font-medium">${staffName}</span>
                                        <button onclick="removeAssignment(this)" class="ml-auto text-red-400 hover:text-red-300 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    `;
                                    
                                    shiftCell.querySelector('.assigned-staff').appendChild(assignedStaff);
                                    
                                    // Update schedule data
                                    if (!currentSchedule[day]) currentSchedule[day] = {};
                                    if (!currentSchedule[day][shift]) currentSchedule[day][shift] = [];
                                    currentSchedule[day][shift].push({
                                        id: staffName.toLowerCase().replace(' ', '-'),
                                        name: staffName,
                                        img: null
                                    });
                                }
                            }
                            colIndex++;
                        });
                    });
                }
                
                showNotification('Schedule imported successfully!', 'success');
                // Switch to schedule tab
                showTab('tab1', ['tab2', 'tab3'], 'pane1', ['pane2', 'pane3']);
                
            } catch (error) {
                showNotification('Error processing schedule: ' + error.message, 'error');
            }
        }

        function clearPreview() {
            document.getElementById('preview-area').classList.add('hidden');
            document.getElementById('excel-preview').innerHTML = '';
            document.getElementById('file-input').value = '';
            excelData = null;
        }

        function downloadTemplate() {
            // Create template data
            const templateData = [
                ['Staff Name', 'Monday Morning', 'Monday Afternoon', 'Monday Evening', 
                 'Tuesday Morning', 'Tuesday Afternoon', 'Tuesday Evening',
                 'Wednesday Morning', 'Wednesday Afternoon', 'Wednesday Evening',
                 'Thursday Morning', 'Thursday Afternoon', 'Thursday Evening',
                 'Friday Morning', 'Friday Afternoon', 'Friday Evening',
                 'Saturday Morning', 'Saturday Afternoon', 'Saturday Evening'],
                ['Sarah Wilson', 'X', '', 'X', 'X', '', '', 'X', 'X', '', 'X', '', 'X', 'X', '', '', '', 'X', ''],
                ['Michael Davis', '', 'X', '', '', 'X', 'X', '', 'X', 'X', '', 'X', '', '', 'X', 'X', 'X', '', ''],
                ['Emma Johnson', 'X', 'X', '', 'X', 'X', '', 'X', '', 'X', 'X', 'X', '', 'X', 'X', '', '', '', 'X'],
                ['John Smith', '', '', 'X', '', '', 'X', '', '', 'X', '', '', 'X', '', '', 'X', 'X', '', ''],
                ['Lisa Brown', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X']
            ];
            
            // Create workbook
            const ws = XLSX.utils.aoa_to_sheet(templateData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Schedule Template");
            
            // Download file
            XLSX.writeFile(wb, "staff_schedule_template.xlsx");
            showNotification('Template downloaded!', 'success');
        }

        // Drag and Drop for file upload
        function setupDragAndDrop() {
            const uploadZone = document.getElementById('upload-zone');
            
            uploadZone.addEventListener('dragenter', function(e) {
                e.preventDefault();
                this.classList.add('dragover');
            });
            
            uploadZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('dragover');
            });
            
            uploadZone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
            });
            
            uploadZone.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    const file = files[0];
                    if (file.type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || 
                        file.type === 'application/vnd.ms-excel') {
                        document.getElementById('file-input').files = files;
                        handleFileUpload({ target: { files: files } });
                    } else {
                        showNotification('Please upload an Excel file (.xlsx or .xls)', 'error');
                    }
                }
            });
        }

        // Notification function
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

        // Initialize everything when page loads
        document.addEventListener('DOMContentLoaded', function() {
            setupDragAndDrop();
            
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

            // Demo button interactions
            document.addEventListener('click', function(e) {
                if (e.target.closest('button')) {
                    const button = e.target.closest('button');
                    const buttonText = button.textContent.trim();
                    
                    if (buttonText.includes('View Schedule') || buttonText.includes('Edit Profile')) {
                        e.preventDefault();
                        showNotification(`${buttonText} action triggered!`, 'info');
                    }
                }
            });
        });
    </script>

</body>

</html>