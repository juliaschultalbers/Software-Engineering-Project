<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/php/security/protection_header.php";

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayCareO1 - Billing & Finance</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="/resources/icon/icon.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
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

        .metric-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .invoice-row {
            transition: all 0.2s ease;
        }

        .invoice-row:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .status-paid {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(34, 197, 94, 0.1) 100%);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .status-pending {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(245, 158, 11, 0.1) 100%);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .status-overdue {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(239, 68, 68, 0.1) 100%);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .chart-container {
            position: relative;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
        }

        .income-positive {
            color: #22c55e;
        }

        .income-negative {
            color: #ef4444;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .filter-dropdown {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="text-white flex flex-col min-h-screen">
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/php/GUI/nav.php";
    ?>
    
    <div class="flex items-center justify-center">
        <div class="flex w-full max-w-7xl ">

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
                       <a href="schedules.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-transparent group-hover:bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r group-hover:bg-blue-500 group-hover:bg-opacity-20 transition-all duration-200 text-white w-full">
                                Schedules
                            </span>
                        </a>
                        <a href="billing.php" class="flex items-center h-10 group">
                            <div class="w-4 h-10 rounded-l bg-blue-500 transition-all duration-200"></div>
                            <span class="pl-4 pr-6 py-1 h-10 flex items-center rounded-r bg-blue-500 bg-opacity-20 transition-all duration-200 text-white w-full">
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
                <div class="mb-8 ">
                    <h1 class="text-3xl font-bold text-white mb-2">Billing & Finance 💰</h1>
                    <p class="text-blue-100">Comprehensive financial management for your daycare center.</p>
                </div>

                <!-- Financial Overview Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Monthly Revenue -->
                    <div class="metric-card rounded-xl p-6 card-hover ">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                            <span class="text-xs text-green-300 font-medium">+12.5%</span>
                        </div>
                        <h3 class="text-sm text-blue-200 mb-1">Monthly Revenue</h3>
                        <p class="text-2xl font-bold text-white">€24,850</p>
                        <div class="text-xs text-green-300 mt-2">vs last month</div>
                    </div>

                    <!-- Outstanding Payments -->
                    <div class="metric-card rounded-xl p-6 card-hover ">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-xs text-yellow-300 font-medium">7 invoices</span>
                        </div>
                        <h3 class="text-sm text-blue-200 mb-1">Outstanding</h3>
                        <p class="text-2xl font-bold text-white">€3,240</p>
                        <div class="text-xs text-yellow-300 mt-2">pending payment</div>
                    </div>

                    <!-- Overdue Amount -->
                    <div class="metric-card rounded-xl p-6 card-hover ">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.924-.833-2.684 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                            </div>
                            <span class="text-xs text-red-300 font-medium">3 overdue</span>
                        </div>
                        <h3 class="text-sm text-blue-200 mb-1">Overdue</h3>
                        <p class="text-2xl font-bold text-white">€890</p>
                        <div class="text-xs text-red-300 mt-2">requires attention</div>
                    </div>

                    <!-- Monthly Expenses -->
                    <div class="metric-card rounded-xl p-6 card-hover ">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z" />
                                </svg>
                            </div>
                            <span class="text-xs text-red-300 font-medium">+8.2%</span>
                        </div>
                        <h3 class="text-sm text-blue-200 mb-1">Monthly Expenses</h3>
                        <p class="text-2xl font-bold text-white">€18,420</p>
                        <div class="text-xs text-red-300 mt-2">vs last month</div>
                    </div>
                </div>

                <!-- Main Content Card -->
                <div class="glass-effect rounded-xl shadow-lg overflow-hidden ">
                    <div class="p-6">
                        <!-- Tabs -->
                        <div class="flex space-x-1 mb-8 bg-white bg-opacity-10 rounded-lg p-1 overflow-x-auto">
                            <button
                                id="tab1"
                                class="tab-active flex-none px-6 py-3 rounded-lg text-white font-medium transition-all duration-200 focus:outline-none whitespace-nowrap"
                                onclick="showTab('tab1', ['tab2', 'tab3', 'tab4'], 'pane1', ['pane2', 'pane3', 'pane4'])">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Invoices
                                </div>
                            </button>
                            <button
                                id="tab2"
                                class="flex-none px-6 py-3 rounded-lg text-blue-200 hover:text-white font-medium transition-all duration-200 focus:outline-none whitespace-nowrap"
                                onclick="showTab('tab2', ['tab1', 'tab3', 'tab4'], 'pane2', ['pane1', 'pane3', 'pane4'])">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Reports
                                </div>
                            </button>
                            <button
                                id="tab3"
                                class="flex-none px-6 py-3 rounded-lg text-blue-200 hover:text-white font-medium transition-all duration-200 focus:outline-none whitespace-nowrap"
                                onclick="showTab('tab3', ['tab1', 'tab2', 'tab4'], 'pane3', ['pane1', 'pane2', 'pane4'])">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Payments
                                </div>
                            </button>
                            <button
                                id="tab4"
                                class="flex-none px-6 py-3 rounded-lg text-blue-200 hover:text-white font-medium transition-all duration-200 focus:outline-none whitespace-nowrap"
                                onclick="showTab('tab4', ['tab1', 'tab2', 'tab3'], 'pane4', ['pane1', 'pane2', 'pane3'])">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Settings
                                </div>
                            </button>
                        </div>

                        <!-- Invoices Tab -->
                        <div id="pane1" class="text-white ">
                            <div class="mb-6">
                                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 gap-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-white mb-2">Invoice Management</h3>
                                        <p class="text-blue-200">Track and manage all family invoices</p>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                                        <button onclick="createNewInvoice()" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            New Invoice
                                        </button>
                                        <button onclick="exportInvoices()" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 shadow-lg justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Export
                                        </button>
                                    </div>
                                </div>

                                <!-- Search and Filter -->
                                <div class="glass-effect rounded-xl p-4 mb-6">
                                    <div class="flex flex-col lg:flex-row gap-4">
                                        <div class="flex-1">
                                            <input type="text" id="invoice-search" placeholder="Search by family name, invoice number..." 
                                                   class="w-full px-4 py-3 search-input rounded-lg focus:outline-none text-white placeholder-blue-200">
                                        </div>
                                        <div class="flex gap-3">
                                            <select class="filter-dropdown px-4 py-3 rounded-lg focus:outline-none text-white" id="status-filter">
                                                <option value="">All Status</option>
                                                <option value="paid">Paid</option>
                                                <option value="pending">Pending</option>
                                                <option value="overdue">Overdue</option>
                                            </select>
                                            <select class="filter-dropdown px-4 py-3 rounded-lg focus:outline-none text-white" id="month-filter">
                                                <option value="">All Months</option>
                                                <option value="2025-01">January 2025</option>
                                                <option value="2024-12">December 2024</option>
                                                <option value="2024-11">November 2024</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Invoices Table -->
                                <div class="glass-effect rounded-xl overflow-hidden">
                                    <div class="overflow-x-auto">
                                        <table class="w-full" id="invoices-table">
                                            <thead class="bg-white bg-opacity-10">
                                                <tr>
                                                    <th class="text-left p-4 text-blue-200 font-medium">Invoice #</th>
                                                    <th class="text-left p-4 text-blue-200 font-medium">Family</th>
                                                    <th class="text-left p-4 text-blue-200 font-medium">Child(ren)</th>
                                                    <th class="text-left p-4 text-blue-200 font-medium">Amount</th>
                                                    <th class="text-left p-4 text-blue-200 font-medium">Due Date</th>
                                                    <th class="text-left p-4 text-blue-200 font-medium">Status</th>
                                                    <th class="text-left p-4 text-blue-200 font-medium">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice-tbody">
                                                <!-- Invoice Row 1 -->
                                                <tr class="invoice-row border-b border-white border-opacity-10" data-status="overdue" data-family="johnson" data-month="2024-12">
                                                    <td class="p-4">
                                                        <div class="font-medium text-white">#INV-2024-001</div>
                                                        <div class="text-xs text-blue-200">Dec 2024</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex items-center gap-3">
                                                            <div class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center text-white font-bold">EJ</div>
                                                            <div>
                                                                <div class="font-medium text-white">Johnson Family</div>
                                                                <div class="text-xs text-blue-200">emma.johnson@email.com</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-white">Emma Johnson (3y)</td>
                                                    <td class="p-4">
                                                        <div class="font-bold text-white">€450.00</div>
                                                        <div class="text-xs text-blue-200">Monthly Care</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="text-white">Jan 15, 2025</div>
                                                        <div class="text-xs text-red-300">5 days overdue</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <span class="status-overdue px-3 py-1 rounded-full text-xs font-medium">Overdue</span>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex gap-2">
                                                            <button onclick="viewInvoice('INV-2024-001')" class="text-blue-400 hover:text-blue-300 p-1" title="View">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </button>
                                                            <button onclick="sendReminder('INV-2024-001')" class="text-yellow-400 hover:text-yellow-300 p-1" title="Send Reminder">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                                </svg>
                                                            </button>
                                                            <button onclick="markAsPaid('INV-2024-001')" class="text-green-400 hover:text-green-300 p-1" title="Mark as Paid">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Invoice Row 2 -->
                                                <tr class="invoice-row border-b border-white border-opacity-10" data-status="paid" data-family="smith" data-month="2025-01">
                                                    <td class="p-4">
                                                        <div class="font-medium text-white">#INV-2025-002</div>
                                                        <div class="text-xs text-blue-200">Jan 2025</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex items-center gap-3">
                                                            <div class="w-10 h-10 bg-green-400 rounded-full flex items-center justify-center text-white font-bold">LS</div>
                                                            <div>
                                                                <div class="font-medium text-white">Smith Family</div>
                                                                <div class="text-xs text-blue-200">liam.smith@email.com</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-white">Liam Smith (4y)</td>
                                                    <td class="p-4">
                                                        <div class="font-bold text-white">€520.00</div>
                                                        <div class="text-xs text-blue-200">Monthly Care + Extras</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="text-white">Feb 1, 2025</div>
                                                        <div class="text-xs text-green-300">Paid early</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <span class="status-paid px-3 py-1 rounded-full text-xs font-medium">Paid</span>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex gap-2">
                                                            <button onclick="viewInvoice('INV-2025-002')" class="text-blue-400 hover:text-blue-300 p-1" title="View">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </button>
                                                            <button onclick="downloadInvoice('INV-2025-002')" class="text-purple-400 hover:text-purple-300 p-1" title="Download">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Invoice Row 3 -->
                                                <tr class="invoice-row border-b border-white border-opacity-10" data-status="pending" data-family="brown" data-month="2025-01">
                                                    <td class="p-4">
                                                        <div class="font-medium text-white">#INV-2025-003</div>
                                                        <div class="text-xs text-blue-200">Jan 2025</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex items-center gap-3">
                                                            <div class="w-10 h-10 bg-purple-400 rounded-full flex items-center justify-center text-white font-bold">OB</div>
                                                            <div>
                                                                <div class="font-medium text-white">Brown Family</div>
                                                                <div class="text-xs text-blue-200">olivia.brown@email.com</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-white">Olivia Brown (2y)</td>
                                                    <td class="p-4">
                                                        <div class="font-bold text-white">€380.00</div>
                                                        <div class="text-xs text-blue-200">Part-time Care</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="text-white">Jan 30, 2025</div>
                                                        <div class="text-xs text-blue-300">10 days remaining</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <span class="status-pending px-3 py-1 rounded-full text-xs font-medium">Pending</span>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex gap-2">
                                                            <button onclick="viewInvoice('INV-2025-003')" class="text-blue-400 hover:text-blue-300 p-1" title="View">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </button>
                                                            <button onclick="sendInvoice('INV-2025-003')" class="text-blue-400 hover:text-blue-300 p-1" title="Send Invoice">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                                                </svg>
                                                            </button>
                                                            <button onclick="markAsPaid('INV-2025-003')" class="text-green-400 hover:text-green-300 p-1" title="Mark as Paid">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Invoice Row 4 -->
                                                <tr class="invoice-row border-b border-white border-opacity-10" data-status="paid" data-family="davis" data-month="2025-01">
                                                    <td class="p-4">
                                                        <div class="font-medium text-white">#INV-2025-004</div>
                                                        <div class="text-xs text-blue-200">Jan 2025</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex items-center gap-3">
                                                            <div class="w-10 h-10 bg-orange-400 rounded-full flex items-center justify-center text-white font-bold">MD</div>
                                                            <div>
                                                                <div class="font-medium text-white">Davis Family</div>
                                                                <div class="text-xs text-blue-200">michael.davis@email.com</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-white">Noah Davis (5y), Mia Davis (3y)</td>
                                                    <td class="p-4">
                                                        <div class="font-bold text-white">€840.00</div>
                                                        <div class="text-xs text-blue-200">2 Children - Full Care</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="text-white">Feb 1, 2025</div>
                                                        <div class="text-xs text-green-300">Paid on time</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <span class="status-paid px-3 py-1 rounded-full text-xs font-medium">Paid</span>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex gap-2">
                                                            <button onclick="viewInvoice('INV-2025-004')" class="text-blue-400 hover:text-blue-300 p-1" title="View">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </button>
                                                            <button onclick="downloadInvoice('INV-2025-004')" class="text-purple-400 hover:text-purple-300 p-1" title="Download">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Invoice Row 5 -->
                                                <tr class="invoice-row" data-status="overdue" data-family="wilson" data-month="2024-12">
                                                    <td class="p-4">
                                                        <div class="font-medium text-white">#INV-2024-005</div>
                                                        <div class="text-xs text-blue-200">Dec 2024</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex items-center gap-3">
                                                            <div class="w-10 h-10 bg-pink-400 rounded-full flex items-center justify-center text-white font-bold">SW</div>
                                                            <div>
                                                                <div class="font-medium text-white">Wilson Family</div>
                                                                <div class="text-xs text-blue-200">sarah.wilson@email.com</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-white">Ethan Wilson (4y)</td>
                                                    <td class="p-4">
                                                        <div class="font-bold text-white">€440.00</div>
                                                        <div class="text-xs text-blue-200">Monthly Care</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="text-white">Jan 10, 2025</div>
                                                        <div class="text-xs text-red-300">10 days overdue</div>
                                                    </td>
                                                    <td class="p-4">
                                                        <span class="status-overdue px-3 py-1 rounded-full text-xs font-medium">Overdue</span>
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="flex gap-2">
                                                            <button onclick="viewInvoice('INV-2024-005')" class="text-blue-400 hover:text-blue-300 p-1" title="View">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </button>
                                                            <button onclick="sendReminder('INV-2024-005')" class="text-yellow-400 hover:text-yellow-300 p-1" title="Send Reminder">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">