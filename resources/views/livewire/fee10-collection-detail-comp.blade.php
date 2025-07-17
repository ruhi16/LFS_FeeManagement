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



    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-4">
            Class Wise <span class="text-blue-600 font-bold">Fee Collection</span> Activities
        </h3>
        <p class="text-gray-600 mb-4">Here are some recent activities:{{ $selectedMyclassId ?? 'NA'}}</p>
        
        
        <!-- Tabs -->
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px" id="myTab" role="tablist">

                @foreach($myclasses as $myclass)
                <li class="mr-2" role="presentation">
                    <button
                        {{-- wire:model="myclassId"  --}}
                        wire:click="selectMyclass({{ $myclass->id }})" 
                        class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 font-medium {{ $selectedMyclassId == $myclass->id ? 'border-b-8 border-blue-600 text-blue-600 active ' : '' }}"
                            id="all-tab" data-tabs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $myclass->name }} {{ $selectedMyclassId == $myclass->id ? '(Selected)' : '' }}
                    </button>
                </li>
                @endforeach
                
            </ul>
        </div>

        <!-- Intermediate Fee Structure Selection Section -->
        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
            {{-- <h4 class="text-md font-medium mb-3 text-gray-700">Select Fee Structure</h4> --}}
            <div class="flex flex-wrap gap-3">
                <!-- Fee Structure Options -->
                {{-- {{ $feeStructures ?? 'NA' }} --}}
                @foreach($feeStructures as $feeStructure)
                    <button 
                        wire:click="selectFeeStructure({{ $feeStructure->id }})"
                        class="fee-structure-option px-4 py-2 border rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:border-blue-200
                            {{ $selectedFeeStructureId == $feeStructure->id ? 'bg-blue-100 border-blue-300 text-blue-700' : 'text-gray-700' }}"
                            data-fee-structure="annual">
                        {{ $feeStructure->name ?? 'NA' }}
                    </button>
                @endforeach
                
            </div>
        </div>

        @if($showFeeCollectionIndividual)
        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
            <h4 class="text-md font-medium mb-3 text-gray-700">Select Mandate Date</h4>
            <div class="flex flex-wrap gap-3"></div>
                <!-- Mandate Date Options -->
                @livewire('fee10-collection-detail-individual-comp',[
                    'studentcrId' => $studentcr->id,                    
                    'feeStructureId' => $feeStructure->id,
                    'mandateDateId' => $mandateDate->id,
                ])
        </div>
        @endif
        
        <!-- Tab content -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-xs border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-2 border border-gray-300 font-medium">SL-ID</th>
                        <th class="p-2 border border-gray-300 font-medium">Name</th>
                        <th class="p-2 border border-gray-300 font-medium">Class-Section-Roll</th>
                        <th class="p-2 border border-gray-300 font-medium">Fee Details</th>
                        <th class="p-2 border border-gray-300 font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample rows would go here -->
                    {{-- {{ json_encode($myclasses->find($selectedMyclassId)->studentcrs() ) }} --}}

                    {{-- @php 
                        $selectedMyclassFeeStructure = $myclasses->find($selectedMyclassId)
                            ->feeStructures->find($selectedFeeStructureId);
                    @endphp --}}
                    {{-- {{ $selectedFeeStructureId ?? 'NA' }} --}}
                    @if($selectedFeeStructureId)
                        @foreach($myclasses->find($selectedMyclassId)->studentcrs as $studentcr )
                        <tr class="border-b border-gray-200">
                            <td class="p-2 border border-gray-300">{{ $loop->iteration}}-{{ $studentcr->id }}</td>
                            <td class="p-2 border border-gray-300">{{ $studentcr->studentdb->name }}</td>
                            <td class="p-2 border border-gray-300">{{ $myclasses->find($selectedMyclassId)->name }}-{{ $studentcr->section->name}}-{{ $studentcr->roll_no }}</td>
                            <td class="p-2 border border-gray-300">
                                {{-- {{ $selectedMyclassFeeStructure->structureDetails->sum('amount') }} --}}
                                {{-- {{ $selectedMyclassFeeStructure->feeMandate->name }} --}}
                                {{-- {{ $selectedMyclassFeeStructure->feeMandate->mandateDates }} --}}

                                {{-- {{ $myclasses->find($selectedMyclassId)->feeStructures }} --}}
                                {{-- {{ $selectedFeeStructureId->feeMandate->mandateDates }} --}}
                                @foreach($feeStructures->first()->feeMandate->mandateDates as $mandateDate)                                
                                    <button 
                                        onClick="openCompactWindow('{{ route('feeCollectionIndividual',[$studentcr->id, $mandateDate->id, $feeStructure->id]) }}', 400, 600)"

                                        {{-- wire:click="collectFeeStudentcr({{ $studentcr->id }}, {{ $mandateDate->id }})" --}}
                                        class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                                        {{ $mandateDate->start_date }}
                                    {{-- </button>
                                    <a href="{{ route('feeCollectionIndividual',[$studentcr->id, $mandateDate->id, $feeStructure->id]) }}" target="_blank" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition">
                                        {{ $mandateDate->start_date }}
                                    </a> --}}
                                @endforeach

                                {{-- @foreach($selectedMyclassFeeStructure->feeMandate->mandateDates as $mandateDate)                                
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                                        {{ $mandateDate->start_date }}
                                    </button>
                                @endforeach --}}

                                
                                {{-- {{ $myclasses->find($selectedMyclassId)->feeStructures->find($selectedFeeStructureId)->structureDetails->count() }} --}}
                                {{-- {{ $studentcr->feeCollections->count() }} Fee Details --}}
                                {{-- @if($studentcr->feeCollections->isEmpty())
                                    <span class="text-red-500">No Fee Details</span>
                                {{-- {{ $myclasses->find($selectedMyclassId)->feeStructures->find($selectedFeeStructureId)->structureDetails->sum('amount') }} --}}
                                {{-- {{ $myclasses->find($selectedMyclassId)->feeStructures->find($selectedFeeStructureId)->structureDetails->count() }} --}}
                                {{-- {{ $studentcr->feeCollections->count() }} Fee Details --}}
                                {{-- @if($studentcr->feeCollections->isEmpty())
                                    <span class="text-red-500">No Fee Details</span>
                                {{-- @if($studentcr->feeCollections->isEmpty())
                                    <span class="text-red-500">No Fee Details</span>
                                @else
                                    <ul class="list-disc pl-5">
                                        @foreach($studentcr->feeCollections as $feeCollection)
                                            <li>{{ $feeCollection->feeParticular->name }}: ₹{{ $feeCollection->amount }}</li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                            </td>
                            <td class="p-2 border border-gray-300">
                                {{-- <button class="text-blue-600 hover:underline">View</button> --}}
                                <button onClick="openCompactWindow('{{ route('feeCollectionIndividual',[$studentcr->id, $mandateDate->id, $feeStructure->id]) }}', 400, 600)" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">View</button>
                                <button onClick="closeOpenedTab()" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition">Edit</button>
                                <button wire:click="delete({{ $studentcr->id }})"  class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    {{-- <tr class="border-b border-gray-200">
                        <td class="p-2 border border-gray-300">2-102</td>
                        <td class="p-2 border border-gray-300">Class B</td>
                        <td class="p-2 border border-gray-300">$150.00</td>
                        <td class="p-2 border border-gray-300">
                            <button class="text-blue-600 hover:underline">View</button>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function openCompactWindow(url, width, height) {
        // Define features for the new window
        // 'popup=yes' or 'popup' helps indicate to the browser that it's a popup window,
        // which can influence whether it opens as a tab or a separate window.
        // 'toolbar=no', 'menubar=no', 'scrollbars=no', 'resizable=yes'
        // are common options for a more compact, less cluttered window.
        const windowFeatures = `width=${width},height=${height},left=100,top=100,popup=yes,toolbar=no,menubar=no,scrollbars=yes,resizable=yes`;

        // Open the new window
        const newWindow = window.open(url, '_blank', windowFeatures);

        // Check if the window was opened successfully (e.g., not blocked by a pop-up blocker)
            if (!newWindow || newWindow.closed || typeof newWindow.closed == 'undefined') {
                alert('Pop-up blocked! Please allow pop-ups for this site to open the compact window.');
            }
        }


        let newTab; // Declare a variable to hold the reference to the new tab

        function openNewTab() {
        newTab = window.open("https://www.example.com", "_blank");
        if (newTab) {
            console.log("New tab opened successfully!");
        } else {
            alert("Pop-up blocked! Please allow pop-ups for this site.");
        }
        }
        function closeOpenedTab() {
        if (newTab && !newTab.closed) { // Check if the tab exists and is not already closed
            newTab.close();
            console.log("Tab closed!");
        } else {
            console.log("No tab to close or tab already closed.");
        }
        }
    </script>
    
    <!-- JavaScript for tab functionality (optional) -->
    {{-- <script>
        const tabs = document.querySelectorAll('[role="tab"]');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                tabs.forEach(t => {
                    t.classList.remove('border-blue-600', 'text-blue-600');
                    t.classList.add('border-transparent');
                    t.setAttribute('aria-selected', 'false');
                });
                
                // Add active class to clicked tab
                tab.classList.add('border-blue-600', 'text-blue-600');
                tab.classList.remove('border-transparent');
                tab.setAttribute('aria-selected', 'true');
                
                // Here you would typically show/hide tab content
            });
        });

        // Fee structure selection logic
        const feeStructureOptions = document.querySelectorAll('.fee-structure-option');
        feeStructureOptions.forEach(option => {
            option.addEventListener('click', () => {
                // Remove active class from all options
                feeStructureOptions.forEach(opt => {
                    opt.classList.remove('active', 'bg-blue-100', 'border-blue-300', 'text-blue-700');
                    opt.classList.add('text-gray-700');
                });
                
                // Add active class to clicked option
                option.classList.add('active', 'bg-blue-100', 'border-blue-300', 'text-blue-700');
                option.classList.remove('text-gray-700');
                
                // Here you would typically filter the table based on selected fee structure
                const selectedStructure = option.dataset.feeStructure;
                console.log(`Selected fee structure: ${selectedStructure}`);
                // Add your filtering logic here
            });
        });
    </script> --}}













</div>