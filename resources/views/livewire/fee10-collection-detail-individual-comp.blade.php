<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fee Payment Receipt</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
 
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
      
      /* Add these new rules to remove headers/footers */
      @page {
        size: auto;  /* auto is the initial value */
        margin: 0mm; /* removes header/footer space */
      }
      
      body {
        margin: 0;
        padding: 0;
      }
    }
  </style>
</head>
<body class="bg-gray-100 p-6">

  <!-- Alert Container -->
  <div id="alert-container" style="position: fixed; top: 10px; right: 10px; z-index: 1000;"></div>

  <!-- Receipt Container -->
  <div class="bg-white shadow rounded-lg p-6 max-w-6xl mx-auto" id="receipt-container">

    <!-- Header -->
    <div class="text-center mb-6 border-b pb-4">
      <h1 class="text-2xl font-bold text-blue-800">ABC Public School</h1>
      <p class="text-gray-600">123 Education Street, Knowledge City</p>
      <p class="text-gray-600">Phone: (123) 456-7890 | Email: info@abcschool.edu</p>
      <h2 class="text-xl font-semibold mt-2 text-blue-700">FEE PAYMENT RECEIPT</h2>
    </div>

    <!-- Meta Info -->
    <div class="flex justify-between mb-6">
      <div>
        <p><strong>Receipt No:</strong> RCPT-2023-0567</p>
        <p><strong>Date:</strong> 15-Jul-2023</p>
      </div>
      <div class="text-right">
        <p><strong>Academic Year:</strong> 2023-2024</p>
        <p><strong>Payment Mode:</strong> Cash/Online</p>
      </div>
    </div>

    <!-- Student Details -->
    <div class="mb-6 border-b pb-4">
      <h3 class="text-lg font-semibold mb-2 text-blue-600">Student Details</h3>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <p><strong>Student ID:</strong> STU-2023-1245</p>
          <p><strong>Name:</strong> Rohan Sharma</p>
          <p><strong>Father's Name:</strong> Amit Sharma</p>
        </div>
        <div>
          <p><strong>Class-Section-Roll:</strong> 10-A-24</p>
          <p><strong>Mobile:</strong> 9876543210</p>
        </div>
      </div>
    </div>

    <!-- Fee Table -->
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
              <td colspan="2" class="p-2 border border-gray-300"></td>
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

    <!-- Footer -->
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

    <!-- CAPTCHA and Print -->
    <div class="mt-8 p-4 bg-gray-50 rounded-lg" id="captcha-section">
      <div class="mb-4">
        <div class="flex items-center gap-2 mb-2">
          <div class="px-3 py-1 bg-gray-200 text-lg font-mono rounded" id="captcha-text"></div>
          <button onclick="generateCaptcha()" class="text-blue-600 hover:text-blue-800" title="Refresh CAPTCHA">
            🔄
          </button>
        </div>
        <input type="text" id="captcha-input" class="w-full px-3 py-2 border rounded" placeholder="Enter the CAPTCHA code above" />
        <p id="captcha-error" class="text-red-500 text-sm mt-1 hidden">CAPTCHA verification failed. Please try again.</p>
      </div>
      <button onclick="verifyAndPrint()" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded flex items-center justify-center gap-2">
        🖨️ Verify & Print Receipt
      </button>
    </div>

    <div class="no-print text-center mt-6">
      <button onclick="closeWindow()" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
        Close Window
      </button>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    function showAlert(type, message) {
      const container = document.getElementById('alert-container');
      const bg = type === 'success' ? 'bg-blue-50 text-blue-800' : 'bg-red-50 text-red-800';
      const icon = type === 'success' ? 'Info alert!' : 'Danger alert!';
      container.innerHTML = `
        <div class="p-4 mb-4 text-sm rounded-lg ${bg}" role="alert">
          <span class="font-medium">${icon}</span> ${message}
        </div>`;
      setTimeout(() => container.innerHTML = '', 5000);
    }

    function generateCaptcha() {
      const chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      let captcha = "";
      for (let i = 0; i < 5; i++) {
        captcha += chars[Math.floor(Math.random() * chars.length)];
      }
      document.getElementById('captcha-text').textContent = captcha;
      document.getElementById('captcha-input').
<!-- Continuation from previous... -->
      document.getElementById('captcha-input').value = "";
      document.getElementById('captcha-error').classList.add('hidden');
    }

    

    function verifyAndPrint() {
      const userInput = document.getElementById('captcha-input').value.trim().toUpperCase();
      const captchaText = document.getElementById('captcha-text').textContent.trim().toUpperCase();
      const errorElement = document.getElementById('captcha-error');

      if (userInput === captchaText && captchaText !== "") {
        errorElement.classList.add('hidden');
        printReceipt();
      } else {
        errorElement.classList.remove('hidden');
        generateCaptcha();
      }
    }

    function openReceiptWindow() {
        const receiptWindow = window.open(
            'receipt.html',
            'ReceiptWindow',
            'width=800,height=900,top=100,left=300,resizable=no,scrollbars=yes'
        );

        if (!receiptWindow) {
            alert('Popup blocked! Please allow popups for this site.');
        }
      }

      function closeWindow() {
        // Check if this is a popup window
        if (window.opener) {
          window.close(); // Close the popup
        } else {
          // For regular tabs, we can't programmatically close them
          // So we'll just navigate back or to another page
          window.location.href = 'about:blank'; // Or your preferred URL
        }
      }

    function printReceipt() {
      const captchaSection = document.getElementById('captcha-section');
      captchaSection.classList.add('no-print');

      window.print();

      setTimeout(() => {
        captchaSection.classList.remove('no-print');
      }, 500);
    }

    // Initialize CAPTCHA on page load
    window.onload = generateCaptcha;
  </script>
</body>
</html>
