<div>
  <div>

    <div id="alert-container" style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
      @if (session()->has('success'))
          <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
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



  
    <div class="bg-white shadow rounded-lg p-6">
      <h3 class="text-lg font-semibold mb-1"><span class="text-blue-600 font-bold">Catelog</span> Activities</h3>
      <p class="text-gray-600 mb-2">Here are some recent activities:</ <div class="overflow-x-auto">
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
          @foreach($feeCatalogs as $feeCatelog)
          <tr class="hover:bg-gray-50">
            <td class="p-1 border border-gray-300">{{ $loop->iteration }} - {{$feeCatelog->id }}</td>
            <td class="p-1 border border-gray-300">{{ $feeCatelog->myclass->name }}</td>
            <td class="p-1 border border-gray-300">{{ $feeCatelog->feeCategory->name }}</td>
            <td class="p-1 border border-gray-300">{{ $feeCatelog->feeParticular->name }}</td>
            <td class="p-1 border border-gray-300">₹ {{ $feeCatelog->amount }}</td>
            <td class="p-1 border border-gray-300">{{ $feeCatelog->fee_collection_type }}</td>
            <td class="p-1 border border-gray-300">Pending</td>
            <td class="p-1 border border-gray-300 space-x-4">
              <button wire:click="openModal({{ $feeCatelog->id }})" class="text-blue-500 hover:underline">Edit</button>
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



  <div>
    <!-- Modal Trigger Button (can be placed wherever you need it) -->
    {{-- <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
      Add New Fee Catalog {{ $showModal ? 'Close' : 'x' }}
    </button> --}}

    <!-- Modal Backdrop -->
    @if($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <!-- Modal Container -->
      <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
        <!-- Modal Header -->
        <div class="border-b px-6 py-4 flex justify-between items-center">
          <h3 class="text-lg font-semibold text-gray-800">
            <span class="text-blue-600 font-bold">Create</span> Fee Catalog
          </h3>
          <button wire:click="$toggle('showModal')" class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
          <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
              <!-- Class Selection -->
              <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Class</label>
                <select wire:model="myclass_id"
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  <option value="">Select Class</option>
                  @foreach($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                  @endforeach
                </select>
                @error('myclass_id') 
                  <span class="text-red-500 text-xs">{{ $message }}</span> 
                @enderror
              </div>

              <!-- Fee Category -->
              <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Fee Category</label>
                <select wire:model="fee_category_id"
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  <option value="">Select Fee Category</option>
                  @foreach($feeCategories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('fee_category_id')
                  <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
              </div>
              
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
              <!-- Fee Particular -->
              <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Fee Particular</label>
                <select wire:model="fee_particular_id"
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  <option value="">Select Fee Particular</option>
                  @foreach($feeParticulars as $particular)
                  <option value="{{ $particular->id }}">{{ $particular->name }}</option>
                  @endforeach
                </select>
                @error('fee_particular_id') 
                  <span class="text-red-500 text-xs">{{ $message }}</span> 
                @enderror
              </div>

              <!-- Amount -->
              <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Amount (₹)</label>
                <input type="number" wire:model="amount"
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Enter amount">
                @error('amount') 
                  <span class="text-red-500 text-xs">{{ $message }}</span> 
                @enderror
              </div>
            </div>

            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-medium mb-1">Collection Type</label>
              <select wire:model="fee_collection_type"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select Collection Type</option>
                <option value="One-Time">One-Time</option>
                <option value="Monthly">Monthly</option>
                <option value="Quarterly">Quarterly</option>
                <option value="Yearly">Yearly</option>
              </select>
              @error('fee_collection_type') 
                <span class="text-red-500 text-xs">{{ $message }}</span> 
              @enderror
            </div>


          </form>
        </div>

        <!-- Modal Footer -->
        <div class="border-t px-6 py-4 flex justify-end space-x-3">
          <button wire:click="$toggle('showModal')"
            class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-50 transition">
            Cancel
          </button>
          <button wire:click="save" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Save
          </button>
        </div>
      </div>
    </div>
    @endif  {{-- End of Modal Window --}}


  </div>




</div>