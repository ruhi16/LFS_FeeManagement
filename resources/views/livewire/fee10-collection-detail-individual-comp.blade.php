<div>
    <div id="alert-container" style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
        @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <span class="font-medium">Info alert!</span> {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alert-container').innerHTML = '';
            }, 5000);
        </script>
        @endif
        @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alert-container').innerHTML = '';
            }, 5000);
        </script>
        @endif
    </div>



    {{-- <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Fee Collection Details</h2>
        <button wire:click="exportToExcel" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Export to Excel
        </button>
    </div>

    <h2 class="text-lg font-semibold">
        Name: {{ $studentcr->studentdb->name ?? 'N/A' }}</br>
        Class: {{ $studentcr->myclass->name ?? 'N/A' }}</br>
        Section: {{ $studentcr->section->name ?? 'N/A' }}</br>
        Roll No: {{ $studentcr->roll_no ?? 'N/A' }}</br>

        Mandate Date: {{ $mandateDate->start_date ?? 'N/A' }}</br>
        Fee Structure: {{ $feeStructure->name ?? 'N/A' }}</br>
        

        <span class="text-sm text-gray-500">({{ $feeStructure->name ?? 'N/A' }})</span>

    </h2> --}}
    

    {{--  --}}
    <div class="bg-white shadow rounded-lg p-6 max-w-6xl mx-auto" id="receipt-container">
        <!-- School Header -->
        <div class="text-center mb-6 border-b pb-4">
            <h1 class="text-2xl font-bold text-blue-800">ABC Public School</h1>
            <p class="text-gray-600">123 Education Street, Knowledge City</p>
            <p class="text-gray-600">Phone: (123) 456-7890 | Email: info@abcschool.edu</p>
            <h2 class="text-xl font-semibold mt-2 text-blue-700">FEE PAYMENT RECEIPT</h2>
        </div>
    
        <!-- Receipt Meta Info -->
        <div class="flex justify-between mb-6">
            <div>
                <p><span class="font-semibold">Receipt No:</span> RCPT-2023-0567</p>
                <p><span class="font-semibold">Date:</span> 15-Jul-2023</p>
            </div>
            <div class="text-right">
                <p><span class="font-semibold">Academic Year:</span> 2023-2024</p>
                <p><span class="font-semibold">Payment Mode:</span> Cash/Online</p>
            </div>
        </div>
    
        <!-- Student Information -->
        <div class="mb-6 border-b pb-4">
            <h3 class="text-lg font-semibold mb-2 text-blue-600">Student Details</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p><span class="font-semibold">Student ID:</span> STU-2023-1245</p>
                    <p><span class="font-semibold">Name:</span> Rohan Sharma</p>
                    <p><span class="font-semibold">Father's Name:</span> Amit Sharma</p>
                </div>
                <div>
                    <p><span class="font-semibold">Class-Section-Roll:</span> 10-A-24</p>
                    <p><span class="font-semibold">Mobile:</span> 9876543210</p>
                </div>
            </div>
        </div>
    
        <!-- Fee Details Table -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2 text-blue-600">Fee Payment Details</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-2 border border-gray-300 font-medium">Description</th>
                            <th class="p-2 border border-gray-300 font-medium">Amount (₹)</th>
                            <th class="p-2 border border-gray-300 font-medium">Due Date</th>
                            <th class="p-2 border border-gray-300 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 border border-gray-300">Tuition Fee (Jul 2023)</td>
                            <td class="p-2 border border-gray-300 text-right">2,500.00</td>
                            <td class="p-2 border border-gray-300">05-Jul-2023</td>
                            <td class="p-2 border border-gray-300 text-green-600">Paid</td>
                        </tr>
                        <tr>
                            <td class="p-2 border border-gray-300">Transport Fee</td>
                            <td class="p-2 border border-gray-300 text-right">800.00</td>
                            <td class="p-2 border border-gray-300">05-Jul-2023</td>
                            <td class="p-2 border border-gray-300 text-green-600">Paid</td>
                        </tr>
                        <tr>
                            <td class="p-2 border border-gray-300">Library Fee</td>
                            <td class="p-2 border border-gray-300 text-right">200.00</td>
                            <td class="p-2 border border-gray-300">05-Jul-2023</td>
                            <td class="p-2 border border-gray-300 text-green-600">Paid</td>
                        </tr>
                        <tr class="bg-gray-50 font-semibold">
                            <td class="p-2 border border-gray-300">Total Amount</td>
                            <td class="p-2 border border-gray-300 text-right">3,500.00</td>
                            <td class="p-2 border border-gray-300" colspan="2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
        <!-- Payment Summary -->
        <div class="flex justify-end mb-6">
            <div class="w-64 border-t-2 border-b-2 border-blue-200 py-2">
                <div class="flex justify-between">
                    <span class="font-semibold">Total Paid:</span>
                    <span>₹3,500.00</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Payment Date:</span>
                    <span>14-Jul-2023</span>
                </div>
            </div>
        </div>
    
        <!-- Authorization -->
        <div class="flex justify-between items-center pt-4 border-t">
            <div class="text-sm text-gray-500">
                <p>Computer generated receipt - No signature required</p>
                <p>Thank you for your payment</p>
            </div>
            <div class="text-right">
                <p class="font-semibold">For ABC Public School</p>
                <div class="mt-8">Authorized Signatory</div>
            </div>
        </div>
    
        <!-- CAPTCHA and Print Section -->
        <div class="mt-8 p-4 bg-gray-50 rounded-lg">
            <div class="mb-4">
                <div class="flex items-center gap-2 mb-2">
                    <div class="px-3 py-1 bg-gray-200 text-lg font-mono rounded" id="captcha-text">{{ $storedCaptcha }}</div>
                    <button 
                        wire:click="generateCaptcha"
                        {{-- onclick="generateCaptcha()"  --}}
                        class="text-blue-600 hover:text-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <input wire:model="inputCaptcha" type="text" id="captcha-input" class="w-full px-3 py-2 border rounded" placeholder="Enter the CAPTCHA code above"
                    {{ $isVerifiedCaptcha ? 'disabled' : '' }}>
                <p id="captcha-error" class="text-red-500 text-sm mt-1 hidden">CAPTCHA verification failed. Please try again.</p>
            </div>
            <button             
                wire:click="verifyAndPrint"                
                {{-- onclick="verifyAndPrint()"  --}}                
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                </svg>
                Verify & Print Receipt {{ $isVerifiedCaptcha ? 'Verified' : '' }}
            </button>
        </div>
        <!-- End of CAPTCHA and Print Section -->

    </div>
 
    <script>
        Livewire.on('printReceipt', () => {
            // Hide the CAPTCHA section before printing
            const captchaSection = document.querySelector('.bg-gray-50');
            captchaSection.classList.add('no-print');
            
            window.print();
            
            // Show it again after printing (if user cancels)
            setTimeout(() => {
                captchaSection.classList.remove('no-print');
            }, 500);
        });
    </script>

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
        // Generate initial CAPTCHA
        // generateCaptcha();
        
        // function generateCaptcha() {
        //     console.log("Generating CAPTCHA...");
        //     const chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        //     let captcha = "";
        //     for (let i = 0; i < 5; i++) {
        //         captcha += chars[Math.floor(Math.random() * chars.length)];
        //     }
        //     document.getElementById('captcha-text').textContent = captcha;
        //     document.getElementById('captcha-input').value = "";
        //     document.getElementById('captcha-error').classList.add('hidden');
        // }
        
        // function verifyAndPrint() {
        //     const userInput = document.getElementById('captcha-input').value;
        //     const captchaText = document.getElementById('captcha-text').textContent;
        //     const errorElement = document.getElementById('captcha-error');
            
        //     if (userInput.toUpperCase() === captchaText) {
        //         errorElement.classList.add('hidden');
        //         printReceipt();
        //     } else {
        //         errorElement.classList.remove('hidden');
        //         generateCaptcha();
        //     }
        // }
        
        // function printReceipt() {
        //     // Hide the CAPTCHA section before printing
        //     const captchaSection = document.querySelector('.bg-gray-50');
        //     captchaSection.classList.add('no-print');
            
        //     window.print();
            
        //     // Show it again after printing (if user cancels)
        //     setTimeout(() => {
        //         captchaSection.classList.remove('no-print');
        //     }, 500);
        // }
    </script>
    {{--  --}}




</div>
