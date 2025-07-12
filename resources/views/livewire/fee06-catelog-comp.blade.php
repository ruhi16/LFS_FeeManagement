<div>
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-1"><span class="text-blue-600 font-bold">Catelog</span> Activities</h3>
        <p class="text-gray-600 mb-2">Here are some recent activities:</
        
        <div class="overflow-x-auto">
            <table class="min-w-full text-xs border-collapse">
              <thead>
                <tr class="bg-gray-100 text-left">
                  <th class="p-1 border border-gray-300 font-medium">SL-ID</th>
                  <th class="p-1 border border-gray-300 font-medium">Class</th>
                  <th class="p-1 border border-gray-300 font-medium">Fee Category</th>
                  <th class="p-1 border border-gray-300 font-medium">Fee Particular</th>
                  <th class="p-1 border border-gray-300 font-medium">Fee Amount</th>
                  <th class="p-1 border border-gray-300 font-medium">Collection Type</th>
                  <th class="p-1 border border-gray-300 font-medium">Status</th>
                  <th class="p-1 border border-gray-300 font-medium">Action</th>
                  <!-- Add more columns as needed -->
                </tr>
              </thead>
              <tbody>
                <!-- Sample row - repeat for each data row -->
                @foreach($feeCatelogs as $feeCatelog)
                <tr class="hover:bg-gray-50">
                  <td class="p-1 border border-gray-300">{{ $loop->iteration }} - {{$feeCatelog->id }}</td>
                  
                  {{-- <td class="p-1 border border-gray-300">John Doe</td>
                  <td class="p-1 border border-gray-300">john@example.com</td>
                  <td class="p-1 border border-gray-300">Active</td>
                  <td class="p-1 border border-gray-300">2023-05-15</td>
                  <td class="p-1 border border-gray-300">$125.00</td> --}}
                  <td class="p-1 border border-gray-300 space-x-4">
                    <button class="text-blue-500 hover:underline">Edit</button>
                    <button class="text-red-500 hover:underline">Delete</button>
                  </td>
                  <!-- Add more cells as needed -->
                </tr>
                @endforeach
                <!-- Additional rows... -->
              </tbody>
            </table>
          </div>

          

          

    </div>
</div>
