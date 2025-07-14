<div>
  {{-- Care about people's approval and you will be their prisoner. --}}
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
    <h3 class="text-lg font-semibold mb-1"><span class="text-blue-600 font-bold">Fee Stricture</span> Activities</h3>
    <p class="text-gray-600 mb-2">Here are some recent activities:</ <div class="overflow-x-auto">
    <table class="min-w-full text-xs border-collapse">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="p-1 border border-gray-300 font-medium">SL-ID</th>
          <th class="p-1 border border-gray-300 font-medium">Class</th>
          <th class="p-1 border border-gray-300 font-medium">Fee Details</th>
          <th class="p-1 border border-gray-300 font-medium">Action</th>
          <!-- Add more columns as needed -->
        </tr>
      </thead>
      <tbody>
        @foreach($myclasses as $myclass)
        <tr class="border-b border-gray-200">
          <td class="p-1 border border-gray-300">{{ $loop->iteration }}-{{ $myclass->id }}</td>
          <td class="p-1 border border-gray-300">{{ $myclass->name }}</td>

          <td class="border   border-gray-300 p-2">
            @foreach($myclass->feeStructures as $feeStructure)


            <table class="min-w-full text-xs border-collapse">
              <thead>
                <tr class="bg-gray-100 text-left">
                  <th class="p-1 border border-gray-300 font-medium">SL</th>
                  <th class="p-1 border border-gray-300 font-medium">Category</th>
                  <th class="p-1 border border-gray-300 font-medium">Particular</th>
                  <th class="p-1 border border-gray-300 font-medium">Amount</th>
                  <th class="p-1 border border-gray-300 font-medium">Status</th>
                  <th class="p-1 border border-gray-300 font-medium">Action</th>
                  <th class="p-1 border border-gray-300 font-medium">Schedule</th>
                  <th class="p-1 border border-gray-300 font-medium">Schedule Dates</th>

                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-gray-200">
                  <td class="p-1 border border-gray-300"></td>
                  <td class="p-1 border border-gray-300 font-bold" colspan="2">Total Monthly Fees</td>
                  <td class="p-1 border border-gray-300 font-bold text-right">{{
                    $feeStructure->structureDetails->sum('amount') }}</td>
                  <td class="p-1 border border-gray-30"></td>
                  <td class="p-1 border border-gray-30">
                    <button wire:click="openFeeStructureDetailModal({{ $myclass->id }}, {{ $feeStructure->id }})"
                      class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition">
                      Add Detail
                    </button>
                  </td>
                  <td class="p-1 border border-gray-300" rowspan="{{ $feeStructure->structureDetails->count()+1 }}">
                    {{ $feeStructure->feeMandate ? $feeStructure->feeMandate->name : 'No Mandate' }}
                    {{-- <button wire:click="addSchedule({{ $feeStructure->id }})"
                      class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition">Add
                      Schedule</button> --}}
                  </td>
                  <td class="p-1 border border-gray-300" rowspan="{{ $feeStructure->structureDetails->count()+1 }}">

                    Dates:
                    {{-- {{ $feeStructure->feeMandate ? $feeStructure->feeMandate->mandateDates : 'No Mandate Dates' }}
                    --}}
                    @if($feeStructure->feeMandate)
                    {{-- @foreach($feeStructure->feeMandate->mandateDates as $date)
                    <div class="text-xs text-gray-600">
                      {{ $date->start_date }}
                    </div>
                    @endforeach --}}
                    @else
                    <div class="text-xs text-gray-600">No Mandate Dates</div>
                    @endif

                    {{-- <button wire:click="addSchedule({{ $feeStructure->id }})"
                      class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition">Add
                      Schedule</button> --}}
                  </td>
                </tr>
                @foreach($feeStructure->structureDetails as $detail)
                <tr class="border-b border-gray-200">
                  <td class="p-1 border border-gray-300 text-right">{{ $loop->iteration }}</td>
                  <td class="p-1 border border-gray-300 text-right">{{ $detail->feeCategory->name }}</td>
                  <td class="p-1 border border-gray-300 text-right">{{ $detail->feeParticular->name }}</td>
                  <td class="p-1 border border-gray-300 text-right">{{ $detail->amount }}</td>
                  <td class="p-1 border border-gray-300">
                    @if($detail->status)
                    <span
                      class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">Active</span>
                    @else
                    <span
                      class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-red-400 border border-red-400">Inactive</span>

                    @endif
                  </td>
                  <td class="p-1 border border-gray-300">
                    <button
                      wire:click="openFeeStructureDetailModal({{ $myclass->id }}, {{ $feeStructure->id }}, {{ $detail->id }})"
                      class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">Edit</button>
                    <button
                      wire:click="openDeleteConfirmationModal({{ $detail->id }})"
                      class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">Delete</button>
                  </td>


                </tr>
                @endforeach



                @if($feeStructure->structureDetails->isEmpty())
                <tr class="border-b border-gray-200">
                  <td class="p-1 border border-gray-300" colspan="6">
                    <span class="text-red-600">No Fee Details</span>
                  </td>
                </tr>
                @endif

              </tbody>
            </table>

          <td class="mb-1 p-1 border border-gray-300"></td>
          {{-- <div class="mb-1">
            <span class="font-semibold">{{ $feeStructure->id }}</span> -
            <span class="text-gray-600">{{ $feeStructure->fee_mandate_id }} {{ $feeStructure->id }}</span>
          </div> --}}
          @endforeach
          @if($myclass->feeStructures->isEmpty())
            <span class="text-red-600">No Fee Structures</span>
          @endif
          </td>
          {{-- <td class="p-1 border border-gray-300">
            <button wire:click="edit({{ $myclass->id }})"
              class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">View</button>
            <button wire:click="edit({{ $myclass->id }})"
              class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition">Edit</button>
            <button wire:click="delete({{ $myclass->id }})"
              class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">Delete</button>
          </td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>









  <div>
    <!-- Modal Trigger Button (can be placed wherever you need it) -->
    {{-- <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
      Add New Fee Catalog {{ $showAddDetailModal ? 'Close' : 'x' }}
    </button> --}}

    <!-- Modal Backdrop -->
    @if($showAddDetailModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <!-- Modal Container -->
      <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
        <!-- Modal Header -->
        <div class="border-b px-6 py-4 flex justify-between items-center">
          <h3 class="text-lg font-semibold text-gray-800">
            <span class="text-blue-600 font-bold">Create</span> Fee Structure Detail
          </h3>
          <button wire:click="$toggle('showAddDetailModal')" class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
          <form wire:submit.prevent="saveAddFeeStructureDetail">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
              <div>
                <label for="myclass_id" class="block text-sm font-medium text-gray-700 mb-1">Class</label>
                <select wire:model="myclass_id" id="myclass_id"
                  class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                  disabled>
                  <option value="">Select Class</option>
                  @foreach($myclasses as $myclass)
                  <option value="{{ $myclass->id }}">{{ $myclass->name }}</option>
                  @endforeach
                </select>
                @error('myclass_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>
              <div>
                <label for="fee_mandate_id" class="block text-sm font-medium text-gray-700 mb-1">Fee Mandate</label>
                <select wire:model="fee_mandate_id" id="fee_mandate_id"
                  class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                  disabled>
                  <option value="">Select Mandate</option>
                  @foreach($feeMandates as $feeMandate)
                  <option value="{{ $feeMandate->id }}">{{ $feeMandate->name }}</option>
                  @endforeach
                </select>
                @error('fee_mandate_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
              <div>
                <label for="fee_category_id" class="block text-sm font-medium text-gray-700 mb-1">Fee Category</label>
                <select wire:model="fee_category_id" id="fee_category_id"
                  class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  <option value="">Select Category</option>
                  @foreach($feeCategories as $feeCategory)
                  <option value="{{ $feeCategory->id }}">{{ $feeCategory->name }}</option>
                  @endforeach
                </select>
                @error('fee_category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>
              <div>
                <label for="fee_particular_id" class="block text-sm font-medium text-gray-700 mb-1">Fee
                  Particular</label>
                <select wire:model="fee_particular_id" id="fee_particular_id"
                  class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  <option value="">Select Particular</option>
                  @foreach($feeParticulars as $feeParticular)
                  <option value="{{ $feeParticular->id }}">{{ $feeParticular->name }}</option>
                  @endforeach
                </select>
                @error('fee_particular_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
              <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                <input type="number" wire:model="amount" id="amount"
                  class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                  placeholder="Enter Amount">
                @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>
              <div>
                <label for="fee_collection_type" class="block text-sm font-medium text-gray-700 mb-1">Fee Collection
                  Type</label>
                <select wire:model="fee_collection_type" id="fee_collection_type"
                  class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                  <option value="">Select Collection Type</option>
                  <option value="0">Regular</option>
                  <option value="1">Special</option>

                </select>
                @error('fee_collection_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>
            </div>

          </form>
        </div>

        <!-- Modal Footer -->
        <div class="border-t px-6 py-4 flex justify-end space-x-3">
          <button wire:click="closeModal" {{--"$toggle('showAddDetailModal')"--}}
            class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-50 transition">
            Cancel
          </button>
          <button wire:click="saveAddFeeStructureDetail({{ $feeStructureDetailId }})"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Save
          </button>
        </div>


      </div>
    </div>
    @endif

    {{-- End Modal --}}
  </div>


  <div>
  <!-- Delete Confirmation Modal -->
  @if($showDeleteConfirmationModal)
  <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <!-- Modal Container -->
      <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
        <!-- Modal Header -->
        <div class="border-b px-6 py-4">
          <h3 class="text-lg font-semibold text-gray-800">
            <span class="text-red-600 font-bold">Confirm</span> Deletion
          </h3>
        </div>
        <!-- Modal Content with Details -->
        <div class="p-6 space-y-4">
            {{-- <p class="text-gray-700 font-medium">Are you sure you want to delete this fee structure detail?</p> --}}
            
            <div class="bg-gray-50 p-4 rounded-md">
                <h4 class="font-medium text-gray-800 mb-2">Fee Structure Details:</h4>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div class="text-gray-600">Fee Category:</div>
                    <div class="font-medium">{{ $feeStructureDetailToDelete->feeCategory->name ?? 'N/A' }}</div>

                    <div class="text-gray-600">Fee Particular:</div>
                    <div class="font-medium">{{ $feeStructureDetailToDelete->feeParticular->name ?? 'N/A' }}</div>

                    <div class="text-gray-600">Amount:</div>
                    <div class="font-medium">{{ number_format($feeStructureDetailToDelete->amount, 2) }}</div>
                    
                    <div class="text-gray-600">Frequency:</div>
                    <div class="font-medium">{{ $feeStructureDetailToDelete->is_special ? 'Special' : 'Regular' }}</div>

                    <div class="text-gray-600">Due Date:</div>
                    <div class="font-medium">{{ $feeStructureDetailToDelete->due_date ? \Carbon\Carbon::parse($feeStructureDetailToDelete->due_date)->format('M d, Y') : 'N/A' }}</div>
                </div>
            </div>
            
            <p class="text-red-600 text-sm">This action cannot be undone.</p>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
          <p class="text-gray-700">Are you sure you want to delete this record? This action cannot be undone.</p>
        </div>

        <!-- Modal Footer -->
        <div class="border-t px-6 py-4 flex justify-end space-x-3">
          <button wire:click="closeModal" {{--"$toggle('showDeleteConfirmationModal')"--}}
            class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-50 transition">
            Cancel
          </button>
          <button wire:click="deleteFeeStructureDetail({{ $feeStructureDetailId ?? 0 }})"
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
            Delete
          </button>
        </div>
      </div>
    </div>
    @endif
  </div>



  {{-- End of Main Div --}}
</div>