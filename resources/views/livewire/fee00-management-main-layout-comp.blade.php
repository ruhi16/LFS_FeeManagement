<div>
    <div class="min-w-full min-h-screen flex flex-col md:flex-row gap-2 p-2">
        <aside class="w-full md:w-1/4 lg:w-1/5 bg-gray-200 p-4">
            {{-- <div class="bg-white shadow rounded-lg p-6 mb-4">
                <h3 class="text-lg font-semibold mb-4">Super Admin Menu</h3>                    
            </div> --}}

            {{-- <div class="flex h-screen bg-gray-100"> --}}
                <!-- Sidebar -->
                <div class=" bg-blue-800 text-white shadow-lg">
                    <!-- School Logo/Name -->
                    <div class="p-4 border-b border-blue-700">
                        <h1 class="text-xl font-bold">ABC Public School</h1>
                        <p class="text-sm text-blue-200">Admin Dashboard</p>
                    </div>
                    
                    <!-- Main Menu -->
                    <nav class="p-4">
                        <div class="mb-6">
                            <h3 class="text-xs uppercase font-semibold text-blue-400 mb-3 tracking-wider">Main Menu</h3>
                            <ul class="space-y-2">
                                <li>
                                    <button  
                                        class="w-full flex items-center p-2 rounded hover:bg-blue-700 bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12z" />
                                        </svg>
                                        Dashboard
                                    </button>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                        Students
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                                        </svg>
                                        Teachers
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd" />
                                        </svg>
                                        Classes
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Academics Menu -->
                        <div class="mb-6">
                            <h3 class="text-xs uppercase font-semibold text-blue-400 mb-3 tracking-wider">Academics</h3>
                            <ul class="space-y-2">
                                <li>
                                    <div x-data="{ open: false }">
                                        <button @click="open = !open" class="flex items-center justify-between w-full p-2 rounded hover:bg-blue-700">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                                </svg>
                                                <span>Subjects</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{ 'rotate-90': open }" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Subject List</a>
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Assign Teachers</a>
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Timetable</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div x-data="{ open: false }">
                                        <button @click="open = !open" class="flex items-center justify-between w-full p-2 rounded hover:bg-blue-700">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Examinations</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{ 'rotate-90': open }" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Exam Schedule</a>
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Grades</a>
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Results</a>
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Marksheets</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        Attendance
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Finance Menu -->
                        <div class="mb-6">
                            <h3 class="text-xs uppercase font-semibold text-blue-400 mb-3 tracking-wider">Finance</h3>
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        Fee Collection
                                    </a>
                                </li>
                                <li>
                                    <div x-data="{ open: true }">
                                        <button @click="open = !open" class="flex items-center justify-between w-full p-2 rounded hover:bg-blue-700">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Fee Management</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{ 'rotate-90': open }" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Fee Structure</a>
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Fee Categories</a>
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Fee Discounts</a>
                                            <a href="#" class="block py-1 px-2 text-sm rounded hover:bg-blue-700">Payment Records</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        Expenses
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                        Salary Payments
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Reports Menu -->
                        <div>
                            <h3 class="text-xs uppercase font-semibold text-blue-400 mb-3 tracking-wider">Reports</h3>
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                                        </svg>
                                        Financial Reports
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                        Student Reports
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Exam Reports
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            
                <!-- Main Content -->
                
            {{-- </div> --}}
            
            <!-- Include Alpine.js for dropdown functionality -->
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
            
            <!-- Keep the existing style and script sections from previous receipt -->
            <style>
                @media print {
                    body * {
                        visibility: hidden;
                    }
                    #receipt-container, #receipt-container * {
                        visibility: visible;
                    }
                    #receipt-container {
                        position: absolute;
                        left: 0;
                        top: 0;
                        width: 100%;
                        box-shadow: none;
                    }
                    .no-print {
                        display: none !important;
                    }
                }
            </style>
            
            <script>
                // [Keep all the existing JavaScript functions from previous receipt]
            </script>

        </aside>
        
        <main class="flex-1 p-4 bg-yellow-100">
            <div class="bg-white shadow rounded-lg p-6 mb-2">
                <h3 class="text-xl font-bold mb-2">Welcome to the Super Admin Dashboard</h3>
                <p class="text-gray-600">Here you can manage all aspects of the application.</p>
            </div>
            {{-- @livewire('fee06-catelog-comp') --}}
            {{-- @livewire('fee08-structure-detail-comp') --}}
            @livewire('fee10-collection-detail-comp')
        </main>

    </div>
</div>
